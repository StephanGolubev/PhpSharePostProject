<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body class="text-center">
	<h2>To log in fill this form:</h2>
	
<form class="form-signin" action="cheking.php" method="post" >
	<h1 class="h3 mb-3 font-weight-normal">First name:<br></h1>
	<input type="name" name="firstname" class="form-control" placeholder="Your first name!" required autofocus>
	<br>
	<h1 class="h3 mb-3 font-weight-normal">Password:<br></h1>
	<input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
	<br><br>
	<button class="btn btn-lg btn-primary btn-block" type="sudmit">Sudmit</button>
	<label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
</form>
<?php 
	
        	echo "<h2>".$_COOKIE['error']."</h2>";
 ?>

</body>
</html>