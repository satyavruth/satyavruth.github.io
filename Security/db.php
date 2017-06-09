<?php
	
	require_once('connect.php');
	$row = NULL;
	$user = '';
	if(!isset($_COOKIE['username']) or !isset($_COOKIE['time']))
	{
		setcookie('username','');
		setcookie('time',time(),time() + 63072000);
		$user = $_COOKIE['username'];
		$time = $_COOKIE['time'];
	}
	else
	{
		$user = $_COOKIE['username'];
		$time = $_COOKIE['time'];
	}
	if($user == '')
	{
		header('Refresh:3;url = login.php');
		echo 'PLEASE LOGIN TO CONTINUE';
	}
	else if($time < time() - 3600)
	{
		header("Refresh:3;url = login.php");
		echo 'Session timed out!! RE-LOGIN';
	}
	else
	{
		$query = 'SELECT * FROM user WHERE username = "'.$user.'";';
		$result = mysqli_query($dbc,$query)
			or die(mysqli_error($dbc));
		$row = mysqli_fetch_array($result);
		if($row)
			echo 'You are logged in as: '.$user;
		else
		{
			header("Refresh:3;url = signup.php");
			echo 'user does not exist  Create one first';
		}
	}

?>