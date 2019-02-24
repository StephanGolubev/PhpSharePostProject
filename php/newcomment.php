<?php
   include('session.php');

?>
<?php 
	$user = $_SESSION["login_user"];
	$post_id = $_SESSION['post_id'];
	$id = $_SESSION['user_id'];

	$comment =  mysqli_real_escape_string($db, $_POST['comment']);
	$sql = "INSERT INTO comment (`user`, `user_id`, `body`, `post_id`) VALUES ('$user', '$id', '$comment', $post_id)";
	$result = $db->query($sql);

	if (!$result) {
		$page_referrer=$_SERVER['HTTP_REFERER'];
		$suc = "Your comment has been saved!";
		$_SESSION["status"] = $suc;
        header('Location: '.$page_referrer);
	}else{
		$error = "Something went wrong, please try again later";
		$_SESSION["status"] = $error;
		$page_referrer=$_SERVER['HTTP_REFERER'];
        header('Location: '.$page_referrer);
	}

 ?>