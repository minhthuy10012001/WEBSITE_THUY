<?php
	include_once("config.php");
	$dt=new database();
	$password=isset($_POST['password'])?$_POST['password']:"";
	$username=isset($_POST['username'])?$_POST['username']:"";
	$fullname=isset($_POST['fullname'])?$_POST['fullname']:"";
	$phone=isset($_POST['phone'])?$_POST['phone']:"";
	$error = array('error' =>'success' ,'username'=>'' );
	if ($username) {
		$dt->select("SELECT * FROM user WHERE email='$username'");
		$count=$dt->num_rows();
		if ($count>0) {
			$error['username']='tài khoản đã tồn tại';
		}
	}

	if (!$error['username']  ) {
		$dt->command("INSERT INTO user(email,password,name,phone) VALUES('$username','$password','$fullname','$phone')");
	}
	
	// Trả kết quả về cho client
	die (json_encode($error));