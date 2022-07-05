<style type="text/css">
  #cke_1_contents {
    height: 1000px !important;
  }
</style>
<?php
  include_once("config.php");
  $dt=new database();
  $id=isset($_GET["id"])?$_GET["id"]:"";
   $dt->select("SELECT * FROM product WHERE id='$id' ");
   $row2=$dt->fetch();
?>
<form action="tpl/product/action.php?id=<?php echo $row2['id'] ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
     
      <tr>
        <td>Tên Sản Phẩm</td>
        <td><input type="text" name="name" required="required" value="<?php echo $row2['name_product'] ?>"  class="form-control" ></td>
     </tr>
     <tr>
        <td>Loại Sản Phẩm</td>
        <td><select style="width: 100%;padding: 10px;" name="name_product_type">
          <?php
            $dt->select('SELECT * FROM product_type');
            while ($row=$dt->fetch()) {
              ?>
              <option><?php echo $row['name_product_type'] ?></option>
              <?php
            }
          ?>
       </select></td>
     </tr>
      <tr>
        <td>Nhà Sản Xuất</td>
        <td><select style="width: 100%;padding: 10px;" name="name_producer">
          <?php
            $dt->select('SELECT * FROM producer');
            while ($row=$dt->fetch()) {
              ?>
              <option><?php echo $row['name_producer'] ?></option>
              <?php
            }
          ?>
       </select></td>
     </tr>
     <tr>
        <td>Tiền vốn</td>
        <td><input type="text" name="investment_money"  value="<?php echo $row2['investment_money'] ?>"  required="required" class="form-control" ></td>
     </tr>
       <tr>
        <td>Giá</td>
        <td><input type="text" name="price"  value="<?php echo $row2['price'] ?>"  required="required" class="form-control" ></td>
     </tr>
       <tr>
        <td>Khuyến Mãi</td>
        <td><input type="text" name="discount"  value="<?php echo $row2['discount'] ?>"   class="form-control" ></td>
     </tr>
       <tr>
        <td>Số Lượng</td>
        <td><input type="text" name="total"  value="<?php echo $row2['total'] ?>"  required="required" class="form-control" ></td>
     </tr>
       <tr>
        <td>Hình Ảnh</td>
        <td><input type="file" name="image_link"  class="form-control" ></td>
     </tr>
       <tr>
        <td>Mô tả</td>
        <td><textarea style="width: 100%;"   name="describe" id="describe"><?php echo $row2['des'] ?></textarea></td>
     </tr>
      <tr>
        <td>Mô tả ngắn</td>
        <td><textarea style="width: 100%;"   name="des_short" id="des_short"><?php echo $row2['des_short'] ?></textarea></td>
     </tr>
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >EDIT</button></td>
     </tr>
  </table>
</form>
<script type="text/javascript">
    CKEDITOR.replace("describe",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
     CKEDITOR.replace("des_short",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
</script>
