<?php
	include_once('config.php');
	$dt=new database();
?>
<div class="sidebar add_sticky_sidebar" id="sidebar">
			<!-- danh muc san pham -->
			<div class="widget">
				<h3><i class="fas fa-list-ul"></i>DANH MỤC</h3>
				<ul>
					<?php
						$dt->select("SELECT * FROM product_type");
						while ($row=$dt->fetch()) {
							$name_product_type =$row['name_product_type'];
						?>
						<li><a href="1/<?php echo $row['id'] ?>-<?php echo makeUrl($name_product_type ) ?>.html"><?php echo $row['name_product_type'] ?></a></li>
						<?php
						}
					?>
				</ul>
			</div>
			<div class="widget widget-support">
				<h3><i class="fas fa-list-ul"></i>HỖ TRỢ TRỰC TUYẾN</h3>
				<ul>
					<li>Hotline phòng kinh doanh</li>
					<li><i class="fa fa-phone"></i>
						<?php $dt->select("SELECT * FROM info ");
								$row2=$dt->fetch();
								echo $row2['hotline'];
						 ?>
					</li>
					<li>Liên hệ</li>
					<li><a href="https://zalo.me/<?php echo $row2['hotline'] ?>"><img src="image/zalo.png"></a> <?php echo $row2['hotline'] ?></li>
					<li><a href="tel:<?php echo $row2['hotline'] ?>"><img src="image/call.png"></a><?php echo $row2['hotline'] ?></li>
				</ul>
			</div>
			<!-- San pham moi -->
			<div class="widget widget-product">
				<h3><i class="fas fa-list-ul"></i>Sản phẩm Mới</h3>
					<ul>
					<?php
						$dt->select("SELECT * FROM product ORDER BY id desc limit 0,7");
						while ($row=$dt->fetch()) {
							?>
							<li><a href="san-pham/<?php echo makeUrl($row['name_product']) ?>-<?php echo $row['id'] ?>.html">
								<img class="product-thumbnail-small" src="admin/tpl/product/uploads/<?php echo $row['image_link'] ?>">
								<div class="main-widget-product">
									<p ><?php echo $row['name_product'] ?></p>
									<?php if ($row['discount'] > 0) {
										?>
										<p class="discount"><?php echo number_format($row['discount']); ?> VNĐ</p>
										<del class="price"><?php echo number_format($row['price']); ?> VNĐ</del>
										<?php
									}else{?>
										<p class="price"><?php echo number_format($row['price']); ?> VNĐ</p>
									<?php }?>
									
								</div>
							</a></li>
				
							<?php
						}
					?>
					</ul>
				
			</div>
			<!-- san pham ban chay -->
			<div class="widget widget-product" id="widget-3">
				<h3><i class="fas fa-list-ul"></i>Sản phẩm bán chạy</h3>
				<ul>
					<?php
						$dt->select("SELECT * FROM product WHERE sell != '' ORDER BY sell desc limit 0,7");
						while ($row=$dt->fetch()) {
							?>
							<li><a href="san-pham/<?php echo makeUrl($row['name_product']) ?>-<?php echo $row['id'] ?>.html">
								<img class="product-thumbnail-small" src="admin/tpl/product/uploads/<?php echo $row['image_link'] ?>">
								<div class="main-widget-product">
									<p><?php echo $row['name_product'] ?></p>
									<?php if ($row['discount'] > 0) {
										?>
										<p class="discount"><?php echo number_format($row['discount']); ?> VNĐ</p>
										<del class="price"><?php echo number_format($row['price']); ?> VNĐ</del>
										<?php
									}else{?>
										<p class="price"><?php echo number_format($row['price']); ?></p>
									<?php }?>
									
								</div>
							</a></li>
		
							<?php
						}
					?>
								</ul>
			</div>
			
		</div>