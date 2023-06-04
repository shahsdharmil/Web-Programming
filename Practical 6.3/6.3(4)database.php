<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Studentdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
else{
    echo("<small>Connection successful</small> <br>");
    }
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Get values from form
$enrollment=$_POST["enrollment"];
$name = $_POST["name"];
$age = $_POST["age"];
$marks = $_POST["marks"];
// SQL statement to insert row
$sql = "INSERT INTO student (enroll_no,name, age, marks) VALUES ('$enrollment','$name', $age, $marks)";
// Execute SQL statement
if ($conn->query($sql) === TRUE) {
echo "New record created successfully<br><br>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}
// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Form</title>
<style>
* {
box-sizing: border-box;
}
main {
width: 500px; border-radius: 5px;
border: 1px solid #000; padding: 30px 20px; margin: 0 auto;
}
h1 {
border-bottom: 2px solid #000; padding-bottom: 10px; padding-left: 10px; margin-bottom: 30px;
}
div {
width: 90%; margin: 10px;
}
div label { display: block;
margin: 5px 10px; font-size: 18px; font-weight: 900;
}
div input { width: 100%; padding: 5px 10px;
}
button {
background: transparent; font-weight: 700; margin: 10px; font-size: 13px; padding: 10px; color: #00ff6a;
border: 2px solid #02dd5d; border-radius: 5px; cursor: pointer;
}
button:hover { color: #fff; background: #00ff6a;
}
div input{ border: none;
border-bottom: 1px solid #000; outline: none;
}
</style>
</head>
<body>
<main>
<h1>Student Record Insert From</h1>
<form method="post" action="6.3(4)database.php">
    Enrollment: <input type="number" name="enrollment"><br><br>
    Name: <input type="text" name="name"><br><br>
    Age: <input type="number" name="age"><br><br>
    Marks: <input type="number" name="marks"><br><br>
    <input type="submit" value="Submit">
</form>
</main>
</body>
</html> 