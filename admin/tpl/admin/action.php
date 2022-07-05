<?php
	       include_once("../../config.php");
  $dt=new database();
             if (isset($_POST['edit'])) {
                $pass=$_POST['pass'];
                $dt->command("UPDATE admin SET password='$pass' ");
                header("location:../../index.php?view=admin&action=list");
             }
             if (isset($_POST['editname'])) {
             		$name=$_POST['name'];
                
             		 $dt->command("UPDATE admin SET name='$name' ");
             		 header("location:../../index.php?view=admin&action=list");
             }
             if (isset($_POST['edit_thumbnail'])) {
             		$thumbnail=$_FILES['thumbnail']['name'];
					$thumbnail_tmp=$_FILES['thumbnail']['tmp_name'];
					move_uploaded_file($thumbnail_tmp,'uploads/'.$thumbnail);
             		 $dt->command("UPDATE admin SET thumbnail='$thumbnail' ");
             		 header("location:../../index.php?view=admin&action=list");
             }
?>