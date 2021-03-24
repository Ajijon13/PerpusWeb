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
    <meta name="keywords" content="Smpn2paciran">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="logo1.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="logo1.png"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>


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
    <header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
                    <img src="images/logo/logoperpus.png" alt="" class="img-fluid" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
						<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdown-a"
                                data-toggle="dropdown">Profil</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="profil.php">Profil Perpustakaan </a>
                                <a class="dropdown-item" href="visimisi.php">Visi & Misi </a>
                                <a class="dropdown-item" href="struktur.php">Struktur Organisasi </a>
                                <a class="dropdown-item" href="tatatertib.php">Tata Tertib </a>
                                <a class="dropdown-item" href="prestasi.php">Prestasi </a>
                            </div>
                        </li>
						<li class="nav-item dropdown ">
							<a class="nav-link dropdown-toggle" href="" id="dropdown-a" data-toggle="dropdown">Buku Digital</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="ebook.php">E-book </a>
								<a class="dropdown-item" href="hosting.html">Buku Paket </a>
							</div>
                        </li>
                        <li class="nav-item dropdown active">
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
								<a class="dropdown-item" href="kcetak.php">Koleksi Cetak & Non Cetak </a>
							</div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri </a></li>
						<li class="nav-item"><a class="nav-link" href="kontak.html">Kontak</a></li>
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
			    <h1>Studi Banding</h1>
            </div>
        </div>
	</div>


    <div id="hosting" class="section wb" style="background: rgb(248, 248, 248)">
        <div class="container">
            <div class="section-title text-center">
            <h3>Kunjungan Masuk</h3>
                <p class="lead">SMPN 2 Paciran telah melaksanakan Studi Banding perpustakaan sebagai wujud peningkatan
                    layanan perpustakaan.</p>
            </div><!-- end title -->
            <?php
                $query="select * from studibanding where kunjungan='masuk'";
                $tampil=mysql_query($query) or die(mysql_error());
            ?>
            <div class="row dev-list text-center">
            <?php while($data=mysql_fetch_array($tampil)){ 
            ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="pricing-table pricing-table-highlighted">
                        <div class="widget server clearfix">
                            <img src="admin/gambar_studi/<?php echo $data['gambar_studi']; ?>" class="img-fluid img-rounded">
                        
                        <hr>

                        <div class="inner-dit">
                     
                            <p><?php echo $data['keterangan']; ?></p>
                   
                        </div>
                    </div>
                </div><!--widget -->
            </div><!-- end col -->
            <?php   
                } 
            ?>
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