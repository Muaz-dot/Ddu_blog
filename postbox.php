<?php
if (isset($_POST['post'])) {
    if (!empty($_POST['title']) && isset($_POST['postcontent'])) {
        $hostname = 'localhost';
        $db_username = 'root';
        $db_password = "";
        $db_name = "ddu blog1";

        $conn = mysqli_connect($hostname, $db_username, $db_password, $db_name);
        if ($conn) {
            $blogpost = $_POST['postcontent'];
            $blogtitle = $_POST['title'];

            $query = "INSERT INTO blogs (post_content, blog_title) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'ss', $blogpost, $blogtitle);

            
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                header("Location: recent.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error connecting to database: " . mysqli_connect_error();
        }
    } else {
       header("Location: repostbox.html");
    }
}
?>
