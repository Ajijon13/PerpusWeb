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
    <meta charset="UTF-8">
    <title>Perpustakaan SMPN 2 PACIRAN</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="keywords" content="Aplikasi Perpustakaan SMPN 2 PACIRAN">
    <!-- bootstrap 3.0.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="assets/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="assets/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="assets/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="assets/css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />


          <style type="text/css">

          </style>
      </head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <br><strong>PERPUSTAKAAN SMPN 2 PACIRAN</strong>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                    <li>
                                        <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                        <a href="admin.php">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                            Settings
                                        </a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
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

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b><center>Edit Buku</center></b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->
                    <?php
                    $query = mysql_query("SELECT * FROM buku_paket WHERE id='$_GET[kd]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                                <!-- </div> -->
                      <div class="panel-body">
                      <form class="form-horizontal style-form" style="margin-top: 20px;" action="update-buku.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                              <div class="col-sm-8">
                                  <input name="id" type="hidden" id="id" class="form-control" autocomplete="off" value="<?php echo $data['id']; ?>" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 control-label">Judul</label>
                              <div class="col-sm-4">
                                  <input name="judul" type="text" id="judul" class="form-control" autocomplete="off" value="<?php echo $data['judul']; ?>" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 control-label">Pengarang</label>
                              <div class="col-sm-4">
                                  <input name="pengarang" type="text" id="pengarang" class="form-control" autocomplete="off" value="<?php echo $data['pengarang']; ?>" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 control-label" >Penerbit & Tempat Terbit</label>
                              <div class="col-sm-4">
                                  <input name="tempatdanpenerbit" type="text"  id="tempatdanpenerbit" class="form-control" autocomplete="off" value="<?php echo $data['tempatdanpenerbit']; ?>" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 control-label">ISBN</label>
                              <div class="col-sm-4">
                                  <input name="isbn" type="text" id="isbn" class="form-control"  autocomplete="off" value="<?php echo $data['isbn']; ?>" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 control-label">Jumlah Halaman</label>
                              <div class="col-sm-4">
                                  <input name="jumlahhalaman" type="text"  id="jumlahhalaman" class="form-control" autocomplete="off"  value="<?php echo $data['jumlahhalaman']; ?>" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 control-label">Kategori</label>
                              <div class="col-sm-4">
                                  <select name="kategori" type="text" id="Kategori" class="form-control" autocomplete="off" value="<?php echo $data['kategori']; ?>" required="">
                                        <option value="000 Karya Umum">000 Karya Umum</option>
                                        <option value="100 Filsafat">100 Filsafat</option>
                                        <option value="200 Agama">200 Agama</option>
                                        <option value="300 Ilmu-ilmu Sosial">300 Ilmu-ilmu Sosial</option>
                                        <option value="400 Bahasa">400 Bahasa</option>
                                        <option value="500 Ilmu-ilmu Murni">500 Ilmu-ilmu Murni</option>
                                        <option value="600 Teknologi">600 Teknologi</option>
                                        <option value="700 Seni & Olahraga">700 Seni & Olahraga</option>
                                        <option value="800 Sastra">800 Sastra</option>
                                        <option value="900 Geografi & Sejarah">900 Geografi & Sejarah</option>
                                    </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-4 control-label">File E-Book</label>
                              <div class="col-sm-4">
                                  <span class="help-block">Silahkan memilih file pdf untuk di update</span>
                                  <embed src="<?php echo $data['file_buku']; ?>" alt="File Pdf" style="margin-bottom: 10px;" /><br />
                                  <input name="file_buku" type="file"/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-4 control-label">File gambar</label>
                              <div class="col-sm-4">
                              <img src="sampul_buku/<?php echo $data['gambar_buku']; ?>" height="150" width="150" class="img-circle" style="border: 3px solid black;"/>
                                  <span class="help-block">Silahkan memilih file gambar untuk di update</span>
                                  <input name="gambar_buku" type="file"/>
                              </div>
                          </div>

                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-4 control-label"></label>
                              <div class="col-sm-4">
                                  <input type="submit" name="upload" value="Update" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="buku_paket.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    PERPUSTAKAAN SMPN 2 PACIRAN
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="assets/js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="assets/js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="assets/js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="assets/js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
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
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
</script>
</body>
</html>