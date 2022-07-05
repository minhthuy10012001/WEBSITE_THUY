<?php
	include_once('config.php');
	$dt=new database();
	$txtsearch= $_GET['txt-search'];
	$category = $_GET['category'];
	$price = $_GET['price'];
?>
<input type="hidden" name="category"  id="category" value="<?php echo $category ?>">
<input type="hidden" name="txtsearch" id="txtsearch" value="<?php echo $txtsearch ?>">
<input type="hidden" name="price_filter" id="price_filter" value="<?php echo $price ?>">

<div class="main-content">
	<div class="page-search">
		<div class="title">
			<h3>Kết quả tìm kiếm "<?php echo $txtsearch.' - '.$category.' - '.$price?> "</h3>
		</div>
		<div class="main-page-search box-main">
	
			<div class="product">
				<?php
				 $pag=isset($_GET['pag'])?$_GET['pag']:0;
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
					<a href="san-pham/<?php echo makeUrl($row['name_product']) ?>-<?php echo $row['id'] ?>.html">
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
			</div>
		</div>
		<div class="pagination">
			<?php
				if ($category == 'All') {
					if ($price=="Dưới 100.000 VNĐ") {
						$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND price BETWEEN 0 AND 100000");
					}elseif ($price=="100.000 VNĐ ~ 1.000.000 VNĐ") {
						$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND price BETWEEN 100000 AND 1000000 ");
					}elseif ($price=="1.000.000 VNĐ~ 5.000.000 VNĐ") {
						$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND price BETWEEN 1000000 AND 5000000");
					}elseif ($price=="5.000.000 VNĐ~ 10.000.000 VNĐ") {
						$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND price BETWEEN 5000000 AND 10000000");
					}else{
						$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND price BETWEEN 10000000 AND 10000000000");
					}
				}else {
					if ($price=="Dưới 100.000 VNĐ") {
						$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND name_producer LIKE '%$category%' AND price BETWEEN 0 AND 100000 ");
					}elseif ($price=="100.000 VNĐ ~ 1.000.000 VNĐ") {
						$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND name_producer LIKE '%$category%' AND price BETWEEN 100000 AND 1000000 ");
					}elseif ($price=="1.000.000 VNĐ~ 5.000.000 VNĐ") {
						$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND name_producer LIKE '%$category%' AND price BETWEEN 1000000 AND 5000000 ");
					}elseif ($price=="5.000.000 VNĐ~ 10.000.000 VNĐ") {
						$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND name_producer LIKE '%$category%' AND price BETWEEN 5000000 AND 10000000 ");
					}else{
						$dt->select("SELECT * FROM product WHERE name_product LIKE '%$txtsearch%' AND name_producer LIKE '%$category%' AND price BETWEEN 10000000 AND 10000000000");
					}
				}
	            $count=$dt->num_rows();
	            $pag2=ceil($count/12);

	            for ($i=1; $i <=$pag2 ; $i++) { 
	               ?>
	               <li><a stt="<?php echo $i ?>" href="index.php?search&txt-search=<?php echo $txtsearch ?>&category=<?php echo $category ?>&pag=<?php echo $i ?>&price=<?php echo $price ?>"><?php echo $i; ?></a></li>
	               <?php
		        }
	         ?>
		</div>
	</div>
</div>