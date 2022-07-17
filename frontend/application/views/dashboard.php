
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>READY AKADEMIK</title>
	<!-- Icon -->
	<link rel="shortcut icon" type="image/icon" href="../favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../aset/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../aset/fa/css/font-awesome.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../aset/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../aset/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../aset/dist/css/skins/_all-skins.min.css">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
     
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <li class="header"><h4><b><center>Menu Panel</center></b></h4></li>
              <li class="active"><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
			        <li><a href="dosen.php"><i class="fa fa-user"></i><span>Dosen</span></a></li>
			        <li><a href="mahasiswa.php"><i class="fa fa-users"></i><span>Mahasiswa</span></a></li>
			        <li><a href="ruangan.php"><i class="fa fa-columns"></i><span>Ruangan</span></a></li>
			        <li><a href="matakuliah.php"><i class="fa fa-book"></i><span>Matakuliah</span></a></li>
			        <li><a href="jurusan.php"><i class="fa fa-university"></i><span>Jurusan</span></a></li>
			        <li><a href="jenjang.php"><i class="fa fa-graduation-cap"></i><span>Jenjang</span></a></li>
					<li><a href="jadwal.php"><i class="fa fa-calendar"></i><span>Jadwal</span></a></li>
					<li><a href="user.php"><i class="fa fa-user-circle-o"></i><span>User</span></a></li>
			        <li><a href="about.php"><i class="fa fa-info-circle"></i><span>Tentang Aplikasi</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
					<h1><center><b>ULBI AKADEMIK</b></center></h1>
					<center><img src="data:image/jpeg;base64,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" /></center>
					<center><h2><b> &copy;  <?php echo date ('Y') ?></b></h2></center>
					<center><h4><b>Made with <strong><i class="fa fa-code"></i></strong> and <i class="fa fa-heart"></i> by HARYADI YUSUF & JOSE</b></h4></center>
                </div><!-- /.box-header -->
                <div class="box-body">
					
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
   
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/app.min.js"></script>
  </body>
</html>
