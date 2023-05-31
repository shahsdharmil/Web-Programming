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

unset($_SESSION["name"]);
unset($_SESSION["start_time"]);
session_destroy();

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
    <title>Logout</title>
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
        Duration of Usage:
        <?php echo formatDuration($duration); ?>
    </div>
    <h1>Thank You,
        <?php echo $name; ?>!
    </h1>

</body>

</html>