<?php
session_start();
	include_once("config.php");
	$dt=new database();
	$password=isset($_POST['password'])?$_POST['password']:"";
	$username=isset($_POST['username'])?$_POST['username']:"";
	$error = array('error' =>'success' ,'username'=>'','password'=>'' );
	if ($username) {
		$dt->select("SELECT * FROM user WHERE email='$username'");
		$row=$dt->fetch();
		$count=$dt->num_rows();
		
		if ($count==0) {
			$error['username']='tài khoản không tồn tại';

		}else {
		if ($row['password'] != $password) {
			$error['password']='mật khẩu không đúng';
		}
	}
	}
	if (!$error['username'] && !$error['password']) {
		$_SESSION["login"]=$username;
	}
	
	// Trả kết quả về cho client
	die (json_encode($error));