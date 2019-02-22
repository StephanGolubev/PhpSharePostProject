<!DOCTYPE html>
<html>
<head>
	<title>Cool!</title>
	<link rel="stylesheet" type="text/css" href="css/first.css">
</head>
<body>
	<?php

$x = $_POST['firstname'];
$y = $_POST['lastname'];
$z = $_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db1";
$page = "login.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection faild: ..." . $conn->connect_error);
}
echo "Connected succsessfuly";
$sql= "INSERT INTO user (`fname`, `lname`, `password`) VALUES ('$x', '$y', '$z')";

if ($conn->query($sql)==TRUE) {
	header('Location: '.$page);
	echo "<br> New record made succsessfuly";
} else {
	echo "Error" . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "<br><h2>Hello " . $x . "</h2>";
?><br>
<a href="login.php">Login here</a>
</body>
</html>

