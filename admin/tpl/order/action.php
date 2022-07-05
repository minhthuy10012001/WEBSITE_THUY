	<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	$phone=$_POST["phone"];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$info=$_POST['info'];
	$price=$_POST['price'];
	$status=$_POST['status'];
	if (isset($_POST['edit'])) {
		
			$dt->command("UPDATE shipping SET name='$name',email='$email',phone='$phone',
				address='$address',info='$info',price='$price',status='$status' WHERE id='$id'  ");
			header("location: ../../index.php?view=order&action=list&pag=1");
		
	}
	else{
		
		$dt->command("DELETE FROM shipping WHERE id='$id' ");
		
		header("location: ../../index.php?view=order&action=list&pag=1");
	}	
?>