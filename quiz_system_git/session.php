<?php
	
    include('scripts/connect_db.php');

	session_start();

	$check=$_SESSION['login_username'];

	$session=$mysqli->query("SELECT username FROM admins WHERE username='$check' ")or die($mysqli->error);

	$row=$session->fetch_array();

	$login_session=$row['username'];

	if(!isset($login_session)) {
		$user_msg = 'Please Login First!';
		header('location: login.php?user_msg='.$user_msg.'');
	}

?>