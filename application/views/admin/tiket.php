
<div class="col-lg-12">
	<?= $this->session->flashdata('notif'); ?>
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				<h4>Akses</h4>
			</div>
      <br>
      <div class="mb-3">
        <button class="btn btn-block btn-warning col-3 ml-3" data-toggle="modal" data-target="#tambah_akses"><i
            class="fa fa-fw fa-plus-circle"></i> Tambah </button>
			</div>
      <br>
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th>#</th>
							<th>Event</th>
							<th>Tiket</th>
							<th>Akses</th>
              <th>Harga</th>
							<th>Stok</th>
							<th class="text-center">Hapus</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach($akses as $a) { ?>
						<tr>
							<th><?= $no++; ?></th>
							<td><?= $a->nama_event; ?></td>
							<td><?= $a->kelas; ?></td>
							<td><?= $a->akses; ?></td>
              <td><?= $a->harga; ?></td>
							<td><?= $a->stok; ?></td>
							<td class="text-center">
								<a class="btn btn-sm btn-warning"
										href="#"><i class="fa fa-fw fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger"
    									href="#" data-toggle="modal" data-target="#hapus_akses<?= $a->id_akses; ?>"><i class="fa fa-fw fa-trash"></i></a>

                </td>
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
<div class="col-lg-12">
	<?= $this->session->flashdata('notif'); ?>
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				<h4>Tiket</h4>
			</div>
      <br>
      <div class="mb-3">
        <button class="btn btn-block btn-warning col-3 ml-3" data-toggle="modal" data-target="#tambah_data"><i
            class="fa fa-fw fa-plus-circle"></i> Tambah Tiket</button>
			</div>
      <br>
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th>#</th>
							<th>Tiket</th>
							<th>Event</th>
							<th class="text-center">Hapus</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach($tiket as $t) { ?>
						<tr>
							<th><?= $no++; ?></th>
							<td><?= $t->kelas; ?></td>
							<td><?= $t->nama_event; ?></td>
							<td class="text-center">
                  <a class="btn btn-sm btn-danger"
    									href="#" data-toggle="modal" data-target="#hapus_tiket<?= $t->id_tiket; ?>"><i class="fa fa-fw fa-trash"></i></a>

                </td>
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
				<h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-fw fa-star"></i> Tambah Tiket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open("index.php/admin/tiket/tambah", array('enctype'=>'multipart/form-data')); ?>
				<h5 class="mb-3 text-danger">* Data ini akan ditampilkan sesuai dengan di halaman
					web</h5>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Kelas Tiket <b
  							class="text-danger">*</b></label>
                <div class="col-sm-10">
                  <input type="text" name="kelas" class="form-control">
                </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Pilih Event<b
                class="text-danger">*</b></label>
                <div class="col-sm-10">
                  <select class="form-control" name="id_event">
										<?php foreach ($event as $e) { ?>
										<option value="<?= $e->id_event; ?>"><?= $e->nama_event; ?></option>
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
<?php foreach ($akses as $a) { ?>
<div id="tambah_akses" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-fw fa-star"></i> Tambah Tiket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open("index.php/admin/tiket/tambah_akses", array('enctype'=>'multipart/form-data')); ?>
				<h5 class="mb-3 text-danger">* Data ini akan ditampilkan sesuai dengan di halaman
					web</h5>
					<div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Akses<b
                class="text-danger">*</b></label>
                <div class="col-sm-10">
                  <input type="text" name="akses" class="form-control">
                </div>
          </div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 col-form-label">Pilih Event<b
  							class="text-danger">*</b></label>
                <div class="col-sm-10">
                  <select class="form-control" name="id_event">
										<?php foreach ($event as $e) { ?>
										<option value="<?= $e->id_event; ?>"><?= $e->nama_event; ?></option>
										<?php } ?>
                  </select>
                </div>

					</div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Kelas Tiket <b
  							class="text-danger">*</b></label>
								<div class="col-sm-10">
                  <select class="form-control" name="id_tiket">
										<?php foreach ($tiket as $t) { ?>
										<option value="<?= $t->id_tiket; ?>"><?= $t->kelas; ?></option>
										<?php  } ?>
                  </select>
                </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Harga Tiket <b
                class="text-danger">*</b></label>
                <div class="col-sm-10">
                  <input type="text" name="harga" class="form-control">
                </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Stok Tiket <b
                class="text-danger">*</b></label>
                <div class="col-sm-10">
                  <input type="text" name="stok" class="form-control">
                </div>
          </div>
				<input type="submit" class="btn btn-danger btn-block" name="submit" value="SIMPAN">


				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>
<?php  } ?>


<!-- MODAL HAPUS -->
<?php foreach ($tiket as $t) { ?>
<div class="modal fade" id="hapus_tiket<?= $t->id_tiket; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Hapus Tiket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<b>*Anda yakin akan menghapus tiket <?= $t->kelas; ?> event &nbsp <?= $t->nama_event; ?></b>
			</div>
			<div class="modal-footer">

				<a href="<?= base_url('index.php/admin/tiket/delete_tiket'); ?>/<?= $t->id_tiket ?>" class="btn btn-danger">Hapus</a>
			</div>
		</div>
	</div>
</div>
<?php  } ?>
<!-- END MODAL HAPUS -->
<?php foreach ($akses as $a) { ?>
<div class="modal fade" id="hapus_akses<?= $a->id_akses; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Hapus Tiket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<b>*Anda yakin akan menghapus tiket <?= $a->akses; ?> event &nbsp <?= $a->nama_event; ?></b>
			</div>
			<div class="modal-footer">

				<a href="<?= base_url('index.php/admin/tiket/delete_akses'); ?>/<?= $a->id_akses ?>" class="btn btn-danger">Hapus</a>
			</div>
		</div>
	</div>
</div>
<?php  } ?>
