<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
$sql = "CREATE TABLE student (
    enroll_no INT(15) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT(11) NOT NULL,
    marks DECIMAL(5,2) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table student created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>