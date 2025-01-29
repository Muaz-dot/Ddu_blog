<?php
$hostname = "localhost";
$db_username = "root";
$db_password = "";
$databasename = "ddu blog1";

if(isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect($hostname, $db_username, $db_password, $databasename);
    
    if (!$conn) {
        die("Database Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM account WHERE user_name='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {

        header('Location: postbox.html');
        exit(); 
    } else {

        header("location: resignin.html");
        exit(); 
    }
} else {
    header("location: resignin.html");
    exit();
}
?>
