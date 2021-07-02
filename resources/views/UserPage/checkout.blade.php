@extends('UserPage.layoutUser')

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container-sm">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="/">Home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container-sm">
            <!-- row -->
            <div class="row">

                <div class="col-md-8">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Checkout Laboratorium</h3>
                        </div>
                        
                        @foreach ($carts as $cart)
                        <div class="row border-top border-bottom">
                            <div class="row main align-items-center">
                                <div class="col-3"><img src="{{asset('/images/'.$cart->laboratorium->foto_lab)}}" style="height:110px;width:180px;" alt=""></div>
                                <div class="col">
                                    <div class="title" class="row text-muted">{{$cart->created_at}}</div>
                                    <div class="title"><h5 class="text-uppercase">{{$cart->laboratorium->nama_lab}}</h5></div>
                                    <div class="title">
                                        <h6 class="text-uppercase">
                                            Bidang
                                                <select id="bidangtolayanan{{$cart->id}}"class="col-12"class="input-select" onchange="layanan({{$cart->id}})" >
                                                <option  value="0">-- Pilih Bidang --</option>
                                                @foreach ($cart->laboratorium->relasiLaboratoriumToBidang as $bidang)
                                                <option  value="{{$bidang->id_bidang}}">{{$bidang->nama_bidang}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </h6>
                                    </div>
                                    <div class="title">
                                        <h6 class="text-uppercase">
                                            Layanan
                                            <select id="layanan{{$cart->id}}" class="col-12" class="input-select" onchange="total({{$cart->id}})" onclick="total({{$cart->id}})">
                                                <option value="0">-- Pilih Layanan --</option>
                                            </select>
                                        </h6>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <div class="qty-label">Tanggal Sewa</div>
                                    <div class="qty-label">
                                        <div class="dates">
                                            <input type="date" style="width:192px;" id="usr1" class="input-select" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" >
                                        </div>
                                    </div>
                                    </div>
                                <!-- Quantity -->
						<div class="cart_item_quantity">
							{{-- <p class="text-danger" style="display:none" id="notif{{$loop->iteration-1}}"></p> --}}
							{{-- <span class="qty{{$loop->iteration-1}}">{{$isi->qty}} </span> --}}
							<center><div data-toggle="buttons">
								<label class="btn btn-sm btn-primary btn-rounded tombol-kurang">
								  <input type="radio" name="options" id="option1">-
								</label>
                                <label class="qty">0</label>
								<label class="btn btn-sm btn-success btn-rounded tombol-tambah" >
								  <input type="radio" name="options" id="option2">+
								</label>
							</div></center>
						</div>
                                
                                <div id="total{{$cart->id}}"class="col harga" onchange="total({{$cart->id}})">0<span class="close">&#10005;</span></div>
                            </div>
                            
                        </div>
                        <br>
                        @endforeach
                        
                       
                    </div>

                </div>

                <!-- Order Details -->
                <div class="col-md-4 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Your Order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        @foreach ($carts as $item)
                        <div class="order-products">
                            <div class="order-col">
                                <div>{{$item->laboratorium->nama_lab}}</div>
                                <div class="kontol" id="subtotal{{$item->id}}">0</div>
                            </div>
                        </div>
                        @endforeach
                        
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div id="grand-total"><strong class="order-total">$2940.00</strong></div>
                        </div>
                    </div>
                    {{-- <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                                Direct Bank Transfer
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2">
                            <label for="payment-2">
                                <span></span>
                                Cheque Payment
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-3">
                            <label for="payment-3">
                                <span></span>
                                Paypal System
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms">
                        <label for="terms">
                            <span></span>
                            I've read and accept the <a href="#">terms & conditions</a>
                        </label>
                    </div> --}}
                    <a href="#" class="primary-btn order-submit">Place order</a>
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


@endsection
