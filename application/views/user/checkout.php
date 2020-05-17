<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Checkout</title>
	<link href="<?= base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/checkout.css">
</head>

<body>
	<section class="wn__checkout__area section-padding--lg bg__white">
		<div class="container">
			<form action="<?= base_url(); ?>index.php/home/pesan" method="POST">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="customer_details">
							<h3 class="text-white">Billing Details</h3>
							<div class="customar__field">
								<div class="margin_between">
									<div class="input_box space_between">
										<input name="id_user" type="hidden" value="<?= $_SESSION['id_user']; ?>">
									</div>
								</div>

								<div class="margin_between">
									<div class="input_box space_between">
										<label class="text-white">Nama <span>*</span></label>
										<input value="<?= $_SESSION['nama_user']; ?>">
									</div>
								</div>

								<div class="margin_between">
									<div class="input_box space_between">
										<label class="text-white">Telepon <span>*</span></label>
										<input name="telepon" type="text" value="<?= $_SESSION['telepon']; ?>">
									</div>
								</div>

								<!-- <div class="margin_between">
									<div class="input_box space_between">
										<label>No. KTP <span>*</span></label>
										<input name="ktp" type="text" placeholder="Nomor KTP">
									</div>
								</div> -->
								<!-- <div class="margin_between">
									<div class="input_box space_between">
										<label>Pembayaran <span>*</span></label>
										<select class="select__option" name="id_pembayaran">
											<option value="BCA">BCA</option>
										</select>
									</div>
								</div> -->
							</div>

						</div>

					</div>
					<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
						<div class="wn__order__box">
							<h3 class="order__title">Your order</h3>
							<ul class="order__total">
								<li>Product</li>
								<li>Price</li>
							</ul>
							<?php foreach ($this->cart->contents() as $items):?>
							<ul class="order_product">
								    <input type="hidden" name="event" value="<?= $items['event'] ?>">
								<li style="margin: 0; border-bottom: 3px dotted grey;">
									<?= $items['name']. ' ( ' . $items['akses'].' ) '?>  <br>
									<?php
									$qty = 0;
									if ($items['qty'] > 1) { ?>
									<a class="operation-qty-min"
										href="<?= base_url(); ?>index.php/home/minQty/<?= $items['id']; ?>">-</a>
									<?php } else { ?>
									<a class="operation-qty-min" href="#">-</a>
									<?php } ?>
									<?php echo $items['qty']?><span>Rp. <?php echo number_format($items['price'],0,',','.')?></span>
									<a class="operation-qty-plus"
										href="<?= base_url(); ?>index.php/home/plusQty/<?= $items['id'] ?>">+</a>
								</li>
							</ul>
							<?php endforeach;?>
							<ul class="shipping__method">
								<a href="<?= base_url('index.php/home/hapusCart') ?>" type="button" class="text-danger">Hapus</a> &nbsp&nbsp
								<a href="<?= base_url('index.php/home/home') ?>" type="button">Home</a>
								<li>Cart Subtotal
									<span>Rp. <?php echo number_format($this->cart->total(),0,',','.')?></span></li>
								</li>
							</ul>

							<ul class="total__amount">
								<li class="text-danger">ORDER TOTAL <span>Rp. <?php echo number_format($this->cart->total() ,0,',','.')?></span>
								</li>
							</ul>
						</div>
						<div class="row beli  mt-5">
							<a type="button" href="<?= base_url('index.php/home/home') ?>"
								class="btn btn-success bg-success">Lanjut Belanja</a>
						</div>
						<div class="row beli  mt-2">

							<?php if ($this->cart->total_items() > 5) { ?>
							<small class="text-danger">Jumlah Tiket Maksimal 5 Setiap Transaksi!</small>
							<input type="submit" value="Pesan Tiket" class="btn btn-danger bg-danger" disabled>
						<?php } else { ?>
							<input type="submit" value="Pesan Tiket" class="btn btn-danger bg-danger">
							<?php } ?>
						</div>
					</div>
				</div>

			</form>
		</div>
	</section>
</body>

</html>
