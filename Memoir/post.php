<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link rel="stylesheet" type="text/css" href="poststyle.css">
</head>
<body>
    <div class="post-form">
        <h2>Create Post</h2>
        <form action="post-upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="media">Upload Media:</label>
                <input type="file" name="media" id="media">
            </div>
            <div class="form-group">
                <label for="text">Write Text:</label>
                <textarea name="text" id="text" rows="4" cols="50"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Post</button>
                <a href="home.php" class="cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
