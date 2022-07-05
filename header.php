<?php
	include_once("config.php");
	$dt=new database();

	$dt->select("SELECT * FROM info");
	$row4=$dt->fetch();
		
?>
<div class="header">
		<div class="top-header">
			<div class="container">
				<?php $dt->select("SELECT * FROM logo WHERE id='1'");
					$row3=$dt->fetch();
				 ?>
				 <div class="top-header-left">
					<a href="index.php"><img class="logo" src="admin/tpl/logo/uploads/<?php echo $row3['logo'] ?>"></a>
				</div>
				
				<div class="top-header-right">
				<?php
					
					session_start();
					if (isset($_SESSION["login"])) {
						?>
						<button class="ss-login"><p>xin chào, <?php $username=$_SESSION['login'];
						
							$dt->select("SELECT * FROM user WHERE email='$username'");
							$row2=$dt->fetch();
							echo $row2['name'];
						 ?></p>
						 	<ul>
						 		<li><a href="logout.php">Đăng Xuất</a></li>
						 	</ul>
						 </button>
						<?php
					}elseif (!empty($_SESSION['current_user'])) {
			            $currentUser = $_SESSION['current_user'];
			            ?>
			           
			               <button class="ss-login"><p> Xin chào <?= $currentUser['name'] ?></p>
			              <ul>
						 		<li><a href="logout.php">Đăng Xuất</a></li>
						 	</ul>
			            </button>
						<?php
					}else {
				?>
				
				<a class="button-login" href=""><i class="fa fa-user"></i></a>
				
			<?php } ?>
			
			<a href="tel:<?php echo $row4['hotline']; ?>"><i class="fa fa-phone"></i><?php echo $row4['hotline']; ?></a>
				<a href="index.php?view=cart"><i class="fa fa-shopping-basket"></i>Giỏ hàng(<?php
					$i=0;
						foreach ($_SESSION as $key => $value) {
							if (substr($key,0,5)=='cart_' && $value != 0){
								$i++;
							}
						}
						echo $i;
					?>)</a>
				</div>
			</div>
			</div>
		</div>
	</div><!--end-header !-->