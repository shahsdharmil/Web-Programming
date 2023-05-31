<?php
if (!isset($_COOKIE['name']))
    header("Location: 4.php");

echo "Hello " . $_COOKIE["name"];
?>

<html>

<head>
    <title>Hello</title>
</head>

<body>

</body>

</html>