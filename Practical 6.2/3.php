<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $_SESSION["name"] = $name;
    $_SESSION["start_time"] = time();
    header("Location: logged.php");
    exit();
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