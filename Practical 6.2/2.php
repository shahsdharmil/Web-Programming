<?php

$targetDir = 'C:\xampp\htdocs\WP\Practical 6.2';

if (isset($_POST["submit"])) {
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if ($imageFileType == 'gif' || $imageFileType == 'jpeg') {
        $fileSize = $_FILES["image"]["size"];

        if ($fileSize < 200 * 1024) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile))
                echo "File uploaded successfully";
            else
                echo "Sorry, there was an error uploading your file";
        } else
            echo "Sorry, the file size should be less than 200kB";
    } else
        echo "Sorry, only GIF and JPEG files are allowed";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>

</html>