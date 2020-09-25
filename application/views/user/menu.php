	<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/assets/') ?>images/bg_6.jpg');">
	    <div class="container">
	        <div class="row no-gutters slider-text align-items-center justify-content-center">
	            <div class="col-md-9 ftco-animate text-center">
	                <h1 class="mb-0 bread">Menu</h1>
	                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Menu</span></p>
	            </div>
	        </div>
	    </div>
	</div>

	<section class="ftco-section bg-light">
	    <div class="container-fluid">
	        <div class="row">
				<?php foreach($produk->result() as $p):?>
	            <div class="col-sm col-md-6 col-lg-3 ftco-animate">
	                <div class="product">
	                    <a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/assets/images/'.$p->gambar) ?>" alt="Colorlib Template">
	                    </a>
	                    <div class="text py-3 px-3">
	                        <h3><a href="#"><?=$p->nama?></a></h3>
	                        <div class="d-flex">
	                            <div class="pricing">
	                                <p class="price"><span class="price-sale">$ <?=number_format($p->harga,0,".",",")?></span>
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
	                        <hr>
	                        <p class="bottom-area d-flex">
	                            <a href="<?=base_url('user/menu')?>?produk_id=<?=$p->id?>" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
	                            <!-- <a href="#" class="ml-auto"><i><i class="ion-ios-heart-empty"></i></i></a> -->
	                        </p>
	                    </div>
	                </div>
	            </div>
				<?php endforeach;?>

	            <!-- <div class="col-sm col-md-6 col-lg-3 ftco-animate">
	                <div class="product">
	                    <a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/assets/') ?>images/product-2.jpg" alt="Colorlib Template">
	                        <span class="status">New Food</span>
	                    </a>
	                    <div class="text py-3 px-3">
	                        <h3><a href="#">Tiramishu CAKE</a></h3>
	                        <div class="d-flex">
	                            <div class="pricing">
	                                <p class="price"><span>Rp. 35.000</span></p>
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
	            <div class="col-sm col-md-6 col-lg-3 ftco-animate">
	                <div class="product">
	                    <a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/assets/') ?>images/product-3.jpg" alt="Colorlib Template"></a>
	                    <div class="text py-3 px-3">
	                        <h3><a href="#">Egg with Creamy Soup</a></h3>
	                        <div class="d-flex">
	                            <div class="pricing">
	                                <p class="price"><span>Rp. 40.000</span></p>
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
	            <div class="col-sm col-md-6 col-lg-3 ftco-animate">
	                <div class="product">
	                    <a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/assets/') ?>images/product-4.jpg" alt="Colorlib Template"></a>
	                    <div class="text py-3 px-3">
	                        <h3><a href="#">Pumpkin Soup with Oyster Sauce</a></h3>
	                        <div class="d-flex">
	                            <div class="pricing">
	                                <p class="price"><span>Rp.60.000</span></p>
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
	            <div class="col-sm col-md-6 col-lg-3 ftco-animate">
	                <div class="product">
	                    <a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/assets/') ?>images/product-5.jpg" alt="Colorlib Template"></a>
	                    <div class="text py-3 px-3">
	                        <h3><a href="#">Scallops</a></h3>
	                        <div class="d-flex">
	                            <div class="pricing">
	                                <p class="price"><span>Rp. 80.000</span></p>
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
	            <div class="col-sm col-md-6 col-lg-3 ftco-animate">
	                <div class="product">
	                    <a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/assets/') ?>images/product-6.jpg" alt="Colorlib Template"></a>
	                    <div class="text py-3 px-3">
	                        <h3><a href="#">Toasted Bread with Strawberry</a></h3>
	                        <div class="d-flex">
	                            <div class="pricing">
	                                <p class="price"><span>Rp. 35.000</span></p>
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
	            <div class="col-sm col-md-6 col-lg-3 ftco-animate">
	                <div class="product">
	                    <a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/assets/') ?>images/product-7.jpg" alt="Colorlib Template"></a>
	                    <div class="text py-3 px-3">
	                        <h3><a href="#">Brisket beef with boiled egg</a></h3>
	                        <div class="d-flex">
	                            <div class="pricing">
	                                <p class="price"><span>Rp. 50.000</span></p>
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
	            <div class="col-sm col-md-6 col-lg-3 ftco-animate">
	                <div class="product">
	                    <a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/assets/') ?>images/product-8.jpg" alt="Colorlib Template">
	                        <span class="status">Best Sellers</span>
	                    </a>
	                    <div class="text py-3 px-3">
	                        <h3><a href="#">Pancake with blueberry souce </a></h3>
	                        <div class="d-flex">
	                            <div class="pricing">
	                                <p class="price"><span>Rp. 65.000</span></p>
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
	            </div> -->
	        </div>
	        <div class="row mt-5">
	            <div class="col text-center">
	                <div class="block-27">
	                    <ul>
	                        <li><a href="#">&lt;</a></li>
	                        <li class="active"><span>1</span></li>
	                        <li><a href="#">2</a></li>
	                        <li><a href="#">3</a></li>
	                        <li><a href="#">&gt;</a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>