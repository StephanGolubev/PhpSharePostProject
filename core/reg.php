<?php 
include("../php/config.php");

$first = $_POST['first'];
$last = $_POST['last'];
$password = $_POST['password'];

if (null !==(trim($first))) {

	$fname = mysqli_real_escape_string($db, $first);
    $lname = mysqli_real_escape_string($db, $last); 
    $pass = mysqli_real_escape_string($db, $password); 
      
      $sql = "SELECT * FROM user WHERE fname = '$fname'";
      $result = mysqli_query($db,$sql) or die( mysqli_error($db));
      $row_cnt = $result->num_rows;

      if ($row_cnt > 0) {
      	echo $row_cnt;
      	echo "Try to use anouther user name! This one is bussy";
      }else{
      	$sql= "INSERT INTO user (`fname`, `lname`, `password`) VALUES ('$fname', '$lname', '$pass')";
      	$page = "login.php";
      	if ($db->query($sql)==TRUE) {
			echo '<br><a href="php/login.php">Login here</a>';
		} else {
		echo "Error" . $sql . "<br>" . $db->error;
		}
      }
		
}	
