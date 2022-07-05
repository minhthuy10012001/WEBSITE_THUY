<div class="main-content">
	<?php
	include_once('config.php');
	$dt=new database();
	$product=isset($_GET['product'])?$_GET['product']:'';
	if ($product=="") {
		 $pag=isset($_GET['pag'])?$_GET['pag']:0;
        if ($pag==1 || $pag==0) {
            $pag=0;
        }
        else{
            $pag=$pag*16-16;
        }
				
		$name_product = "Tất cả sản phẩm";
		$link="san-pham.html";
		if (isset($_POST['filter'])) {
			$filter_text=$_POST['filter_text'];
			if ($filter_text=="Thứ tự mặc định") {
				$dt->select("SELECT * FROM product LIMIT $pag,16");
			}elseif ($filter_text=="Giá Từ thấp đến cao") {
				$dt->select("SELECT * FROM product ORDER BY price asc LIMIT $pag,16");
			}
			elseif ($filter_text=="Giá Từ cao đến thấp") {
				$dt->select("SELECT * FROM product ORDER BY price desc LIMIT $pag,16");
			}
		}else{
		$dt->select("SELECT * FROM product LIMIT $pag,16");}
	}
	if ($product == 'new') {
		$name_product = "Sản phẩm mới nhất";
				$link="san-pham-moi.html";
		if (isset($_POST['filter'])) {
			$filter_text=$_POST['filter_text'];
			if ($filter_text=="Thứ tự mặc định") {
				$dt->select("SELECT * FROM product  ORDER BY id desc LIMIT 0,16");
			}elseif ($filter_text=="Giá Từ thấp đến cao") {
				$dt->select("SELECT * FROM product ORDER BY price asc LIMIT 0,16");
			}
			elseif ($filter_text=="Giá Từ cao đến thấp") {
				$dt->select("SELECT * FROM product ORDER BY price desc LIMIT 0,16");
			}
		}else{
		$dt->select("SELECT * FROM product ORDER BY id desc LIMIT 0,16");}
	}
	if ($product == 'view') {
		$name_product = "Sản phẩm xem nhiều nhất";
		$link="san-pham-xem-nhieu.html";
		if (isset($_POST['filter'])) {
			$filter_text=$_POST['filter_text'];
			if ($filter_text=="Thứ tự mặc định") {
				$dt->select("SELECT * FROM product WHERE view!='' ORDER BY view desc LIMIT 0,16");
			}elseif ($filter_text=="Giá Từ thấp đến cao") {
				$dt->select("SELECT * FROM product WHERE view!='' ORDER BY price asc LIMIT 0,16");
			}
			elseif ($filter_text=="Giá Từ cao đến thấp") {
				$dt->select("SELECT * FROM product WHERE view!='' ORDER BY price desc LIMIT 0,16");
			}
		}else{
		$dt->select("SELECT * FROM  product WHERE view!='' ORDER BY view desc LIMIT 0,16");}
	}
	
?>


	<div class="page-product box-main">

			<h3><a href="danh-muc-san-pham/<?php echo $link ?>"><?php echo $name_product  ?></a>
				<form action="danh-muc-san-pham/<?php echo $link ?>" class="filter" method="post" >
				<select name="filter_text" >
					<option>Thứ tự mặc định</option>
					<option>Giá Từ thấp đến cao</option>
					<option>Giá Từ cao đến thấp</option>
				
				</select>
				<input type="submit" name="filter"  value="Lọc">
				</form>
			</h3>
		<div class="main-page-product-type">
	
			<div class="product">
				<?php
				
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
										<div class="onsale">
											<?php echo ceil((($row['price']-$row['discount'])/$row['price'])*100)."%"?>
										</div>
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
			<?php
				if ($product=="") {
					?>
					<div class="pagination">
			<?php
				$dt->select("SELECT * FROM product ");
	            $count=$dt->num_rows();
	            $pag2=ceil($count/16);
	            $pag_ac=isset($_GET['pag'])?$_GET['pag']:0;
	            for ($i=1; $i <=$pag2 ; $i++) { 
	            	if ($i==$pag_ac) {
	            		?>
	            		  <li><a class="active-pag" stt="<?php echo $i ?>" href="index.php?view=product_type&product_type=<?php echo $product_type ?>&pag=<?php echo $i ?>"><?php echo $i; ?></a></li>
	            		  <?php
	            	}else {
	               ?>
	               <li><a stt="<?php echo $i ?>" href="index.php?view=product&pag=<?php echo $i ?>"><?php echo $i; ?></a></li>
	               <?php
	           }
		        }
	         ?>
		</div>
					<?php
				}
			?>
		</div>
	</div>
</div>