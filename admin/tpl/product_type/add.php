	
<form action="tpl/product_type/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
       <tr>
        <td>ID Loại Sản Phẩm</td>
        <td><input type="text" name="type_id"  value=""  required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Tên Loại Sản Phẩm</td>
        <td><input type="text" name="name" required="required" value=""  class="form-control" ></td>
     </tr>

     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="add" class="btn btn-primary btn-lg" >ADD</button></td>
     </tr>
  </table>
</form>