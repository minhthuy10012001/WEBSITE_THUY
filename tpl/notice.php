<div class="main-content">
	<?php
		$notice=$_GET['notice'];
		if ($notice == 'register') {
			?>
			<h3 class="notice">Đăng ký thành công</h3>
			<a href="" class="button-login notice-login">Đăng nhập</a>
			<?php
		}elseif ($notice == 'order') {
			?>
			<h3 class="notice">Đặt hàng thành công</h3>
			<?php session_destroy(); ?>
			<?php
		}
	?>
</div>