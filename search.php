<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDu blog - Search Result</title>
    <style>
        .searchresultbody {
          height: 100vh;
          background-image: url('lpbg.jpg');
          background-size: cover;
          background-repeat: no-repeat;
          background-position: center;
          background-attachment: fixed;
          font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .cont {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .searchresultbox {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 0px;
            margin-top: 10px;
            margin-left: 300px;
            margin-right: 300px;
            background-color: hsl(208, 14%, 58%, 0.7);
            padding: 70px;
        }
        .searchresulttitle {
            font-size: 26px;
            font-weight: bold;
            border: 0px;
        }
        .searchresultpar {
            width: 100%;
            text-align: justify;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            line-height: 35px;
            font-size: 18px;
        }
        .readmore {
            background-color: #fff;
            border: 0px;
            font-size: 18px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: blue;
        }
        .readmore:hover {
            font-size: 22px;
        }
        .searchResLink {
            text-decoration: none;
            color: blue;
            font-size: 18px;
        }
        .searchResLink:hover {
            font-size: 20px;
        }
    </style>
</head>
<body class="searchresultbody">

    <div class="cont">
        <?php 
        
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $db_name = "ddu blog1";
        
        if (!empty($_POST['searchinput'])) {
            $searchInput = $_POST['searchinput'];
            $conn = mysqli_connect($hostname, $username, $password, $db_name);
            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $query = "SELECT * FROM blogs WHERE blog_title LIKE '%$searchInput%'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="searchresultbox">
                        <h1 class="searchresulttitle"> <?php echo $row['blog_title']?></h1>
                        <p class="searchresultpar"><?php echo substr($row['post_content'], 0, 500); ?>&nbsp
                        <form action="full_post.php" method="GET">
                            <input type="hidden" name="post_id" value="<?php echo $row['blog_id']; ?>">
                            <button type="submit" class="readmore">Read more...</button>
                        </form></p>
                        <a href="index.html" class="searchResLink">Back to home</a>
                    </div>
                    <?php
                }
            } else {
                echo "No results found.";
                ?>  <a href="index.html" class="searchResLink">Back to home</a><?php
            }
            mysqli_close($conn);
        } else {
            header("Location: index.html");
        }
        ?>
   </div>
    
</body>
</html>
