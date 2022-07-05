<?php
	session_start();
	unset($_SESSION['loginad']);
	header("location: login.php");
?>