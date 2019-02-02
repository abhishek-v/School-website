<?php
	session_start();
	unset($_SESSION['t_name']);
	header("refresh:0;url=teacherlogin.php");
?>
