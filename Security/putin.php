<?php
	
	require_once("connect.php");
	
	$query = 'SELECT * FROM user WHERE username = "'.$_POST['USER'].'";';
	$result = mysqli_query($dbc,$query);
	
	if(mysqli_num_rows($result) > 0)
	{
		header('Refresh:5;url = '.BADDR);
		echo 'USER already EXISTS';
	}
	else
	{
		$query = 'INSERT INTO user(username,password) VALUES ("'.$_POST['USER'].'",SHA("'.$_POST['PW'].'"));';
		$Result = mysqli_query($dbc,$query)
				or die(mysqli_error());
		header('Refresh:0;url = '.BADDR);
		echo 'SUCCESSFULLY ADDED INTO DATABASE';
		setcookie('username',$_POST['USER'],time() + 63072000);
		setcookie('time',time(),time() + 63072000);
	}	
?>