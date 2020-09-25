<?php
	// ini adalah koneksi antara web dengan mysql
	$koneksi=mysqli_connect('localhost','root','','thari');
	// ini adalah query untuk mengambil data dari tabel produk
	$query = mysqli_query($koneksi,"SELECT * FROM produk");
	

	if(isset($_POST["submit"])){
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		$data = mysqli_query($koneksi,"INSERT INTO user VALUES('$username','$password','$email')");
	}else if(isset($_POST["login"])){
		$name = $_POST["username"];
		$password = $_POST["password"];

		$username = mysqli_query($koneksi,"SELECT * FROM user where username='$name'");
		$pass = mysqli_query($koneksi,"SELECT * FROM user where password ='$password'");
		if(!(mysqli_num_rows($username) == 1 && mysqli_num_rows($pass) == 1)){
			header("Location: Login_v15/login.html");
			exit;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Order Your Food in Our Cafe</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">Our Cafe</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">Shop</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="shop.html">Menu</a>
							<!-- <a class="dropdown-item" href="product-single.html">Single Product</a> -->
							<a class="dropdown-item" href="cart.html">Cart</a>
						</div>
					</li>
					<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
					<li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span
								class="icon-shopping_cart"></span>[0]</a></li>
								<li class="nav-item active"><a href="Login_v15/login.html" class="nav-link">LogOut</a></li>


				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
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
						<?php while($kolom = mysqli_fetch_assoc($query)) :?>
							<div class="item">
								<div class="product">
									<!-- mengambil data gambar dari tabel produk -->
									<a href="#" class="img-prod"><img src="<?= $kolom["gambar"]?>" alt="Colorlib Template"></a>
									<div class="text pt-3 px-3">
										<!-- mengambil data nama dari tabel produk -->
										<h3><a href="#"><?= $kolom["nama"]?></a></h3>
										<div class="d-flex">
											<div class="pricing">
												<!-- mengambil data harga dari tabel produk -->
												<p class="price">
													<span>
														Rp. <?= $kolom["harga"]/1000?>.000
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
						<?php endwhile;?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center"
					style="background-image: url(images/bg_2.jpg);">
					<a href="https://vimeo.com/45830194"
						class="icon popup-vimeo d-flex justify-content-center align-items-center">
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
				<?php while($kolom = mysqli_fetch_assoc($query)) :?>
					<div class="col-sm col-md-6 col-lg ftco-animate">
						<div class="product">
							<a href="#" class="img-prod"><img class="img-fluid" src="<?= $kolom["gambar"];?>" alt="Colorlib Template"></a>
							<div class="text py-3 px-3">
								<h3><a href="#"><?= $kolom["nama"];?></a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span>Rp. <?= $kolom["harga"]/1000;?>.000</span></p>
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
				<?php endwhile;?>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-section-more img" style="background-image: url(images/bg_5.jpg);">
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
										<div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
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
										<div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
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
										<div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
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
										<div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
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
										<div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
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

	<footer class="ftco-footer bg-light ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">Lampinenung, Banda Aceh</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 83812368240</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">Ourcafe@gmail.com</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="icon-heart color-danger"
							aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Our Cafe</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
	</script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>