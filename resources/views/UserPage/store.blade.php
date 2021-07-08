@extends('UserPage.layoutUser')

@section('content')
    <div class="section">
        <div class="container-sm">
            <div class="row">
                <div id="store" class="col-md-12">
                    <div class="row">
                        <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
                        @foreach ($Laboratorium as $item)
                            <div class="col-md-4 col-xs-6">
                                {{-- <a href="/Laboratorium/{{$item->id_laboratorium}}"></a> --}}
                                <div class="product">
                                    <div class="product-img">
                                        <img src="/images/{{$item->foto_lab}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <a href="/Laboratorium/{{$item->id_laboratorium}}"><h3
                                                class="product-name">{{$item->nama_lab}}</h3></a>
                                        <p class="product-category">{{$item->alamat}}</p>
                                        <!-- <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4> -->
                                    </div>
                                    {{-- <div class="add-to-cart">
                                    <a "> <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Sewa</button></a>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-end" class="d-flex align-items-end">
                        {{$Laboratorium->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- {{-- @section('js')
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
        $('.product').show();
        var filter = $(this).val(); // get the value of the input, which we filter on
        $('.container').find(".product-name:not(:contains(" + filter + "))").parent().css('display','none');
    });
});
</script>
@endsection --}} -->
