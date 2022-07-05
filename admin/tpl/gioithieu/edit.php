
<?php
  include_once("config.php");
  $dt=new database();
   $dt->select("SELECT * FROM gioithieu  ");
   $row2=$dt->fetch();
?>
<form action="tpl/gioithieu/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
    
      <tr>
        <td>Nội Dung</td>
        <td><textarea style="width: 100%;"   name="content" id="content"><?php echo $row2['content'] ?></textarea></td>
     </tr>
 <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >EDIT</button></td>
     </tr>
  </table>
</form>
<script type="text/javascript">
    CKEDITOR.replace("content",{
               filebrowserBrowseUrl : 'tpl/gioithieu/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/gioithieu/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/gioithieu/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/gioithieu/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/gioithieu/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/gioithieu/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });

</script>
