<?php
include_once('config.php');
$dt=new database();
?>

<div class="main-content content-home">
	<?php
		$dt->select("SELECT * FROM product  ORDER BY id desc LIMIT 0,8");
	?>
	<div class="box-main new">
		<h3><a href="#">Sản phẩm mới nhất</a></h3>
	<div class="product">
				<?php
				
				while ($row4=$dt->fetch()) {
					?>
					<div class="box-product">
					<a href="san-pham/<?php echo makeUrl($row4['name_product']) ?>-<?php echo $row4['id'] ?>.html">
						<div class="show-product">
							<img src="admin/tpl/product/uploads/<?php echo $row4['image_link'] ?>" class="product-thumbnail">
							<div class="main-product">
								<p><?php echo $row4['name_product']; ?></p>
								<div class="price">
									<?php if ($row4['discount'] > 0) { ?>
										<p class="discount"><?php echo number_format($row4['discount']); ?></p>
										<del class="price"><?php echo number_format($row4['price']); ?></del>
										<div class="onsale">
											<?php echo ceil((($row4['price']-$row4['discount'])/$row4['price'])*100)."%"?>
										</div>
										<?php
									}else{?>
										<p style="color: #f06560" class="price"><?php echo number_format($row4['price']); ?></p>
									<?php }?>
								</div>
							</div>
						</div>
					</a>
					</div>
					<?php
				}
				?>
			</div>
		
	</div>
	<?php
		$dt->select("SELECT * FROM product WHERE sell !=0 LIMIT 0,8");
	?>
	<div class="box-main sale">
		<h3><a href="#">Sản phẩm bán chạy</a></h3>
	<div class="product">
				<?php
				
				while ($row5=$dt->fetch()) {
					?>
					<div class="box-product">
					<a href="san-pham/<?php echo makeUrl($row5['name_product']) ?>-<?php echo $row5['id'] ?>.html">
						<div class="show-product">
							<img src="admin/tpl/product/uploads/<?php echo $row5['image_link'] ?>" class="product-thumbnail">
							<div class="main-product">
								<p><?php echo $row5['name_product']; ?></p>
								<div class="price">
									<?php if ($row5['discount'] > 0) { ?>
										<p class="discount"><?php echo number_format($row5['discount']); ?></p>
										<del class="price"><?php echo number_format($row5['price']); ?></del>
										<div class="onsale">
											<?php echo ceil((($row5['price']-$row5['discount'])/$row5['price'])*100)."%"?>
										</div>
										<?php
									}else{?>
										<p style="color: #f06560" class="price"><?php echo number_format($row5['price']); ?></p>
									<?php }?>
								</div>
							</div>
						</div>
					</a>
					</div>
					<?php
				}
				?>
			</div>
		
	</div>
	<?php
		$dt->select("SELECT * FROM product WHERE view!='' ORDER BY view desc LIMIT 0,8");
	?>
	<div class="box-main view">
		<h3><a href="#">Sản phẩm xem nhiều</a></h3>
	<div class="product">
				<?php
				
				while ($row6=$dt->fetch()) {
					?>
					<div class="box-product">
					<a href="san-pham/<?php echo makeUrl($row6['name_product']) ?>-<?php echo $row6['id'] ?>.html">
						<div class="show-product">
							<img src="admin/tpl/product/uploads/<?php echo $row6['image_link'] ?>" class="product-thumbnail">
							<div class="main-product">
								<p><?php echo $row6['name_product']; ?></p>
								<div class="price">
									<?php if ($row6['discount'] > 0) { ?>
										<p class="discount"><?php echo number_format($row6['discount']); ?></p>
										<del class="price"><?php echo number_format($row6['price']); ?></del>
										<div class="onsale">
											<?php echo ceil((($row6['price']-$row6['discount'])/$row6['price'])*100)."%"?>
										</div>
										<?php
									}else{?>
										<p style="color: #f06560" class="price"><?php echo number_format($row6['price']); ?></p>
									<?php }?>
								</div>
							</div>
						</div>
					</a>
					</div>
					<?php
				}
				?>
			</div>
		
	</div>
	<!-- main content home-->
	<?php
	$dt->select("SELECT * FROM product_type");
	$data= array();
	while ($row2=$dt->fetch()) {
		$data[]=$row2;
	}
	foreach ($data as $key => $value) {
		$name_product_type= $value['name_product_type'];
		$id= $value['id'];
		$dt->select("SELECT * FROM product WHERE name_product_type='$name_product_type' ORDER BY id desc limit 0,8");
		?><div class="box-main">
			<h3><a href="1/<?php echo $value['id'] ?>-<?php echo makeUrl($name_product_type) ?>.html"><?php echo $name_product_type ?></a> </h3>
			<div class="product">
				<?php

				while ($row3=$dt->fetch()) {
					?>
					<div class="box-product">
					<a href="san-pham/<?php echo makeUrl($row3['name_product']) ?>-<?php echo $row3['id'] ?>.html">
						<div class="show-product">
							<img src="admin/tpl/product/uploads/<?php echo $row3['image_link'] ?>" class="product-thumbnail">
							<div class="main-product">
								<p><?php echo $row3['name_product']; ?></p>
								<div class="price">
									<?php if ($row3['discount'] > 0) { ?>
										<p class="discount"><?php echo number_format($row3['discount']); ?></p>
										<del class="price"><?php echo number_format($row3['price']); ?></del>
										<div class="onsale">
											<?php echo  ceil((($row3['price']-$row3['discount'])/$row3['price'])*100)."%"?>
										</div>
										<?php
									}else{?>
										<p style="color: #f06560" class="price"><?php echo number_format($row3['price']); ?></p>
									<?php }?>
								</div>
							</div>
						</div>
					</a>
					</div>
					<?php
				}
				?>
			</div>	
		</div>

		<?php
	}

	?>
	
</div>
<div class="content-footer">
	<img src="image/deal.png">
	<img src="image/free-shipping.png">
	<img src="image/guaranteed.png">
</div>