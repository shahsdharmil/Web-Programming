<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <input type="submit" value="Login" class="btn" name='submit'>
            <p class="signup-link">Don't have an account? <a href="Registration.php">Sign up</a></p>
        </form>
    </div>

    <?php

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "expense_planner";


    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            setcookie("username", $username, time() + 24 * 3600, "/");
            header("Location: Planner.php");
            exit();
        } else {
            echo "<center style='font-size: xx-large; padding-top: 10px'>Invalid username or password</center>";
        }
    }
    ?>

</body>

</html>