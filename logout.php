<?php
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['current_user']);
	header("location: index.html");
	
?>