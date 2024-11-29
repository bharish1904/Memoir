<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include_once "db_conn.php";

    
    $text = $_POST['text'];

    
    if(isset($_FILES['media'])) {
        $file_name = $_FILES['media']['name'];
        $file_tmp =$_FILES['media']['tmp_name'];
        $file_type=$_FILES['media']['type'];

        
        $upload_dir = "uploads/";

        
        if (strpos($file_type, 'video') !== false) {
            // If file type is video
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_exts = array("mp4", "avi", "mov", "wmv");
            if (!in_array($file_ext, $allowed_exts)) {
                $error = "File extension not allowed for videos. Please upload a video file with mp4, avi, mov, or wmv extension.";
                header("Location: post.php?error=$error");
                exit();
            }
        } else if (strpos($file_type, 'image') !== false) {
            // If file type is image
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_exts = array("jpg", "jpeg", "png", "gif");
            if (!in_array($file_ext, $allowed_exts)) {
                $error = "File extension not allowed for images. Please upload an image file with jpg, jpeg, png, or gif extension.";
                header("Location: post.php?error=$error");
                exit();
            }
        } else {
            $error = "Unsupported file type. Please upload an image or video file.";
            header("Location: post.php?error=$error");
            exit();
        }

        move_uploaded_file($file_tmp, $upload_dir.$file_name);

        $sql = "INSERT INTO posts (text, media) VALUES ('$text', '$file_name')";
        if (mysqli_query($conn, $sql)) {
           
            $post_id = mysqli_insert_id($conn);
            header("Location: view-post.php?id=$post_id");
            exit();
        } else {
            $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
            header("Location: post.php?error=$error");
            exit();
        }
    } else {
        $error = "No media file uploaded.";
        header("Location: post.php?error=$error");
        exit();
    }
} else {

    header("Location: post.php");
    exit();
}
?>
