<?php
      include '../auth.php';
      include "../koneksi/conn.php";
      $username = $_SESSION['username'];
      //echo $_SESSION['username'];;
      $query = mysqli_query($conn,"SELECT * FROM admin where username='$username' and role='Administrator'");
      if ($query) {
        $data = mysqli_fetch_array($query);
      }else echo mysqli_error($conn);

                $active1 = "";
                $active2 = "";
                $active3 = "";
                $active4 = "";
                $active5 = "";
                $active6 = "";
                $active7 = "";
                $active10= "";
                $page =  "include/home.php";
                $includeVal = "";
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch ($page) {
                    case '1':
                      $includeVal = "include/home.php";
                      $active1 = "active";
                      break;
                    case '2':
                      $includeVal = "include/alat.php";
                      $active2 = "active";
                      break;
                    case '3':
                      $includeVal = "include/tambah_alat.php";
                      $active2 = "active";
                      break;
                    case '4':
                      $includeVal = "include/edit_alat.php";
                      $id_alat = $_GET['id_alat'];
                      $active2 = "active";
                      break;
                    case '5':
                      $includeVal = "include/daftar_pegawai.php";
                      $active3 = "active";
                      break;
                    case '6':
                      $includeVal = "include/tambah_pegawai.php";
                      $active3 = "active";
                      break;
                    case '7':
                      $includeVal = "include/edit_pegawai.php";
                      $id_pegawai = $_GET['id_pegawai'];
                      $active3 = "active";
                      break;
                    case '8':
                      $includeVal = "include/spv.php";
                      $active4 = "active";
                      break;
                    case '9':
                      $includeVal = "include/tambah_spv.php";
                      $active4 = "active";
                      break;
                    case '10':
                      $includeVal = "include/edit_spv.php";
                      $username = $_GET['usr'];
                      $active4 = "active";
                      break;
                    case '23':
                      $includeVal = "include/ubah_password_spv.php";
                      $username = $_GET['usr'];
                      $active4 = "active";
                      break;
                    case '11':
                      $includeVal = "include/mnt.php";
                      $active11 = "active";
                      break;
                    case '12':
                      $includeVal = "include/tambah_mnt.php";
                      $active5 = "active";
                      break;
                    case '13':
                      $includeVal = "include/edit_mnt.php";
                      $username = $_GET['usr'];
                      $active5 = "active";
                      break;
                    case '24':
                      $includeVal = "include/ubah_password_mnt.php";
                      $username = $_GET['usr'];
                      $active5 = "active";
                      break;
                    case '14':
                      $includeVal = "include/Kerusakan.php";
                      $active6 = "active";
                      break;
                    case '15':
                      $includeVal = "include/tambah_kerusakan.php";
                      $active6 = "active";
                      break;
                    case '16':
                      $includeVal = "include/edit_kerusakan.php";
                      $id_kerusakan = $_GET['id_kerusakan'];
                      $active6 = "active";
                      break;
                    case '19':
                      $includeVal = "include/data_admin.php";
                      $active7 = "active";
                      break;
                    case '26':
                      $includeVal = "include/ubah_password_super.php";
                      $active7 = "active";
                      break;
                    case '20':
                      $includeVal = "include/produksi.php";
                      $active8 = "active";
                      break;
                    case '21':
                      $includeVal = "include/tambah_produksi.php";
                      $active8 = "active";
                      break;
                    case '22':
                      $includeVal = "include/edit_produksi.php";
                      $username = $_GET['usr'];
                      $active8 = "active";
                      break;
                    case '25':
                      $includeVal = "include/ubah_password_staff.php";
                      $username = $_GET['usr'];
                      $active8 = "active";
                      break;
                    default:
                      $active = "active";
                      $includeVal = "include/home.php";
                      break;
                  }
                }else{
                  $active1 = "active";
                  $includeVal = "include/home.php";

                }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Remainder Maintenance | Staff Administrator</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../fonts/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../admin/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../admin/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../admin/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../admin/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="../admin/plugins/fullcalendar/fullcalendar.css">

    <link rel="stylesheet" href="../admin/plugins/datatables/jquery.dataTables.min.css">
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>


    <style>
    .content {
        min-height: 250px;
        padding: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        background-color: white;
        padding-right: 15px;
    }
    .skin-blue .main-header .navbar {
        background-color: #D91E18;
    }
    .skin-blue .main-header .logo {
        background-color: #C0392B;
        color: #fff;
        border-bottom: 0 solid transparent;
    }
    .skin-blue .sidebar-menu .collapse>li:hover, .skin-blue .sidebar-menu .collapse>li.active {
        color: #fff;
        background: #1E8BC3;
        border-left-color: #3c8dbc;
        border-bottom-color: 3px solid white;
    }

    .skin-blue .sidebar-menu>li>a:hover, .skin-blue .sidebar-menu .sidebar-menu>li>a:active {
        color: #fff;
        background: #1E8BC3;
        border-left-color: #3c8dbc;
        border-bottom-color: 3px solid white;
    }
    .skin-blue .sidebar-menu .collapse li{
      padding: 10px;
    }

    .skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
        background-color: #F22613;
    }
    .skin-blue .sidebar a {
        color: #fff;
    }
    .skin-blue .sidebar-menu>li.header {
        color: #fff;
        background: #D91E18;
        height: 50px;
        padding-top: 15px;
        font-size: 16px;
    }
    .skin-blue .sidebar-menu>li>a {
         border-left: 0px solid transparent;
    }
    table.dataTable tr{ background-color:  #E3F2FD; }
    table.dataTable tr:nth-child(even)  { background-color: #F44336;color: white;}
    table.dataTable tr:nth-child(even)  a{ background-color: #F44336;color: white;}
    table.dataTable tr:nth-child(even)  a:hover{ background-color: #F44336;color: blue;}


    .user-panel>.info{
      padding-top: 20px;
    }

    a.logout{
      margin-top: -10px;
      margin-left: -30px;
      padding-right: -10px;
      margin-right: 0px;
    }

    .skin-blue .sidebar-menu>li.header {
    color: #fff;
    background: #D91E18;
    height: 50px;
    padding-top: 15px;
    font-size: 16px;
    border-bottom: 2px solid white;
}

    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Administrator</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
        </nav>
      </header>



      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">



          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="<?php echo $active1; ?> treeview">
              <a href="index.php?page=1">&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-dashboard"></i> <span>HOME</span></i>
              </a>
            </li>
            <li class="header" type="button" data-toggle="collapse" data-target="#demo2"><i class="fa fa-user"></i> &nbsp;&nbsp;DATA DIRI <span class="caret" style="float: right;margin-top: 10px;"></span></li>
            <div class="collapse" id="demo2">
            <li class="<?php echo $active7; ?> treeview">
              <a href="index.php?page=19">&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-files-o"></i>
                <span>Data Staff Administrator</span>
              </a>
            </li>
            </div>
            <li class="header" type="button" data-toggle="collapse" data-target="#demo"><i class="fa fa-archive"></i> &nbsp;&nbsp;MASTER  <span class="caret" style="float: right;margin-top: 10px;"></span></li>
                <div class="collapse" id="demo">
                <li class="<?php echo $active2; ?> treeview">
                  <a href="index.php?page=2">&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-magic"></i>
                    <span>Alat</span>
                  </a>
                </li>
              
                <li class="<?php echo $active6; ?> treeview">
                  <a href="index.php?page=14">&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-bolt"></i> <span>Kerusakan</span>
                  </a>
                </li>

                <li class="<?php echo $active4; ?> treeview">
                  <a href="index.php?page=8">&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-user"></i> <span>SPV</span>
                  </a>
                </li>
                <li class="<?php echo $active5; ?> treeview">
                  <a href="index.php?page=11">&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fa fa fa-user"></i> <span>Staff Maintenance</span>
                  </a>
                </li>
                <li class="<?php echo $active8; ?> treeview">
                  <a href="index.php?page=20">&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fa fa fa-user"></i> <span>Staff Produksi</span>
                  </a>
                </li>
                </div>
            <li class="header">
              <a href="../logout.php" class="logout">&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fa fa-lock"></i> <span>Logout</span>
              </a>
            </li>


          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">


          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->


              <?php

                include "$includeVal";


              ?>

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2017 <a href="#">PT PURA MAYUNGAN</a>.</strong> All rights reserved.
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="../admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../admin/plugins/jQueryUI/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../admin/plugins/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../admin/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="../admin/plugins/moment/moment.js"></script>
    <script src="../admin/plugins/fullcalendar/fullcalendar.min.js"></script>

    <script src="../admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../admin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../admin/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../admin/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../admin/dist/js/demo.js"></script>
  </body>
</html>
