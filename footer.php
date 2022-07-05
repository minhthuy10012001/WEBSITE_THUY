<?php
	include_once("config.php");
	$dt=new database();
	
?>
<div class="footer">
		<div class="footer-top">
			<div class="container">
				<div class="social-footer">
					<?php
						$dt->select("SELECT * FROM social WHERE id='1'");
						$row2=$dt->fetch();
					?>
					<a href="<?php echo $row2['facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
					<a href="<?php echo $row2['instagram'] ?>"><i class="fab fa-instagram"></i></a>
					<a href="<?php echo $row2['youtube'] ?>"><i class="fab fa-youtube"></i></a>
					<a href="<?php echo $row2['skype'] ?>"><i class="fab fa-skype"></i></a>
				</div>
			</div>
		</div>
		<div class="main-footer">
			<div class="container">
				<div class="box-footer-left">
					<h3>Giới thiệu</h3>
					<?php

						$dt->select("SELECT * FROM info");
						$row=$dt->fetch();
					?>
					<p><?php echo $row['info_footer'] ?></p>
				</div>
				<div class="box-footer-right">
					<h3>Liên Hệ</h3>
					<ul>
	                    <li>
	                        <p><i class="fa fa-home"></i> <?php echo $row['address'] ?></p>
	                        <p><i class="sp-ic fa fa-mobile" ></i> <?php echo $row['hotline'] ?></p>
	                        <p><i class="sp-ic fa fa-envelope"></i><?php echo $row['email'] ?></p>
	                    </li>
	                </ul>
				</div>
				<div class="box-footer-right">
				
					<?php
						$dt->select('SELECT * FROM social');
						$row2=$dt->fetch();
						echo $row2['fanpage_2'];
					?>
				
			</div>
			</div>
			
		</div>
		<div class="coppyright">
			Bản Quyền Thuộc Về <a href="<?php echo $row2['facebook'] ?>">Hà Văn Thông</a>
		</div>
	</div> <!-- end footer -->
	<div class="over-category">
	<div class="list-category">
		<div class="btn-bar">
			<i class="fas fa-list-ul show"></i>
			<i class="fas fa-times close"></i>
		</div>
		<h3>DANH MỤC</h3>
		<ul>
			<?php
				$dt->select("SELECT * FROM product_type");
				while ($row=$dt->fetch()) {

				?>
				<li><a href="index.php?view=product_type&id=<?php echo $row['id'] ?>&product_type=<?php echo $row['name_product_type'] ?>"><?php echo $row['name_product_type'] ?></a></li>
				<?php
				}
			?>
		</ul>
	</div>
	</div>
<?php
	$dt->select("SELECT * FROM info");
	$row3 =$dt->fetch();
?>
<div class="phonering-alo">
	

	<div>
		<a href="https://zalo.me/<?php echo $row3['hotline'] ?>"><img src="image/zalo.png"></a><span>Tư vấn: <?php echo $row3['hotline'] ?></span>
	</div>
	<div>
		<a href="tel:<?php echo $row3['hotline'] ?>"><img src="image/call.png"></a><span>Tư vấn: <?php echo $row3['hotline'] ?> </span>
	</div>
</div>

<div id="fb-root"></div>
<script>
	(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<div class="float-fb-msg">
<div class="box-title"><span class="hidden-xs">Gửi tin nhắn cho chúng tôi</span> <i class="fa fa-envelope" aria-hidden="true"></i></div>
	<div class="box-main ">
		<div class="fb-page" data-href="<?php echo $row2['fanpage'] ?>" data-small-header="false"
			data-adapt-container-width="true" data-width="270"  data-height="350" data-tabs="messages" >
	<div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $row2['fanpage'] ?>">
	</blockquote></div></div>
	</div>
</div>
<script type="text/javascript">
	jQuery(function ($){
		$(document).ready(function(){
			if ( typeof(localStorage.fb_msg_show) == 'undefined') { localStorage.fb_msg_show = 'hide' ;}		
			
			if  ( localStorage.fb_msg_show  == 'show') { $('.float-fb-msg .box-main').show() ;  }
			$('.float-fb-msg .box-title').click(function (){
				$('.float-fb-msg .box-main').slideToggle();
				if ( localStorage.fb_msg_show  == 'show' ) {
					localStorage.fb_msg_show  = 'hide';
				} else {
					localStorage.fb_msg_show  = 'show';
				}
			});				
		});
	});
</script>