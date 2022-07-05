
<?php
  include_once("config.php");
  $dt=new database();
   $dt->select("SELECT * FROM info  ");
   $row2=$dt->fetch();
?>
<form action="tpl/info/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
    
      <tr>
        <td>info_footer</td>
        <td><textarea style="width: 100%;"   name="info_footer" id="info_footer"><?php echo $row2['info_footer'] ?></textarea></td>
     </tr>

       <tr>
        <td>hotline</td>
        <td><input type="text" name="hotline"  value="<?php echo $row2['hotline'] ?>"  required="required" class="form-control" ></td>
     </tr>
       <tr>
        <td>address</td>
        <td><input type="text" name="address"  value="<?php echo $row2['address'] ?>"   class="form-control" ></td>
     </tr>
       <tr>
        <td>email</td>
        <td><input type="text" name="email"  value="<?php echo $row2['email'] ?>"  required="required" class="form-control" ></td>
     </tr>

     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >EDIT</button></td>
     </tr>
  </table>
</form>
<script type="text/javascript">
    CKEDITOR.replace("info_footer",{
               filebrowserBrowseUrl : 'tpl/info/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/info/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/info/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/info/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/info/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/info/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });

</script>
