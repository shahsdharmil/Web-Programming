<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();

    if (isset($_POST["submit"])) {
        if (isset($_SESSION["page_loads"])) {
            $_SESSION["page_loads"]++;
            echo "You loaded this page " . $_SESSION["page_loads"] . " times";
        } else {
            $_SESSION["page_loads"] = 1;
            echo "You loaded this page " . $_SESSION["page_loads"] . " time";
        }
    }
    if (isset($_POST["destroy"])) {
        echo "Destroy";
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <button type="submit" name="submit">Submit</button>
        <br><br>
        <button type="submit" name="destroy">Destroy</button>
    </form>
</body>

</html>