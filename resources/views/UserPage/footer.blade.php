<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
        <div style="font-size: 35px" class="d-flex justify-content-center" class="text-white mx-3">BERITA</div>
            <!-- row -->
            <div class="row">
            @foreach ($Berita as $item)
            <div class="col-md-4 col-xs-6">
                <div class="card">
                    <img src="/images/{{$item->relasiBeritaToLaboratorium->foto_lab}}" alt="">
                        <div class="product-body">
                            
                                <h3 class="product-name"><a href="#">{{$item->judul}}</a></h3>
                                <p class="product-category">{{$item->isi}}</p>
                                <div class="card-footer p-3 text-end border-0">
                                    <small class="text-muted">Diposting pada {{ date('d F Y', strtotime($item->created_at)) }}</small>
                                </div>
                        </div>
                </div>
            </div>
                @endforeach
            </div>
            
            <!-- <div class="col-md-4 col-xs-6">
                <div class="card">
                    <img src="{{asset('electro-img/product01.png')}}" alt="">
                        <div class="product-body">
                            <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <div class="card-footer p-3 text-end border-0">
                                    <small class="text-muted">Diposting pada 11 Apr 2021</small>
                                </div>
                        </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="card">
                    <img src="{{asset('electro-img/product01.png')}}" alt="">
                        <div class="product-body">
                            <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <div class="card-footer p-3 text-end border-0">
                                    <small class="text-muted">Diposting pada 11 Apr 2021</small>
                                </div>
                        </div>
                </div>
            </div> -->
                <!-- <div class="card" style="width: 25rem;">
                    <img src="{{asset('electro-img/product01.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</>
                         </div>
                </div> -->
            </div>
            
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
            <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="#">Hot deals</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Cameras</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
