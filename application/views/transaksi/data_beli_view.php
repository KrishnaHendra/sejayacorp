<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Synchronize Management</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/synchronize.jpg') ?>">
	<!-- Pignose Calender -->
	<link href="<?= base_url('assets/'); ?>plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
	<!-- Chartist -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/chartist/css/chartist.min.css">
	<link rel="stylesheet"
		href="<?= base_url('assets/'); ?>plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
	<!-- Custom Stylesheet -->
	<link href="<?= base_url('assets/'); ?>css/style_admin.css" rel="stylesheet">
</head>

<body>
	<div class="col-lg-12">
		<?= $this->session->flashdata('notif'); ?>
		<div class="card">
			<div class="card-body">
				<div class="card-title">
					<h4>Data Pembelian</h4>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead class="text-center">
							<tr>
								<th colspan="2">TICKET TYPE : <span class="text-danger">OH-NAIS FEST : EPISODE
										WAYTUBER</span>&nbsp&nbsp(Rp. 75.000)
									<br>SUDAH TERMASUK PAJAK DAN RETRIBUSI LAINNYA
								</th>


							</tr>
						</thead>
						<tbody class="text-center">
							<tr>
								<td rowspan="2"><img src="<?php echo base_url(); ?>assets/images/poster.jpg" height="180px"
										width="150px" class="mt-4"></td>
								<td colspan="2"><img src="<?php echo base_url(); ?>assets/images/syn.jpg" alt="image" height="50px"
										width="110px"></td>
							</tr>
							<tr>
								<td colspan="2"><img src="<?php echo base_url(); ?>assets/images/barcode.png" alt="image" height="70px"
										width="140px"></td>
							</tr>
							<tr>
								<td>OH-NAIS FEST : EPISODE WAYTUBER <br>
									21 FEB 2020 14.00 - 23.00 <br>
									GRAHA CAKRAWALA
									LOKET HEADQUARTER
								</td>
								<td>KODE_TIKET<br>
									NAMA USER<br>
									TANGGAL PESAN <br>
									KETERANGAN
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<h4 class="text-danger ml-5"><b>TERMS & CONDITION</b></h4>
									<ul>
										<li></li>
									</ul>
								</td>
							</tr>
							<tr class="text-danger">
								<th>WWW.SEJAYACORP.COM</th>
								<th>081442435353</th>
							</tr>
							<br>
							<tr class="mt-3">
								<td colspan="2" class="text-center">Powered By <u class="text-info">Synchronize Management</u></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>
		<!-- /# card -->
	</div>


</body>

</html>
