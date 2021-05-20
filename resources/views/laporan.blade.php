<html>
<head>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
            integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
            crossorigin="anonymous"></script>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/select2/css/select2.min.css')}}" rel="stylesheet"/>
    <!-- Custom styles for this template-->


    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>
<style>
    body {
        font-family: "Times New Roman";
    }
</style>
<body>
<div class="container">
    <table class="container-fluid" style="border-bottom:1px solid black;">
        <tr>
            <td><h2 class="text-center font-weight-bold text-dark mb-0 pb-0">LABORATORIUM UDAYANA</h2>
                <h6 class="text-center text-dark mt-0 mb-4 pt-0">Jalan Sudirman</h6></td>
        </tr>
    </table>
    <table class="container-fluid" style="border-bottom: 1px solid black;">
        <tr>
            <td>
                <div class="row mb-5">
                    <div class="col-sm-6 col-xl-6 col-md-6">
                        <h3 class="text-center text-dark mb-0 pb-0">Jumlah transaksi tahun 2021</h3>
                        <br>
                        <h4 class="text-center text-dark mt-0 mb-4 pt-0">15 transaksi</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-6">
                        <h3 class="text-center text-dark mb-0 pb-0">Jumlah pendapatan tahun 2021</h3>
                        <br>
                        <h4 class="text-center text-dark mt-0 mb-4 pt-0">Rp 1.500.000,-</h4>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <table class="container-fluid" style="border-bottom: 1px solid black;">
        <tr>
            <td>
                <div class="row mb-5">
                    <div class="col-sm-6 col-xl-6 col-md-6">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-6">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Menunggu Konfirmasi
                                        </span>
                            <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Peminjaman Diterima
                                        </span>
                            <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Peminjaman Ditolak
                                        </span>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div class="table-responsive mt-2">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>No.</th>
                <th style="text-align:center;">Jumlah Transaksi</th>
                <th style="text-align:center;">Total Pendapatan</th>
                <th style="text-align:center;">Bulan</th>
                <th style="text-align:center;">Tahun</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>5</td>
                <td>Rp 1.500.000,-</td>
                <td>Januari</td>
                <td>2021</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/admin/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/admin/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<!-- Page level custom scripts -->
<script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/demo/datatables-demo.js')}}"></script>
<script src="{{asset('assets/jquery-dateformat.js')}}"></script>
<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'Feburary', 'March','April','May','June','July','August'],
            datasets: [{
                label: "Earnings",
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: ['1500000','1600000','1300000','600000','800000','300000','900000','1000000',],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return 'IDR ' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': IDR ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });

    // Pie Chart Example
    var ctxs = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctxs, {
        type: 'pie',
        data: {
            labels: ['Menunggu Konfirmasi','Terkonfirmasi','Dibatalkan'],
            datasets: [{
                data: ['5','2','2'],
                backgroundColor: ['#36b9cc', '#1cc88a', '#FF0000'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#8B0000'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
        },
    });
</script>
</body>
</html>
