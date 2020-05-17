<?= $this->session->flashdata('notif'); ?>
<div class="card col-12">

	<h3 class="mt-3 card-tittle">Data Event</h3>

	<div class="row">
		<div class="col-12">

			<p class="text-muted">Data event Synchronize Event Organizer</p>
			<div class="mb-3">
				<form class="" action="<?php echo base_url(); ?>index.php/admin/data_event/show/" method="post">
					<div class="form-group row">
						<div class="col-sm-5">
							<select class="form-control" name="status">
                <option value="">Pilih</option>
								<option value="aktif">Event Saat Ini</option>
								<option value="selesai">History Event</option>
							</select>
						</div>
						<div class="col-sm-3">
							<input type="submit" value="Show" class="btn btn-lg btn-primary">
						</div>
					</div>
				</form>
			</div>
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Event</th>
							<th>Lokasi Event</th>
              <th>Tanggal</th>
              <th>Status</th>

						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach($event as $e) { ?>
						<tr>
							<th><?= $no++; ?></th>
							<td><?= $e->nama_event; ?></td>
							<td><?= $e->venue; ?></td>
              <td><?= $e->tanggal; ?></td>
              <td><?= $e->status_event; ?></td>


							<!-- <td class="text-center"><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-fw fa-trash"></i></button></td> -->
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
