
<?php
   include("config.php");
   session_start();
   $newURL = "dashboard.php";
   $oldURL = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db, $_POST['firstname']);
      $mypassword = mysqli_real_escape_string($db, $_POST['password']); 
      
      $sql = "SELECT * FROM user WHERE fname = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql) or die( mysqli_error($db));
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['password'];
      $id = $row['id'];

      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($mypassword == $active) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['user_id'] = $id;

         header('Location: '.$newURL);
      // }elseif ($row['fname'] == "") {
      //    $error = "No such username";
      //    $_SESSION['error'] = $error;
      //    $page_referrer=$_SERVER['HTTP_REFERER'];
      //    header('Location: '.$page_referrer);
      // }
      }else{
         $error = "Your Login Name or Password is invalid";
         $_SESSION['error'] = $error;
         $page_referrer=$_SERVER['HTTP_REFERER'];
         header('Location: '.$page_referrer);
      }
   }
?>
