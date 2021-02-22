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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="assets/css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- datatable -->
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css" type="text/css"/>

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
                                                    <label class="col-sm-3 control-label text-right">Judul</label>
                                                    <div class="col-sm-8">
                                                        <input name="judul" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Judul Buku" required="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">Pengarang</label>
                                                    <div class="col-sm-8">
                                                        <input name="pengarang" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Pengarang" required="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">Penerbit & Tempat Terbit</label>
                                                    <div class="col-sm-8">
                                                        <input name="tempatdanpenerbit" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Penerbit & Tempat Terbit"
                                                            required="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">ISBN</label>
                                                    <div class="col-sm-8">
                                                        <input name="isbn" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Isbn" required="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">Jumlah Halaman</label>
                                                    <div class="col-sm-8">
                                                        <input name="jumlahhalaman" type="text" class="form-control"
                                                            autocomplete="off" placeholder="Jumlah Halaman"
                                                            required="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">Kategori</label>
                                                    <div class="col-sm-8">
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
                                                    <label class="col-sm-3 control-label text-right">File</label>
                                                    <div class="col-sm-8">
                                                        <input name="file_ebook" type="file" accept="application/pdf"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">Pilih Gambar</label>
                                                    <div class="col-sm-8">
                                                        <input name="gambar_ebook" type="file" accept="image/*"/>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="margin-bottom: 20px;">
                                                    <label class="col-sm-3 control-label text-right"></label>
                                                    <div class="col-sm-8">
                                                        <button id="button_tambah_buku" type="submit"
                                                            class="btn btn-primary">Upload</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
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
                                <table id="DataTable_ebook" class="table table-striped table-bordered" style="width:100%">
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
                                                <center>Penerbit & Tempat Terbit</center>
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
                                            <td><a class="detail-link" href="detail-ebook.php?hal=edit&kd=<?php echo $data['id'];?>"><span class="fa fa-book"></span> <?php echo $data['judul']; ?></a>
                                            </td>
                                            <td><?php echo $data['pengarang'];?></td>
                                            <td><?php echo $data['kategori'];?></td>
                                            <td><?php echo $data['tempatdanpenerbit'];?></td>
                                            <td>
                                                <center><img src="sampul_ebook/<?php echo $data['gambar_ebook']; ?>" height="100" width="100" style="border: 1px solid #333333;" />
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div id="thanks">
                                                        
                                                    <a class="btn btn-sm btn-primary"
                                                        data-placement="bottom"
                                                        title="Edit E-Book"
                                                        onclick="OpenModalEdit(<?php echo $data['id'];?>);">
                                                        <span>Edit</span>
                                                    </a>

                                                        
                                                    <a  class="delete-link" 
                                                        data-placement="bottom" 
                                                        title="Hapus E-Book"
                                                        href="hapus-ebook.php?hal=hapus&kd=<?php echo $data['id'];?>" data-placement="bottom">
                                                        <span class="btn btn-sm btn-danger" >Hapus</span></a>
                                                </center>
                                            </td>
                                        </tr>
                      

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

    <!--modal edit -->

    <!-- Modal -->
    <div id="modal_edit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit E-Book</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <form class="form-horizontal style-form" style="margin-top: 20px;"
                                        id="form_edit_buku">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <input name="id" type="hidden" id="edit-id" class="form-control"
                                                    autocomplete="off" value="" required="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" col-sm-4 control-label">Judul</label>
                                            <div class="col-sm-4">
                                                <input name="judul" type="text" id="edit-judul" class="form-control"
                                                    autocomplete="off" value="" required="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Pengarang</label>
                                            <div class="col-sm-4">
                                                <input name="pengarang" type="text" id="edit-pengarang" class="form-control"
                                                    autocomplete="off" value="" required="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Penerbit & Tempat Terbit</label>
                                            <div class="col-sm-4">
                                                <input name="tempatdanpenerbit" type="text" id="edit-tempatdanpenerbit"
                                                    class="form-control" autocomplete="off" value="" required="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">ISBN</label>
                                            <div class="col-sm-4">
                                                <input name="isbn" type="text" id="edit-isbn" class="form-control"
                                                    autocomplete="off" value="" required="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Jumlah Halaman</label>
                                            <div class="col-sm-4">
                                                <input name="jumlahhalaman" type="text" id="edit-jumlahhalaman"
                                                    class="form-control" autocomplete="off" value="" required="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Kategori</label>
                                            <div class="col-sm-4">
                                                <select name="kategori" type="text" id="edit-kategori" class="form-control"
                                                    autocomplete="off" value="" required="">
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="000 Karya Umum">000 Karya Umum</option>
                                                    <option value="100 Filsafat">100 Filsafat</option>
                                                    <option value="200 Agama">200 Agama</option>
                                                    <option value="300 Ilmu-ilmu Sosial">300 Ilmu-ilmu Sosial</option>
                                                    <option value="400 Bahasa">400 Bahasa</option>
                                                    <option value="500 Ilmu-ilmu Murni">500 Ilmu-ilmu Murni</option>
                                                    <option value="600 Teknologi">600 Teknologi</option>
                                                    <option value="700 Seni & Olahraga">700 Seni & Olahraga</option>
                                                    <option value="800 Sastra">800 Sastra</option>
                                                    <option value="900 Geografi & Sejarah">900 Geografi & Sejarah
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">File E-Book</label>
                                            <div class="col-sm-4">
                                                <span class="help-block">Silahkan memilih file pdf untuk di
                                                    update</span>
                                                <embed src="" alt="File Pdf" style="margin-bottom: 10px;" /><br />
                                                <input name="file_ebook" type="file" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">File gambar</label>
                                            <div class="col-sm-4">
                                                <img id="edit-gambar_ebook" height="150" width="150" class="img-circle"
                                                    style="border: 3px solid black;" />
                                                <span class="help-block">Silahkan memilih file gambar untuk di
                                                    update</span>
                                                <input name="gambar_ebook" type="file" />
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label class="col-sm-4  control-label"></label>
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
    <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>-->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>

    <!-- jQuery UI 1.10.3 -->
    <script src="assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <script src="assets/js/plugins/chart.js" type="text/javascript"></script>

    <!-- Director App -->
    <script src="assets/js/Director/app.js" type="text/javascript"></script>

    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="assets/js/Director/dashboard.js" type="text/javascript"></script>

    <script src="assets/js/sweetalert2.all.min.js" type="text/javascript"></script>

    <!-- data tabel-->
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <!-- datatable -->
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

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

    <script>
    $(document).ready( function () {
        $('#DataTable_ebook').DataTable();
    } );
    </script>

    <script>
            //tambah kode script
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
                        
                        if(data.status == "berhasil"){ 
                            Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: data.pesan
                            }).then(() => {
                                location.reload();
                            });
                        }
                        else if(data.status == "gagal"){ 
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
                       alert("Error, Coba cek lagi");
                    }
                });

            });

            //modal edit buku
            function OpenModalEdit(id){

                //get existing data
                var formdata = new FormData();
                formdata.append('id', id);
                formdata.append('usage', 'get-data');
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url: 'edit-ebook.php',
                    data:formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        
                        if(data.status == "sukses"){

                            $('#edit-id').val(data.data.id);
                            $('#edit-judul').val(data.data.judul);
                            $('#edit-pengarang').val(data.data.pengarang);
                            $('#edit-tempatdanpenerbit').val(data.data.tempatdanpenerbit);
                            $('#edit-isbn').val(data.data.isbn);
                            $('#edit-jumlahhalaman').val(data.data.jumlahhalaman);
                            $('#edit-kategori').val(data.data.kategori);
                            $('#edit-gambar_ebook').attr("src","sampul_ebook/" + data.data.gambar_ebook)
                            $('#modal_edit').modal('show');
                            
                        }
                        else{
                            alert(data.pesan);
                        }

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert("Error, Coba Cek Lagi");
                    }
                });

            }

            //modal edit save buku
            $("#form_edit_buku").submit(function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                console.log(formData);

                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url: 'update-ebook.php',
                    data:formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        
                        if(data.status == "berhasil"){ 
                            Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: data.pesan
                            }).then(() => {
                                location.reload();
                            });
                        }
                        else if(data.status == "gagal"){ 
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
                       alert("Error, Coba cek lagi");
                    }
                });

            });

    </script>

    <script> 
            $('.delete-link').on('click',function(e){
                e.preventDefault();
                const href = $(this).attr('href')

                swal.fire({
                        icon : 'warning',
                        title: 'Perhatian',
                        text : 'Apakah Anda Ingin Mengahapus Data ini?',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor : '#d33',
                        confirmButtonText : 'Hapus Data',
                        cancelButtonText : 'Batal',
                }).then((result) => {
                    if (result.value){
                        document.location.href = href;
                    }
                });
            });
    </script>

    <script> 
            $('.detail-link').on('click',function(e){
                e.preventDefault();
                const href = $(this).attr('href')

                Swal.fire({
                title: '<strong>Detail E-book</strong>',
                type: 'info',
                Url: 'detail-ebook.php',
                showCloseButton: true,
                focusConfirm: false,
                
            });
        });
    </script>
</body>

</html>