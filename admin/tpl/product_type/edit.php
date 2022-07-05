	<?php
    include_once("config.php");
    $dt=new database();
    $id=isset($_GET["id"])?$_GET["id"]:"";
    $dt->select("SELECT* FROM product_type WHERE type_id='$id'");
    $row=$dt->fetch();
  ?>
<form action="tpl/product_type/action.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
       <tr>
        <td>ID Loại Sản Phẩm</td>
        <td><input type="text" name="type_id"  value="<?php echo $row['type_id'] ?>"  required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Tên Loại Sản Phẩm</td>
        <td><input type="text" name="name" required="required" value="<?php echo $row['name_product_type'] ?>"  class="form-control" ></td>
     </tr>

     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >EDIT</button></td>
     </tr>
  </table>
</form>