<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Syncronize</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicons -->
	<link href="<?= base_url(); ?>assets/img/favicon.png" rel="icon">
	<link href="<?= base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
	<header id="header" class="header-fixed">
		<div class="container mt-3">

			<div id="logo" class="pull-left">
				<!-- Uncomment below if you prefer to use a text logo -->
				<!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
				<a href="index.html#intro" class="scrollto"><img src="<?= base_url(); ?>assets/img/logo/logo sync white.png" alt=""
						title=""></a>
			</div>


		</div>
	</header><!-- #header -->

	<main id="main" class="main-page">

		<!--==========================
      Speaker Details Section
    ============================-->
		<section id="speakers-details" class="wow fadeIn">
			<div class="container">
				<div class="section-header">
					<h2>Line Up Details</h2>
				</div>
				<?php foreach ($guest_detail as $gs) : ?>
				<div class="row">
					<div class="col-md-6">
					<img src="<?= base_url(); ?>assets/images/gs/<?= $gs['gambar'] ?>" alt="Speaker 1" class="img-fluid" width="400px" height="200px">
					</div>
         
					<div class="col-md-6">
						<div class="details">
              <h2><?= $gs['nama_guest']; ?></h2>
              <hr>
							<p class="lineup-plus text-white"><?= $gs['deskripsi']; ?></p>
              <div class="social ">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
						</div>
					</div>
          <?php endforeach; ?>
				</div>
			</div>

		</section>

	</main>


	<!--==========================
    Footer
  ============================-->
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">

					<div class="col-lg-3 col-md-6 footer-info">
						<img src="<?php base_url(); ?>assets/img/logo.png" alt="TheEvenet">
						<p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro.
							Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore
							consequatur ad voluptate cupiditate debitis accusamus repellat cumque.</p>
					</div>

					<div class="col-lg-3 col-md-6 footer-links">
						<h4>Useful Links</h4>
						<ul>
							<li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
						</ul>
					</div>

					<div class="col-lg-3 col-md-6 footer-links">
						<h4>Useful Links</h4>
						<ul>
							<li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
						</ul>
					</div>

					<div class="col-lg-3 col-md-6 footer-contact">
						<h4>Contact Us</h4>
						<p>
							A108 Adam Street <br>
							New York, NY 535022<br>
							United States <br>
							<strong>Phone:</strong> +1 5589 55488 55<br>
							<strong>Email:</strong> info@example.com<br>
						</p>

						<div class="social-links">
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
							<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
							<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
						</div>

					</div>

				</div>
			</div>
		</div>

		<div class="container">
			<div class="copyright">
				&copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
			</div>
			<div class="credits">
				<!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
				Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
