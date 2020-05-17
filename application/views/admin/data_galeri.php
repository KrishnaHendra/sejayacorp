<div class="col-lg-12">
	<?= $this->session->flashdata('notif'); ?>
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				<h4>Galeri Foto</h4>
			</div>
      <div class="mb-3">
				<form class="" action="<?php echo base_url(); ?>index.php/admin/galeri/show/" method="post">
					<div class="form-group row">
						<div class="col-sm-5">
							<select class="form-control" name="id_event">
                <option value="">Pilih Event</option>
                <?php foreach ($event as $e) { ?>
								<option value="<?= $e->id_event; ?>"><?= $e->nama_event; ?></option>
                <?php  } ?>
							</select>
						</div>
						<div class="col-sm-3">
							<input type="submit" value="Show" class="btn btn-lg btn-primary">
						</div>
					</div>
				</form>
        <button class="btn btn-block btn-danger col-3 ml-3" data-toggle="modal" data-target="#tambah_data"><i
            class="fa fa-fw fa-plus-circle"></i> Tambah Foto</button>
			</div>
      <br>
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th>#</th>
							<th>Foto</th>
							<th>Event</th>
							<th class="text-center">Hapus</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach($galeri as $a) { ?>
						<tr>
							<th><?= $no++; ?></th>
							<td><img src="<?php echo base_url('/assets/images/galeri/'.$a->gambar) ?>" height="50" width="80" /></td>
							<td><?= $a->id_event; ?></td>
							<td class="text-center"><a class="btn btn-sm btn-danger"
									href="#" data-toggle="modal" data-target="#hapus<?= $a->id_galeri; ?>"><i class="fa fa-fw fa-trash"></i></a></td>
							<!-- <td class="text-center"><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-fw fa-trash"></i></button></td> -->
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>

	</div>
	<!-- /# card -->
</div>
<!-- MODAL TAMBAH FOTO -->
<div id="tambah_data" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-fw fa-star"></i> Tambah Galeri Foto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open("index.php/admin/galeri/tambah", array('enctype'=>'multipart/form-data')); ?>
				<h5 class="mb-3 text-danger">* Data ini akan ditampilkan sesuai dengan di halaman
					web</h5>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Gambar <b
							class="text-danger">*</b></label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="gambar">
					</div>
				</div>
        <div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Event <b
							class="text-danger">*</b></label>
					<div class="col-sm-10">
						<select class="form-control" name="id_event">
							<option value="">---PILIH---</option>
							<?php foreach ($event as $e) { ?>
              <option value="<?= $e->id_event; ?>"><?= $e->nama_event; ?> (<?= $e->status_event; ?>)</option>
							<?php  } ?>
						</select>
					</div>
				</div>
				<input type="submit" class="btn btn-danger btn-block" name="submit" value="SIMPAN">


				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>
<!-- END MODAL -->


<!-- MODAL HAPUS -->
<?php foreach ($galeri as $a) { ?>
<div class="modal fade" id="hapus<?= $a->id_galeri; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Hapus Admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<b>*Anda yakin akan menghapus Gambar <?= $a->id_galeri; ?> ?</b>
			</div>
			<div class="modal-footer">

				<a href="<?= base_url('index.php/admin/galeri/delete'); ?>/<?= $a->id_galeri ?>" class="btn btn-danger">Hapus</a>
			</div>
		</div>
	</div>
</div>
<!-- END MODAL HAPUS -->
<?php } ?>
