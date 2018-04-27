<?php 
	session_start();
	require('functions.php');

	session_destroy();
	Header('Location:login.php');

?>