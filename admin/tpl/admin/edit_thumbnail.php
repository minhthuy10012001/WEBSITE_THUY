
<?php
  include_once("config.php");
  $dt=new database();
?>
<form action="tpl/admin/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
    
      <tr>
        <td>Mật khẩu mới</td>
        <td><input type="file" name="thumbnail" required="required"></td>
     </tr>
 <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit_thumbnail" class="btn btn-primary btn-lg" >EDIT</button></td>
     </tr>
  </table>
</form>