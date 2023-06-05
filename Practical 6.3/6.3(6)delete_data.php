<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Row</title>
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
$sql = "DELETE FROM `student` WHERE `enroll_no` >=0 AND
`enroll_no` <= 3";
$res = $con->query($sql);
if($res){
echo "<h1>Database Updated</h1>";
echo "<p> deleted Record from student table </p>";
}
echo "<h1> Updated Table</h1>"; echo " <table border=1>
<tr>
<th>Enrollment</th>
<th>Name</th>
<th>Age</th>
<th>Marks</th>
</tr>";
$sql = "select * from student";
$res = $con->query($sql);
if($res){
while($row = $res->fetch_array()){
echo "<tr> <td>" . $row['enroll_no'] . "</td> <td>" . $row['name'] . "</td>
<td>" . $row['age'] . "</td> <td>" . $row['marks'] . "</td> </tr><br>";
}
}
else{
echo $con->error;
}
echo "</table>";
$con->close();
?>
</body>
</html>
