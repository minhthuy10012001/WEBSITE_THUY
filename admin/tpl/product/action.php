<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	$name_product_type=$_POST['name_product_type'];
	$name_producer=$_POST['name_producer'];
	$price=$_POST['price'];
	$des_short=$_POST['des_short'];
	$discount=$_POST['discount'];
	$total=$_POST['total'];
	$image_link=$_FILES['image_link']['name'];
	$image_link_tmp=$_FILES['image_link']['tmp_name'];
	$investment_money=$_POST['investment_money'];
	move_uploaded_file($image_link_tmp,'uploads/'.$image_link);
	$describe=$_POST['describe'];

	if (isset($_POST['edit'])) {
		if ($image_link=="") { 
			$dt->command("UPDATE product SET investment_money='$investment_money',name_product='$name',name_product_type='$name_product_type',
				name_producer='$name_producer',price='$price',discount='$discount',total='$total',des='$describe',des_short='$des_short' WHERE id='$id'  ");
			header("location: ../../index.php?view=product&action=list&pag=1");
		}else {
			$dt->command("UPDATE product SET investment_money='$investment_money',name_product='$name',name_product_type='$name_product_type',name_producer='$name_producer',price='$price',discount='$discount',total='$total',des='$describe',image_link='$image_link',des_short='$des_short' WHERE id='$id'");
			header("location: ../../index.php?view=product&action=list&pag=1");
		}
			
		
	}elseif (isset($_POST['add'])) {


		$dt->command("INSERT INTO product(investment_money,name_product,name_product_type,name_producer,price,discount,total,image_link,des,des_short) VALUES ('$investment_money','$name','$name_product_type','$name_producer','$price','$discount','$total','$image_link','$describe','$des_short')");
		header("location: ../../index.php?view=product&action=list&pag=1");
			
	}
	else{
		


		$dt->command("DELETE FROM product WHERE id='$id' ");
		
		header("location: ../../index.php?view=product&action=list&pag=1");
	}	
?>