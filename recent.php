<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>DDU blog - Recent</title>
    <style>
        .recentbody{
            height: 100vh;
            background-image: url('lpbg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .recentcon{
            display: flex;
            justify-content: center;
        }
        .recentheader{
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            text-transform: capitalize;
            text-decoration: underline;
        }
        .recentbox{
            width: 50%;
            margin-top: 7px;
            margin-bottom: 7px;
            padding: 55px;
            background-color: hsl(208, 14%, 58%, 0.7);
        }
        .postcon{
            font-size: 18px;
            text-align: justify;
            line-height: 30px;
            color: #000;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .readmore{
          color: #fff;
          font-weight: bold;
          text-decoration: none;
        }
        .readmore:hover{
          color: #000;
            font-size: 18px;
        }
        .nopost{
            width: 100%;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
    </style>
</head>
<body class="recentbody">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<header>
    <nav class="navbar navbar-expand-lg">
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

<?php
$hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'ddu blog1';

$conn = mysqli_connect($hostname, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM blogs ORDER BY blog_id DESC LIMIT 10";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $postId = $row['blog_id'];
        $postTitle = $row['blog_title'];
        $postContent = $row['post_content'];
        $cover = $row['blog_cover'];
        ?>
        <div class="recentcon">
            <div class="recentbox">
                <h1 class="recentheader"><?php echo $postTitle ?></h1>
                <?php 
                if(strlen($row['post_content']) >= 500 ){ ?>
                    <p class="postcon"><?php echo substr($row['post_content'], 0, 500); ?>&nbsp
                        <a href="full_post.php?post_id=<?php echo $postId; ?>" class="readmore">Read more...</a>
                    </p>
                <?php 
                } else {
                ?>
                    <p class="postcon"><?php echo $row['post_content']; ?>&nbsp</p>
                <?php 
                }
                ?>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <h1 class="nopost"><?php echo "No posts yet!";?></h1>
    <?php
}

mysqli_close($conn);
?>

</body>
</html>
