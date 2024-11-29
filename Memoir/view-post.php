<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <style>

        .post-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .post-media {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="post-container">
        <h2>Your Memorial</h2>
        <?php
        include_once "db_conn.php";

        if(isset($_GET['id'])) {
            $post_id = $_GET['id'];

            $sql = "SELECT * FROM posts WHERE id = $post_id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);
                $text = $row['text'];
                $media = $row['media'];

                echo "<p>$text</p>";

                if(strpos($media, '.mp4') !== false || strpos($media, '.avi') !== false || strpos($media, '.mov') !== false || strpos($media, '.wmv') !== false) {
                    
                    echo "<video class='post-media' controls>";
                    echo "<source src='uploads/$media' type='video/mp4'>";
                    echo "Your browser does not support the video tag.";
                    echo "</video>";
                } else {
                    
                    echo "<img class='post-media' src='uploads/$media' alt='Media'>";
                }
            } else {
                echo "Post not found.";
            }

            
            mysqli_close($conn);
        } else {
            echo "Post ID not provided.";
        }
        ?>
    </div>
</body>
</html>
