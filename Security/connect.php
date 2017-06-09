<?php

	error_reporting(0);
	define('DB_ADDR','https://sql12.freesqldatabase.com');
	define('DB_USER','sql12177861');
	define('DB_PASS','B2mZHQcPzN');
	define('DB_NAME','sql12177861');
	define('BADDR','/');
	
	$dbc = mysqli_connect(DB_ADDR,DB_USER,DB_PASS,DB_NAME)
		or die('dsfkhskudfh');
	$query = 'SELECT * FROM user WHERE `Access Privelage` = \'A\';';
	$check = mysqli_query($dbc,$query);
	mysqli_fetch_array($check)
		or die('NO ADMIN FOUND CONTACT DATABASE MANAGER..');

?>