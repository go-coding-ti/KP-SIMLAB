@extends('PimpinanLayout.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-1">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center ">
                            <div class="col mr-2 p-3">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pendapatan (Bulanan)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">IDR {{number_format(round($totalBulanan))}}</div>
                            </div>
                            <div class="col-auto p-3">
                                <i class="fas fa-coins fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-1">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 p-3">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pendapatan (Tahunan)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">IDR {{number_format(round($totalTahunan))}}</div>
                            </div>
                            <div class="col-auto p-3">
                                <i class="fas fa-coins fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-3 mb-1">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 p-3">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Transaksi Tahun {{\Carbon\Carbon::now()->year}}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transactionThisYear}}</div>
                            </div>
                            <div class="col-auto p-3">
                                <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-3 mb-1">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 p-3">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Transaksi Bulan {{\Carbon\Carbon::now()->format('F Y')}}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transactionThisMonth}}</div>
                            </div>
                            <div class="col-auto p-3">
                                <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-5">
                <div class="card shadow">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pendapatan ({{\Carbon\Carbon::now()->format('Y')}})</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-7">
                <div class="card shadow">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center ">
                        <h6 class="m-0 font-weight-bold text-primary">Transaksi Layanan ({{\Carbon\Carbon::now()->format('Y')}})</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
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
            </div>
        </div>
        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th style="text-align:center;">Jumlah Transaksi</th>
                                <th style="text-align:center;">Total Pendapatan</th>
                                <th style="text-align:center;">Bulan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($laporanTabel as $lap => $lp)
                                <tr>
                                    <td>{{$lap+1}}</td>
                                    <td>{{$lp->jumlah}} kali transaksi</td>
                                    <td>IDR {{number_format($lp->sub_total)}}</td>
                                    <td>{{DateTime::createFromFormat('!m',$lp->month)->format('F')}} - {{DateTime::createFromFormat('!Y',$lp->year)->format('Y')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_javascript')
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
                labels: {!!json_encode($json_bulan)!!},
                datasets: [{
                    label: "Earnings",
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    data: {!! json_encode($json_total) !!},
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
                labels: {!! json_encode($json_pie_keterangan) !!},
                datasets: [{
                    data: {!! json_encode($json_pie_jumlah_transaksi) !!},
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
@endsection
