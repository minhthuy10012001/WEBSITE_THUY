<?php
	include_once("../../config.php");
	$dt=new database();
	$facebook=$_POST["facebook"];
	$fanpage=$_POST["fanpage"];
	$instagram=$_POST["instagram"];
	$fanpage_2=$_POST["fanpage_2"];
	$youtube=$_POST["youtube"];
	$skype=$_POST["skype"];
	if (isset($_POST['edit'])) {
		$dt->command("UPDATE social SET facebook='$facebook',skype='$skype',youtube='$youtube',
				instagram='$instagram',fanpage='$fanpage',fanpage_2='$fanpage_2' WHERE id='1'  ");
			header("location: ../../index.php?view=social");
	}
?>