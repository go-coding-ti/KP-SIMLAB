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
                <div class="col-md-3">
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
                <div class="col-md-6">
                    <div class="header-search" >
                        <form class="text-center" action="{{route('search')}}" method="POST">
                            @csrf
                            <input id="search" name="search" class="input input-select" placeholder="Search here">
                            <input class="search-btn" value="Search" type="submit">
                        </form>
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
                                        <i class="fa fa-bell-o" style="font-size:30px;"></i>
                                                <span>Notifikasi</span>
                                        <div class="qty">2</div>
                                    </a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <div class="sidebar-brand-icon">
                                            <img class="border rounded-circle" style="height:35px;width:35px;" src="/profile_images/{{ Auth::user()->foto_user }}">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Logout
                                            </a>
                                        </div>
                                        <!-- Logout Modal-->
                                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary" href="{{route('logouts')}}">Logout</a>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
										
									</a>
									<div class="cart-dropdown">
										<div class="text-center" class="cart-summary">
                                            <img class="border rounded-circle" style="height:60px;width:60px;" src="/profile_images/{{ Auth::user()->foto_user }}">
											<h4>{{Auth::user()->name}}</h4>
                                            <div>
                                                <a href="#">Edit User</a>
                                                
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



