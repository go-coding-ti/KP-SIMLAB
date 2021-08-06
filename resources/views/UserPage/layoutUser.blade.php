<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="{{asset('electro-css/bootstrap.min.css')}}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('electro-css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('electro-css/slick-theme.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('timeline-css/timeline.css')}}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('electro-css/nouislider.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('electro-css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('electro-css/style.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('style.css')}}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Favicons -->
    <link href="{{asset('Berita/img/favicon.png')}}" rel="icon">
    <link href="{{asset('Berita/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('Berita/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('Berita/vendor/aos/aos.css')}}" rel="stylesheet">
    {{-- <link href="Berita/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{asset('Berita/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('Berita/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('Berita/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('Berita/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
{{-- <link href="Berita/css/style.css" rel="stylesheet"> --}}

<!-- =======================================================
        * Template Name: Moderna - v4.3.0
        * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    <style>

    </style>
</head>
<body>
<!-- HEADER -->
@include('UserPage.header')
<!-- /HEADER -->
<!-- NAVIGATION -->
@include('UserPage.navigation')
<!-- /NAVIGATION -->
<section>
    @yield('content')
</section>
<!-- FOOTER -->
@include('UserPage.footer')
<!-- /FOOTER -->
<!-- jQuery Plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="{{asset('electro-js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('electro-js/bootstrap.min.js')}}"></script>
<script src="{{asset('electro-js/slick.min.js')}}"></script>
<script src="{{asset('electro-js/nouislider.min.js')}}"></script>
<script src="{{asset('electro-js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('electro-js/main.js')}}"></script>

@yield('js')
@include('sweetalert::alert')
<script>
    function logoutModal(condition) {
        $('#logoutModal').modal(condition);
    }

    function IsiCart(id, user_id) {
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
                alert(result.success);
                $('#qty').text(result.jumlahcarts);
                console.log(result.jumlahcarts);
                $('#isicart').empty().append(result.carts);
            }
        });
    }

    function hapuscart(id) {
        jQuery.ajax({
            url: "{{url('/hapuscart')}}",
            method: 'post',
            dataType: 'json',
            data: {
                _token: '{{csrf_token()}}',
                id_cart: id,
            },
            success: function (result) {
                alert(result.success);
                $('#layanan-' + id).hide();
                $('#layanankanan-' + id).hide();
                $('#qty').text(result.jumlahcarts);
            }
        });
    }
</script>
</body>
</html>
