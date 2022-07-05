	<?php
    include_once("config.php");
    $dt=new database();
    $id=isset($_GET["id"])?$_GET["id"]:"";
    $dt->select("SELECT* FROM producer WHERE producer_id='$id'");
    $row=$dt->fetch();
  ?>
<form action="tpl/producer/action.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
       <tr>
        <td>ID Nhà Sản Xuất</td>
        <td><input type="text" name="producer_id"  value="<?php echo $row['producer_id'] ?>"  required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Tên Nhà Sản Xuất</td>
        <td><input type="text" name="name" required="required" value="<?php echo $row['name_producer'] ?>"  class="form-control" ></td>
     </tr>

     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >EDIT</button></td>
     </tr>
  </table>
</form>