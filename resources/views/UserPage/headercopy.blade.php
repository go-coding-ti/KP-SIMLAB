<header>
    <!-- TOP HEADER -->
    <!-- <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> 089-772-00423</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Udayana</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="/logins"><i class="fa fa-user-o"></i> Login</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </div> -->
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-4">
                    <div class="header-logo">
                        <a style="height:70px !important;" class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                            <div class="sidebar-brand-icon">
                                <img style="height: 40px;" src="{{asset('assets/admin/img/unud.png')}}">
                            </div>
                            <div style="font-size: 35px" class="text-white mx-3">SIM LAB</div>
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->
                <!-- SEARCH BAR -->
                <div class="col-md-5">
                    <div class="header-search">
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								@if (!Auth::user())
									<a class="text-white mx-4" href="{{ route('register') }}">Register</a><span>|</span>
                                    <a class="text-white mx-4" href="{{ route('logins') }}">Login</a>
                                @else
                                <!-- Wishlist -->
								<div>
                                    <a href="#">
                                        <i class="fa fa-bell-o"></i>
                                        <span>Notifikasi</span>
                                        <div class="qty">2</div>
                                    </a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <div class="sidebar-brand-icon">
                                            <img class="border rounded-circle" style="height:30px;width:30px;" src="{{asset('assets/admin/img/guest.png')}}">
                                        </div>
										<span>{{Auth::user()->name}}</span>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->
								
							</div>
						</div>
						<!-- /ACCOUNT -->
                        @endif
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>

