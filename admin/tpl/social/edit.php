
<?php
  include_once("config.php");
  $dt=new database();
   $dt->select("SELECT * FROM social  ");
   $row2=$dt->fetch();
?>
<form action="tpl/social/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
    
      <tr>
        <td>Link facebook</td>
        <td><input  type="text" name="facebook" value="<?php echo $row2['facebook'] ?>" required="required" class="form-control" ></td>
     </tr>

       <tr>
        <td>link instagram</td>
        <td><input type="text" name="instagram"  value="<?php echo $row2['instagram'] ?>"  required="required" class="form-control" ></td>
     </tr>
       <tr>
        <td>link youtube</td>
        <td><input type="text" name="youtube"  value="<?php echo $row2['youtube'] ?>"   class="form-control" ></td>
     </tr>
       <tr>
        <td>link skype</td>
        <td><input type="text" name="skype"  value="<?php echo $row2['skype'] ?>"  required="required" class="form-control" ></td>
     </tr>
       <tr>
        <td>link fanpage</td>
        <td><input type="text" name="fanpage"  value="<?php echo $row2['fanpage'] ?>"  required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>fanpage</td>
        <td>
        <textarea style="width: 100%" name="fanpage_2"><?php echo $row2['fanpage_2'] ?></textarea>
        </td>
     </tr>
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >EDIT</button></td>
     </tr>
  </table>
</form>
