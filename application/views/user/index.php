<div class="hero-wrap js-fullheight" style="background-image: url('<?= base_url('assets/assets/') ?>images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
			<h3 class="vr">Since - 2019</h3>
			<div class="col-md-11 ftco-animate text-center">
				<h1>OUR CAFE</h1>
				<h2><span>GET YOUR FOOD</span></h2>
			</div>
			<div class="mouse">
				<a href="#" class="mouse-icon">
					<div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="goto-here"></div>

<section class="ftco-section ftco-product">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h1 class="big">Favorite</h1>
				<h2 class="mb-4">Favorite</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="product-slider owl-carousel ftco-animate">
					<!-- ini adalah logika mengambil semua produk di database produk -->
					<?php foreach ($query->result() as $row) : ?>
						<div class="item">
							<div class="product">
								<!-- mengambil data gambar dari tabel produk -->
								<a href="#" class="img-prod"><img src="<?= base_url('assets/assets/images/' . $row->gambar) ?>" alt="Colorlib Template"></a>
								<div class="text pt-3 px-3">
									<!-- mengambil data nama dari tabel produk -->
									<h3><a href="#"><?= $row->nama ?></a></h3>
									<div class="d-flex">
										<div class="pricing">
											<!-- mengambil data harga dari tabel produk -->
											<p class="price">
												<span>
													Rp. <?= $row->harga / 1000 ?>.000
												</span>
											</p>
										</div>
										<div class="rating">
											<p class="text-right">
												<span class="ion-ios-star-outline"></span>
												<span class="ion-ios-star-outline"></span>
												<span class="ion-ios-star-outline"></span>
												<span class="ion-ios-star-outline"></span>
												<span class="ion-ios-star-outline"></span>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?= base_url('assets/assets/') ?>images/bg_2.jpg);">
				<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
					<span class="icon-play"></span>
				</a>
			</div>
			<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
				<div class="heading-section-bold mb-5 mt-md-5">
					<div class="ml-md-0">
						<h2 class="mb-4">Cafe<br>Food Order<br> </h2>
					</div>
				</div>
				<div class="pb-md-5">
					<p>Our Cafe berdiri mulai pada awal tahun 2019 oleh Tedy Alfariansah, Arinda Febryola, Thari Annisa, Nayla
						Suqya dan
						Riftha Muzilla</p>
					<p>Our Cafe berkonsep dengan gaya kekinian dan instagramble bangeeetttsszzz sehingga remaja nyaman saat
						sedang menikmati semua menu yang
						ada di Our Cafe. Enjoy Your Food!!!!</p>

				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h1 class="big">Our Menu</h1>
				<h2 class="mb-4">Menu</h2>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php foreach ($query->result() as $row) : ?>
				<div class="col-sm col-md-6 col-lg ftco-animate">
					<div class="product">
						<a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/assets/images/' . $row->gambar); ?>" alt="Colorlib Template"></a>
						<div class="text py-3 px-3">
							<h3><a href="#"><?= $row->nama ?></a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price"><span>Rp. <?= $row->harga / 1000; ?>.000</span></p>
								</div>
								<div class="rating">
									<p class="text-right">
										<span class="ion-ios-star-outline"></span>
										<span class="ion-ios-star-outline"></span>
										<span class="ion-ios-star-outline"></span>
										<span class="ion-ios-star-outline"></span>
										<span class="ion-ios-star-outline"></span>
									</p>
								</div>
							</div>
							<hr>
							<p class="bottom-area d-flex">
								<a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
								<a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
							</p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="ftco-section ftco-section-more img" style="background-image: url(<?= base_url('assets/assets/') ?>images/bg_5.jpg);">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section ftco-animate">
				<h2>Enjoy Your Food</h2>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h1 class="big">Testimony</h1>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8 ftco-animate">
				<div class="row ftco-animate">
					<div class="col-md-12">
						<div class="carousel-testimony owl-carousel ftco-owl">
							<div class="item">
								<div class="testimony-wrap py-4 pb-5">
									<div class="user-img mb-4" style="background-image: url(<?= base_url('assets/assets/') ?>images/person_1.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<p class="mb-4">Makanan di Cafe ini enak banget dan pelayananya juuga ccepat</p>
										<p class="name">Arinda Febryola</p>
										<span class="position">Customer</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap py-4 pb-5">
									<div class="user-img mb-4" style="background-image: url(<?= base_url('assets/assets/') ?>images/person_2.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<p class="mb-4"> Paling enak Pumpkin Soup with Oyster ter the best deh</p>
										<p class="name">Tedy Alfariansah</p>
										<span class="position">Customer</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap py-4 pb-5">
									<div class="user-img mb-4" style="background-image: url(<?= base_url('assets/assets/') ?>images/person_3.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<p class="mb-4"> Pelayanan sangat bagus dan tempatnya nyaman banget!!!! </p>
										<p class="name">Thari Annisa</p>
										<span class="position">Customer</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap py-4 pb-5">
									<div class="user-img mb-4" style="background-image: url(<?= base_url('assets/assets/') ?>images/person_1.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<p class="mb-4">Tempat Favorite Nongkrongku ya "Our Cafe"</p>
										<p class="name">Nayla Suqya</p>
										<span class="position">Customer</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap py-4 pb-5">
									<div class="user-img mb-4" style="background-image: url(<?= base_url('assets/assets/') ?>images/person_1.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<p class="mb-4">Semua maknananya enak-enak dan tempatnya Instagramble banget</p>
										<p class="name">Riftha Muzilla</p>
										<span class="position">Customer</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>