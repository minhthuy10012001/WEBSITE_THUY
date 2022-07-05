<?php
	include_once("../../config.php");
	$dt=new database();
	
	$content=$_POST["content"];
	if (isset($_POST['edit'])) {
		$dt->command("UPDATE gioithieu SET content='$content' WHERE id='1'  ");
			header("location: ../../index.php?view=gioithieu");
	}
?>