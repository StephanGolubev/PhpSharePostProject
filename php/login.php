<?php
 session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body class="text-center" style="background-color: #E5E7E9;"><br><br>
	<h2>To log in fill this form:</h2><br><br>


<div class="container" >
	<?php 
if (isset($_SESSION['error'])) {
	echo '<h4 style="color: red"><li>'.$_SESSION['error'].'</h4>';
	unset($_SESSION['error']);
}else{
	
}
	 ?>
</div>


	<div class="container col-lg-6 col-md-12">
		<div style="border: 2px solid black;border-radius: 8px; background-color: white"><br><br>
	
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
</form><br><br>
</div>
</div>
</body>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>