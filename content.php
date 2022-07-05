
<div class="content container">
		
		<?php
			
			$view=isset($_GET['view'])?$_GET['view']:"";
			if ($view=='notice') {
				include_once('sidebar.php');
				include_once('tpl/notice.php');
			}elseif (isset($_GET['search'])) {
				include_once('sidebar.php');
				include_once('tpl/search.php');
			}elseif ($view=='product_type') {
				include_once('sidebar.php');
				include_once('tpl/product_type.php');
			}elseif ($view=='product') {
				include_once('sidebar.php');
				include_once('tpl/product.php');
			}elseif ($view=='single-product') {
				include_once('sidebar.php');
				include_once('tpl/single-product.php');
			}elseif ($view=='single-product') {
				include_once('sidebar.php');
				include_once('tpl/single-product.php');
			}elseif ($view=='cart') {
				include_once('sidebar.php');
				include_once('tpl/cart.php');
			}elseif ($view=='gioithieu') {
				include_once('sidebar.php');
				include_once('tpl/page-gioithieu.php');
			}elseif ($view=='lienhe') {
				include_once('sidebar.php');
				include_once('tpl/page-lienhe.php');
			}else {
				include_once('tpl/content-home.php');
			}
		?>
	</div> <!-- end content -->