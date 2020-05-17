<div class="card col-12">

	<h3 class="mt-3 card-tittle">Periode : <?= date('d M Y') ?></h3>
	<div class="row mt-3">
		<div class="col-lg-4 col-sm-12">
			<div class="card gradient-1">
				<div class="card-body">
					<h3 class="card-title text-white">Jumlah Guest Star</h3>
					<div class="d-inline-block">
						<h2 class="text-white"><?= $this->db->count_all('guest') ?></h2>
						<p class="text-white mb-0"><?= date('d M Y') ?></p>
					</div>
					<span class="float-right display-5 opacity-5"><i class="fa fa-star"></i></span>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-sm-12">
			<div class="card gradient-2">
				<div class="card-body">
					<h3 class="card-title text-white">Tiket Terjual</h3>
					<div class="d-inline-block">
						<h2 class="text-white">2567</h2>
						<p class="text-white mb-0"><?= date('d M Y') ?></p>
					</div>
					<span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-sm-12">
			<div class="card gradient-3">
				<div class="card-body">
					<h3 class="card-title text-white">Jumlah Customer</h3>
					<div class="d-inline-block">
						<h2 class="text-white"><?= $this->db->count_all('user') ?></h2>
						<p class="text-white mb-0"><?= date('d M Y') ?></p>
					</div>
					<span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
				</div>
			</div>
		</div>

	</div>
</div>
