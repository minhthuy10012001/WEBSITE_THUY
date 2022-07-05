
<?php
      include_once("../../config.php");
      $dt=new database();
      if (isset($_POST['edit'])) {
      		$logo=$_FILES['logo']['name'];
      		
			$logo_tmp=$_FILES['logo']['tmp_name'];
			
			move_uploaded_file($logo_tmp,'uploads/'.$logo);
		
			if ($logo!='') {
				$dt->command("UPDATE logo SET logo='$logo' WHERE id='1'");
				header("location: ../../index.php?view=logo");
			}
			
      }
     ?>