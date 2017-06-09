<?php

	require_once('db.php');
	if($row['Access Privelage'] == 'A')
	{
		echo '<br><br><FORM ACTION = "admin.php"><INPUT TYPE = "SUBMIT" VALUE = "ADMIN PAGE"><br></FORM>
				<FORM action = "logout.php"><input type = "SUBMIT" value = "LOG OUT" /></FORM>';
	}
	else if($row['Access Privelage'])
	{
		echo '<FORM ACTION = "user.php" METHOD = "POST"><INPUT TYPE = "SUBMIT" VALUE = "DELETE ACCOUNT">
										<INPUT TYPE = "HIDDEN" VALUE = '.$row['username'].' NAME = "DELETE"></FORM>
										<FORM action = "logout.php"><input type = "SUBMIT" value = "LOG OUT" /></FORM>';
	
	}

	else
	{
		echo '<FORM action = "login.php" METHOD = "GET"><input type = "SUBMIT" value = "LOG IN" NAME = "sdjjsf"/></FORM>
				<FORM action = "signup.php"><input type = "SUBMIT" value = "SIGN UP" /></FORM>';
	}
?>

