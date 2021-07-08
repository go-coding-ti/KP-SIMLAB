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
    <link type="text/css" rel="stylesheet" href="{{asset('electro-css/bootstrap.min.css')}}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('electro-css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('electro-css/slick-theme.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('electro-css/nouislider.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('electro-css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('electro-css/style.css')}}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }
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

<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>

<script src="{{asset('electro-js/slick.min.js')}}"></script>
<script src="{{asset('electro-js/nouislider.min.js')}}"></script>
<script src="{{asset('electro-js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('electro-js/main.js')}}"></script>
<script src="{{asset('electro-js/bootstrap.min.js')}}"></script>
<script src="{{asset('electro-js/jquery.min.js')}}"></script>
@yield('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('.carouselExampleControls').carousel({
            interval: 2000
        })
    });
</script>

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
</script>
</body>
</html>
