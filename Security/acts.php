<?php

	require_once('connect.php');
	
	$user = $_COOKIE['username'];
	$query = 'SELECT * from user WHERE "Access Privelage" NOT LIKE "A" OR username = "'.$user.'";';
	$result = mysqli_query($dbc,$query);
	
	while($row = mysqli_fetch_array($result))
	{
		if(isset($_POST['remove'.$row['user_id']]) and $_POST['remove'.$row['user_id']] == 'true')
		{
			if($row['user_id'] != 0)
			{
				$query = 'DELETE FROM user WHERE user_id = '.$row['user_id'].';';
				
				if($row['username'] != $user)
				{
					mysqli_query($dbc,$query)
						or die(mysqli_error($dbc));
					echo $row['username'].' DELETED';
				}
				else
				{
					setcookie('username','',time()-20);
					mysqli_query($dbc,$query)
						or die(mysqli_error($dbc));
					echo $row['username'].' DELETED';
				}
				continue;
			}
			else
				echo 'Cannot remove root';
		}
		else if(isset($_POST['makeadmin'.$row['user_id']]) and $_POST['makeadmin'.$row['user_id']])
		{
			$query = 'UPDATE `user` SET `Access Privelage` = "A" WHERE `user`.`user_id` = '.$row['user_id'];
			mysqli_query($dbc,$query)
			or die(mysqli_error($dbc));
			continue;
		}
		else if(isset($_POST['demote'.$row['user_id']]) and $_POST['demote'.$row['user_id']])
		{
			if($row['user_id'] != 0)
			{
				$query = 'UPDATE user SET `Access Privelage` = "B" WHERE user_id = '.$row['user_id'].';';
				
				$check_query = 'SELECT * from user WHERE `Access Privelage` LIKE "A" AND user_id NOT LIKE '.$row['user_id'].';';
				$check = mysqli_query($dbc,$check_query)
				or die(mysqli_error($dbc));
				
				if(mysqli_fetch_array($check))
				{
					mysqli_query($dbc,$query)
						or die(mysqli_error($dbc));
					echo $row['username'].' DEMOTED';
				}
				else
				{
					header("Refresh:3;url = index.php");
					echo 'Cannot demote the only admin.';
				}
				continue;
			}
			else
				echo 'CANNOT Demote root'
			;
		}
	}

?>


<A HREF = 'index.php' name = 'TOP'>GO BACK</A>