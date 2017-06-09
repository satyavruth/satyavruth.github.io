<?php

	require_once('connect.php');
	
	$user = $_COOKIE['username'];
	$query = 'SELECT * from user WHERE `Access Privelage` NOT LIKE \'A\' OR username = "'.$user.'";';
	$result = mysqli_query($dbc,$query)
		or die(mysqli_error($dbc));
	echo '<FORM ACTION = "acts.php" METHOD = "POST">';
	echo '<TABLE>';
	while($row = mysqli_fetch_array($result))
	{
		echo '<TR>';
		echo '<TD>'.$row['username'].'</TD>';
	
		if($row['Access Privelage'] == 'B')
		{
			echo '<TD><INPUT TYPE = "radio" ID = "remove'.$row['user_id'].'" VALUE = true DEFAULT = false NAME = "remove'.$row['user_id'].'" > Remove</TD>';
			echo '<TD><INPUT TYPE = "radio" ID = "makeadmin'.$row['user_id'].'" VALUE = true DEFAULT = false NAME = "makeadmin'.$row['user_id'].'" > MAKE ADMIN</TD>';
		}
		
		else
		{
			echo '<TD><INPUT TYPE = "radio" ID = "remove'.$row['user_id'].'" VALUE = true DEFAULT = false NAME = "remove'.$row['user_id'].'" > Remove </TD>';
			echo '<TD><INPUT TYPE = "radio" ID = "demote'.$row['user_id'].'" VALUE = true DEFAULT = false NAME = "demote'.$row['user_id'].'" > DEMOTE </TD>';
		}
		
		echo '</TR>';
	}
	echo '</TABLE>';
	
	echo '<INPUT TYPE = "submit" value = "CHANGE"></FORM>';

?>
