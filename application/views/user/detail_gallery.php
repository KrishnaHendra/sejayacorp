<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<!-- Favicons -->
	<link href="<?= base_url(); ?>assets/img/default.png" type="image/png" rel="icon">
	<link href="<?= base_url(); ?>assets/img/default.png" type="image/png" rel="apple-touch-icon">
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
	<main id="main">
		<!--==========================
      About Section
    ============================-->
		<section id="about">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2>Syncronize's Gallery</h2>
						<p>There are our past event</p>
					</div>
				</div>
			</div>
		</section>
		<?php foreach ($event as $e) { ?>
		<section id="lineup" class="wow fadeInUp">
			<div class="container">
				<div class="section-header">
					<h2><?= $e->nama_event; ?></h2>
					<p class="text-danger"><?= $e->venue; ?></p>
					<p><?= $e->tanggal; ?></p>
				</div>
				<div class="">
				<div class="header">
					<h3 class="text-center mb-3">Guest Star</h3>
				</div>
				<div class="row" id="<?= $e->id_event; ?>">
					<?php foreach ($guest as $g) {
						if($e->id_event == $g->id_event){ ?>
					<div class="col-lg-4 col-md-6">
						<div class="guest">
								<img src="<?php echo base_url('/assets/images/gs/'.$g->gambar) ?>" alt="Speaker 1"
									class="img-fluid-guest">
							
							<div class="details">
								<h3><a href="<?= base_url('home/lineup'); ?>"><?= $gs['nama_guest']; ?></a></h3>
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
					<?php }} ?>
				</div>
			</div>

			<div class="mt-2">
			<div class="header mb-2">
				<h3 class="text-center mb-3">Gallery</h3>
			</div>
			<div class="row" id="<?= $e->id_event; ?>">
				<?php foreach ($gambar as $a) {
					if($e->id_event == $a->id_event){ ?>
				<div class="col-lg-3 col-md-6">
					<div class="guest">
							<img src="<?php echo base_url('/assets/images/galeri/'.$a->gambar) ?>" width="300" height="200">
				</div>
			</div>
						<?php } } ?>
		</div>

	</div>
		</section>
		<?php  } ?>

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
							<strong>Anita Linda 	:</strong> +62 813-3385-8993 <br>
							<strong>Fahmi Rizky 	:</strong> +62 813-8288-7747 <br>
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
