<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Ajijon -->
    <meta charset="UTF-8">
    <title>Perpustakaan Samudera Ilmu</title>
    <!-- bootstrap 3.0.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />




    <style type="text/css">

    </style>
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="index.php" class="logo">
            <br><strong> PERPUSTAKAAN SAMUDERA ILMU</Strong>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                            <li class="dropdown-header text-center">Akun</li>

                            <li>
                                <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>">
                                    <i class="fa fa-user fa-fw pull-right"></i>
                                    Profil
                                </a>
                                <a href="admin.php">
                                    <i class="fa fa-cog fa-fw pull-right"></i>
                                    Pengaturan
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Keluar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <?php
                    $timeout = 10; // Set timeout minutes
                    $logout_redirect_url = "../login.html"; // Set logout URL
                    $timeout = $timeout * 60; // Converts minutes to seconds
                    if (isset($_SESSION['start_time'])) {
                        $elapsed_time = time() - $_SESSION['start_time'];
                        if ($elapsed_time >= $timeout) {
                            session_destroy();
                            echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
                        }
                    }
                    $_SESSION['start_time'] = time();
                    ?>
    <?php } ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <br>
                <br>
                <?php include "menu.php"; ?>
            </section>
            <!-- /.sidebar -->
        </aside>

        <aside class="right-side">

            <!-- Main content -->
            <section class="content">
                <div class="row" style="margin-bottom:5px;">
                    <div class="col-md-4">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
                            <div class="sm-st-info">

                                <?php $tampil=mysql_query("select * from admin order by user_id desc");
                                        $total=mysql_num_rows($tampil);
                                    ?>
                                <strong>JUMLAH ADMIN</strong>
                                <span><?php echo "$total"; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
                            <div class="sm-st-info">

                                <?php $tampil=mysql_query("select * from buku_paket order by id desc");
                                         $total1=mysql_num_rows($tampil);
                                    ?>
                                <strong>JUMLAH BUKU</strong>
                                <span><?php echo "$total1"; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-blue"><i class="fa fa-book"></i></span>
                            <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from data_ebook order by id desc");
                                        $total2=mysql_num_rows($tampil);
                                    ?>
                                <strong>JUMLAH E-BOOK</strong>
                                <span><?php echo "$total2"; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Main row -->
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">

                                <div class="alert alert-block alert-success">
                                    <button data-dismiss="alert" class="close close-sm" type="button">

                                    </button>
                                    <strong>
                                        <center>SELAMAT DATANG DI PERPUSTAKAAN SAMUDERA ILMU SMPN 2 PACIRAN </center>
                                    </strong>
                                </div>

                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="sm-st clearfix">
                                <section class="panel tasks-widget">
                                    <header class="panel-heading">
                                        <strong>E-book yang telah ditambahkan</strong>
                                    </header>
                                    <div class="panel-body">

                                        <div class="task-content">

                                            <ul class="task-list">
                                                <?php
                                  $tampil=mysql_query("select * from data_ebook order by id desc limit 3");
                                  while($data6=mysql_fetch_array($tampil)){
                                  ?>
                                                <div class="alert alert-success">
                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                    </button>
                                                    <strong><?php echo $data6['judul']; ?></strong>, E-Book telah
                                                    ditambahkan.
                                                </div>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>


                        <div class="col-md-4">
                           <center><img src="../images/logo/logo1.png" class="img-fluid"/></center>
                        </div>

                        <div class="col-md-7">
                            <div class="sm-st clearfix">
                                <section class="panel tasks-widget">
                                    <header class="panel-heading">
                                        <strong>Buku Paket yang telah ditambahkan</strong>
                                    </header>
                                    <div class="panel-body">

                                        <div class="task-content">

                                            <ul class="task-list">
                                                <?php
                                  $tampil=mysql_query("select * from bukupaket order by id desc limit 5");
                                  while($data7=mysql_fetch_array($tampil)){
                                  ?>
                                                <div class="alert alert-success">
                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                    </button>
                                                    <strong><?php echo $data7['judul']; ?></strong>, Buku Paket telah
                                                    ditambahkan.
                                                </div>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
            </section><!-- /.content -->
            <div class="footer-main">
                <strong>PERPUSTAKAAN SAMUDERA ILMU</strong>
            </div>
        </aside><!-- /.right-side -->

    </div><!-- ./wrapper -->


    <!-- jQuery 2.0.2 -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>

    <!-- jQuery UI 1.10.3 -->
    <script src="assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>


    <!-- Director App -->
    <script src="assets/js/Director/app.js" type="text/javascript"></script>

    <script>
        $('#noti-box').slimScroll({
            height: '400px',
            size: '5px',
            BorderRadius: '5px'
        });

        $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
            checkboxClass: 'icheckbox_flat-grey',
            radioClass: 'iradio_flat-grey'
        });
    </script>

</body>

</html>