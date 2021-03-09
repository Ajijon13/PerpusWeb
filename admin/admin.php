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
   <link rel="stylesheet" type="text/css" href="assets/DataTables-Savage/datatables.min.css"/>
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
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-header text-center">Akun</li>

                            <li>
                                <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>">
                                    <i class="fa fa-user fa-fw pull-right"></i>
                                    Profil
                                </a>
                                <a href="admin.php">
                                    <i class="fa fa-cog fa-fw pull-right"></i>
                                    pengaturan
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> keluar</a>
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
                                <b>Data Admin</b>

                            </header>
                            <div class="text-left" style="margin-top: 10px;">
                                &nbsp; <a href="berita.php" class="btn btn-sm btn-warning">Refresh</a>  
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal_tambah_admin">Tambah Admin</a>
                            </div>

                            <!-- Modal -->
                            <div id="modal_tambah_admin" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Tambah Admin</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form-horizontal style-form" style="margin-top: 20px;"
                                                id="form_tambah_admin">

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">User ID</label>
                                                    <div class="col-sm-8">
                                                        <input name="user_id" type="text" id="user_id" class="form-control" placeholder="User ID"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">Username</label>
                                                    <div class="col-sm-8">
                                                        <input name="username" type="text" id="username" autocomplete="off" class="form-control" placeholder="Nama " required />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">Password</label>
                                                    <div class="col-sm-8">
                                                        <input name="password" type="password" id="password" autocomplete="off" class="form-control" placeholder="password" required />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">Fullname</label>
                                                    <div class="col-sm-8">
                                                    <input name="fullname" class="form-control" id="fullname" autocomplete="off" type="text" placeholder="Nama Lengkap" required />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">Pilih Gambar</label>
                                                    <div class="col-sm-8">
                                                        <input name="gambar_admin" type="file" accept="image/*"/>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="margin-bottom: 20px;">
                                                    <label class="col-sm-3 control-label text-right"></label>
                                                    <div class="col-sm-8">
                                                        <button id="button_tambah_admin" type="submit"
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
                    $query1="select * from admin";
                    $tampil=mysql_query($query1) or die(mysql_error());
                    ?>
                                <table id="myTabel" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>User ID</center>
                                            </th>
                                            <th>
                                                <center>Username</center>
                                            </th>
                                            <th>
                                                <center>Password</center>
                                            </th>
                                            <th>
                                                <center>Full Name</center>
                                            </th>
                                            <th>
                                                <center>Foto Admin</center>
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
                                            <td><?php echo $data['user_id']; ?></td>
                                            <td><?php echo $data['username'];?></td>
                                            <td><?php echo $data['password'];?></td>
                                            <td><a href="detail-admin.php?hal=edit&kd=<?php echo $data['user_id'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['fullname']; ?></a></td>
                                            <td><center><img src="gambar_admin/<?php echo $data['gambar_admin']; ?>" height="100" width="100" style="border: 1px solid #333333;" />
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                        
                                                    <a class="btn btn-sm btn-primary"
                                                        data-placement="bottom"
                                                        title="Edit Admin"
                                                        onclick="OpenModalEdit(<?php echo $data['user_id'];?>);">
                                                        <span>Edit</span>
                                                    </a>
                                                    <a  class="delete-link" 
                                                        data-placement="bottom" 
                                                        title="Hapus Admin"
                                                        href="hapus-admin.php?hal=hapus&kd=<?php echo $data['user_id'];?>" data-placement="bottom">
                                                        <span class="btn btn-sm btn-danger" >Hapus</span></a>
                                                </center>
                                            </td>
                                        </tr>

                            <?php   
              } 
              ?>
                            </tbody>
                            </table>

                            <?php $tampil=mysql_query("select * from admin order by user_id");
                                $admin=mysql_num_rows($tampil);
                            ?>
                            <center>
                                <h4>Jumlah Admin : <?php echo "$admin"; ?> </h4>
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
                    <h4 class="modal-title">Edit Admin</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-14">
                            <div class="panel">
                                <div class="panel-body">
                                    <form class="form-horizontal style-form" style="margin-top: 20px;"
                                        id="form_edit_admin">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <input name="user_id" type="hidden" id="edit-user_id" class="form-control"
                                                    autocomplete="off" value="" required="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" col-sm-3 control-label">Username</label>
                                            <div class="col-sm-8">
                                                <input name="username" type="text" id="edit-username" class="form-control"
                                                    autocomplete="off" value="" required="" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" col-sm-3 control-label">Password</label>
                                            <div class="col-sm-8">
                                                <input name="password" type="password" id="edit-password" class="form-control"
                                                    autocomplete="off" value="" required="" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class=" col-sm-3 control-label">Full Name</label>
                                            <div class="col-sm-8">
                                                <input name="fullname" type="text" id="edit-fullname" class="form-control"
                                                    autocomplete="off" value="" required="" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Foto</label>
                                            <div class="col-sm-8">
                                                <img id="edit-gambar_admin" height="150" width="150" class="img-circle"
                                                    style="border: 3px solid black;" />
                                                <span class="help-block">Silahkan memilih file gambar untuk di
                                                    update</span>
                                                <input name="gambar_admin" type="file" accept="image/*" />
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
    <script>
        $(document).ready(function(){
            $('#myTabel').DataTable( {
                language: {
                    url: 'assets/DataTables-Savage/Indonesian.json'
                }
            });
        });
    </script>
    <script>
            //tambah kode script
            //modal tambah admin
            $("#form_tambah_admin").submit(function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                console.log(formData);

                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url: 'upload-admin.php',
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
                       alert("Error, mohon hubungi admin");
                    }
                });

            });

            //modal edit admin
            function OpenModalEdit(user_id){

                //get existing data
                var formdata = new FormData();
                formdata.append('user_id', user_id);
                formdata.append('usage', 'get-data');
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url: 'edit-admin.php',
                    data:formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        
                        if(data.status == "sukses"){

                            $('#edit-user_id').val(data.data.user_id);
                            $('#edit-username').val(data.data.username);
                            $('#edit-password').val(data.data.password);
                            $('#edit-fullname').val(data.data.fullname);
                            $('#edit-gambar_admin').attr("src","gambar_admin/" + data.data.gambar_admin);
                            $('#modal_edit').modal('show');
                            
                        }
                        else{
                            alert(data.pesan);
                        }

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert("Error, mohon hubungi admin");
                    }
                });

            }

            //modal edit save admin
            $("#form_edit_admin").submit(function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                console.log(formData);

                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url: 'update-admin.php',
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
                       alert("Error, mohon hubungi admin");
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

</body>

</html>