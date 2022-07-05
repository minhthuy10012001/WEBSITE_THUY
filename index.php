<?php

	function makeUrl($string) {
		$string = trim($string);
		$string=str_replace(" ", "-", $string);
		$string=str_replace("+", "plus", $string);
		$string=str_replace("/", "", $string);
		$string=preg_replace("/(đ|Đ)/", "d", $string);
		$string=str_replace("S", "s", $string);
		$string=preg_replace('/(á|à|ã|ạ|ả|ă|ằ|ắ|ẵ|ẳ|ặ|â|ầ|ấ|ẩ|ậ|ẫ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ẳ|Ặ|Ẵ|Â|Ầ|Ấ|Ẫ|Ẩ|Ậ|Ằ)/', 'a', $string);
		$string=preg_replace("/(é|ẽ|ẻ|ẹ|ê|ế|ễ|ể|ệ|É|È|Ẽ|Ẻ|Ẹ|Ê|Ế|Ễ|Ể|Ệ|è|Ề|ề)/", "e", $string);
		$string=preg_replace("/(í|ỉ|ị|ĩ|j|Í|Ỉ|Ĩ|Ị|ì|Ì)/", "i", $string);
		$string=preg_replace("/(ó|ọ|õ|ỏ|ô|ố|ộ|ổ|ỗ|ơ|ỡ|ở|ợ|ớ|Ó|Ọ|Õ|Ỏ|Ô|Ố|Ổ|Ỗ|Ộ|Ơ|Ợ|Ở|Ớ|Ở|ò|Ò|ồ|Ồ|ờ|Ờ)/", "o", $string);
		$string=preg_replace("/(ú|ủ|ụ|ũ|ư|ứ|ử|ự|ữ|Ú|Ủ|Ụ|Ũ|Ư|Ự|Ử|Ứ|Ữ|ù|Ù|ừ|Ừ)/", "u", $string);
		$string=preg_replace("/(ý|ỵ|ỹ|ỷ|Ý|Ỵ|Ỹ|Ỷ|ỳ|Ỳ)/", "y", $string);
		$string = strtolower($string);
		return $string;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<base href="http://localhost/thuctapnghenghiep/">
	<title>WEB MÁY TÍNH - ĐINH KHÁNH LINH</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/slick.min.js"></script>
	<script type="text/javascript" src="js/theia-sticky-sidebar.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</head>
<body>
	<?php
		include_once('facebook_source.php');
		include_once('header.php');
		include_once('menu.php');
		include_once('content.php');
		include_once('footer.php');
		
	?>
	<div class="login">
		<div class="close-login">
			<button id="close"><i class="fas fa-times"></i></button>
		</div>
		<div class="login-title">
			<h3>Đăng Nhập</h3>
			<a href="" class="button-register">Đăng Kí</a>
		</div>
		<div class="login-main">
			<form action="" method="post">
				<input type="text" required="required" id="login-username" name="username" placeholder="Tên đăng nhập" value>
				<p id="er_username"></p>
				<input type="password" minlength="8" id="login-password"  name="password" value placeholder="mật khẩu">
				<p id="er_password"></p>
				<input type="submit" value="Đăng Nhập" id="login">
			</form>
		</div>
		 <div id="login-with-social">
            <a href="<?= $loginUrl ?>"><img  src="./image/fb.png" alt='facebook login' title="Facebook Login" height="50" width="280" /></a>
        </div>
	</div>
	
	<a href="#" class="hidden scroll-to-top"><i class="fa fa-angle-up"></i></a>
	<div class="register">
		<div class="close-register">
			<button id="close"><i class="fas fa-times"></i></button>
		</div>
		<div class="register-title">
			<h3>Đăng Ký</h3>
			<a href="" class="button-login">Đăng Nhập</a>
		</div>
		<div class="register-main">
			<form action="" method="post">
				<input type="text"  id="fullname" name="fullname" placeholder="họ và tên" value>
				<p id="er_fullname"></p>
				<input type="text" name="username" id="username" placeholder="Tên đăng nhập" value>
				<p id="er_username"></p>
				<input type="password" minlength="8" id="password"  name="password" value placeholder="mật khẩu">
				<p id="er_password"></p>
				<input type="password" minlength="8" id="confirm_pw"  name="confirm_pw" value placeholder="nhập lại mật khẩu">
				<p id="er_confirm_pw"></p>
				<input type="text"  id="phone" name="phone" placeholder="Số Điện thoại" value>
				<p id="er_phone"></p>
				<input type="submit" value="Đăng Ký" name="register" id="register">
			</form>
		</div>

	</div>

</body>
</html>