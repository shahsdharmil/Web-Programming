<?php

session_start();

if (!isset($_SESSION["name"])) {
    header("Location: index.php");
    exit();
}

$name = $_SESSION["name"];
$start_time = $_SESSION["start_time"];
$current_time = time();
$duration = $current_time - $start_time;

function formatDuration($duration)
{
    $hours = floor($duration / 3600);
    $minutes = floor(($duration % 3600) / 60);
    $seconds = $duration % 60;

    return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Hello</title>
    <style>
        .right {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>

<body>
    <div class="right">
        Start Time:
        <?php echo date("Y-m-d H:i:s", $start_time); ?>
    </div>
    <h1>Hello,
        <?php echo $name; ?>!
    </h1>
    <form method="POST" action="logout.php">
        <input type="submit" value="Logout">
    </form>
</body>

</html>