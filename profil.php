<?php 
	include "/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Perpustakaan SMPN 2 Paciran</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="logo1.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="logo1.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="table.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 
    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	

    <!-- Start header -->
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="logo.png" alt="" class="img-fluid" width="250px" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
						<li class="nav-item active"><a class="nav-link" href="profil.php">Profil</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="" id="dropdown-a" data-toggle="dropdown">Koleksi</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="ebook.php">E-book </a>
								<a class="dropdown-item" href="hosting.html">Buku Paket </a>
							</div>
                        </li>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Studi Banding</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="studibkeluar.php">Kunjungan Keluar </a>
								<a class="dropdown-item" href="studibmasuk.php">Kunjungan Masuk </a>
							</div>
                        </li>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Fasilitas</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="inovlayanan.php">Inovasi Layanan </a>
								<a class="dropdown-item" href="layanan.php">Layanan </a>
                                <a class="dropdown-item" href="kcetak.php">Koleksi Cetak & Non Cetak</a>
							</div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri </a></li>
						<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log" href="login.html" ><span>Admin Login</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<div class="all-title-box">
        <div class="all-title-box-tembus">
		<div class="container text-center">
			<h1>Profil Perpustakaan</h1>
        </div>
    </div>
	</div>
	
    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Profil</h3>
                        <div class="section-title row text-left">
                            <?php
                            $query= mysql_query("SELECT * FROM profil");
                            $tampil  = mysql_fetch_array($query);
                            ?>
                <div class="panel-body table-responsive">
                <table class="table table-hover table-bordered">
                    <tr>
                    <th width="450">Nama Perpustakaan</th>
                    <td width="550"><?php echo $tampil['namaperpus']; ?></td>
                    </tr>
                    <th>Alamat</th>
                    <td><?php echo $tampil['alamat']; ?></td>
                    </tr>
                    <tr>
                    <th>Kecamatan</th>
                    <td><?php echo $tampil['kec']; ?></td>
                    </tr>
                    <tr>
                    <th>Kabupaten</th>
                    <td><?php echo $tampil['kab']; ?></td>
                    </tr>
                    <th>Provinsi</th>
                    <td><?php echo $tampil['prov']; ?></td>
                    </tr>
                    <tr>
                    <th>Nomor Telepon/HP</th>
                    <td><?php echo $tampil['nomor']; ?></td>
                    </tr>
                    <tr>
                    <th>Web-Site/E-mail</th>
                    <td><?php echo $tampil['webe']; ?></td>
                    </tr>
                    <th>Status Perpustakaan</th>
                    <td><?php echo $tampil['status']; ?></td>
                    </tr>
                    <tr>
                    <th>SK Perpustakaan</th>
                    <td><?php echo $tampil['sk']; ?></td>
                    </tr>
                    <tr>
                    <th>Tahun Didirikan/Operasi</th>
                    <td><?php echo $tampil['tahun']; ?></td>
                    </tr>
                    <th>NSS/NPSN</th>
                    <td><?php echo $tampil['npsn']; ?></td>
                    </tr>
                    <tr>
                    <th>Luas Tanah</th>
                    <td><?php echo $tampil['luas']; ?></td>
                    </tr>
                    <tr>
                    <th>No Induk Perpustakaan</th>
                    <td><?php echo $tampil['no_i']; ?></td>
                    </tr>
                    <th>Nama Kepala Sekolah</th>
                    <td><?php echo $tampil['namaks']; ?></td>
                    </tr>
                    <tr>
                    <th>Nama Kepala Perpustakaan</th>
                    <td><?php echo $tampil['namakp']; ?></td>
                    </tr>
                    <tr>
                    <th>No. SK Kepala Perpustakaan</th>
                    <td><?php echo $tampil['nosk']; ?></td>
                </table>
                </div>
                </div>
                </div>
            </div><!-- end title -->
        
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                    <?php
                    $query = mysql_query("SELECT * FROM visimisi");
                    $tampil  = mysql_fetch_array($query);
                    ?>    
                        <br><br><br>
                        <h2><center>Visi</center></h2>
                        <textarea disabled="disabled" class="isitext" style="height:100px; width:550px;"><?php echo $tampil['visi']; ?></textarea> 
                        <h2><center>Misi</center></h2>
                        <textarea disabled="disabled" class="isitext" style="height:520px; width:550px; "><?php echo $tampil['misi']; ?></textarea>
                
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/foto1.png" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/foto3.png" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                    <?php
                    $query = mysql_query("SELECT * FROM tatatertib");
                    $tampil  = mysql_fetch_array($query);
                    ?>    
                        <h2><center>Tata Tertib</center></h2>
                        <textarea disabled="disabled" class="isitext" style="height:300px; width: 550px;" ><?php echo $tampil['t_tertib']; ?></textarea>
                        
                    </div><!-- end messagebox -->
                </div><!-- end col -->
          
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                    <?php
                    $query = mysql_query("SELECT * FROM struktur");
                    $tampil  = mysql_fetch_array($query);
                    ?>    
                       <h1>STRUKTUR ORGANISASI</h1>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <br><br><br>
                        <div style="box-shadow:5px 5px 5px grey;">
                     <img src="admin/gambar/<?php echo $tampil['gambar']; ?>" alt="" class="img-fluid img-rounded">
                        </div>    
                </div><!-- end media -->
                </div><!-- end col -->
			</div>
                
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('images/parallax_04.jpg');">
        <div class="container">
            <div class="section-title text-center">
                <h3>PRESTASI</h3>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="testi-carousel owl-carousel owl-theme">
                        <div class="testimonial clearfix">
                            <div class="desc">
                            <?php
                                $query = mysql_query("SELECT * FROM prestasi where id='1'");
                                $tampil  = mysql_fetch_array($query);
                            ?>    
                                <h3><?php echo $tampil['keterangan'];?></h3>
                            </div>
                            <div class="testi-meta">
                            <img src="admin/gambar/<?php echo $tampil['gambar_prestasi'];?>">
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
                            <div class="desc">
                            <?php
                                $query = mysql_query("SELECT * FROM prestasi where id='2'");
                                $tampil  = mysql_fetch_array($query);
                            ?>    
                                <h3><?php echo $tampil['keterangan'];?></h3>
                            </div>
                            <div class="testi-meta">
                            <img src="admin/gambar/<?php echo $tampil['gambar_prestasi'];?>">
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
                            <div class="desc">
                            <?php
                                $query = mysql_query("SELECT * FROM prestasi where id='3'");
                                $tampil  = mysql_fetch_array($query);
                            ?>    
                                <h3><?php echo $tampil['keterangan'];?></h3>
                            </div>
                            <div class="testi-meta">
                            <img src="admin/gambar/<?php echo $tampil['gambar_prestasi'];?>">
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->
                        <div class="testimonial clearfix">
                            <div class="desc">
                            <?php
                                $query = mysql_query("SELECT * FROM prestasi where id='4'");
                                $tampil  = mysql_fetch_array($query);
                            ?>    
                                <h3><?php echo $tampil['keterangan'];?></h3>
                            </div>
                            <div class="testi-meta">
                            <img src="admin/gambar/<?php echo $tampil['gambar_prestasi'];?>">
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
                            <div class="desc">
                            <?php
                                $query = mysql_query("SELECT * FROM prestasi where id='5'");
                                $tampil  = mysql_fetch_array($query);
                            ?>    
                                <h3><?php echo $tampil['keterangan'];?></h3>
                            </div>
                            <div class="testi-meta">
                            <img src="admin/gambar/<?php echo $tampil['gambar_prestasi'];?>">
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
                            <div class="desc">
                            <?php
                                $query = mysql_query("SELECT * FROM prestasi where id='6'");
                                $tampil  = mysql_fetch_array($query);
                            ?>    
                                <h3><?php echo $tampil['keterangan'];?></h3>
                            </div>
                            <div class="testi-meta">
                            <img src="admin/gambar/<?php echo $tampil['gambar_prestasi'];?>">
                            </div>
                            <!-- end testi-meta -->
                        </div><!-- end testimonial -->
                    </div><!-- end carousel -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">samuderaillmu0@gmail.com</a></li>
                            <li><a href="#">www.smpn2paciran.sch.id</a></li>
                            <li>Komplek Pondok Pesantern Sunan Drajad</li>
                            <li>+61 3 8376 6284</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">                   
                    <p class="footer-company-name"> &copy; 2020 Perpustakaan SMPN 2 Paciran </a></p>
                </div>

                <div class="footer-right">
                    <ul class="footer-links-soi">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-github"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul><!-- end links -->
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

</body>
</html>