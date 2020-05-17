<?php
	foreach ($konten as $main ) {
		$id_event = $main['id_event'];
		$nama_event = $main['nama_event'];
		$about = $main['about_event'];
		$venue = $main['venue'];
		$location = $main['location_venue'];
		$tanggal = $main['tanggal'];
	}

?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<!-- Favicons -->
	<link href="<?= base_url(); ?>assets/img/default.png" type="image/png" rel="icon">
	<link href="<?= base_url(); ?>assets/img/default.png" type="image/png" rel="apple-touch-icon">
	<title>Syncronize</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Google Fonts -->
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
		rel="stylesheet">

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
						<a data-toggle="dropdown">
							<i class="fa fa-user"></i>
						</a>

						<ul class="profil">
							<li>
								<a href="<?= base_url('index.php/log/logout') ?>">
									<i class="feather icon-log-out"></i> Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header End -->

	<!--==========================
    Intro Section
  	============================-->
	<section id="intro">
		<div class="intro-container wow fadeIn">
			<img class="pb-0 event-img" src="<?= base_url(); ?>assets/img/logo/OH NAIS LOGO 2.png" alt="" title="">
			<!--<p class="mb-4 pb-0">-->
 			<!--	
			<!--	$date = date_create($tanggal);-->
			<!--	$tampil = date_format($date, "D, d M Y");-->
			<!--	echo $tampil.'<br>'.$venue;-->
			<!--?>-->
			<!--</p>-->
			<a href="#" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
			<a href="#buy-tickets" class="about-btn scrollto">Buy Ticket</a>

		</div>


	</section>

	<main id="main">

		<section id="schedule" class="section-with-bg">
			<div class="container wow fadeInUp">
				<div class="section-header">
					<h2>Event List</h2>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<table class="table" style="margin-bottom: 0 !important;">
							<thead>
								<tr>
									<th>Episode</th>
									<th>Poster</th>
									<th style="width: 35%;">Desc</th>
									<th style="width: 20%;">Venue</th>
									<th>Tanggal</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($all as $a ) : ?>
								<tr>
									<td><?= $a['nama_event']; ?></td>
									<td><img src="<?= base_url(); ?>assets/images/event/<?= $a['poster']; ?>" width="40" height="50"></td>
									<td><?= $a['about_event']; ?></td>
									<td><?= $a['venue']; ?></td>
									<td>
										<?php
											$date = date_create($a['tanggal']);
											$tanggal = date_format($date, 'd M Y');
											echo $tanggal;
										?>
									</td>
									<td><?= $a['status_event']; ?></td>
									<td>
										<a data-toggle="modal" type="button"
											data-target="#editEvent<?= $a['id_event']; ?>">
											<i class="fa fa-pencil"></i>
										</a>
										<a href="<?= base_url(); ?>index.php/admin/editable_home/hapusEvent/<?= $a['id_event'] ?>"
											onclick="return confirm('Anda yakin ingin menghapus data?')">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<div class="row mt-3">
							<button type="button" class="btn btn-block btn-outline-danger mt-2 mr-3" data-toggle="modal"
								data-target="#addMain">
								New Event
							</button>
						</div>
					</div>
				</div>
				<?php foreach ($all as $a) : ?>
				<div id="editEvent<?= $a['id_event'] ?>" class="modal fade">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 style="color: navy !important;" class="modal-title">Edit Event</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST"
									action="<?= base_url('index.php/admin/editable_home/editEvent/'.$a['id_event'])?>"
									enctype="multipart/form-data">
									<div>
										<input type="text" class="form-control mb-3" value="<?= $a['nama_event'] ?>"
											name="nama_event" required>
									</div>
									<div>
										<textarea class="form-control mb-3" placeholder="About the Event"
											name="about_event" rows="3" required><?= $a['about_event'] ?></textarea>
									</div>
									<input type="hidden" class="form-control mb-3" value="<?= $a['poster']?>"
											name="poster" required>
									<div>
										<small class="text-danger">*Isi dengan venue event</small>
										<input type="text" class="form-control mb-3" value="<?= $a['venue']?>"
											name="venue" required>
									</div>
									<div>
										<small class="text-danger">*Isi dengan iFrame dari google maps untuk maps
											venue</small>
										<textarea class="form-control mb-3" value="Maps of Venue" name="location_venue"
											rows="3" required><?= $a['location_venue'] ?></textarea>
									</div>
									<div>
										<label class="text-dark">Waktu Event</label>
										<input type="date" class="form-control mb-3" value="<?= $a['tanggal'] ?>"
											name="tanggal">
									</div>
									<div class="mb-3">
										<label class="text-dark" for="">Status</label><br>
										<select class="form-control" name="status">
											<option value="-">Pilih Status</option>
											<option value="aktif"
												<?php if($a['status_event'] = 'aktif'){echo 'checked';} ?>>aktif
											</option>
											<option value="selesai"
												<?php if($a['status_event'] = 'selesai'){echo 'checked';} ?>>selesai
											</option>
										</select>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-success btn-block">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>

				<!-- Modal Edit Konten -->
				<div id="addMain" class="modal fade">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 style="color: navy !important;" class="modal-title">Add New Event</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" action="<?= base_url('index.php/admin/editable_home/addNewEvent')?>"
									enctype="multipart/form-data">
									<div>
										<input type="text" class="form-control mb-3" placeholder="Episode"
											name="nama_event" required>
									</div>
									<div>
										<label for="poster" class="text-danger">Poster</label>
										<input type="file" name="poster" class="form-control mb-3"required>
									</div>
									<div>
										<textarea class="form-control mb-3" placeholder="About the Event"
											name="about_event" rows="3" required></textarea>
									</div>
									<div>
										<small class="text-danger">*Isi dengan venue event</small>
										<input type="text" class="form-control mb-3" placeholder="Venue" name="venue"
											required>
									</div>
									<div>
										<small class="text-danger">*Isi dengan iFrame dari google maps untuk maps
											venue</small>
										<textarea class="form-control mb-3" placeholder="Maps Venue"
											name="location_venue" rows="3" required></textarea>
									</div>
									<div>
										<label class="text-dark">Waktu Event</label>
										<input class="form-control mb-3" type="date" name="tanggal">
									</div>
									<div class="mb-3">
										<label class="text-dark" for="">Status Past Event</label><br>
										<small class="text-danger">*Ubah selesai apabila event sebelumnya sudah tidak
											ditampilkan</small>
										<select class="form-control" name="past_event">
											<option value="-">Pilih Status</option>
											<option value="aktif">aktif</option>
											<option value="selesai">selesai</option>
										</select>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-success btn-block">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!-- End Modal -->
			</div>
		</section>

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
					<li class="nav-item ml-3 mt-3">
						<a class="nav-link" href="#event-<?= $k['id_event']; ?>" role="tab" data-toggle="tab"
							aria-selected="true"><?= $k['nama_event']; ?></a>
					</li>
					<?php endforeach; ?>
				</ul>

				<div class="tab-content row justify-content-center">
					<?php foreach ($konten as $k ) : ?>
					<!-- Schdule Day 1 -->
					<div role="tabpanel" class="col-lg-12 tab-pane fade" id="event-<?= $k['id_event'] ?>">

						<?php foreach ($guest as $gs ) {
						if ($k['id_event'] == $gs['id_event']) { ?>
						<div class="col-lg-4 col-md-6">
							<div class="guest">
								<a href="<?= base_url(); ?>user/lineup/index/<?= $gs['id_guest'] ?>">
									<img src="<?= base_url(); ?>assets/images/gs/<?= $gs['gambar'] ?>" alt="Speaker 1"
										class="img-fluid-guest">
								</a>
								<div class="details">
									<h3><a
											href="<?= base_url('home/lineup'); ?>/<?= $gs['id_guest'] ?>"><?= $gs['nama_guest']; ?></a>
									</h3>
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
						<?php } } ?>
					</div>
					<!-- End Schdule Day 1 -->
					<?php endforeach; ?>
				</div>
			</div>
		</section>

			<!--==========================
    Countdown Section
  	============================-->
	  <section id="about">
			<div class="container wow fadeInUp mt-3 mb-3">
				<div class="row">
					<div class="col-md-12">
						<h2 class="text-center">Countdown to <span>Event</span></h2>
						<div class="countdown">
							<div id="hari"></div>
							<div id="jam"></div>
							<div id="menit"></div>
							<div id="detik"></div>
						</div>
					</div>
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
				<div class="row justify-content-center">
					<div class="col-lg-9">
						<?php foreach ($konten as $k ) : ?>
						<table class="table" style="margin-bottom: 0 !important;">
							<h4 class="text-center mb-4">
								<?= $k['nama_event'] ?></h4>
							<thead>
								<tr>
									<th>Waktu</th>
									<th>Kegiatan</th>
									<th>Deskripsi</th>
									<th>Gambar</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($jadwal as $j ) {
								if ($k['id_event'] == $j['id_event']) { ?>
								<tr>
									<td><?= $j['waktu'] ?></td>
									<td><?= $j['kegiatan'] ?></td>
									<td><?= $j['deskripsi_kegiatan'] ?></td>
									<td>
										<?php if ($j['gambar']) { ?>
										<img height="60" width="60" style="border-radius: 30px;"
											src="<?= base_url(); ?>assets/img/schedule/<?= $j['gambar'] ?>">
										<?php } else { ?>
										No Image
										<?php } ?>
									</td>
									<td>
										<a data-toggle="modal" type="button"
											data-target="#editDetailJadwal<?= $j['id_jadwal']; ?>">
											<i class="fa fa-pencil"></i>
										</a>
										<a href="<?= base_url(); ?>admin/editable_home/hapusDetailJadwal/<?= $j['id_jadwal'] ?>"
											onclick="return confirm('Anda yakin ingin menghapus data?')">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>
								<?php }} ?>
							</tbody>
						</table>
						<div class="row justify-content-center">
							<div class="detail-content col-lg-12 mt-2">
								<button class="btn btn-outline-danger btn-block" type="button" data-toggle="modal"
									data-target="#tambahDetailJadwal<?= $k['id_event'] ?>">
									<i class="fa fa-plus"></i>
								</button>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<!-- Modal Edit -->
				<?php foreach ($jadwal as $j) : ?>
				<div id="editDetailJadwal<?= $j['id_jadwal']; ?>" class="modal fade">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 style="color: navy !important;" class="modal-title">Edit Jadwal</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST"
									action="<?= base_url();?>index.php/admin/editable_home/editDetailJadwal/<?= $j ['id_jadwal']; ?>"
									enctype="multipart/form-data">
									<div class="form-group">
										<input type="datetime-local" class="form-control" name="waktu"
											value="<?= $j['waktu']; ?>">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="kegiatan"
											value="<?= $j['kegiatan']; ?>">
									</div>
									<div class="form-group">
										<input type="hidden" class="form-control" name="id_event"
											value="<?= $j['id_event']; ?>">
									</div>
									<div class="form-group">
										<textarea type="text" class="form-control"
											name="deskripsi_kegiatan"><?= $j['deskripsi_kegiatan']; ?></textarea>
									</div>
									<div class="form-group">
										<label class="text-dark">Gambar</label>
										<input type="file" name="fotopost" class="form-control-file text-dark">
										<span class="text-danger mt-2">Before: <?= $j['gambar']; ?></span>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-success btn-block">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<!-- End Modal -->

				<!-- Tambah Schedule -->
				<?php foreach ($konten as $k) : ?>
				<div id="tambahDetailJadwal<?= $k['id_event'] ?>" class="modal fade">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 style="color: navy !important;" class="modal-title">Tambah Jadwal <?= $k['nama_event'] ?>
								</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST"
									action="<?= base_url('index.php/admin/editable_home/tambahDetailJadwal/')?>"
									enctype="multipart/form-data">
									<div class="form-group">
										<input type="datetime-local" class="form-control" name="waktu" placeholder="Waktu">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="kegiatan" placeholder="Kegiatan">
									</div>
									<div class="form-group">
										<input type="hidden" class="form-control" name="id_event" placeholder="Kegiatan" value="<?= $k['id_event']; ?>">
									</div>
									<div class="form-group">
										<textarea type="text" class="form-control" name="deskripsi_kegiatan"
											placeholder="Deskripsi"></textarea>
									</div>
									<div class="form-group">
										<label class="text-dark">Gambar</label>
										<input type="file" name="fotopost" class="form-control-file mb-3 text-dark">
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-success btn-block">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<!-- End Modal -->

				<h3 class="mt-5 mb-5 text-center">Preview</h3>
						<ul class="nav nav-tabs" role="tablist">
							<?php foreach ($konten as $k) : ?>
							<li class="nav-item ml-3 mt-3">
								<a class="nav-link" href="#day-<?= $k['id_event'] ?>" role="tab" data-toggle="tab"
									aria-selected="true"><?= $k['nama_event'] ?></a>
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
											<img class=""
												src="<?= base_url(); ?>assets/img/schedule/<?= $j['gambar'] ?>">
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
		<section id="buy-tickets" class="wow fadeInUp">
			<div class="container mt-5">

				<div class="section-header">
					<h2>Buy Tickets</h2>
					<p>Buy the ticket and join the festival.</p>
				</div>

				<div class="row">

					<?php foreach ($konten as $k ) :
					if ($k < 2) { ?>
										<div class="poster col-lg-12 mt-3" data-toggle="modal" data-target="#buy-ticket-modal<?= $k['id_event'] ?>">
							<p class="mb-3"><?= $k['nama_event']; ?></p>
							<img src="<?= base_url(); ?>assets/images/event/<?= $k['poster']; ?>" class="poster mb-3">
						</div>
					<?php } else { ?>
						<br>
						<div class="poster col-lg-6 mt-5">
							<p class="mb-3"><?= $k['nama_event']; ?></p>
							<img src="<?= base_url(); ?>assets/images/event/<?= $k['poster']; ?>" class="poster mb-3">
						</div>
					<!-- <div class="tike col-lg-6 mt-5">
						<div class="mb-1">
							<div class="row tiket-event-name" style="display: block;">
								<p><?= $k['nama_event']; ?></p>
							</div>
							<div class="row mt-3 tiket-kelas">
							</div>
						</div>
					</div> -->
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
						<div class="modal-body">
							<form method="POST" action="<?= base_url('index.php/home/add_item') ?>">
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
						height="200" width="250" src="<?= base_url(); ?>assets/img/default.png" alt=""></a>
				<a href="<?= base_url(); ?>assets/images/gs/ardhito1.jpg" class="venobox"
					data-gall="gallery-carousel"><img height="200" width="250"
						src="<?= base_url(); ?>assets/images/gs/ardhito1.jpg" alt=""></a>
				<a href="<?= base_url(); ?>assets/images/gs/denny1.jpg" class="venobox"
					data-gall="gallery-carousel"><img height="200" width="250"
						src="<?= base_url(); ?>assets/images/gs/denny1.jpg" alt=""></a>
				<a href="<?= base_url(); ?>assets/images/gs/feby1.jpg" class="venobox" data-gall="gallery-carousel"><img
						height="200" width="250" src="<?= base_url(); ?>assets/images/gs/feby1.jpg" alt=""></a>
				<a href="<?= base_url(); ?>assets/img/default.png" class="venobox" data-gall="gallery-carousel"><img
						height="200" width="250" src="<?= base_url(); ?>assets/img/default.png" alt=""></a>
				<a href="<?= base_url(); ?>assets/images/gs/ompmr1.jpg" class="venobox"
					data-gall="gallery-carousel"><img height="200" width="250"
						src="<?= base_url(); ?>assets/images/gs/ompmr1.jpg" alt=""></a>
			</div>
			<div class="detail-content mt-3">
				<a href="<?= base_url('user/gallery') ?>" class="detail">See More</a>
			</div>

		</section>

		<!--==========================
      Sponsors Section
    ============================-->
		<section id="supporters" class="section-with-bg wow fadeInUp">

			<div class="container">
				<div class="section-header">
					<h2>Sponsors</h2>
					<h6 style="color: red;" class="text-center">*edit dengan cara klik logo</h6>
				</div>
				<div class="row no-gutters supporters-wrap clearfix">
					<?php foreach ($sponsor as $s ) : ?>
					<div class="col-lg-3 col-md-4 col-xs-6">
						<div class="supporter-logo">
							<button type="button" data-toggle="modal"
								data-target="#editSponsor<?= $s['id_sponsor']; ?>">
								<img src="<?= base_url(); ?>assets/img/sponsor/<?= $s['logo_sponsor'] ?>"
									class="img-fluid-sponsor" alt="">
							</button>
							</a>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="detail-content">
					<button type="button" class="btn btn-outline-danger mt-3" data-toggle="modal"
						data-target="#tambahSponsor">
						Tambah Sponsor
					</button>
				</div>

				<!-- Modal Tambah -->
				<div id="tambahSponsor" class="modal fade">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 style="color: navy !important;" class="modal-title">Tambah Sponsor</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" action="<?= base_url('index.php/admin/editable_home/tambah_sponsor')?>"
									enctype="multipart/form-data">
									<div class="form-group">
										<input type="text" name="nama_sponsor" class="form-control"
											placeholder="Nama Sponsor" required>
									</div>
									<div class="form-group">
										<label class="text-dark">Logo Sponsor</label>
										<input type="file" name="fotopost" class="form-control-file mb-3" required>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-success btn-block">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Modal -->

				<!-- Modal Edit -->
				<?php foreach ($sponsor as $s) : ?>
				<div id="editSponsor<?= $s['id_sponsor'] ?>" class="modal fade">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 style="color: navy !important;" class="modal-title">Edit Sponsor</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST"
									action="<?= base_url('index.php/admin/editable_home/edit_sponsor/'. $s['id_sponsor'])?>"
									enctype="multipart/form-data">
									<div class="form-group">
										<input type="text" name="nama_sponsor" class="form-control"
											value="<?= $s['nama_sponsor']; ?>">
									</div>
									<div class="form-group">
										<label class="text-dark">Logo Sponsor</label>
										<input type="file" name="fotopost" class="form-control-file text-dark">
										<img class="mt-3" height="100" weidth="100"
											src="<?= base_url(); ?>assets/img/sponsor/<?= $s['logo_sponsor']; ?>"
											alt="">
									</div>

									<div class="text-center">
										<button type="submit" class="btn btn-success btn-block">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<!-- End Modal -->
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
						<table class="table" style="margin-bottom: 0 !important;">
							<thead>
								<tr>
									<th>Pertanyaan</th>
									<th>Jawaban</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($faq as $f ) : ?>
								<tr>
									<td><?= $f['pertanyaan']; ?></td>
									<td><?= $f['jawaban']; ?></td>
									<td>
										<a data-toggle="modal" type="button" data-target="#editFaq<?= $f['id_faq']; ?>">
											<i class="fa fa-pencil"></i>
										</a>
										<a href="<?= base_url(); ?>penjual/barang/hapusBarang/<?= $f['id_faq'] ?>"
											onclick="return confirm('Anda yakin ingin menghapus data barang?')">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row justify-content-center mb-3">
					<div class="detail-content col-lg-9">
						<button class="btn btn-outline-danger float-right" type="button" data-toggle="modal"
							data-target="#tambahFaq">
							<i class="fa fa-plus"></i>
						</button>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-9">
						<h3 class="mt-3 text-center">Preview</h3>
						<?php foreach ($faq as $f ) : ?>

						<ul id="faq-list">
							<li>
								<a data-toggle="collapse" class="collapsed" href="#faq<?= $f['id_faq']; ?>">
									<?= $f['pertanyaan'] ?>
									<i class="fa fa-minus-circle"></i></a>
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

				<!-- Modal Edit -->
				<?php foreach ($faq as $f) : ?>
				<div id="editFaq<?= $f['id_faq']; ?>" class="modal fade">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 style="color: navy !important;" class="modal-title">Edit FAQ</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST"
									action="<?= base_url();?>index.php/admin/editable_home/editFaq/<?= $f['id_faq']; ?>">
									<div class="form-group">
										<input type="text" class="form-control" name="pertanyaan"
											value="<?= $f['pertanyaan'] ?>" placeholder="Pertanyaan">
									</div>
									<div class="form-group">
										<textarea type="text" class="form-control" name="jawaban"
											placeholder="Jawaban"><?= $f['jawaban'] ?></textarea>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-success btn-block">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<!-- End Modal -->
				<!-- Tambah FAQ -->
				<div id="tambahFaq" class="modal fade">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 style="color: navy !important;" class="modal-title">Tambah FAQ</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" action="<?= base_url('index.php/admin/editable_home/tambahFaq')?>">
									<div class="form-group">
										<input type="text" class="form-control" name="pertanyaan"
											placeholder="Pertanyaan">
									</div>
									<div class="form-group">
										<textarea type="text" class="form-control" name="jawaban"
											placeholder="Jawaban"></textarea>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-success btn-block">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Modal -->
			</div>

		</section>

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

</body>

</html>
