
<div class="col-lg-12">
<?= $this->session->flashdata('notif'); ?>
						<div class="card">
							<div class="card-body">
								<div class="card-title">
									<h4>Data Sponsor</h4>
								</div>
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama Sponsor</th>
												<th>Keterangan</th>
												<th>Gambar</th>
												<th class="text-center">Hapus</th>
											</tr>
										</thead>
										<tbody>

										<?php $no=1; foreach($sponsor as $s) { ?>
											<tr>
												<th><?= $no++; ?></th>
												<td><?= $s->nama_sponsor; ?></td>
												<td><?= $s->keterangan; ?></td>
												<td><img src="<?php echo base_url('/assets/images/sponsor/'.$s->logo_sponsor) ?>" height="30px" /></td>
												<td class="text-center"><a class="btn btn-sm btn-danger" href="<?=base_url('sponsor/delete_sponsor');?>/<?= $s->id_sponsor ?>" onClick="return confirm('Yakin?');"><i class="fa fa-fw fa-trash"></i></a></td>
                                                <!-- <td class="text-center"><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-fw fa-trash"></i></button></td> -->
											</tr>
										<?php } ?>
                  </tbody>
									</table>
								</div>
							</div>
                            <button class="btn btn-block btn-primary sweet-success" data-toggle="modal" data-target="#tambah_data"><i class="fa fa-fw fa-plus-circle"></i> Tambah Sponsor</button>
						</div>
						<!-- /# card -->
					</div>

					<!-- MODAL TAMBAH GS -->
					<div id="tambah_data" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
							<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-fw fa-star"></i> Tambah Data Guest Star</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
							</div>
							<div class="modal-body">
											<?php echo form_open("data_sponsor/tambah", array('enctype'=>'multipart/form-data')); ?>
											<h5 class="mb-3 text-danger">* Penambahan data ini akan ditampilkan sesuai dengan jumlah data di halaman web</h5>
											<div class="form-group row">
													<label for="inputPassword" class="col-sm-2 col-form-label">Nama Sponsor <b class="text-danger">*</b></label>
													<div class="col-sm-10">
													<input type="text" class="form-control" name="nama_sponsor">
													</div>
											</div>
											<div class="form-group row">
													<label for="inputPassword" class="col-sm-2 col-form-label">Logo<b class="text-danger">*</b></label>
													<div class="col-sm-10">
													<input type="file" class="form-control" name="logo_sponsor">
													</div>
											</div>
											<div class="form-group row">
													<label for="exampleFormControlTextarea1" class="col-sm-2">Keterangan <b class="text-warning">*</b></label>
													<div class="col-sm-10">
													<textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
													</div>
											</div>
													<input type="submit" class="btn btn-primary btn-block" name="submit" value="SIMPAN">


								<?php echo form_close(); ?>

							</div>
					</div>
					</div>
				</div>
					<!-- END MODAL -->


					<!-- MODAL HAPUS -->
					<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">Hapus Admin</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<b>*Anda yakin akan menghapus akun admin ?</b>
						</div>
						<div class="modal-footer">

							<a href="<?= base_url('admin/delete_admin'); ?>/<?= $a->id_admin ?>" class="btn btn-danger">Hapus</a>
						</div>
						</div>
					</div>
					</div>
					<!-- END MODAL HAPUS -->
