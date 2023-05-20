<!DOCTYPE html>
<html>
<head>
	<title>Form Submission</title>
</head>
<body>
	<?php
		$name = $_POST['name'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$interests = $_POST['interests'];
		$country = $_POST['country'];
        
		echo "<p>Name: $name</p>";
		echo "<p>Email: $email</p>";
		echo "<p>Gender: $gender</p>";
		echo "<p>Interests: ";
		foreach ($interests as $interest) {
			echo "$interest ";
		}
		echo "</p>";
		echo "<p>Country: $country</p>";
	?>
</body>
</html>

