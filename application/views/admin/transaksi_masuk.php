<div class="col-lg-12">
	<?= $this->session->flashdata('notif'); ?>
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				<div class="row">

					<h4 class="col-md-4">Transaksi Masuk</h4>
					<a href="" class="btn btn-sm btn-danger offset-md-6 col-md-2"><i class="fa fa-trash"></i> Hapus Data Transaksi</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-hover zero-configuration">
					<thead>
						<tr style="background-color: #324cdd; color:white;">
							<th class="text-center">#</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Total</th>
							<th class="text-center">Status</th>
							<th class="text-center">Bukti Transfer</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">Edit</th>

						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach($transaksi as $a): ?>
						<tr>
							<th class="text-center"><?= $no++; ?></th>
							<td class="text-center"><?= $a['nama_user']; ?></td>
							<td class="text-center">Rp.<?= number_format($a['total']) ?></td>
							<td class="text-center">
								<?php if($a['status']=='proses'){?>
								<a href="" class="btn btn-sm col-8 btn-warning font-weight-bold"><i class="fa fa-fw fa-recycle"></i> <?= $a['status'] ?></a>
								<?php } if($a['status']=='selesai'){ ?>
								<a href="" class="btn btn-sm col-8 btn-success"><i class="fa fa-check"></i> Selesai Bayar</a>
								<?php } if($a['status']=='batal'){?>
								<a href="" class="btn btn-sm col-8 btn-danger"> <?= $a['status'] ?></a>
								<?php }if($a['status']=='done'){?>
								<a href="" class="btn btn-sm col-8 btn-info"><i class="fa fa-check"></i> Selesai Tukar</a>
								<?php } ?>
							</td>
							<td class="text-center">
								<?php if ($a['bukti'] == 'kosong'){ ?>
									<p class="text-danger">kosong</p>
								<?php } if ($a['bukti'] != 'kosong') { ?>
									<a href="#" class="btn btn-sm btn-primary text-center" data-toggle="modal" data-target="#cekbukti<?= $a['id_transaksi'] ?>">cek bukti</a>
								<?php }  ?>
							</td>
							<td class="text-center"><?= date('d M Y',$a['tanggal'] ) ?></td>
							<td class="text-center">
							<?php if($a['status']=='proses'){?>
								<a href="" class="btn btn-sm btn-dark" style="color: white;" data-toggle="modal" data-target="#exampleModal<?= $a['id_transaksi'] ?>"><i class="fa fa-edit"></i></a>
								<?php } if($a['status']=='selesai'){ ?>
									<a href="" class="btn btn-sm btn-primary" style="color: white;"><i class="fa fa-check-circle" data-toggle="tooltip" title="Transaksi Selesai"></i></a>
									<?php } ?>
							</td>
						</tr>
						<?php endforeach; ?>

					</tbody>
				</table>
			</div>
		</div>

	</div>
	<!-- /# card -->
</div>


<!-- MODAL UPDATE -->
<?php foreach ($transaksi as $a): ?>
<div class="modal fade" id="exampleModal<?= $a['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-dark">
				<h5 class="modal-title" id="exampleModalLabel"  style="color:white">Ubah Status Pembelian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('index.php/admin/transaksi/update')?>" method="post">
				<input type="hidden" value="<?= $a['id_transaksi'] ?>" name="id">
				<input type="hidden" value="<?= $a['tanggal'] ?>" name="tanggal">
				<input type="hidden" name="email" value="<?= $a['email'] ?>" required><br>
					<i class="fa fa-user btn btn-light font-weight-bold btn-sm btn-block"> Nama Pembeli</i>
					<input type="text" name="nama" class="form-control text-center font-weight-bold" value="<?= $a['nama_user'] ?>" required><br>

					<i class="fa fa-ticket btn btn-light font-weight-bold btn-sm btn-block"> Jumlah Tiket</i>
					<input type="text" name="jumlah" class="form-control text-center font-weight-bold" value="<?= $a['qty'] ?>" required><br>
					<i class="fa fa-lock btn btn-light font-weight-bold btn-sm btn-block"> Tanggal</i>
					<input type="text" name="tgl" class="form-control text-center font-weight-bold" value="<?= date('d M Y',$a['tanggal']) ?>" required><br>
					<i class="fa fa-lock btn btn-info font-weight-bold btn-sm btn-block"> Status</i>
					<select name="status" class="form-control btn-light">
						<option value="SELESAI">SELESAI</option>
						<option value="BATAL">BATAL</option>
					</select>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-dark">Ubah</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
<!-- END MODAL UPDATE -->


<!-- MODAL CEK -->
<?php foreach ($transaksi as $a): ?>
<div class="modal fade" id="cekbukti<?= $a['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-dark">
				<h5 class="modal-title" id="exampleModalLabel"  style="color:white">Bukti Transfer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" method="post">
					<img src="<?= base_url(); ?>assets/images/bukti/<?= $a['bukti']; ?>" alt="" width="450" height="225">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>

			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
<!-- END MODAL UPDATE -->

