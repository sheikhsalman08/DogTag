<?php 
	session_start();
	require('../functions.php');
 if(empty($_SESSION['admin_id'])) {
 	header("Refresh:0; url=security.php");
 }

	session_destroy();
	Header('Location:index.php');

?>