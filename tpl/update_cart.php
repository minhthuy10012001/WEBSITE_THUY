
<?php
session_start();
	//them san pham
	if (isset($_GET["sale"])) {
		$id=isset($_GET["sale"])?$_GET["sale"]:"";
		$_SESSION["cart_".$id]+=1;
		header('location:../index.php?view=cart');
	}
	if (isset($_GET['remove'])) {
		$id=isset($_GET["id"])?$_GET["id"]:"";
		unset($_SESSION["cart_".$id]);
		header('location:../index.php?view=cart');
	}
	if (isset($_GET['update'])) {
		$i=0;
			foreach ($_SESSION as $key => $value) {
				
				if (substr($key,0,5)=='cart_') {
					$i++;
					$_SESSION[''.$key]=$_POST['total_'.$i];
					header('location:../gio-hang.html');
				}
			}
	}
	header('location:../gio-hang.html');