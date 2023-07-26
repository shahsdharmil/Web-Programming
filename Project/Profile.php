<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "expense_planner";


$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_COOKIE['username'];
$sql = "SELECT email FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result)
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="style2.css">

    <script>
        function reloadParent() {
            parent.postMessage('reload', '*');
        }
    </script>
</head>

<body>
    <div class="header">
        <h2>Welcome,
            <?php echo $username; ?>!
        </h2>
    </div>

    <div class="content">
        <h3>Your Profile</h3>
        <table>
            <tr>
                <td><strong>Username:</strong></td>
                <td>
                    <?php echo $username; ?>
                </td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <center><a href="Logout.php" class="btnLogout" onclick="reloadParent()">Logout</a></center>
    </div>
</body>

</html>