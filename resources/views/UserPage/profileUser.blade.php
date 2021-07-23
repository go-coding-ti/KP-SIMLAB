@extends('UserPage.layoutUser')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card shadow-lg col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                            </div>
                            <h5 class="user-name">Dewa</h5>
                            <h6 class="user-email">Dewa@gmail.com</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 ml-2">
                <div>
                    <h3>Daftar Transaksi</h3>
                </div>
                <div class="card border-light-grey mb-3">
                    <div class="card-body">
                        @foreach($penyewaan as $pem)
                            <div class="card no-border col-xl-12 col-sm-12 col-md-12 pb-4">
                                <div class="col-xl-12 col-sm-12 col-md-12 border-bottom">
                                    <div class="row no-gutters">
                                        <div class="col-md-1 col-xl-1 col-sm-1">
                                            <div class="row no-gutters">
                                                <div class="col-2">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </div>
                                                <div class="col-10">
                                                    <p class="font-weight-bold">Sewa</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xl-2 col-sm-2">
                                            <p class="">{{date('d F Y', strtotime($pem->tgl_order))}}</p>
                                        </div>
                                        <div class="col-md-4 col-xl-4 col-sm-4">
                                            <p class="text-@if($pem->keterangan==1)waring
                                                            @elseif($pem->keterangan==2)success
                                                            @elseif($pem->keterangan==3)danger
                                                            @elseif($pem->keterangan==4)info
                                                            @elseif($pem->keterangan==5)success
                                                            @endif">
                                                @if($pem->keterangan==1) Menunggu Konfirmasi
                                                @elseif($pem->keterangan==2)Diterima
                                                @elseif($pem->keterangan==3)Ditolak
                                                @elseif($pem->keterangan==4)Menunggu Pembayaran
                                                @elseif($pem->keterangan==5)Pengerjaan
                                                @endif</p>
                                        </div>
                                        <div class="col-md-5 col-xl-5 col-sm-5">
                                            <p class="text-gray">INV\XXX\XXX\10\03\2021</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-sm-12 col-md-12 pt-4 pl-0 ">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4 col-sm-12">
                                            <img src="http://dev.ipb.ac.id/media/images/lab-fmipa1.jpg"
                                                 class="img-fluid">
                                        </div>
                                        <div class="col-xl-5 col-md-4 col-sm-12">
                                            <h5>{{$pem->relasiPeminjamanToLayanan->relasiLayananToBidang->relasiBidangToLaboratorium->nama_lab}}</h5>
                                            <p style="font-size: small;">{{$pem->relasiPeminjamanToLayanan->nama_layanan}}</p>
                                            <p style="font-size: small;">{{$pem->jumlah}} {{$pem->satuan}} x IDR {{number_format($pem->harga)}},-</p>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-12 border-left text-center">
                                            <p style="font-size: small;">Total</p>
                                            <h5>IDR {{number_format($pem->total_harga)}},-</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-sm-12 col-md-12 text-right pt-4 border-bottom pb-3">
                                    <button class="text-success btn ">Detail</button>
                                    <button class="btn btn-success-custom">Pesan Lagi</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
