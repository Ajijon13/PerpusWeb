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
<link rel="shortcut icon" href="images/logo/logop.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/logo/logop.png">

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
<link rel="stylesheet" href="admin/assets/fancybox/dist/jquery.fancybox.min.css">
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

	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="../index.php">
					<img src="images/logo/logoperpus.png" alt="" class="img-fluid" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host"
					aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Beranda</a></li>
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
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="" id="dropdown-a" data-toggle="dropdown">Koleksi
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="ebook.php">E-book </a>
								<a class="dropdown-item" href="buku.php">Buku Paket </a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Studi
								Banding</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="studibkeluar.php">Kunjungan Keluar </a>
								<a class="dropdown-item" href="studibmasuk.php">Kunjungan Masuk </a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a"
								data-toggle="dropdown">Fasilitas</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="inovlayanan.php">Inovasi Layanan </a>
								<a class="dropdown-item" href="layanan.php">Layanan </a>
								<a class="dropdown-item" href="kcetak.php">Koleksi Cetak & Non Cetak</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="galeri.php">Galeri </a></li>
						<li class="nav-item"><a class="nav-link" href="kontak.html">Kontak</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a class="hover-btn-new log" href="login.html"><span>Admin Login</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('images/foto1.png');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-right">
									<div class="big-tagline">
										<h2 class="animate__animated animate__fadeInDown">Selamat Datang Di<strong>
												Perpustakaan</strong></h2>
										<p class="lead">SMPN 2 PACIRAN Pondok Pesantren Sunan Drajat </p>
									</div>
								</div>
							</div><!-- end row -->
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/foto4.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-left">
									<div class="big-tagline">
										<h3 data-animation="animated zoomInRight"><strong>PERPUSTAKAAN </strong> ADALAH
											JANTUNG SEKOLAH</h3>
									</div>
								</div>
							</div><!-- end row -->
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/foto6.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight"><strong><i>"NO GAIN WITHOUT
													PAIN"</i></strong></h2>
									</div>
								</div>
							</div><!-- end row -->
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<div id="overviews" class="section wb">
	<?php
                $query="select * from berita";
                $tampil=mysql_query($query) or die(mysql_error());
    ?>
		<div class="container">
			<div class="card" style="width:400px">
			<?php while($data=mysql_fetch_array($tampil)){ 
            ?>
				<img class="card-img-top" src=admin/gambar_berita/<?php echo $data['gambar_berita']; ?> alt="Card image" style="width:100%">
				<div class="card-body">
					<h4 class="card-title"><?php echo $data['judul']; ?></h4>
					<p class="card-text"><?php echo $data['keterangan']; ?></p>
					<a href="#" class="btn btn-primary">See Profile</a>
				</div>
			
			</div>
			<?php   
                } 
            ?>
			<div class="container">
				<div class="section-title row text-center">
					<div class="col-md-8 offset-md-2">
						<h3>Renovasi Ruangan</h3>
					</div>
				</div><!-- end title -->

				<hr class="invis">
				<?php
                $query="select * from berita";
                $tampil=mysql_query($query) or die(mysql_error());
            ?>
				<div class="row">
					<?php while($data=mysql_fetch_array($tampil)){ 
            ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<img src="admin/gambar_berita/<?php echo $data['gambar_berita']; ?>" width="200px"
							float="center">
						<hr>

						<p><?php echo $data['keterangan']; ?></p>


					</div><!-- end col -->
					<?php   
                } 
            ?>
					<hr class="hr3">

				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end section -->


		<section class="page-section">
			<div class="container">
				<div class="section-title row text-center">
				</div><!-- end title -->

			</div>
		</section>

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
		<script src="js/timeline.min.js"></script>
		<script src="admin/assets/fancybox/dist/jquery.fancybox.min.js"></script>
		<script>
			timeline(document.querySelectorAll('.timeline'), {
				forceVerticalMode: 700,
				mode: 'horizontal',
				verticalStartPosition: 'left',
				visibleItems: 4
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$(".fancybox").fancybox();
			});
		</script>
</body>

</html>