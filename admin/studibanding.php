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
    <link rel="stylesheet" type="text/css" href="assets/DataTables-Savage/datatables.min.css" />
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
                                <b>Data Studi Banding</b>

                            </header>
                            <div class="text-left" style="margin-top: 10px;">
                                &nbsp; <a href="studibanding.php" class="btn btn-sm btn-warning">Refresh</a>
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal_tambah_studi">Tambah Data</a>
                            </div>

                            <!-- Modal -->
                            <div id="modal_tambah_studi" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Tambah Data Studi Banding</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form-horizontal style-form" style="margin-top: 20px;"
                                                id="form_tambah_studi">

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Kunjungan</label>
                                                    <div class="col-sm-8">
                                                        <select name="kunjungan" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Pilih Kunjungan" required="">
                                                            <option value=''>-Pilih Kunjungan-</option>
                                                            <option value='masuk'>Masuk</option>
                                                            <option value='keluar'>Keluar</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Keterangan</label>
                                                    <div class="col-sm-8">
                                                        <input name="keterangan" type="text" class="form-control" autocomplete="off"
                                                            placeholder="" required="" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">Pilih
                                                        Gambar</label>
                                                    <div class="col-sm-8">
                                                        <input name="gambar_studi" type="file" accept="image/*" />
                                                    </div>
                                                </div>

                                                <div class="form-group" style="margin-bottom: 20px;">
                                                    <label class="col-sm-3 control-label text-right"></label>
                                                    <div class="col-sm-8">
                                                        <button id="button_tambah_studi" type="submit"
                                                            class="btn btn-primary">Upload</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="panel-body table-responsive">
                                <?php
                    $query1="select * from studibanding";
                    $tampil=mysql_query($query1) or die(mysql_error());
                    ?>
                                <table id="myTabel" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Kunjungan</center>
                                            </th>
                                            <th>
                                                <center>Keterangan</center>
                                            </th>
                                            <th>
                                                <center>Gambar</center>
                                            </th>
                                            <th>
                                                <center>Opsi</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($data=mysql_fetch_array($tampil))
                    { ?>
                                        <tr>
                                            <td><a href="detail-studibanding.php?hal=edit&kd=<?php echo $data['id'];?>"><span
                                                        class="fa fa-book"> Kunjungan </span>
                                                    <?php echo $data['kunjungan']; ?></a>
                                            </td>
                                            <td><?php echo $data['keterangan'];?></td>
                                            <td>
                                                <center><img src="gambar_studi/<?php echo $data['gambar_studi']; ?>"
                                                        height="100" width="100" style="border: 1px solid #333333;" />
                                                </center>
                                            </td>
                                            <td>
                                                <center>

                                                    <a class="btn btn-sm btn-primary" data-placement="bottom"
                                                        title="Edit Studi Banding"
                                                        onclick="OpenModalEdit(<?php echo $data['id'];?>);">
                                                        <span>Edit</span>
                                                    </a>
                                                    <a class="delete-link" data-placement="bottom" title="Hapus Koleksi"
                                                        href="hapus-studibanding.php?hal=hapus&kd=<?php echo $data['id'];?>"
                                                        data-placement="bottom">
                                                        <span class="btn btn-sm btn-danger">Hapus</span></a>
                                                </center>
                                            </td>
                                        </tr>

                                        <?php   
              } 
              ?>
                                    </tbody>
                                </table>

                                <?php $tampil=mysql_query("select * from studibanding order by id");
                                $studi=mysql_num_rows($tampil);
                            ?>
                                <center>
                                    <h4>Jumlah Studi Banding: <?php echo "$studi"; ?> Data </h4>
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
                    <h4 class="modal-title">Edit Studi Banding</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-14">
                            <div class="panel">
                                <div class="panel-body">
                                    <form class="form-horizontal style-form" style="margin-top: 20px;"
                                        id="form_edit_studi">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <input name="id" type="hidden" id="edit-id" class="form-control"
                                                    autocomplete="off" value="" required="" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Kunjungan</label>
                                            <div class="col-sm-8">
                                                <select name="kunjungan" type="text" id="edit-kunjungan" class="form-control"
                                                    autocomplete="off" placeholder="" required="">
                                                    <option value=''>-Pilih Kunjungan-</option>
                                                    <option value='masuk'>Masuk</option>
                                                    <option value='keluar'>Keluar</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Keterangan</label>
                                            <div class="col-sm-8">
                                                <input name="keterangan" type="text" id="edit-keterangan" class="form-control" autocomplete="off"
                                                    placeholder="" required="" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">File Gambar</label>
                                            <div class="col-sm-8">
                                                <img id="edit-gambar_studi" height="150" width="150" class="img-circle"
                                                    style="border: 3px solid black;" />
                                                <span class="help-block">Silahkan memilih file gambar untuk di
                                                    update</span>
                                                <input name="gambar_studi" type="file" accept="image/*"/>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label class="col-sm-3  control-label"></label>
                                            <div class="col-sm-8">
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

    <script type="text/javascript" src="assets/DataTables-Savage/datatables.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js" type="text/javascript"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

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
    <script>
        $(document).ready(function () {
            $('#myTabel').DataTable({
                language: {
                    url: 'assets/DataTables-Savage/Indonesian.json'
                }
            });
        });
    </script>
    <script>
        //tambah kode script
        //modal tambah studi
        $("#form_tambah_studi").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            console.log(formData);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'upload-studibanding.php',
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

        //modal edit studi banding
        function OpenModalEdit(id) {

            //get existing data
            var formdata = new FormData();
            formdata.append('id', id);
            formdata.append('usage', 'get-data');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'edit-studibanding.php',
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {

                    if (data.status == "sukses") {

                        $('#edit-id').val(data.data.id);
                        $('#edit-kunjungan').val(data.data.kunjungan);
                        $('#edit-keterangan').val(data.data.keterangan);
                        $('#edit-gambar_studi').attr("src","gambar_studi/" + data.data.gambar_studi);
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

        //modal edit save koleksi
        $("#form_edit_studi").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            console.log(formData);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'update-studibanding.php',
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