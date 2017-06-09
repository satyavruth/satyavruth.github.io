<?php

	require_once('connect.php');
	
	$query = 'DELETE FROM user WHERE username LIKE "'.$_POST['DELETE'].'";';
	$result = mysqli_query($dbc,$query);
	
	if($result)
	{
		$row = mysqli_fetch_array()
		if($row['Access Privelage'] == 'A')
		{
			echo 'UNABLE TO REMOVE AN ADMIN';
		}
		else
		{
			mysqli_query($dbc,$query);
			header("Refresh:3;url = index.php");
			echo 'SUCCESSFULLY DELETED';
			setcookie('username',time()-100000000);
		}
	}
	else
	{
		header("Refresh:3;url = index.php");
		echo 'User not found..';
	}
	


?>