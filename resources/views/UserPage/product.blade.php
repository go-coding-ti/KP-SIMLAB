@php
    if(is_null(Auth::user())){
     $user_id = 0;
    }else{
     $user_id = Auth::user()->id;
    }
@endphp

@extends('UserPage.layoutUser')

@section('content')
    <div id="breadcrumb" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Laboratorium</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="/images/{{$lab->foto_lab}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="product-details">
                    <h1 style="text:bold;" class="product-name">{{$lab->nama_lab}}</h1>
                    <p><i class="fa fa-map"></i> {{$lab->alamat}}</p>
                    <p><i class="fa fa-phone-square"></i> {{$lab->no_telp}}</p>
                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                        aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                        Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                        ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                        accusamus labore sustainable VHS.</p>
                    <div class="col-md-6">
                        <div class="add-to-cart">
                            <a href="{{route('checkout',$lab->id_laboratorium)}}">
                            <button class="add-to-cart-btn btn-block">
                                <i class="fa fa-shopping-cart"></i> Sewa
                            </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn btn-block"
                                    onclick="IsiCart({{$lab->id_laboratorium}},{{$user_id}})"><i
                                    class="fa fa-shopping-cart"></i> Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab2">Bidang</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                        non proident, sunt in culpa qui officia deserunt mollit anim id est
                                        laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->
                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="accordion">
                                        <div class="row">
                                            @foreach($bidang as $bid)
                                                <div class="card">
                                                    <button class="card-header btn primary-btn cta-btn"
                                                            data-toggle="collapse"
                                                            data-target="#collapse{{$bid->id_bidang}}"
                                                            aria-expanded="true"
                                                            aria-controls="collapse{{$bid->id_bidang}}">
                                                        <div class="" id="headingOne">
                                                            <h5 class="mb-0 text-white">
                                                                {{$bid->nama_bidang}}
                                                            </h5>
                                                        </div>
                                                    </button>
                                                    <div id="collapse{{$bid->id_bidang}}" class="collapse"
                                                         aria-labelledby="headingOne"
                                                         data-parent="#accordion">
                                                        <div class="card-body ml-2">
                                                            <ul>
                                                                @foreach($bid->relasiBidangtoLayanan as $layanan)
                                                                    <li style="list-style-type:square">{{optional($layanan)->nama_layanan}} ( IDR {{number_format(optional($layanan)->harga)}} / {{optional($layanan)->satuan}} ) </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /Product details -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $('.dates #usr1').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true
            });
        });

        function GoToCart(id, user_id) {
            jQuery.ajax({
                url: "{{url('/Cartpenyewaan')}}",
                method: 'post',
                dataType: 'json',
                data: {
                    _token: '{{csrf_token()}}',
                    id_user: user_id,
                    id_laboratorium: id,
                },
                success: function (result) {
                    $('#qty').text(result.jumlahcarts);
                    $('#isicart').empty().append(result.carts);
                    window.location = '{{route('check-out-page')}}';
                }
            });
        }
    </script>
@endsection
