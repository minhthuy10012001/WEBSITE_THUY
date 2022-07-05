<?php
	include_once("../../config.php");
	$dt=new database();
	$info_footer=$_POST["info_footer"];
	$hotline=$_POST["hotline"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	if (isset($_POST['edit'])) {
		$dt->command("UPDATE info SET info_footer='$info_footer',email='$email',address='$address',
				hotline='$hotline' WHERE id='1'  ");
			header("location: ../../index.php?view=info");
	}
?>