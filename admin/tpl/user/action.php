<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	$phone=$_POST["phone"];
	$email=$_POST['email'];
	$password=$_POST['password'];

	if (isset($_POST['edit'])) {
		
			$dt->command("UPDATE user SET name='$name',email='$email',phone='$phone',
				password='$password' WHERE id='$id'  ");
			header("location: ../../index.php?view=user&action=list&pag=1");
		
	}
	else{
		
		$dt->command("DELETE FROM user WHERE id='$id' ");
		
		header("location: ../../index.php?view=user&action=list&pag=1");
	}	
?>