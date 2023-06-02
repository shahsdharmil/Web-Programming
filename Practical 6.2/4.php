<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    setcookie("name", $name, time() + 24 * 3600, "/");
    header("Location: hello.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="name">Enter Name : </label>
        <input type="text" name="name">
        <br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>