<div class="main-content">
	<?php
	include_once('config.php');
	$dt=new database();
	$id=$_GET['id'];
	$dt->select("SELECT * FROM product_type WHERE id='$id'");
	$row2=$dt->fetch();
	$name_product_type =$row2['name_product_type'];
	$pag=isset($_GET['pag'])?$_GET['pag']:0;
    if ($pag==1 || $pag==0) {
        $pag=0;
    }
    else{
        $pag=$pag*12-12;
    }
    if (isset($_POST['filter'])) {
		$filter_text=$_POST['filter_text'];
		if ($filter_text=="Thứ tự mặc định") {
			$dt->select("SELECT * FROM product WHERE name_product_type='$name_product_type' ORDER BY id desc LIMIT $pag,12");
		}elseif ($filter_text=="Giá Từ thấp đến cao") {
			$dt->select("SELECT * FROM product WHERE name_product_type='$name_product_type'  ORDER BY price asc LIMIT $pag,12");
		}
		elseif ($filter_text=="Giá Từ cao đến thấp") {
			$dt->select("SELECT * FROM product WHERE name_product_type='$name_product_type' ORDER BY price desc LIMIT $pag,12");
		}
	}else{
	$dt->select("SELECT * FROM product WHERE name_product_type='$name_product_type' ORDER BY id desc LIMIT $pag,12");}
?>


<input type="hidden" name="name_product_type" id="name_product_type" value="<?php echo $name_product_type?>">
<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
	<div class="page-product-type box-main">

			<h3><a href="1/<?php echo $id ?>-<?php echo makeUrl($name_product_type ) ?>.html"><?php echo $row2['name_product_type'] ?></a>
			<form action="1/<?php echo $id ?>-<?php echo makeUrl($name_product_type ) ?>.html" class="filter" method="post" >
				<select name="filter_text" >
					<option>Thứ tự mặc định</option>
					<option>Giá Từ thấp đến cao</option>
					<option>Giá Từ cao đến thấp</option>
				
				</select>
				<input type="submit" name="filter"  value="Lọc">
				</form></h3>
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
											<?php echo  ceil((($row['price']-$row['discount'])/$row['price'])*100)."%"?>
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
		</div>
		<div class="pagination">
			<?php
				$dt->select("SELECT * FROM product WHERE name_product_type='$name_product_type'");
	            $count=$dt->num_rows();
	            $pag2=ceil($count/12);
	            for ($i=1; $i <=$pag2 ; $i++) { 
	            	
	               ?>
	               <li><a stt="<?php echo $i ?>" href="<?php echo $i ?>/<?php echo $id ?>-<?php echo makeUrl($name_product_type ) ?>.html"><?php echo $i; ?></a></li>
	               <?php
	          
		        }
	         ?>
		</div>
	</div>
</div>