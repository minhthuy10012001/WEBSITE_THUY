<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	$type_id=$_POST["type_id"];
	if (isset($_POST['edit'])) {
		
			$dt->command("UPDATE product_type SET type_id='$type_id',name_product_type='$name' WHERE type_id='$id'");
			header("location: ../../index.php?view=product_type&action=list");
		
	}elseif (isset($_POST['add'])) {
		$dt->command("INSERT INTO product_type(type_id,name_product_type) VALUES ('$type_id','$name')");
		header("location: ../../index.php?view=product_type&action=list");
	}
	else{
		$dt->command("DELETE FROM product_type WHERE type_id='$id' ");
		header("location: ../../index.php?view=product_type&action=list");
	}	
?>