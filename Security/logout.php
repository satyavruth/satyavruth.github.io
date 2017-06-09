<?php

	require_once('connect.php');
	setcookie('username','',time() - 1);
	setcookie('time',time(),time + 63072000);
	echo 'LOGGED OUT SUCCESSFULLY.';
?>

<FORM action = "login.php"><input type = "SUBMIT" value = "LOG IN" /></FORM>
<FORM action = "signup.php"><input type = "SUBMIT" value = "SIGNUP" /></FORM>
