
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body style="background-color: #E5E7E9;">
	
<div>
	<div id="welcome" class="container" style="text-align: center;">
		<h1>Hello to my web site</h1>
		<h4>Please, register here:</h4>
	</div>
	<div class="container data" style="color: red;">
	
</div>
<div class="container col-lg-6 col-md-12" style="border: 2px solid black;border-radius: 10px;background-color: white;"><br><br>
<form aling='center' id="form">
	<div id="inputs">
	<h5>First name:</h5><br>
	<input id="fname" type="text" name="firstname" class="form-control" placeholder="Your first name!" required autofocus>
	<br>
	<h5>Last name:</h5><br>
	<input id="lname" type="text" name="lastname" class="form-control" placeholder="Your last name!" required autofocus>
	<br>
	<h5>Password:</h5><br>
	<input type="password" name="password" id="pass" class="form-control" placeholder="Creat password" required autofocus>
	<br><br>
	<div class="row">
		<div class="col-12" style="text-align: center;">
      <button name="submit" id="button" type="sudmit" class="btn btn-info" ">Sudmit</button>
    </div>
	</div>
	</div>
	
</form>
<br><br>
</div>
</div>
<br>



<br>
<div align="center" id="log">
	<h3>Or login here...</h3>
	<input type="button" onclick="location.href='php/login.php';" value="login" />
</div>
<br>

</body>
<script>
	$( document ).ready(function() {
    $(function () {
        $('#button').on('click', function (e) {
        	e.preventDefault();
        	var	fname = $('#fname').val();
        	var lname = $('#lname').val();
        	var pass = $('#pass').val();
        	
          $.ajax({
            type: 'POST',
            url: 'core/reg.php',
            data: { first: fname, last: lname, password: pass },
            success: function (response) {
              $('.data').html(response);
            }
          });

          
        });

      });

});
</script>
</html>
