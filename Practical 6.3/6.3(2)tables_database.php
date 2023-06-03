<?php
$servername="localhost";
$username="root";
$password="";
$dbname="studentdb";

// create connection
$conn=new mysqli($servername,$username,$password,$dbname);

//check connection
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}

//get the list of tables
$sql="SHOW TABLES";
$result=$conn->query($sql);

if($result->num_rows>0){
    echo"tables in $dbname";
    echo"<br>";
    while($row=$result->fetch_assoc()){
        echo $row["Tables_in_$dbname"];
        echo"<br>";
    }
}
        else{
            echo "no table found in database $dbname";
        }

$conn->close();
?>