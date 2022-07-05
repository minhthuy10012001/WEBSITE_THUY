<?php
  
          include_once("config.php");
      $dt=new database();
            
             $dt->select("SELECT * FROM admin");
             $row=$dt->fetch();
?>
   <!-- main-right-->
   <div class="row" id="main-right">
   	<div class="col-md-9" >
   		
   		<form action="modules/quanlybanner/xuli.php" method="post" enctype="multipart/form-data">
   			<table class="table table-striped">
   				
   				<tr>
   					<td>Mật Khẩu</td>
   					<td><?php 
                     $password=$row['password']; 
                     $pass=str_replace($password,'*************',$password);
                     echo $pass;
                  ?> </td>
                  <td><a href="index.php?view=admin&action=editpass">Đổi mật Khẩu</a></td>
   				</tr>
              <tr>
                 <td>Tên Hiển Thị</td>
                 <td><?php echo $row['name']; ?></td>
                 <td><a href="index.php?view=admin&action=name">Sửa Tên</a></td>
              </tr>
              <tr>
                 <td>Ảnh đại diện</td>
                 <td><img style="width: 50px;height: 50px;" src="tpl/admin/uploads/<?php echo $row['thumbnail'] ?>"></td>
                 <td><a href="index.php?view=admin&action=thumbnail">Sửa ảnh</a></td>
              </tr>
               
   			</table>
   		</div>
   	</form>
   </div>
         <!-- end main-right-->