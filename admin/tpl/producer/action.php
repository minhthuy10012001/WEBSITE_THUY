<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	$producer_id=$_POST["producer_id"];
	if (isset($_POST['edit'])) {
		
			$dt->command("UPDATE producer SET producer_id='$producer_id',name_producer='$name' WHERE producer_id='$id'");
			header("location: ../../index.php?view=producer&action=list");
		
	}elseif (isset($_POST['add'])) {
		$dt->command("INSERT INTO producer(producer_id,name_producer) VALUES ('$producer_id','$name')");
		header("location: ../../index.php?view=producer&action=list");
	}
	else{
		$dt->command("DELETE FROM producer WHERE producer_id='$id' ");
		header("location: ../../index.php?view=producer&action=list");
	}	
?>