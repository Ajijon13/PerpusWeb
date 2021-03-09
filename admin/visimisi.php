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

    <!-- iCheck for checkboxes and radio inputs -->
    <link href="assets/css/iCheck/all.css" rel="stylesheet" type="text/css" />

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
                                <b>Data Visi Dan Misi</b>

                            </header>
                            <div class="text-left" style="margin-top: 10px;">
                                &nbsp; <a href="visimisi.php" class="btn btn-sm btn-warning">Refresh</a>
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal_tambah_visimisi">Input Data</a>
                            </div>

                            <!-- Modal -->
                            <div id="modal_tambah_visimisi" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Input Data</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form-horizontal style-form" style="margin-top: 20px;"
                                                id="form_tambah_visimisi">

                                                <div class="form-group">
                                                    <label class="col-sm-2  control-label">Visi</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="visi" rows="5" cols="70" style="height:300px"
                                                            class="form-control" autocomplete="off" placeholder=""
                                                            required=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2  control-label">Misi</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="misi" rows="5" cols="50" style="height:300px"
                                                            class="form-control" autocomplete="off" placeholder=""
                                                            required=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="margin-bottom: 20px;">
                                                    <label class="col-sm-2 control-label text-right"></label>
                                                    <div class="col-sm-8">
                                                        <button id="button_tambah_visimisi" type="submit"
                                                            class="btn btn-primary">Upload</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Keluar</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="panel-body table-responsive">
                                <?php
                    $query1="select * from visimisi";
                    $tampil=mysql_query($query1) or die(mysql_error());
                    ?>
                                <table id="example" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Visi</center>
                                            </th>
                                            <th>
                                                <center>Misi </center>
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
                                            <td><a href="detail-visimisi.php?hal=edit&kd=<?php echo $data['id'];?>"><span
                                                        class="fa fa-book"></span>
                                                    <?php echo $data['visi']; ?></a>
                                            </td>
                                            <td><?php echo $data['misi'];?></td>
                                            <td>
                                                <center>
                                                    <div id="thanks">

                                                        <a class="btn btn-sm btn-primary" data-placement="bottom"
                                                            title="Edit VisiMisi"
                                                            onclick="OpenModalEdit(<?php echo $data['id'];?>);">
                                                            <span>Edit</span>
                                                        </a>

                                                        <a class="delete-link" data-placement="bottom"
                                                            title="Hapus VisiMisi"
                                                            href="hapus-visimisi.php?hal=hapus&kd=<?php echo $data['id'];?>"
                                                            data-placement="bottom">
                                                            <span class="btn btn-sm btn-danger">Hapus</span></a>
                                                </center>
                                            </td>
                                        </tr>
                            </div>

                            <?php   
              } 
              ?>
                            </tbody>
                            </table>

                            <?php $tampil=mysql_query("select * from visimisi order by id");
                                $visi=mysql_num_rows($tampil);
                            ?>
                            <center>
                                <h4>Jumlah Visi Misi : <?php echo "$visi"; ?> Data </h4>
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

    <!--modal edit -->

    <!-- Modal -->
    <div id="modal_edit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <form class="form-horizontal style-form" style="margin-top: 20px;"
                                        id="form_edit_visimisi">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <input name="id" type="hidden" id="edit-id" class="form-control"
                                                    autocomplete="off" value="" required="" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Visi</label>
                                            <div class="col-sm-10">
                                                <textarea name="visi" type="text" id="edit-visi" style="height:300px"
                                                    class="form-control" autocomplete="off"
                                                    required=""><?php echo $data['visi']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2  control-label">Misi</label>
                                            <div class="col-sm-10">
                                                <textarea name="misi" type="text" id="edit-misi" style="height:300px"
                                                    class="form-control" autocomplete="off"
                                                    required=""><?php echo $data['misi']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label class="col-sm-2  control-label"></label>
                                            <div class="col-sm-4">
                                                <input type="submit" name="upload" value="Update"
                                                    class="btn btn-sm btn-primary" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>

        </div>
    </div>

    <!-- jQuery 2.0.2 -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>

    <!-- jQuery UI 1.10.3 -->
    <script src="assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <script src="assets/js/plugins/chart.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- calendar -->
    <script src="assets/js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

    <!-- Director App -->
    <script src="assets/js/Director/app.js" type="text/javascript"></script>


    <script src="assets/js/sweetalert2.all.min.js" type="text/javascript"></script>


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

    <script>
        //tambah kode script
        //modal tambah 
        $("#form_tambah_visimisi").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            console.log(formData);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'upload-visimisi.php',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {

                    if (data.status == "berhasil") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: data.pesan
                        }).then(() => {
                            location.reload();
                        });
                    } else if (data.status == "gagal") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: data.pesan
                        }).then(() => {
                            location.reload();
                        });
                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert("Error, mohon hubungi admin");
                }
            });

        });

        //modal edit 
        function OpenModalEdit(id) {

            //get existing data
            var formdata = new FormData();
            formdata.append('id', id);
            formdata.append('usage', 'get-data');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'edit-visimisi.php',
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {

                    if (data.status == "sukses") {

                        $('#edit-id').val(data.data.id);
                        $('#edit-visi').val(data.data.visi);
                        $('#edit-misi').val(data.data.misi);
                        $('#modal_edit').modal('show');

                    } else {
                        alert(data.pesan);
                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert("Error, mohon hubungi admin");
                }
            });

        }

        //modal edit save 
        $("#form_edit_visimisi").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            console.log(formData);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'update-visimisi.php',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {

                    if (data.status == "berhasil") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: data.pesan
                        }).then(() => {
                            location.reload();
                        });
                    } else if (data.status == "gagal") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: data.pesan
                        }).then(() => {
                            location.reload();
                        });
                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert("Error, mohon hubungi admin");
                }
            });

        });
    </script>

    <script>
        $('.delete-link').on('click', function (e) {
            e.preventDefault();
            const href = $(this).attr('href')

            swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                text: 'Apakah Anda Ingin Mengahapus Data ini?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            });
        });
    </script>

</body>

</html>