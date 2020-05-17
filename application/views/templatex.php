<?php
	foreach ($konten as $main ) {
		$logo = $main['logo_event'];
		$about = $main['about_event'];
		$venue = $main['venue'];
		$location = $main['location_venue'];
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<!-- Favicons -->
	<link href="<?= base_url(); ?>assets/img/default.png" type="image/png" rel="icon">
	<link href="<?= base_url(); ?>assets/img/default.png" type="image/png" rel="apple-touch-icon">
	<link href="<?= base_url(); ?>assets/fontawesome/css/all.css" rel="stylesheet">
	<!--load all styles -->
	<title>Syncronize</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">


	<!-- Google Fonts -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet"> -->

	<!-- Bootstrap CSS File -->
	<link href="<?= base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="<?= base_url(); ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/lib/animate/animate.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/lib/venobox/venobox.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!-- Main Stylesheet File -->
	<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

	<!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

	<!--==========================
    Header
  ============================-->
	<header id="header">
		<div class="container">

			<div id="logo" class="pull-left">
				<a href="#intro" class="scrollto">
					<img src="<?= base_url(); ?>assets/img/logo/logo sync white.png" alt="" title="">
				</a>
			</div>

			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li><a href="#intro">Home</a></li>
					<li class="about"><a href="#about">About</a></li>
					<li><a href="#lineup">Line Up</a></li>
					<li><a href="#schedule">Schedule</a></li>
					<li><a href="#venue">Venue</a></li>
					<li><a href="#history">History</a></li>
					<li><a href="#supporters">Sponsors</a></li>
					<li><a href="#footer">Contact</a></li>
					<li>
						<a data-toggle="dropdown">
							<i class="fa fa-user"></i>
						</a>
						<?php if (!isset($_SESSION['logged_in'])) { ?>
						<ul class="profil">
							<li>
								<a href="<?= base_url('login') ?>" class="btn btn-outline-danger">
									LOGIN
								</a>
							</li>
						</ul>
						<?php } else { ?>
						<ul class="profil">
							<li>
								<a href="<?= base_url('home/profil') ?>">
									<i class="feather icon-user"></i> Profile
								</a>
							</li>
							<li>
								<a href="<?= base_url('login/logout') ?>">
									<i class="feather icon-log-out"></i> Logout
								</a>
							</li>
						</ul>
						<?php } ?>
					</li>
				</ul>
			</nav><!-- #nav-menu-container -->
		</div>
	</header><!-- #header -->

	<!--==========================
    Intro Section
  	============================-->
	<section id="intro">
		<div class="intro-container wow fadeIn">
			<img class="pb-0 event-img" src="<?= base_url(); ?>assets/img/logo/<?= $logo; ?>" alt="" title="" height="400px">
			<p class="mb-4 pb-0">21 Februari 2019, Graha Cakrawala Universitas Negeri Malang</p>
			<a href="www.youtube.com" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
			<a href="#about" class="about-btn scrollto">About The Event</a>
		</div>
	</section>


	<main id="main">

		<!--==========================
      About Section
    ============================-->
		<section id="about">
			<div class="container wow fadeInUp">
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-5 pl-4">
						<h2>About The Event</h2>
						<p><?= $about; ?></p>
					</div>
					<div class="col-lg-3 pl-4">
						<h3>Where</h3>
						<p><?= $venue; ?></p>
					</div>
					<div class="col-lg-3 pl-4">
						<h3>When</h3>
						<p>Friday,<br>21 Februari 2020</p>
					</div>
				</div>
			</div>
		</section>

		<!--==========================
      Line Up Section
  	  ============================-->
		<section id="lineup" class="wow fadeInUp">
			<div class="container">
				<div class="section-header">
					<h2>line up</h2>
					<p>Here are some of our line up</p>
				</div>

				<div class="row">
					<?php foreach ($guest as $gs) : ?>
					<div class="col-lg-4 col-md-6">
						<div class="guest">
							<a href="<?= base_url(); ?>home/lineup/<?= $gs['id_guest'] ?>">
								<img src="<?= base_url(); ?>assets/images/gs/<?= $gs['gambar'] ?>" alt="Speaker 1"
									class="img-fluid-guest">
							</a>
							<div class="details">
								<h3><a href="<?= base_url('home/lineup'); ?>/<?= $gs['id_guest'] ?>"><?= $gs['nama_guest']; ?></a></h3>
								<p><?= $gs['genre']; ?></p>
								<div class="social">
									<a href=""><i class="fa fa-twitter"></i></a>
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-google-plus"></i></a>
									<a href=""><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

		</section>

		<!--==========================
      Schedule Section
    ============================-->




		<section id="schedule" class="section-with-bg">
			<div class="container wow fadeInUp">
				<div class="section-header">
					<h2>Event Schedule</h2>
					<p>Here is our event schedule</p>
				</div>

				<ul class="nav nav-tabs" role="tablist">
					<?php foreach ($jadwal as $j) : ?>
					<li class="nav-item">
						<a class="nav-link" href="#day-<?= $j['id_jadwal'] ?>" role="tab" data-toggle="tab"
							aria-selected="true">Day <?= $j['hari'] ?></a>
					</li>
					<?php endforeach; ?>
				</ul>

				<div class="tab-content row justify-content-center">
					<?php foreach ($jadwal as $j ) : ?>
					<!-- Schdule Day 1 -->
					<div role="tabpanel" class="col-lg-9 tab-pane fade" id="day-<?= $j['id_jadwal'] ?>">

						<?php foreach ($detail_jadwal as $dj ) {
						if ($j['id_jadwal'] == $dj['id_jadwal']) {
							if ($dj['gambar'] == null) { ?>
								<div class="row schedule-item">
									<div class="col-md-2 mt-3"><time><?= $dj['waktu']; ?></time></div>
									<div class="col-md-10">
										<h4><?= $dj['kegiatan']; ?></h4>
										<p><?= $dj['deskripsi_kegiatan']; ?></p>
									</div>
								</div>
						<?php } else { ?>
						<div class="row schedule-item">
							<div class="col-md-2 mt-3"><time><?= $dj['waktu']; ?></time></div>
							<div class="col-md-10">
								<div class="guest">
									<img class="" src="<?= base_url(); ?>assets/img/default.png">
								</div>
								<h4><?= $dj['kegiatan']; ?></h4>
								<p><?= $dj['deskripsi_kegiatan']; ?></p>
							</div>
						</div>
						<?php } } }	 ?>
					</div>

					<!-- End Schdule Day 1 -->
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<!--==========================
      Venue Section
    ============================-->
		<section id="venue" class="wow fadeInUp">

			<div class="container-fluid">

				<div class="section-header">
					<h2>Event Venue</h2>
					<p>Event venue location info and gallery</p>
				</div>

				<div class="row no-gutters">
					<div class="col-lg-6 venue-map">
						<iframe src="<?= $location; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>

					<div class="col-lg-6 venue-info">
						<div class="row justify-content-center">
							<div class="col-11 col-lg-8">
								<h3><?= $venue; ?></h3>
								<p>Gedung Graha Cakrawala Universitas Negeri Malang</p>
							</div>
						</div>
					</div>
				</div>

			</div>

		</section>

		<!--==========================
      Buy Ticket Section
    ============================-->
		<section id="buy-tickets" class="section-with-bg wow fadeInUp">
			<div class="container">

				<div class="section-header">
					<h2>Buy Tickets</h2>
					<p>Buy the ticket and join the festival.</p>
				</div>

				<div class="row">
					<?php foreach ($tiket as $tkt ) :
					if ($tkt < 2) { ?>
					<div class="col-lg-12 mt-3">
						<div class="tiket">
							<b><?= $tkt['kelas']; ?></b> <br>
							<?= $tkt['harga']; ?> <br>
							<button type="button" class="btn btn-outline-light mt-2" data-toggle="modal"
								data-target="#buy-ticket-modal<?= $tkt['id_tiket'] ?>">
								Beli
							</button>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-lg-6">
						<div class="tiket mb-1">
							<b><?= $tkt['kelas']; ?></b>
							<br>
							<?= $tkt['harga']; ?> <br>
							<br>
							<button type="button" class="btn btn-outline-primary" data-toggle="modal"
								data-target="#buy-ticket-modal<?= $tkt['id_tiket'] ?>">
								Beli
							</button>
						</div>
					</div>
					<?php } endforeach; ?>
				</div>

			</div>
			<?php foreach ($tiket as $tkt) : ?>

			<!-- Modal Order Form -->
			<div id="buy-ticket-modal<?= $tkt['id_tiket'] ?>" class="modal fade">
				<div class="modal-dialog " role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 style="color: navy !important;" class="modal-title">Buy Tickets</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="<?= base_url('home/add_item/'.$tkt['id_tiket']) ?>">
								<div>
									<small class="mb-2 text-danger">*Maksimal pembelian 5 tiket</small>
									<input class="form-control mb-3" placeholder="Masukan Jumlah Tiket" type="number"
										min="1" max="5" name="qty" required>
								</div>
								<div class="text-center">
									<button type="submit" class="btn">Buy Now</button>
								</div>
							</form>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<?php ;endforeach ?>

		</section>

		<!--==========================
      Gallery Section
    ============================-->
		<section id="history" class="wow fadeInUp">

			<div class="container">
				<div class="section-header">
					<h2>History</h2>
					<p>Check our gallery from the recent events</p>
				</div>
			</div>

			<div class="owl-carousel gallery-carousel">
				<a href="<?= base_url(); ?>assets/img/default.png" class="venobox" data-gall="gallery-carousel"><img
						src="<?= base_url(); ?>assets/img/default.png" alt=""></a>
				<a href="<?= base_url(); ?>assets/img/default.png" class="venobox" data-gall="gallery-carousel"><img
						src="<?= base_url(); ?>assets/img/default.png" alt=""></a>
				<a href="<?= base_url(); ?>assets/img/default.png" class="venobox" data-gall="gallery-carousel"><img
						src="<?= base_url(); ?>assets/img/default.png" alt=""></a>
				<a href="<?= base_url(); ?>assets/img/default.png" class="venobox" data-gall="gallery-carousel"><img
						src="<?= base_url(); ?>assets/img/default.png" alt=""></a>
				<a href="<?= base_url(); ?>assets/img/default.png" class="venobox" data-gall="gallery-carousel"><img
						src="<?= base_url(); ?>assets/img/default.png" alt=""></a>
				<a href="<?= base_url(); ?>assets/img/default.png" class="venobox" data-gall="gallery-carousel"><img
						src="<?= base_url(); ?>assets/img/default.png" alt=""></a>
				<a href="<?= base_url(); ?>assets/img/default.png" class="venobox" data-gall="gallery-carousel"><img
						src="<?= base_url(); ?>assets/img/default.png" alt=""></a>
				<a href="<?= base_url(); ?>assets/img/default.png" class="venobox" data-gall="gallery-carousel"><img
						src="<?= base_url(); ?>assets/img/default.png" alt=""></a>
			</div>
			<div class="detail-content mt-3">
				<a href="<?= base_url('home/detail_gallery') ?>" class="detail">See More</a>
			</div>

		</section>

		<!--==========================
      Sponsors Section
    ============================-->
		<section id="supporters" class="section-with-bg wow fadeInUp">

			<div class="container">
				<div class="section-header">
					<h2>Sponsors</h2>
				</div>
				<div class="row no-gutters supporters-wrap clearfix">
					<?php foreach ($sponsor as $s ) : ?>
					<div class="col-lg-3 col-md-4 col-xs-6">
						<div class="supporter-logo">
							<img src="<?= base_url(); ?>assets/images/sponsor/<?= $s['logo_sponsor'] ?>"
								class="img-fluid-sponsor">

						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

		</section>

		<!--==========================
      F.A.Q Section
    ============================-->
		<section id="faq" class="wow fadeInUp">

			<div class="container">

				<div class="section-header">
					<h2>F.A.Q </h2>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-9">
						<?php foreach ($faq as $f ) : ?>
						<ul id="faq-list">
							<li>
								<a data-toggle="collapse" class="collapsed" href="#faq1"> <?= $f['pertanyaan'] ?>
									<i class="fa fa-minus-circle"></i></a>
								<div id="faq1" class="collapse" data-parent="#faq-list">
									<p>
										<?= $f['jawaban']; ?>
									</p>
								</div>
							</li>
						</ul>
						<?php endforeach; ?>
					</div>
				</div>

			</div>

		</section>

		<!--==========================
      Subscribe Section
    ============================-->

	</main>

	<!--==========================
    Footer
  ============================-->
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">

					<div class="col-lg-5 col-md-6 footer-info">
						<img src="<?= base_url(); ?>assets/img/logo/logo sync white.png" alt="" title="">
						<p> <i>Deskripsi Event.</i></p>
						<div class="social-links mt-3">
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
							<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
							<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 footer-links">
						<h4>Useful Links</h4>
						<ul>
							<li><i class="fa fa-angle-right"></i> <a href="#home">Home</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
						</ul>
					</div>

					<div class="col-lg-4 col-md-6 footer-contact">
						<h4>Contact Us</h4>
						<p>
							Perumahan Austinville Blok D2 <br> Dieng Atas, Malang - Jawa Timur
							<br><br>
							<strong>Daniel Agustinus :</strong> +62 878-5669-2424 <br>
							<strong>Anita Linda :</strong> +62 813-3385-8993 <br>
							<strong>Fahmi Rizky :</strong> +62 813-8288-7747 <br>
							<strong>Yopi :</strong> +62 821-3693-6984 <br>
						</p>



					</div>

				</div>
			</div>
		</div>

		<div class="container">
			<div class="copyright">
				&copy; Copyright <strong>Syncronize</strong>. All Rights Reserved
			</div>
			<div class="credits">
				<!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
			</div>
		</div>
	</footer><!-- #footer -->

	<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

	<!-- JavaScript Libraries -->
	<script src="<?= base_url(); ?>assets/lib/jquery/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/lib/jquery/jquery-migrate.min.js"></script>
	<script src="<?= base_url(); ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url(); ?>assets/lib/easing/easing.min.js"></script>
	<script src="<?= base_url(); ?>assets/lib/superfish/hoverIntent.js"></script>
	<script src="<?= base_url(); ?>assets/lib/superfish/superfish.min.js"></script>
	<script src="<?= base_url(); ?>assets/lib/wow/wow.min.js"></script>
	<script src="<?= base_url(); ?>assets/lib/venobox/venobox.min.js"></script>
	<script src="<?= base_url(); ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>

	<!-- Contact Form JavaScript File -->
	<script src="<?= base_url(); ?>assets/contactform/contactform.js"></script>

	<!-- Template Main Javascript File -->
	<script src="<?= base_url(); ?>assets/js/main.js"></script>

</body>

</html>
