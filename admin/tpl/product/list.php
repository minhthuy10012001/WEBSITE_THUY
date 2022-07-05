
<table class="table table-striped" width="100%" border="1px">
			<tr>
				<th>STT</th>
				<th>Sản Phẩm</th>
				<th>Loại Sản Phẩm</th>
				<th>Nhà Sản Xuất</th>
				<th>Số Lượt Xem</th>
				<th>Đã bán</th>
				<th>Giá</th>
				<th>Khuyến Mãi</th>
				<th>Hình Ảnh</th>
				<th>Tiền vốn</th>
				<th>action</th>
			</tr>
			<?php
			include_once("config.php");
			$dt=new database();
			$pag=isset($_GET["pag"])?$_GET["pag"]:"";
						if ($pag<1 || $pag==1) {
							$pag=0;
						}else{
							$pag=$pag*10-10;
						}
			$stt=0;
			$dt->select("SELECT* FROM product ORDER BY id desc limit $pag,10 ");
			while ($row=$dt->fetch()) {
				$stt++;
				?>
				<tr>
					<td><?php echo $stt; ?></td>
					<td><a href="?view=product&action=edit&id=<?php echo $row['id'] ?>"><?php echo $row['name_product'] ?></a></td>
					<td><?php echo $row['name_product_type'] ?></td>
					<td><?php echo $row['name_producer'] ?></td>
					<td><?php echo $row['view'] ?></td>
					<td><?php echo $row['sell'] ?></td>
					<td><?php echo number_format($row['price']) ?></td>
					<td><?php echo number_format($row['discount']) ?></td>
					<td><img style="width: 100px;height: 100px;" src="tpl/product/uploads/<?php echo $row['image_link'] ?>"></td>
					<td><?php echo $row['investment_money'] ?></td>
					<td>
	
						<a href="tpl/product/action.php?id=<?php echo $row['id'] ?>" class="navbar-link"><i style="color: red" class="fas fa-minus-circle"></i></a>
					</td>
				</tr>
				<?php
			}
			?>
	
	</table>
	<div style="background: none" class="card-footer clearfix container">
		<div class="row">
			<ul class="pagination pagination-sm m-0 float-right">
				<?php
				if (isset($_GET['pag']) && $_GET['pag'] > 1) {
					$prev=$_GET['pag']-1;
					echo "<li  class='page-item'><a class='page-link' href='index.php?view=product&action=list&pag=".$prev."'>&laquo;</a></li>";
				}
				?>

				<?php
					$dt->select("SELECT* FROM product");
					$count=$dt->num_rows();
					$total_pag=ceil($count/10);
					for ($i=1; $i <=$total_pag ; $i++) { 
							if (isset($_GET['pag']) && $_GET['pag']==$i) {
								$active='active';
							}else{
								$active='';
							}
						echo "<li class='page-item ".$active."'><a class='page-link' href='index.php?view=product&action=list&pag=$i'> $i </a></li>";
					
					}
				?>
			<?php
				if ( isset($_GET['pag']) && $_GET['pag'] < $total_pag) {
					$next=$_GET['pag']+1;
					echo "<li  class='page-item'><a class='page-link' href='index.php?view=product&action=list&pag=".$next."'>&raquo;</a></li>";
				}
				?>

			</ul>
		</div>
	</div>