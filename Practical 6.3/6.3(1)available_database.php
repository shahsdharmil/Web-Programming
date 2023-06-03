<?php
$servername = "localhost";
$username = "root"; 
$password = "";  

// Create a connection
$conn = new mysqli($servername, $username, $password);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the list of databases
$sql = "SHOW DATABASES";
$result = $conn->query($sql);

if ($result) {
    // Output each database name
    while ($row = $result->fetch_assoc()) 
    {
        echo"<br>";
        echo $row['Database'] . "\n";
    }
} else {
    echo "Error retrieving database list: " . $conn->error;
}

// Close the connection
$conn->close();
?>
