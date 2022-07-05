
<table class="table table-striped" width="100%" border="1px">
			<tr>
				<th>STT</th>
				<th>Tên khách hàng</th>
				<th>Email</th>
				<th>Số điện thoại</th>
				<th>Địa chỉ</th>
				<th>Tiêu đề</th>
				<th>nội dung</th>
				<th>status</th>
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
			$dt->select("SELECT* FROM contact ORDER BY id desc limit $pag,10 ");
			while ($row=$dt->fetch()) {
				$stt++;
				?>
				<tr>
					<td><?php echo $stt; ?></td>
					<td><?php echo $row['name'] ?></a></td>
					<td><?php echo $row['email'] ?></td>
					<td><?php echo $row['phone'] ?></td>
					<td><?php echo $row['address'] ?></td>
					<td><?php echo $row['title'] ?></td>
					<td><?php echo $row['content'] ?></td>
					<td><?php echo $row['status'] ?></td>
					<td>
	
			
						<a href="tpl/contact/action.php?id=<?php echo $row['id'] ?>" class="navbar-link"><i style="color: red" class="fas fa-minus-circle"></i></a> || <a href="index.php?view=contact&action=edit&id=<?php echo $row['id'] ?>" class="navbar-link"><i style="color: #444" class="fas fa-pencil-alt"></i></a>
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
					echo "<li  class='page-item'><a class='page-link' href='index.php?view=contact&pag=".$prev."'>&laquo;</a></li>";
				}
				?>

				<?php
					$dt->select("SELECT* FROM contact");
					$count=$dt->num_rows();
					$total_pag=ceil($count/10);
					for ($i=1; $i <=$total_pag ; $i++) { 
							if (isset($_GET['pag']) && $_GET['pag']==$i) {
								$active='active';
							}else{
								$active='';
							}
						echo "<li class='page-item ".$active."'><a class='page-link' href='index.php?view=contact&pag=$i'> $i </a></li>";
					
					}
				?>
			<?php
				if ( isset($_GET['pag']) && $_GET['pag'] < $total_pag) {
					$next=$_GET['pag']+1;
					echo "<li  class='page-item'><a class='page-link' href='index.php?view=contact&pag=".$next."'>&raquo;</a></li>";
				}
				?>

			</ul>
		</div>
	</div>