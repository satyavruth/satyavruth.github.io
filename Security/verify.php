<?php

	require_once('connect.php');
	
	$user = $_POST['USER'];
	
	$query = 'SELECT * FROM user WHERE username = "'.$user.'"';
	$result = mysqli_query($dbc,$query);
	$pass = mysqli_fetch_array($result)['password'];
	
	if($pass == SHA1($_POST['PW']))
	{
		header('Refresh:0;url = index.php');
		setcookie('username',$user,time() + 63072000);
		setcookie('time',time(),time() + 63072000);
	}
	else
	{
		echo 'Username/Password incorrect'.'<br>';
		require_once('login.php');
	}
	
?>