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
                <form method="POST" action="{{route('check-out-post')}}">
                    @csrf
                    <div class="col-md-8 m-3">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Checkout Laboratorium</h3>
                            </div>
                            @foreach ($carts as $cart)
                                <div class="row border-top border-bottom" id="layanan-{{$cart->id}}">
                                    
                                    <div class="row main align-items-center">
                                        <br>
                                        <div class="col-md-5"><img
                                                src="{{asset('/images/'.$cart->laboratorium->foto_lab)}}"
                                                style="height:220px;width:340px;" alt=""></div>
                                        <div class="col">
                                            <br>
                                            <div class="title" class="row text-muted">{{$cart->created_at}}</div>
                                            <div class="title"><h5
                                                    class="text-uppercase">{{$cart->laboratorium->nama_lab}}</h5></div>
                                            <div class="title">
                                                <h6 class="text-uppercase">Bidang</h6>
                                                <select id="bidangtolayanan{{$cart->id}}" class="custom-select d-block h-100"
                                                        class="input-select" onchange="layanan({{$cart->id}})" required>
                                                    <option value="0">-- Pilih Bidang --</option>
                                                    @foreach ($cart->laboratorium->relasiLaboratoriumToBidang as $bidang)
                                                        <option
                                                            value="{{$bidang->id_bidang}}">{{$bidang->nama_bidang}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="title">
                                                <h6 class="text-uppercase">Layanan</h6>
                                                <select id="layanan{{$cart->id}}" class="custom-select d-block h-100" class="input-select"
                                                        onchange="total({{$cart->id}})" name="layanan[]"
                                                        onclick="total({{$cart->id}})" required>
                                                    <option value="0">-- Pilih Layanan --</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <div class="qty-label">
                                                <div class="dates row my-5">
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <p class="qty-label">Tanggal Sewa</p>
                                                        <input type="date" id="usr1" class="input-select" name="event_date[]" placeholder="YYYY-MM-DD" autocomplete="off" required>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <p class="qty-label" id="tipekuantitas{{$cart->id}}">Kuantitas ( )</p>
                                                        <div class="numpick">
                                                            <div style="width: 180px" class="input-group">
                                                                <span class="input-group-btn">
                                                                    <button type="button" value="qty" class="btn btn-danger btn-number" data-type="minus" data-id="" data-field="qty">
                                                                        <span class="fas fa-minus"></span>
                                                                    </button>
                                                                </span>
                                                                <input id="qty" type="text" name="qty[]" class="form-control input-number text-center"  value="1" min="1" max="100" required readonly>
                                                                    <span class="input-group-btn">
                                                                <button type="button" value="qty" class="btn btn-success btn-number" data-type="plus" data-id="" data-field="qty">
                                                                    <span class="fas fa-plus"></span>
                                                                </button>
                                                                <button type="button" class="btn btn-danger ml-4" onclick="hapuscart()"><span class="fas fa-trash"></span></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <p class="qty-label" id="tipekuantitas{{$cart->id}}">Input File</p>
                                                        <div class="numpick">
                                                            <div class="input-group">
                                                                <span class="input-group-btn">
                                                                    <button type="button" value="qty" class="btn btn-danger btn-number" data-type="minus" data-id="" data-field="qty">
                                                                        <span class="fas fa-minus"></span>
                                                                    </button>
                                                                </span>
                                                                <input id="qty" type="text" name="qty[]" class="form-control input-number" value="1" min="1" max="100" required readonly>
                                                                    <span class="input-group-btn">
                                                                <button type="button" value="qty" class="btn btn-success btn-number" data-type="plus" data-id="" data-field="qty">
                                                                    <span class="fas fa-plus"></span>
                                                                </button>
                                                                <button type="button" class="btn btn-danger ml-4" onclick="hapuscart()"><span class="fas fa-trash"></span></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="col-md-3 m-3 border border-dark rounded">
                        <div class="p-3">
                            <div class="section-title text-center">
                                <h3 class="title">Your Order</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>PRODUCT</strong></div>
                                    <div><strong>TOTAL</strong></div>
                                </div>
                                @foreach ($carts as $item)
                                    <div class="order-products" id="layanankanan-{{$item->id}}">
                                        <div class="order-col">
                                            <div>{{$item->laboratorium->nama_lab}}</div>
                                            <div class="harga" id="subtotal{{$item->id}}">0</div>
                                        </div>
                                    </div>
                                @endforeach
    
                                <div class="order-col">
                                    <div><strong>TOTAL</strong></div>
                                    <div id="grand-total"><strong class="order-total">000.00</strong></div>
                                </div>
                            </div>
                            <button type="submit" class="primary-btn order-submit">Place order</button>
                        </div> 
                    </div>
                </form>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection

@section('js')
    <script>
        function layanan(id){
            var id_bidang = $('#bidangtolayanan'+id).val();
            jQuery.ajax({
                url: "{{url('/layanan')}}",
                method: 'post',
                dataType: 'json',
                data: {
                    _token: '{{csrf_token()}}',
                    id_bidang: id_bidang,
                },
                success: function(result){
                    $('#layanan'+id).empty().append(result.layanan);
                }
            });
        }


        function total(id){
            var id_layanan = $('#layanan'+id).val();
            var ek=[];
            var total=0;
            jQuery.ajax({
                url: "{{url('/total')}}",
                method: 'post',
                dataType: 'json',
                data: {
                    _token: '{{csrf_token()}}',
                    id: id_layanan,
                },
                success: function(result){
                    var input = $("input[id=qty" + id + "]");
                    var subtotal = input.val() * result.layanan.harga;
                    $('#subtotal'+id).empty().append(subtotal);
                    $('.harga').each(function() { ek.push($(this).text()); });
                    for(var i=0;i<ek.length;i++){
                        total = total+parseInt(ek[i]);
                    }
                    document.getElementById("tipekuantitas"+id).innerHTML = "Kuantitas ( "+result.layanan.keterangan+" )";
                    $('#grand-total').empty().append(total);
                }
            });
        }

        function multi_quantity(id,number){
            var ek=[];
            var total=0;
            jQuery.ajax({
                url: "{{url('/total')}}",
                method: 'post',
                dataType: 'json',
                data: {
                    _token: '{{csrf_token()}}',
                    id: $('#layanan'+id).val(),
                },
                success: function(result){
                    var value = result.layanan.harga * number;
                    $('#subtotal'+id).empty().append(value);
                    console.log(value);
                    $('.harga').each(function() { ek.push($(this).text()); });
                    for(var i=0;i<ek.length;i++){
                        total = total+parseInt(ek[i]);
                    }
                    $('#grand-total').empty().append(total);
                }
            });
        }

        $('.btn-number').click(function (e) {
            e.preventDefault();
            qty = $('.btn-number').val();
            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            id = $(this).attr('data-id');
            var input = $("input[id='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {
                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {
                    if (currentVal < input.attr('max')) {
                        var i = currentVal + 1;
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }

            } else {
                input.val(0);
            }
            multi_quantity(id, input.val());
        });

        $('.input-number').focusin(function () {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function () {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('id');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    </script>
@endsection
