<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password">
            </div>
            <input type="submit" value="Register" class="btn" name='submit'>
            <p class="signin-link">Already have an account? <a href="Login.php">Sign in</a></p>
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

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "INSERT INTO users VALUES('$username', '$email', '$password')";
        if(mysqli_query($conn, $sql)){
            
            header("Location: Login.php");
            exit();
        } else {
            echo "<center style='font-size: xx-large; padding-top: 10px'>User Already Exists</center>";
        }
    }

    ?>
</body>

</html>