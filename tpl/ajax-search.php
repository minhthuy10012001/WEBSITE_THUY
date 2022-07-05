<?php
	include_once('../config.php');
	$dt=new database();
	$txtsearch= $_GET['txt_search'];
	$category = $_GET['category'];
	$pag=$_GET['pag'];
	$price = $_GET['price_filter'];
	if ($pag==1 || $pag==0) {
		$pag=0;
	}
	else{
		$pag=$pag*12-12;
	}
	if ($category == 'All') {
		if ($price=="Dưới 100.000 VNĐ") {
			$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND price BETWEEN 0 AND 100000 ORDER BY id desc LIMIT $pag,12 ");
		}elseif ($price=="100.000 VNĐ ~ 1.000.000 VNĐ") {
			$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND price BETWEEN 100000 AND 1000000 ORDER BY id desc LIMIT $pag,12 ");
		}elseif ($price=="1.000.000 VNĐ~ 5.000.000 VNĐ") {
			$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND price BETWEEN 1000000 AND 5000000 ORDER BY id desc LIMIT $pag,12 ");
		}elseif ($price=="5.000.000 VNĐ~ 10.000.000 VNĐ") {
			$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND price BETWEEN 5000000 AND 10000000 ORDER BY id desc LIMIT $pag,12 ");
		}else{
			$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND price BETWEEN 10000000 AND 10000000000 ORDER BY id desc LIMIT $pag,12 ");
		}
	}else {
		if ($price=="Dưới 100.000 VNĐ") {
			$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND name_producer LIKE '%$category%' AND price BETWEEN 0 AND 100000 ORDER BY id desc LIMIT $pag,12 ");
		}elseif ($price=="100.000 VNĐ ~ 1.000.000 VNĐ") {
			$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND name_producer LIKE '%$category%' AND price BETWEEN 100000 AND 1000000 ORDER BY id desc LIMIT $pag,12 ");
		}elseif ($price=="1.000.000 VNĐ~ 5.000.000 VNĐ") {
			$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND name_producer LIKE '%$category%' AND price BETWEEN 1000000 AND 5000000 ORDER BY id desc LIMIT $pag,12 ");
		}elseif ($price=="5.000.000 VNĐ~ 10.000.000 VNĐ") {
			$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND name_producer LIKE '%$category%' AND price BETWEEN 5000000 AND 10000000 ORDER BY id desc LIMIT $pag,12 ");
		}else{
			$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND name_producer LIKE '%$category%' AND price BETWEEN 10000000 AND 10000000000 ORDER BY id desc LIMIT $pag,12 ");
		}
	}
	
	while ($row=$dt->fetch()) {
		?>
		<div class="box-product">
		<a href="index.php?view=single-product&id=<?php echo $row['id'] ?>">
			<div class="show-product">
				<img src="admin/tpl/product/uploads/<?php echo $row['image_link'] ?>" class="product-thumbnail">
				<div class="main-product">
					<p><?php echo $row['name_product']; ?></p>
					<div class="price">
						<?php if ($row['discount'] > 0) { ?>
							<p class="discount"><?php echo number_format($row['discount']); ?></p>
							<del class="price"><?php echo number_format($row['price']); ?></del>
							<?php
						}else{?>
							<p style="color: #f06560" class="price"><?php echo number_format($row['price']); ?></p>
						<?php }?>
					</div>
				</div>
			</div>
		</a>
		</div>
		<?php
	}
	?>
