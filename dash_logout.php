<?php
	session_start();
	unset($_SESSION['dash_name']);
	header("refresh:0;url=dash_login.php");
?>
