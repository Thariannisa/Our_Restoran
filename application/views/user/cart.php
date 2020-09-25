	<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/assets/') ?>images/bg_6.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<h1 class="mb-0 bread">Keranjang</h1>
					<!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p> -->
				</div>
			</div>
		</div>
	</div>
	<?= $this->session->flashdata('message') ?>
	<section class="ftco-section ftco-cart">
		<div class="container">
			<form action="<?= base_url('user/cart') ?>" method="POST">
				<div class="row">
					<div class="col-md-12 ftco-animate">
						<div class="cart-list">
							<table class="table">
								<thead class="thead-primary">
									<tr class="text-center">
										<?php if ($this->session->flashdata('message')) { ?>
											<th>Nama</th>
											<th>Nomor Meja</th>
											<th>Total</th>
										<?php } else { ?>
											<th>&nbsp;</th>
											<th>&nbsp;</th>
											<th>Food</th>
											<th>Price</th>
											<th>Quantity</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php if ($this->session->flashdata('message')) { ?>
										<td><?= $user['username'] ?></td>
										<td><?= $total['nomor_meja'] ?></td>
										<td>Rp. <?= number_format($total['total_harga'], 0, '.', ',')  ?></td>
									<?php } else { ?>
										<?php foreach ($data->result() as $d) : ?>
											<tr class="text-center">
												<td class="product-remove"><a href="<?= base_url('user/cancel') ?>?id=<?= $d->id ?>"><span class="ion-ios-close"></span></a></td>
												<td class="image-prod">
													<div class="img" style="background-image:url(<?= base_url('assets/assets/images/' . $d->gambar) ?>);">
													</div>
												</td>
												<td class="product-name">
													<h3><?= $d->nama ?></h3>
												</td>
												<td class="price">Rp. <?= number_format($d->harga, 0, '.', ',') ?></td>
												<td class="quantity">
													<div class="input-group mb-3">
														<input type="text" name="quantity[]" class="quantity form-control input-number" value="1" min="1" max="100">
													</div>
												</td>
											</tr><!-- END TR-->
										<?php endforeach; ?>
										<tr class="text-center">
											<div class="w-100"></div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="phone">Masukkan Nomor Meja</label>
													<input type="text" name="nomor_meja" class="form-control" placeholder="">
												</div>
											</div>
										</tr><!-- END TR-->
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<?php if (!$this->session->flashdata('message')) { ?>
					<div class="row justify-content-end">
						<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
							<p class="text-center"><button type="submit" class="btn btn-primary py-3 px-4">Order</button></p>
						</div>
					</div>
				<?php } ?>
			</form>
		</div>
	</section>
