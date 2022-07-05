	
<form action="tpl/producer/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
       <tr>
        <td>ID Nhà Sản Xuất</td>
        <td><input type="text" name="producer_id"  value=""  required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Tên Nhà Sản Xuất</td>
        <td><input type="text" name="name" required="required" value=""  class="form-control" ></td>
     </tr>

     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="add" class="btn btn-primary btn-lg" >ADD</button></td>
     </tr>
  </table>
</form>