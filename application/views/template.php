<?php
	foreach ($konten as $main ) {
		$about = $main['about_event'];
		$tanggal = $main['tanggal'];
		$location_venue = $main['location_venue'];
		$venue = $main['venue'];
	}

?>


<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<!-- Favicons -->
	<link href="<?= base_url(); ?>assets/img/default.png" type="image/png" rel="icon">
	<link href="<?= base_url(); ?>assets/img/default.png" type="image/png" rel="apple-touch-icon">
	<link href="<?= base_url(); ?>assets/fontawesome/css/all.css" rel="stylesheet">
	<!--load all styles -->
	<title>Sejayacorp</title>
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
					    <div class="dropdown">
                          <a class="button-profile btn btn-danger text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                          </a>
                        
                          <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLink">
                              <?php if (!isset($_SESSION['logged_in'])) { ?>
                            <a class="dropdown-item text-dark" href="<?= base_url('index.php/log/login') ?>">Login</a>
                            	<?php } else { ?>
                            <a class="dropdown-item text-dark" href="<?= base_url('index.php/user/profil') ?>">Profile</a>
                            <a class="dropdown-item text-dark" href="<?= base_url('index.php/log/logout') ?>">Logout</a>
                            <?php } ?>
                          </div>
                        </div>
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
			<p class="mb-4 pb-0">Next Event : </p>
			<img class="pb-0 event-img" src="<?= base_url(); ?>assets/img/logo/OH NAIS LOGO 2.png" alt="" title=""
				height="390px">
			<a href="https://www.youtube.com/watch?v=UZfF0fKKHsQ" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
			<a href="#buy-tickets" class="about-btn scrollto">Buy Ticket</a>
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
						<p>
							<?php
								$date = date_create($tanggal);
								$tampil = date_format($date, "D, d M Y");
								echo $tampil.'<br>'.$venue;
							?>
						</p>
					</div>
				</div>
			</div>
		</section>

		<!--==========================
      Line Up Section
  	  ============================-->
		<section id="lineup" class="section-with-bg">
			<div class="container wow fadeInUp mt-5">
				<div class="section-header">
					<h2>line up</h2>
					<p>Here are some of our line up</p>
				</div>

				<ul class="nav nav-tabs" role="tablist">
					<?php foreach ($konten as $k) : ?>
					<li class="nav-item mt-3">
						<a class="nav-link" href="#event-<?= $k['id_event']; ?>" role="tab" data-toggle="tab"
							aria-selected="true"><?= $k['nama_event']; ?></a>
					</li>
					<?php endforeach; ?>
				</ul>

				<div class="tab-content row justify-content-center">
					<?php foreach ($konten as $k ) : ?>
					<!-- Schdule Day 1 -->
					<div role="tabpanel" class="col-lg-12 tab-pane fade" id="event-<?= $k['id_event'] ?>">
						<div class="row" style="width: 100% !important;">
						<?php foreach ($guest as $gs ) {
						if ($k['id_event'] == $gs['id_event']) { ?>
						<div class="col-md-4 mt-3">
							<div class="guest">
								<a href="#">
									<img src="<?= base_url(); ?>assets/images/gs/<?= $gs['gambar'] ?>" alt="Speaker 1"
										class="img-fluid-guest">
								</a>
								<div class="details">
									<h3><a
											href="#"><?= $gs['nama_guest']; ?></a>
									</h3>
									<p><?= $gs['genre']; ?></p>
								</div>
							</div>
						</div>
						<?php } } ?>
						</div>
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

			<div class="container-fluid mt-5">

				<div class="section-header">
					<h2>Event Venue</h2>
					<p>Event venue location info and gallery</p>
				</div>

				<div class="row no-gutters">
					<div class="col-lg-6 venue-info">
						<?php foreach ($konten as $k) : ?>
							<div class="row mb-3">
							<div class="col-lg-8 mb-3">
								<h4 style="margin:0;"><?= $k['nama_event'] ?></h4>
								<small class="text-light"><?= $k['venue'] ?></small>
							</div>
							<div class="col-lg-1 ml-1">
								<button type="button" onClick="setMaps(<?= $k['id_event'] ?>)" class="btn btn-outline-danger"><i class="fa fa-map-marker"></i></button>
							</div>
							</div>
							<?php endforeach; ?>
						
					</div>
					<div class="col-lg-6 venue-map">
						<iframe id="maps" src="" frameborder="0" style="border:0;" allowfullscreen></iframe>
					</div>
				</div>

			</div>

		</section>


		<!--==========================
      Schedule Section
    ============================-->

		<section id="schedule" class="section-with-bg">
			<div class="container wow fadeInUp mt-5">
				<div class="section-header">
					<h2>Event Schedule</h2>
					<p>Here is our event schedule</p>
				</div>
				
				<ul class="nav nav-tabs" role="tablist">
					<?php foreach ($konten as $k) : ?>
					<li class="nav-item mt-3">
						<a class="nav-link" href="#day-<?= $k['id_event']; ?>" role="tab" data-toggle="tab"
							aria-selected="true"><?= $k['nama_event']; ?></a>
					</li>
					<?php endforeach; ?>
				</ul>

				<div class="tab-content row justify-content-center">
					<?php foreach ($konten as $k ) : ?>
					<!-- Schdule Day 1 -->
					<div role="tabpanel" class="col-lg-9 tab-pane fade" id="day-<?= $k['id_event'] ?>">

						<?php foreach ($jadwal as $j ) {
							if ($j['id_event'] == $k['id_event']) {
							if ($j['gambar'] == null) { ?>
						<div class="row schedule-item">
							<div class="col-md-2">
								<time>
									<?php
										$time = date_create($j['waktu']);
										$waktu = date_format($time, 'd M Y H:s');
										echo $waktu;
									?>
								</time>
							</div>
							<div class="col-md-10">
								<h4><?= $j['kegiatan']; ?></h4>
								<p><?= $j['deskripsi_kegiatan']; ?></p>
							</div>
						</div>
						<?php } else { ?>
						<div class="row schedule-item">
							<div class="col-md-2 mt-3">
								<time>
									<?php
										$time = date_create($j['waktu']);
										$waktu = date_format($time, 'd M Y H:s');
										echo $waktu;
									?>
								</time>
							</div>
							<div class="col-md-10">
								<div class="guest">
									<img class="" src="<?= base_url(); ?>assets/img/schedule/<?= $j['gambar'] ?>">
								</div>
								<h4><?= $j['kegiatan']; ?></h4>
								<p><?= $j['deskripsi_kegiatan']; ?></p>
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
      Buy Ticket Section
    ============================-->
		<section id="buy-tickets" class="wow fadeInUp">
			<div class="container mt-5">

				<div class="section-header">
					<h2>Buy Tickets</h2>
					<p>Buy the ticket and join the festival.</p>
				</div>

				<div class="row">

					<?php foreach ($konten as $k ) :
					if ($k < 2) { ?>
					<div class="col-md-12 text-center mt-3" data-toggle="modal" data-target="#buy-ticket-modal<?= $k['id_event'] ?>">
							
							<img src="<?= base_url(); ?>assets/images/event/<?= $k['poster']; ?>" class="poster mb-3">
						</div>
					<?php } else { ?>
						<div class="col-md-6 text-center mt-3" data-toggle="modal" data-target="#buy-ticket-modal<?= $k['id_event'] ?>">
							
							<img src="<?= base_url(); ?>assets/images/event/<?= $k['poster']; ?>" class="poster mb-3">
						</div>
				
					<?php } endforeach; ?>
				</div>

			</div>
			<?php foreach ($konten as $k) : ?>

			<!-- Modal Order Form -->
			<div id="buy-ticket-modal<?= $k['id_event'] ?>" class="modal fade">
				<div class="modal-dialog " role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 style="color: navy !important;" class="modal-title">Buy Tickets</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php if ($this->cart->total() == 0){ ?>
						<div class="modal-body">
							<form method="POST" action="<?= base_url('index.php/home/add_item') ?>">
								<input type="hidden" name="event" value="<?= $k['id_event'] ?>">
								<div class="mb-3">
									<select name="kelas" id="kelas" class="form-control">
										<option value="">Pilih Tiket</option>
										<?php foreach ($tiket as $tkt) {
											if ($tkt['id_event'] == $k['id_event']) { ?>
										<option value="<?= $tkt['id_tiket'] ?>"><?= $tkt['kelas'] ?></option>
										<?php }} ?>
									</select>
								</div>
								<div class="mb-3">
									<select name="id_akses" id="akses" class="form-control">
										<option value="">Pilih Akses</option>
									</select>
								</div>
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
					<?php } if($this->cart->total() > 0) { ?>
								<div class="modal-body">
									<form method="POST" action="<?= base_url('index.php/home/add_item') ?>">
										<?php foreach ($this->cart->contents() as $items) { ?>
											<?php if ($k['id_event'] != $items['event']){ ?>
										<div class="mb-3">
												<small class="mb-2 text-danger">*Lakukan pembelian tiket dengan event yang sama</small>
										</div>
										<?php } ?>
									<?php } if($k['id_event'] == $items['event']) { ?>
										<input type="hidden" name="event" value="<?= $k['id_event'] ?>">
										<div class="mb-3">
											<select name="kelas" id="kelas" class="form-control">
												<option value="">Pilih Tiket</option>
												<?php foreach ($tiket as $tkt) {
													if ($tkt['id_event'] == $k['id_event']) { ?>
												<option value="<?= $tkt['id_tiket'] ?>"><?= $tkt['kelas'] ?></option>
												<?php }} ?>
											</select>
										</div>
										<div class="mb-3">
											<select name="id_akses" id="akses" class="form-control">
												<option value="">Pilih Akses</option>
											</select>
										</div>
										<div>
											<small class="mb-2 text-danger">*Maksimal pembelian 5 tiket</small>
											<input class="form-control mb-3" placeholder="Masukan Jumlah Tiket" type="number"
												min="1" max="5" name="qty" required>
										</div>
										<div class="text-center">
											<button type="submit" class="btn">Buy Now</button>
										</div>
									<?php } ?>
									
									</form>
								</div>

						<?php } ?>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<?php ;endforeach ?>

		</section>

		<!--==========================
      Gallery Section
    ============================-->
		<section id="history" class="wow fadeInUp section-with-bg">

			<div class="container mt-5">
				<div class="section-header">
					<h2>History</h2>
					<p>Check our gallery from the recent events</p>
				</div>
			</div>

			<div class="owl-carousel gallery-carousel">
				<?php foreach ($galeri as $a ) : ?>
				<a href="" class="venobox" data-gall="gallery-carousel"><img height="200" width="250"
						src="<?= base_url(); ?>assets/images/galeri/<?= $a['gambar'] ?>"></a>

				<?php endforeach; ?>
			</div>
			<div class="detail-content mt-3">
				<a href="<?= base_url('index.php/user/gallery') ?>" class="detail">See More</a>
			</div>

		</section>

		<!--==========================
      Sponsors Section
    ============================-->
		<section id="supporters" class=" wow fadeInUp">
			<div class="container mt-5">
				<div class="section-header">
					<h2>Sponsors</h2>
				</div>
				<div class="row no-gutters supporters-wrap clearfix">
					<?php foreach ($sponsor as $s ) : ?>
					<div class="col-lg-3 col-md-4 col-xs-6">
						<div class="supporter-logo">
							<img src="<?= base_url(); ?>assets/img/sponsor/<?= $s['logo_sponsor'] ?>"
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
		<section id="faq" class="wow fadeInUp section-with-bg">

			<div class="container mt-5">

				<div class="section-header">
					<h2>F.A.Q </h2>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-9">
						<?php foreach ($faq as $f ) : ?>
						<ul id="faq-list">
							<li>
								<a data-toggle="collapse" class="collapsed" href="#faq<?= $f['id_faq']; ?>">
									<?= $f['pertanyaan'] ?> &nbsp;
									<i class="fa fa-minus-circle mb-2"></i></a>
								<div id="faq<?= $f['id_faq']; ?>" class="collapse" data-parent="#faq-list">
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
						<p> <i>Synchronize Event Organizer</i></p>
						<div class="social-links mt-3">
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 footer-links">
						<h4>Useful Links</h4>
						<ul>
							<li><i class="fa fa-angle-right"></i> <a href="<?= base_url(); ?>home">Home</a></li>
							<li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
						</ul>
					</div>

					<div class="col-lg-4 col-md-6 footer-contact">
						<h4>Contact Us</h4>
						<p>
							Perumahan Austinville Blok D2 <br> Dieng Atas, Malang - Jawa Timur
							<br><br>
							<strong>Anita Linda :</strong> +62 813-3385-8993 <br>
							<strong>Fahmi Rizky :</strong> +62 813-8288-7747 <br>
						</p>



					</div>

				</div>
			</div>
		</div>

		<div class="container">
			<div class="copyright">
				&copy; Copyright <strong>Synchronize</strong>. All Rights Reserved
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

	<?php
		$date = date_create($tanggal);
		$tampil = date_format($date, "d M Y");
		echo '<div style="display: none;" id="tanggal">'.$tampil.'</div>';
	?>
	<script type="text/javascript">
		var tanggal = document.getElementById('tanggal').innerHTML;
		var countDate = new Date(tanggal).getTime();

		function countdown() {
			var now = new Date().getTime();
			gap = countDate - now;

			var detik = 1000;
			var menit = detik * 60;
			var jam = menit * 60;
			var hari = jam * 24;

			var h = Math.floor(gap / (hari));
			var j = Math.floor((gap % (hari)) / (jam));
			var m = Math.floor((gap % (jam)) / (menit));
			var d = Math.floor((gap % (menit)) / (detik));

			document.getElementById('hari').innerText = h;
			document.getElementById('jam').innerText = j;
			document.getElementById('menit').innerText = m;
			document.getElementById('detik').innerText = d;

			var kondisi = parseInt(h) == 0 && parseInt(j) == 0 && parseInt(m) == 0 && parseInt(d) == 0

			if (kondisi) {
				clearInterval(start);
			}
		}

		var start = setInterval(function () {
			countdown();
		}, 1000);

	</script>



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

	<script>
		$(document).ready(function(){
			$('#kelas').change(function(){
				var id = $(this).val();
				$.ajax({
					url: '<?= base_url(); ?>index.php/Home/getAkses',
					method: 'POST',
					dataType: 'JSON',
					data: {
						id:id
					},
					success: function(array){
						var html = '';
						for (let i = 0; i < array.length; i++) {
							html += '<option value="' + array[i].id_akses + '">' + array[i].akses + '</option>'
						}
						$('#akses').html(html);
					}
				})
			})
		})
	</script>

	<script>
		function setMaps(id) {
			var id = id;
			$.ajax({
				url: '<?= base_url(); ?>index.php/Home/getMaps',
				method: 'POST',
				dataType: 'JSON',
				data: {
					id:id
				},
				success: function(array){
					var html = '';
					for (let i = 0; i < array.length; i++) {
						html += array[i].location_venue
					}
					$('#maps').attr('src', html);
				}
			})
		}
	</script>


</body>

</html>
