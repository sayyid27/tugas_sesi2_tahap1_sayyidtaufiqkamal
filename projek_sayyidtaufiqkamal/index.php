
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLIKLINIK</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="style/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="style/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="style/plugins/select2-3.5.4/select2.css">  
  <link rel="stylesheet" href="style/plugins/select2-3.5.4/select2-bootstrap.css">
  <link href="style/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
  <link href="style/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <style>

</style> 
</head>
  <body class="skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">   
      <header class="main-header">
        <nav class="navbar navbar-static-top" >
         <a href="menu.php?open=" class="logo"  style="min-width:80%">
          <span class="logo-lg"><b>POLIKLINIK</b></span>
        </a>
          <div class="navbar-custom-menu">
            
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <aside class="main-sidebar">
        <section class="sidebar" id="scroll-sidebar">
          <li style="margin:1%;"></li>
          <div class="">
            <img class="profile-user-img img-responsive" src="picture/user.png" alt="User profile picture">
          </div>
         <li style="margin:1%;"></li>
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
      			<li><a href="index.php?open="><i class="fa fa-home"></i><span>BERANDA</span></a></li>
            <li><a href="index.php?open=pasien"><i class="fa fa-home"></i><span>DATA PASIEN</span></a></li>
            <li><a href="index.php?open=dokter"><i class="fa fa-home"></i><span>DATA DOKTER</span></a></li>
            <li><a href="index.php?open=daftar"><i class="fa fa-home"></i><span>DAFTAR</span></a></li>
          </ul>
        </section>
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section  class="content-header">
          <h1>Sistem Informasi Poliklinik</h1>
        </section>

        <!-- Main content -->
        <section  class="content">
               
        	<?php include "file.php";?>        		
         
        </section><!-- /.content -->       
      </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

  
  </body>
</html>