<?php
// Database connection
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "expense_planner";


$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {

    $username = $_COOKIE['username'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    $sql = "INSERT INTO expenses (username, description, amount, date) VALUES ('$username', '$description', '$amount', '$date')";
    mysqli_query($conn, $sql);

    // Redirect to index page
    header("Location: Planner.php");

}

// Check if delete button is clicked
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Delete data from database
    $sql = "DELETE FROM expenses WHERE id=$id";
    mysqli_query($conn, $sql);

    // Redirect to index page
    header("Location: Planner.php");

}
?>