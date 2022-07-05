<?php
	$view=isset($_GET['view'])?$_GET['view']:"home";
	$id=isset($_GET['id'])?$_GET['id']:"";
	$product=isset($_GET['product'])?$_GET['product']:"";
	if (isset($_GET['search'])) {
		$view='search';
	}
?>
<div class="menu">
		<div class="container">
			<i class="fas fa-list"></i>
			<ul class="navigation">
				<li <?php if ($view=='home') {
					echo 'class="active"';
				} ?> ><a href="index.html">Trang Chủ</a></li>
				<li class="sub-menu  <?php if ($view=='product') {
					echo 'active';
				} ?>"><a href="san-pham.html">sản phẩm</a>
					<ul>
						<?php
						$dt->select("SELECT * FROM product_type LIMIT 0,7");
						while ($row=$dt->fetch()) {
							$name_product_type =$row['name_product_type'];
						?>
						<li><a href="1/<?php echo $row['id'] ?>-<?php echo makeUrl($name_product_type ) ?>.html"><?php echo $row['name_product_type'] ?></a></li>
						<?php
						}?>
					</ul>
				</li>
				<li  <?php if ($view=='gioithieu') {
					echo 'class="active"';
				} ?>><a href="gioi-thieu.html">Giới Thiệu</a></li>
				<li  <?php if ($view=='lienhe') {
					echo 'class="active"';
				} ?>><a href="lien-he.html">Liên Hệ</a></li>
			</ul>
			<ul class="mobile-menu"> 
				<li  <?php if ($view=='home') {
					echo 'class="active"';
				} ?>><a href="index.html">Trang Chủ</a></li>
				<li  class="sub-menu  <?php if ($view=='product') {
					echo 'active';
				} ?>"><a href="san-pham.html">sản phẩm</a><i class="fas fa-chevron-down show-submenu"></i>
					<ul>
						<?php
						$dt->select("SELECT * FROM product_type LIMIT 0,7");
						while ($row=$dt->fetch()) {
							$name_product_type =$row['name_product_type'];
						?>
						<li><a href="1/<?php echo $row['id'] ?>-<?php echo makeUrl($name_product_type ) ?>.html"><?php echo $row['name_product_type'] ?></a></li>
						<?php
						}?>
					</ul>
				</li>
				<li  <?php if ($view=='gioithieu') {
					echo 'class="active"';
				} ?>><a href="gioi-thieu.html">Giới Thiệu</a></li>
				<li  <?php if ($view=='lienhe') {
					echo 'class="active"';
				} ?>><a href="lien-he.html">Liên Hệ</a></li>
			</ul>
			<div class="form-search">
				<form action="index.html">
					<select name="price" id="">
						<option>Dưới 1.000.000 VNĐ</option>
						<option>10.000.000 VNĐ ~ 30.000.000 VNĐ</option>
						<option>5.000.000 VNĐ~ 10.000.000 VNĐ</option>
						<option>15.000.000 VNĐ</option>
						<option>Trên 30.000.000 VNĐ</option>
					</select>
					<select name="category" id="">
						<option>All</option>
						<?php 
							
							$dt->select("SELECT * FROM producer");
							while ($row=$dt->fetch()) {
								?>
								<option><?php echo $row['name_producer'] ?></option>

								<?php
							}
						 ?>
					</select>
					<input type="text" name="txt-search"  required="required" placeholder="Nhập từ khóa..." name="src">
					<button type="submit" name="search"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
	</div><!-- end menu -->
	<div class="brc" id="<?php echo $view ?>">
		
		<div class="container">
			Trang chủ / <a href="index.php?view=<?php echo $view ?>&id=<?php echo $id ?>"><?php 
			if ($view=="product") {
		$view="Loại Sản phẩm";
	}elseif ($view=="gioithieu") {
		$view="Giới Thiệu";
	}elseif ($view=="lienhe") {
		$view="Liên hệ";
	}elseif ($view=="product_type") {
		$view="Danh mục sản phẩm";
	}elseif ($view=="cart") {
		$view="Giỏ hàng";
	}elseif ($view=="single-product") {
		$view="Sản phẩm";
	}; echo  $view; ?></a>
		</div>
	</div>
	<!-- slide -->
	<div class="slide" id="<?php echo $view ?>">
		<div class="container">
		<?php
		$dt->select("SELECT * FROM slide");
		while ($row3=$dt->fetch()) {
			?>
			<div class="item">
				<img src="admin/tpl/slide/uploads/<?php echo $row3['name_image']  ?>" class="slide-img">
			</div>
			<?php
		}
		?>
	</div>
	</div>
