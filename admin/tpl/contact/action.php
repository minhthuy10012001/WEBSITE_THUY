<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	$phone=$_POST["phone"];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$content=$_POST['content'];
	$title=$_POST['title'];
	$status=$_POST['status'];
	if (isset($_POST['edit'])) {
		$dt->command("UPDATE contact SET name='$name',email='$email',phone='$phone',
				address='$address',content='$content',title='$title',status='$status' WHERE id='$id' ");
		header("location: ../../index.php?view=contact&action=list&pag=1");
	}else{
	$dt->command("DELETE FROM contact WHERE id='$id' ");
	header("location: ../../index.php?view=contact&action=list&pag=1");}

?>