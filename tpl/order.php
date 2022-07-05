<?php
	session_start();
	include_once('../config.php');
	$dt=new database();

	$name = $_POST['txh_name'];
	$email = $_POST['txt_email'];
	$phone = $_POST['txt_phone'];
	$price = $_POST['txt_gia'];
	$info = $_POST['info_order'];
	$address = $_POST['txt_address'];

	foreach ($_SESSION as $key => $value) {
		if (substr($key,0,5)=='cart_') {
			$id=substr($key,5);
			$dt->select("SELECT * FROM product WHERE id='$id'");
			$row= $dt->fetch();
			$sell=$row['sell'];
			$sell+=1;
			$dt->command("UPDATE product SET sell='$sell' WHERE id='$id'");
		}
	}

	$dt->command("INSERT INTO shipping(name,email,phone,price,info,address,status) VALUES ('$name','$email','$phone','$price','$info','$address','Đang chờ')");
	header("location: ../index.php?view=notice&notice=order");
?>