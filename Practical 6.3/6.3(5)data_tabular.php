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
if(mysqli_connect_error()){
die("connection fail <br>" . mysqli_connect_error());
}
else{
echo("<small>Connection successful</small> <br>");
}
echo "<h1>All recored in Student Table </h1>"; echo " <table border=1>
<tr>
<th>Enrollment</th>
<th>Name</th>
<th>Age</th>
<th>Marks</th>
</tr>";
$sql = "SELECT * FROM student";
$res = $con->query($sql); if($res){
while($row = $res->fetch_array()){
echo "<tr> <td>" . $row['enroll_no'] . "</td> <td>" . $row['name'] . "</td> <td>" .
$row['age'] . "</td> <td>" . $row['marks'] . "</td> </tr><br>";
}
}
else{
echo $con->error;
}
echo "</table>";
$con->close();
?>
</body>