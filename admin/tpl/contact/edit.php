
<?php
  include_once("config.php");
  $dt=new database();
  $id=isset($_GET["id"])?$_GET["id"]:"";
   $dt->select("SELECT * FROM contact WHERE id='$id' ");
   $row2=$dt->fetch();
?>
<form action="tpl/contact/action.php?id=<?php echo $row2['id'] ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
  
      <tr>
        <td>Tên khách hàng</td>
        <td><input type="text" name="name" required="required" value="<?php echo $row2['name'] ?>"  class="form-control" ></td>
     </tr>
    
       <tr>
        <td>Email</td>
        <td><input type="text" name="email"  value="<?php echo $row2['email'] ?>"  required="required" class="form-control" ></td>
     </tr>
       <tr>
        <td>Số điện thoại</td>
        <td><input type="text" name="phone"  value="<?php echo $row2['phone'] ?>"   class="form-control" ></td>
     </tr>
       <tr>
        <td>Địa chỉ</td>
        <td><input type="text" name="address"  value="<?php echo $row2['address'] ?>"   class="form-control" ></td>
     </tr>
        <tr>
        <td>Tiêu đề</td>
        <td><input type="text" name="title"  value="<?php echo $row2['title'] ?>"   class="form-control" ></td>
     </tr>
      <tr>
        <td>content</td>
        <td><input type="text" name="content"  value="<?php echo $row2['content'] ?>"   class="form-control" ></td>
     </tr>
      <tr>
        <td>status</td>
        <td><select name="status">
          <option>Chưa liên hệ</option>
          <option>Đã liên hệ</option>
      
        </select></td>
     </tr>
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >EDIT</button></td>
     </tr>
  </table>
</form>
