<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>SIM LAB</title>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/select2/css/select2.min.css')}}" rel="stylesheet"/>
    <!-- Custom styles for this template-->


    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style>
        p.ket-1 {
            color: #fff;
            background-color: #FF993C;
            border-color: #FF993C;
        }

        p.ket-1:hover {
            color: #fff;
            background-color: #FF993C;
            border-color: #FF993C;
        }

        p.ket-2 {
            color: #fff;
            background-color: #0f3bc0;
            border-color: #0f3bc0;
        }

        p.ket-2:hover {
            color: #fff;
            background-color: #0f3bc0;
            border-color: #0f3bc0;
        }

        p.ket-3 {
            color: #fff;
            background-color: #ff3b7d;
            border-color: #ff3b7d;
        }

        p.ket-3:hover {
            color: #fff;
            background-color: #ff3b7d;
            border-color: #ff3b7d;
        }

        p.ket-4 {
            color: #000000;
            background-color: #ffff00;
            border-color: #ffff00;
        }

        p.ket-4:hover {
            color: #000000;
            background-color: #ffff00;
            border-color: #ffff00;
        }

        p.ket-5 {
            color: #fff;
            background-color: #8800ff;
            border-color: #8800ff;
        }

        p.ket-5:hover {
            color: #fff;
            background-color: #8800ff;
            border-color: #8800ff;
        }

        p.ket-6 {
            color: #000000;
            background-color: #3cff00;
            border-color: #3cff00;
        }

        p.ket-6:hover {
            color: #000000;
            background-color: #3cff00;
            border-color: #3cff00;
        }
    </style>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

@include('KetuaLabLayout.ketuaLabSidebar')

<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('KetuaLabLayout.ketuaLabNavbar')

            @yield('content')

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

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

<!-- Bootstrap core JavaScript-->
<script src="{{asset('electro-js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/admin/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin/js/demo/datatables-demo.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Custom Javascript -->
@yield('custom_javascript')


<script src="{{asset('/assets/select2/js/select2.min.js')}}"></script>
<!-- Multi Input JQuery -->
@yield('script')

<script>
    function notifClick(id_user){
        jQuery.ajax({
                url: "/notif/read/"+id_user,
                method: 'get',
                success: function(result){
                    console.log('success');
                }
        });
    }
</script>

@include('sweetalert::alert')
</body>

</html>
