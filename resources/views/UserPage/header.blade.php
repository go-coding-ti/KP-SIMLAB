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
        <div class="container-sm">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-8" >
                    <div class="header-logo">
                        <a style="height:70px !important;"
                           class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                            <div class="sidebar-brand-icon">
                                <img style="height: 40px;" src="{{asset('assets/admin/img/unud.png')}}">
                            </div>
                            <div style="font-size: 35px" class="text-white mx-3">SIM LAB</div>
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                

                <!-- ACCOUNT -->
                <div class="col-md-4 clearfix">
                    <div class="header-ctn" class="text-center">
                        @if (!Auth::user())
                            <a class="text-white mx-4" href="{{ route('register') }}">Register</a><span>|</span>
                            <a class="text-white mx-4" href="{{ route('logins') }}">Login</a>
                        @else
                            <!-- NOTIF -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-bell-o" style="font-size: 25px;"></i>
                                    <div class="qty">2</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="text-center" class="cart-summary"></div>
                                        <div class="product-body">
                                            <small class="text-muted"> 26 Juni 2021 </small>
                                            <h6 class="product-name"><a href="#">Status Penyewaan Laboratorium struktur dan bahan fakultas teknik telah diperbaharui </a></h6>
                                            
                                        </div>
                                        <div class="product-body">
                                            <small class="text-muted"> 26 Juni 2021 </small>
                                            <h6 class="product-name"><a href="#">Status Penyewaan Laboratorium struktur dan bahan fakultas teknik telah diperbaharui </a></h6>
                                            
                                        </div>
                                    <center><a href="/marknotif" class="btn" style="background-color: white;">Mark All As Read</a></center>
                                </div>
                            </div>
                            <!-- NOTIF -->
                            <!-- CART -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart" style="font-size: 25px;"></i>
                                    <div id="qty" class="qty">{{$carts->count()}}</div>
                                </a>
                                <div class="cart-dropdown" id="isicart">
                                    <div class="cart-list">
                                        @foreach ($carts->take(3) as $cart)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{asset('/images/'.$cart->laboratorium->foto_lab)}}" style="height:70px;width:70px;"alt="">
                                            </div>
                                            <div class="product-body">
                                                <small class="text-muted"> {{$cart->created_at}} </small>
                                                <h6 class="product-name"><a href="#">{{$cart->laboratorium->nama_lab}}</a></h6>
                                            </div>
                                            {{-- <button class="delete"><i class="fa fa-close"></i></button> --}}
                                        </div>
                                        @endforeach                                        
                                                                          
                                        </ul>
                                        
                                    </div>
                                    <center><a href="/checkout" class="btn" style="background-color: white;">Show All</a></center>  
                                </div>
                            </div>
                            <!-- CART -->
                            
                            {{-- <div>
                                <a href="#">
                                    <i class="fa fa-bell-o" style="font-size:30px;"></i>
                                    <span>Notifikasi</span>
                                    <div class="qty">2</div>
                                </a>
                            </div> --}}
                            <!-- ACCOUNT -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-user text-light" style="font-size: 25px;"></i>
                                    
                                </a>
                                <div class="cart-dropdown">
                                    <div class="text-center" class="cart-summary">
                                        <img class="border rounded-circle" style="height:60px;width:60px;"
                                             src="/profile_images/{{ Auth::user()->foto_user }}">
                                        <h4>{{Auth::user()->name}}</h4>
                                        <div>
                                            <a href="#">User</a>
                                        </div>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="#">Profile</a>
                                        <a class="dropdown-item" href="#" onclick="logoutModal('show')">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- ACCOUNT -->
                        @endif
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</header>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end
                your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button"
                        data-dismiss="modal">Cancel
                </button>
                <a class="btn btn-primary" href="{{route('logouts')}}">Logout</a>
            </div>
        </div>
    </div>
</div>



