<?php
		if(!isset($_COOKIE['username']))
			echo '<FORM action = "putin.php" method = POST >
				USERNAME: <input type = "text" id = "USER" name= "USER" /><br>
				PASSWORD: <input type = "password" id = "pw" name = "PW"><br>
				<input type = "Submit" value = "SIGN UP">
				';
		else
		{
			require_once('connect.php');
			$query = 'SELECT * FROM user WHERE username = "'.$_COOKIE['username'].'";';
			$result = mysqli_query($dbc,$query);
			if($result)
			{
				header("Refresh:3;url = index.php");
				echo 'You are logged in as '.$_COOKIE['username'].' log out first';
			}
			else
			{
				header("Refresh:0;url = signup.php");
				setcookie('username','',time() - 3600);
				
			}
		}
?>