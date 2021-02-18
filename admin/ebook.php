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
    <meta name="keywords" content="Perpustakaan SMPN 2 PACIRAN">
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
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

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
                                <b>Data E-Book</b>

                            </header>
                            <div class="text-left" style="margin-top: 10px;">
                                &nbsp; <a href="ebook.php" class="btn btn-sm btn-warning">Refresh Buku</a> <a
                                    href="input-ebook.php" class="btn btn-sm btn-success">Tambah Buku</a>
                            </div>
                            <div class="text-left" style="margin-top: 10px;">
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal_tambah_buku">Tambah Buku</a>
                            </div>

                            <!-- Modal -->
                            <div id="modal_tambah_buku" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Tambah Buku</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form-horizontal style-form" style="margin-top: 20px;"
                                                id="form_tambah_buku">

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Judul</label>
                                                    <div class="col-sm-4">
                                                        <input name="judul" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Judul Buku" required="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Pengarang</label>
                                                    <div class="col-sm-4">
                                                        <input name="pengarang" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Pengarang" required="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Penerbit & Tempat
                                                        Terbit</label>
                                                    <div class="col-sm-4">
                                                        <input name="tempatdanpenerbit" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Penerbit & Tempat Terbit"
                                                            required="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">ISBN</label>
                                                    <div class="col-sm-4">
                                                        <input name="isbn" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Isbn" required="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Jumlah Halaman</label>
                                                    <div class="col-sm-4">
                                                        <input name="jumlahhalaman" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Jumlah Halaman"
                                                            required="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Kategori</label>
                                                    <div class="col-sm-4">
                                                        <select name="kategori" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Pilih Kategori" required="">
                                                            <option value="">Pilih Kategori</option>
                                                            <option value="000 Karya Umum">000 Karya Umum</option>
                                                            <option value="100 Filsafat">100 Filsafat</option>
                                                            <option value="200 Agama">200 Agama</option>
                                                            <option value="300 Ilmu-ilmu Sosial">300 Ilmu-ilmu Sosial
                                                            </option>
                                                            <option value="400 Bahasa">400 Bahasa</option>
                                                            <option value="500 Ilmu-ilmu Murni">500 Ilmu-ilmu Murni
                                                            </option>
                                                            <option value="600 Teknologi">600 Teknologi</option>
                                                            <option value="700 Seni & Olahraga">700 Seni & Olahraga
                                                            </option>
                                                            <option value="800 Sastra">800 Sastra</option>
                                                            <option value="900 Geografi & Sejarah">900 Geografi &
                                                                Sejarah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">File</label>
                                                    <div class="col-sm-6">
                                                        <input name="file_ebook" type="file" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Pilih Gambar</label>
                                                    <div class="col-sm-8">
                                                        <input name="gambar_ebook" type="file" />
                                                    </div>
                                                </div>

                                                <div class="form-group" style="margin-bottom: 20px;">
                                                    <label class="col-sm-4 control-label"></label>
                                                    <div class="col-sm-8">
                                                        <button id="button_tambah_buku" type="submit"
                                                            class="btn btn-primary">Upload</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="panel-body table-responsive">
                                <div class="box-tools m-b-15">
                                    <form action="ebook.php" method="POST">
                                        <div class="input-group">
                                            <input type='text' class="form-control input-sm pull-right"
                                                style="width: 150px;" name='qcari' placeholder='Cari berdasarkan Judul'
                                                required />
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default" type="submit"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                    $query1="select * from data_ebook";
                    if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT * FROM  data_ebook 
	               where judul like '%$qcari%'
	               or kategori like '%$qcari%'
                   or pengarang like '%$qcari%' ";
                    }
                    $tampil=mysql_query($query1) or die(mysql_error());
                    ?>
                                <table id="example" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Judul </center>
                                            </th>
                                            <th>
                                                <center>Pengarang</center>
                                            </th>
                                            <th>
                                                <center>Kategori </center>
                                            </th>
                                            <th>
                                                <center>File Pdf</center>
                                            </th>
                                            <th>
                                                <center>Gambar Sampul</center>
                                            </th>
                                            <th>
                                                <center>Opsi</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <?php while($data=mysql_fetch_array($tampil))
                    { ?>
                                    <tbody>
                                        <tr>
                                            <td><a href="detail-ebook.php?hal=edit&kd=<?php echo $data['id'];?>"><span
                                                        class="fa fa-book"></span> <?php echo $data['judul']; ?></a>
                                            </td>
                                            <td><?php echo $data['pengarang'];?></td>
                                            <td><?php echo $data['kategori'];?></td>
                                            <td><?php echo $data['file_ebook'];?></td>
                                            <td>
                                                <center><img src="sampul_ebook/<?php echo $data['gambar_ebook']; ?>"
                                                        height="100" width="100" style="border: 1px solid #333333;" />
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div id="thanks"><a class="btn btn-sm btn-primary"
                                                            data-placement="bottom" data-toggle="tooltip"
                                                            title="Edit E-Book"
                                                            href="edit-ebook.php?hal=edit&kd=<?php echo $data['id'];?>"><span
                                                                class="glyphicon glyphicon-edit"></span></a>
                                                        <a onclick="return confirm ('Anda Yakin Menghapus Data <?php echo $data['judul'];?>.?');"
                                                            class="btn btn-sm btn-danger tooltips"
                                                            data-placement="bottom" data-toggle="tooltip"
                                                            title="Hapus E-Book"
                                                            href="hapus-ebook.php?hal=hapus&kd=<?php echo $data['id'];?>"><span
                                                                class="glyphicon glyphicon-trash"></a>
                                                </center>
                                            </td>
                                        </tr>
                            </div>

                            <?php   
              } 
              ?>
                            </tbody>
                            </table>

                            <?php $tampil=mysql_query("select * from data_ebook order by id");
                        $ebook=mysql_num_rows($tampil);
                    ?>
                            <center>
                                <h4>Jumlah Buku : <?php echo "$ebook"; ?> Eksemplar </h4>
                            </center>


                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
    </div>
    <!-- row end -->
    </section><!-- /.content -->
    <div class="footer-main">
        <strong>PERPUSTAKAAN SMPN 2 PACIRAN</strong>
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
        $('input').on('ifChecked', function (event) {
            // var element = $(this).parent().find('input:checkbox:first');
            // element.parent().parent().parent().addClass('highlight');
            $(this).parents('li').addClass("task-done");
            console.log('ok');
        });
        $('input').on('ifUnchecked', function (event) {
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
        $(function () {
            "use strict";
            //BAR CHART
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
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
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data, {
                responsive: true,
                maintainAspectRatio: false,
            });

        });
    </script>

    <script>

            //modal tambah buku
            $("#form_tambah_buku").submit(function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                console.log(formData);

                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url: 'upload-file.php',
                    data:formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        
                        if(data.status == "sukses"){
                            alert("Sukses, " + data.pesan);
                        }
                        else{
                            alert("Gagal, " + data.pesan);                            
                        }
                        location.reload();

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                       alert("Error, mohon hubungi admin");
                    }
                });

            });

    </script>

</body>

</html>