
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/main.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>
	<style type="text/css">
		body{
			text-align: center;
			background-color: #d6d6c2;
		}
		#form{
			background-color: #f5f5f0;
			border: 4px solid black;
			border-radius: 20px;
			margin-top: 40px;
			margin-bottom: 0px;
			text-align: left;
			margin-left: 50px;
			margin-right: 50px;
		}
		#button{
			margin-left: 620px;
			height: 45px;
			weight: 150px;
		}
		#inputs{
			margin-top: 10px;
			margin-bottom: 20px;
			margin-left: 50px;
			margin-right: 50px;
		}
		#log{
			margin: 0px;
		}
		#but{
			weight:340px;
		}

	</style>
	<div id="welcome">
		<h1>Hello to my web site</h1>
		<h4>Please, register here:</h4>
	</div>

<form action="php/sudmit.php" method="post" aling='center' id="form">
	<div id="inputs">
	<h5>First name:</h5><br>
	<input type="text" name="firstname" class="form-control" placeholder="Your first name!" required autofocus>
	<br>
	<h5>Last name:</h5><br>
	<input type="text" name="lastname" class="form-control" placeholder="Your last name!" required autofocus>
	<br>
	<h5>Password:</h5><br>
	<input type="password" name="password" class="form-control" placeholder="Creat password" required autofocus>
	<br><br>
	<div class="row">
		<div class="col-sm">
      <button id = "button" type="sudmit" class="btn btn-info" ">Sudmit</button>
    </div>
	</div>
	</div>
	
</form>
<br>
<div align="center" id="log">
	<h3>Or login here...</h3>
	<input type="button" onclick="location.href='php/login.php';" value="login" />
</div>
<br>
 <?php
         if( isset($_COOKIE["name"]))
            echo "Welcome " . $_COOKIE["name"] . "<br />";
         
         else
            echo "Sorry... Not recognized" . "<br />";
     
      ?>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>