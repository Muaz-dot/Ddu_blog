<?php
$hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'ddu blog1';

$conn = mysqli_connect($hostname, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];
    $query = "SELECT * FROM blogs WHERE blog_id = $postId";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $postTitle = $row['blog_title'];
        $postContent = $row['post_content'];
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>DDU Blog- Read more</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
            <style>
                body {
                    background-color: #D9D9D9;
                    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                }
                .full-post {
                    max-width: 50%;
                    margin: 0 auto;
                    margin-top: 20px;
                    padding: 70px;
                    background-color: #fff;
                }
                .post-title {
                    font-size: 24px;
                    font-weight: bold;
                    margin-bottom: 20px;
                }
                .post-content {
                    font-size: 18px;
                    line-height: 30px;
                    text-align: justify;
                }
            </style>
        </head>
        <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <header>
            <nav class="navbar navbar-expand-lg navbarabout">
                <div class="container-fluid">
                    <a class="navbar-brand navbar-brandabout" href="index.html">DDU blog</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon navbar-toggler-iconabout"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="navbarlink"  href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbarlink" href="signin.html">Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbarlink" href="recent.php">Recent</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbarlink" href="about.html">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
            
            <div class="full-post">
                <h1 class="post-title"><?php echo $postTitle; ?></h1>
                <p class="post-content"><?php echo $postContent; ?></p>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Post not found!";
    }
} else {
    echo "Post ID not provided!";
}

mysqli_close($conn);
?>