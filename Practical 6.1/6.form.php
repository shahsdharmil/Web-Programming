<!DOCTYPE html>
<html>
<head>
	<title>Form Example</title>
</head>
<body>
	<form action="6.submit.php" method="post">
		<label>Name:</label>
		<input type="text" name="name"><br>

		<label>Email:</label>
		<input type="text" name="email"><br>

		<label>Gender:</label><br>
		<input type="radio" name="gender" value="male">Male<br>
		<input type="radio" name="gender" value="female">Female<br>
        <label>Interests:</label><br>
		<input type="checkbox" name="interests[]" value="reading">Reading<br>
		<input type="checkbox" name="interests[]" value="writing">Writing<br>
		<input type="checkbox" name="interests[]" value="swimming">Swimming<br>

		<label>Country:</label>
		<select name="country">
			<option value="usa">USA</option>
			<option value="canada">Canada</option>
			<option value="india">India</option>
		</select><br>

		<input type="submit" value="Submit">
	</form>
</body>
</html>
