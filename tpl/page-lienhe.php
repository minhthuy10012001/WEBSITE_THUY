<div class="main-content">
	<?php
	include_once('config.php');
	$dt=new database();
	$dt->select("SELECT * FROM lienhe WHERE id='1'");
	$row=$dt->fetch();
	$notice = "";
	if (isset($_POST['submit'])) {
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$title=$_POST['title'];
		$content=$_POST['content'];
		$dt->command("INSERT INTO contact(name,email,phone,address,title,content,status) VALUES ('$name','$email','$phone','$address','$title','$content','Đang chờ')");
		$notice = "Gửi thành công";
	}
?>

<p style="color: green"><?php echo $notice; ?></p>
	<div class="page-product box-main">

			<h3><a href="index.php?view=gioithieu">Liên hệ</a></h3>
			
		<div class="main-page-product-type">
			<?php
				echo  $row['content'] ;
			?>
			<form action="" method="post" class="contact">
				<label>Họ và Tên</label>
				<input type="text" name="name" placeholder="Nguyễn Văn A" required="required" >
				<label>Số điện thoại</label>
				<input type="text" name="phone" placeholder="0123456789" required="required">
				<label>Email</label>
				<input type="text" name="email" placeholder="support@gmail.com" required="required">
				<label>Địa chỉ</label>
				<input type="text" name="address" placeholder="Thanh Liêm Hà nam" required="required">
				<label>Tiêu đề</label>
				<input type="text" name="title" placeholder="Phản hồi về ... " required="required">
				<label>Nội dung</label>
				<textarea name="content" placeholder="Hàng real"></textarea>
				<input type="submit" name="submit" value="Liên hệ">
				
			</form>
		</div>
	</div>
</div>