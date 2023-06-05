<!DOCTYPE html>
<html lang="en">
<head>
<title>Table Data</title>
<style>
table{
border-collapse: collapse;
}
td,th{
padding: 5px 15px;
}
</style>
</head>
<body>
<?php
$con = new mysqli("localhost","root","","studentdb");
if(mysqli_connect_error())
{
die("connection fail <br>" . mysqli_connect_error());
}
else{
echo("<small>Connection successful</small> <br>");
}
//delete table
$sql = "DROP TABLE student";
$res = $con->query($sql); 
if($res)
{
echo "<h1> Student Table has been Deleted </h1>";
}
else{
echo "Student Table Does not Drop ";
}
//delete Database
$sql = "DROP DATABASE studentdb";
$res = $con->query($sql); 
if($res)
{
echo "<h1> Studentdb Database has been deleted </h1>";
}
else{
echo "Student Table Does not Drop ";
}
$con->close();
?>
</body>
</html>