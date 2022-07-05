 <?php
 @ob_start();
 session_start();
 include_once('config.php');
 if (!isset($_SESSION["loginad"])) {
  exit(header("location: tpl/login.php"));
}
?>
<?php
include_once("config.php");
$dt=new database();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> SHOP MÁY TÍNH - ĐINH KHÁNH LINH | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  <style type="text/css">
    .datepicker-inline {
      display: none !important;
    }
  </style>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="tpl/product/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="tpl/product/ckfinder/ckfinder.js"></script>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
   <?php
   $dt->select("SELECT COUNT(*) as total_contact FROM contact WHERE status='Chưa liên hệ' ");
   $row3=$dt->fetch();
   $dt->select("SELECT COUNT(*) as total_shipping FROM shipping WHERE status='Đang chờ' ");
   $row2=$dt->fetch();
   $total=$row2['total_shipping'] + $row3['total_contact'];
   ?>
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">site</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="tpl/logout.php" class="nav-link">log out</a>
      </li>
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3" method="post" action="index.php?pag=1" >
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" required="required" name="search_text" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit" name="search">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-comments"></i>
         <span class="badge badge-danger navbar-badge"><?php echo $total; ?></span>
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="index.php?view=order&action=list" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">

            <div class="media-body">
              <h3 class="dropdown-item-title">
                Đơn hàng
                <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">Có <?php echo $row2['total_shipping'] ?> đơn hàng mới</p>
              
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="index.php?view=contact&action=list" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">

            <div class="media-body">
              <h3 class="dropdown-item-title">
               Liên hệ
               <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
             </h3>
             <p class="text-sm">Có <?php echo $row3['total_contact'] ?> Liên hệ mới</p>

           </div>
         </div>
         <!-- Message End -->
       </a>
     </ul>





     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
          class="fa fa-th-large"></i></a>

        </li>

        <div class="dropdown-divider"></div>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light"> SHOP MÁY TÍNH ĐINH KHÁNH LINH </span>
      </a>
      <?php
      $dt->select("SELECT* FROM admin");
      $row=$dt->fetch();
      ?>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="tpl/admin/uploads/<?php echo $row['thumbnail'] ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="index.php?view=admin&action=list" class="d-block"><?php echo $row['name'] ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
               <i class="nav-icon fa fa-th"></i>
               <p>
                Loại Sản Phẩm
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?view=product_type&action=list" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Danh Sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?view=product_type&action=add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="nav-icon fa fa-th"></i>
             <p>
               Nhà Sản Xuất
               <i class="right fa fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?view=producer&action=list" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Danh Sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?view=producer&action=add" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Thêm</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
           <i class="nav-icon fa fa-th"></i>
           <p>
             Sản Phẩm
             <i class="right fa fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="index.php?view=product&action=list&pag=1" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Danh Sách</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?view=product&action=add" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Thêm</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
         <i class="nav-icon fa fa-th"></i>
         <p>
           Slide
           <i class="right fa fa-angle-left"></i>
         </p>
       </a>
       <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="index.php?view=slide" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Sửa</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
        Logo
        <i class="right fa fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=logo" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
         USER
         <i class="right fa fa-angle-left"></i>
       </p>
     </a>
     <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=user&action=list&page=1" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Danh sách</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
         Đơn hàng
         <i class="right fa fa-angle-left"></i>
       </p>
     </a>
     <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=order&action=list&page=1" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Danh sách</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
        Thông tin website
        <i class="right fa fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=info" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
        social link
        <i class="right fa fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=social" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
         Trang Giới thiệu
         <i class="right fa fa-angle-left"></i>
       </p>
     </a>
     <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=gioithieu" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
         Trang Liên hệ
         <i class="right fa fa-angle-left"></i>
       </p>
     </a>
     <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=lienhe" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
        Phản hồi
        <i class="right fa fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=contact&action=list" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>list</p>
        </a>
      </li>

    </ul>
  </li>
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <section class="content">
  <div class="container-fluid">
    <?php
    $view=isset($_GET['view'])?$_GET['view']:'';
    $action= isset($_GET['action'])?$_GET['action']:'';
    if ($view=='product_type' && $action=='list') {
      include_once('tpl/product_type/list.php');
    }elseif ($view == 'product_type' && $action=='add') {
      include_once('tpl/product_type/add.php');
    }elseif ($view == 'product_type' && $action=='edit') {
      include_once('tpl/product_type/edit.php');
    } elseif ($view=='producer' && $action=='list') {
      include_once('tpl/producer/list.php');
    }elseif ($view == 'producer' && $action=='add') {
      include_once('tpl/producer/add.php');
    }elseif ($view == 'producer' && $action=='edit') {
      include_once('tpl/producer/edit.php');
    }elseif ($view=='product' && $action=='list') {
      include_once('tpl/product/list.php');
    }elseif ($view == 'product' && $action=='add') {
      include_once('tpl/product/add.php');
    }elseif ($view == 'product' && $action=='edit') {
      include_once('tpl/product/edit.php');
    }elseif (isset($_POST["search"]) || $view=="search") {
      include_once("tpl/search.php");
    }elseif ( $view=="slide") {
      include_once("tpl/slide/edit.php");
    }elseif ( $view=="logo") {
      include_once("tpl/logo/edit.php");
    }elseif ($view=='user' && $action=='list') {
      include_once('tpl/user/list.php');
    }elseif ($view == 'user' && $action=='edit') {
      include_once('tpl/user/edit.php');
    }
    elseif ($view=='order' && $action=='list') {
      include_once('tpl/order/list.php');
    }elseif ($view == 'order' && $action=='edit') {
      include_once('tpl/order/edit.php');
    }elseif ($view == 'info') {
      include_once('tpl/info/edit.php');
    }elseif ($view == 'social') {
      include_once('tpl/social/edit.php');
    }elseif ($view == 'lienhe' ) {
      include_once('tpl/lienhe/edit.php');
    }elseif ($view == 'gioithieu') {
      include_once('tpl/gioithieu/edit.php');
    }
    elseif ($view == 'contact' && $action=='list') {
      include_once('tpl/contact/list.php');
    } elseif ($view == 'contact' && $action=='edit') {
      include_once('tpl/contact/edit.php');
    }elseif ($view == 'admin' && $action=='list') {
      include_once('tpl/admin/list.php');
    }
    elseif ($view == 'admin' && $action =='editpass') {
      include_once('tpl/admin/edit_pass.php');
    }
    elseif ($view == 'admin' && $action =='name') {
      include_once('tpl/admin/edit_name.php');
    }
    elseif ($view == 'admin' && $action =='thumbnail') {
      include_once('tpl/admin/edit_thumbnail.php');
    }else{
      ?>
      <div class="col-md-12" style="margin: 50px 0; ">
        <?php
$dt->select("SELECT * FROM shipping WHERE month(created)='1' AND status='Đã xong' ");
$total_t1=0;
while ($row_t1=$dt->fetch()) {
  $price=(int)$row_t1['price'];
  $total_t1=$total_t1+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='2' AND status='Đã xong'  ");
$total_t2=0;
while ($row_t2=$dt->fetch()) {
  $price=(int)$row_t2['price'];
  $total_t2=$total_t2+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='3' AND status='Đã xong'  ");
$total_t3=0;
while ($row_t3=$dt->fetch()) {
  $price=(int)$row_t3['price'];
  $total_t3=$total_t3+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='4' AND status='Đã xong'  ");
$total_t4=0;
while ($row_t4=$dt->fetch()) {
  $price=(int)$row_t4['price'];
  $total_t4=$total_t4+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='5'  AND status='Đã xong' ");
$total_t5=0;
while ($row_t5=$dt->fetch()) {
  $price=(int)$row_t5['price'];
  $total_t5=$total_t5+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='6' AND status='Đã xong' ");
$total_t6=0;
while ($row_t6=$dt->fetch()) {
  $price=(int)$row_t6['price'];
  $total_t6=$total_t6+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='7' AND status='Đã xong' ");
$total_t7=0;
while ($row_t7=$dt->fetch()) {
  $price=(int)$row_t7['price'];
  $total_t7=$total_t7+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='8' AND status='Đã xong'  ");
$total_t8=0;
while ($row_t8=$dt->fetch()) {
  $price=(int)$row_t8['price'];
  $total_t8=$total_t8+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='9' AND status='Đã xong'  ");
$total_t9=0;
while ($row_t9=$dt->fetch()) {
  $price=(int)$row_t9['price'];
  $total_t9=$total_t9+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='10' AND status='Đã xong' ");
$total_t10=0;
while ($row_t10=$dt->fetch()) {
  $price=(int)$row_t10['price'];
  $total_t10=$total_t10+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='11' AND status='Đã xong' ");
$total_t11=0;
while ($row_t11=$dt->fetch()) {
  $price=(int)$row_t11['price'];
  $total_t11=$total_t11+$price;

}
$dt->select("SELECT * FROM shipping WHERE month(created)='12' AND status='Đã xong' ");
$total_t12=0;
while ($row_t12=$dt->fetch()) {
  $price=(int)$row_t12['price'];
  $total_t12=$total_t12+$price;

}

?>
        <div class="row">
         <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tống số vốn </span>
              <span class="info-box-number">
              <?php
                $dt->select("SELECT * FROM product");
                $total_money_product=0;
                while ($row6=$dt->fetch()) {
                  $total_money_product=$total_money_product+((int)$row6['investment_money']*(int)$row6['total']);
                }
                echo number_format($total_money_product)." VNĐ";
              ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng thu nhập</span>
              <span class="info-box-number"><?php  echo number_format($total_sale=$total_t1+$total_t2+$total_t3+$total_t4+$total_t5+$total_t6+$total_t7+$total_t8+$total_t9+$total_t10+$total_t11+$total_t12)." VNĐ" ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tống sản phẩm đã bán</span>
              <span class="info-box-number">
                <?php
                  $dt->select("SELECT * FROM product ");
                  $total_sell=0;
                  while ($row5=$dt->fetch()) {
                      $total_sell=$total_sell+(int)$row5['sell'];
                    }
                     echo $total_sell;
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng Email liên hệ</span>
              <span class="info-box-number"><?php 
               $dt->select("SELECT COUNT(*) as total_contact_all FROM contact ");
                $row4=$dt->fetch();
                echo $row4['total_contact_all'];
                 ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
    </div>
    <div class="row">
     <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-body p-0">
          <!-- THE CALENDAR -->
          <div id="calendar"></div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /. box -->

    </div>
    <div class="col-md-6">
     <!-- AREA CHART -->
     <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"> Thông Kê doanh số </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="areaChart" style="height:250px"></canvas>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  <?php
}
?>
</div>
</section>

<input type="hidden" id="t1" value="<?php echo $total_t1 ?>">
<input type="hidden" id="t2" value="<?php echo $total_t2?>">
<input type="hidden" id="t3" value="<?php echo $total_t3 ?>">
<input type="hidden" id="t4" value="<?php echo $total_t4 ?>">
<input type="hidden" id="t5" value="<?php echo $total_t5 ?>">
<input type="hidden" id="t6" value="<?php echo $total_t6 ?>">
<input type="hidden" id="t7" value="<?php echo $total_t7 ?>">
<input type="hidden" id="t8" value="<?php echo $total_t8 ?>">
<input type="hidden" id="t9" value="<?php echo $total_t9 ?>">
<input type="hidden" id="t10" value="<?php echo $total_t10 ?>">
<input type="hidden" id="t11" value="<?php echo $total_t11 ?>">
<input type="hidden" id="t12" value="<?php echo $total_t12 ?>">
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- jQuery -->


<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs-old/Chart.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)
    var t1=$('#t1').val();
     var t3=$('#t3').val();
    var t2=$('#t2').val();
     var t4=$('#t4').val();
     var t5=$('#t5').val();
     var t6=$('#t6').val();
     var t7=$('#t7').val();
     var t8=$('#t8').val();
     var t9=$('#t9').val();
     var t10=$('#t10').val();
     var t11=$('#t11').val();
     var t12=$('#t12').val();
    var areaChartData = {
      labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'tháng 6', 'tháng 7' ,' Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12'],
      datasets: [
      // {
      //   label               : 'Electronics',
      //   fillColor           : 'rgba(210, 214, 222, 1)',
      //   strokeColor         : 'rgba(210, 214, 222, 1)',
      //   pointColor          : 'rgba(210, 214, 222, 1)',
      //   pointStrokeColor    : '#c1c7d1',
      //   pointHighlightFill  : '#fff',
      //   pointHighlightStroke: 'rgba(220,220,220,1)',
      //   data                : [65, 59, 80, 81, 56, 55, 40 , 80, 81, 56, 55, 40]
      // },
      {
        label               : 'Digital Goods',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12]
      }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
    {
      value    : 700,
      color    : '#f56954',
      highlight: '#f56954',
      label    : 'Chrome'
    },
    {
      value    : 500,
      color    : '#00a65a',
      highlight: '#00a65a',
      label    : 'IE'
    },
    {
      value    : 400,
      color    : '#f39c12',
      highlight: '#f39c12',
      label    : 'FireFox'
    },
    {
      value    : 600,
      color    : '#00c0ef',
      highlight: '#00c0ef',
      label    : 'Safari'
    },
    {
      value    : 300,
      color    : '#3c8dbc',
      highlight: '#3c8dbc',
      label    : 'Opera'
    },
    {
      value    : 100,
      color    : '#d2d6de',
      highlight: '#d2d6de',
      label    : 'Navigator'
    }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
    -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
    -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },

      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>
