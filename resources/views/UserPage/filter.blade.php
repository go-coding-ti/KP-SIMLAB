<div class="card-body">
    @if($penyewaan->count()==0)
    <div class="text-center text-danger">
        Tidak ada transaksi
    </div>
    @endif

    @foreach($penyewaan as $pem)
        <div class="card @if($pem->keterangan == 7) warning-gradient-90-card @endif no-border col-xl-12 col-sm-12 col-md-12 pb-4 pt-2">
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
                                        @elseif($pem->keterangan==5)primary
                                        @elseif($pem->keterangan==6)success
                                        @endif font-weight-bold">
                            @if($pem->keterangan==1) Menunggu Konfirmasi
                            @elseif($pem->keterangan==2)Diterima
                            @elseif($pem->keterangan==3)Ditolak
                            @elseif($pem->keterangan==4)Menunggu Pembayaran
                            @elseif($pem->keterangan==5)Pengerjaan
                            @elseif($pem->keterangan==6)Selesai
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
                        <p style="font-size: small;">{{$pem->jumlah}} {{$pem->satuan}} x
                            IDR {{number_format($pem->harga)}},-</p>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-12 border-left text-center">
                        <p style="font-size: small;">Total</p>
                        <h5>IDR {{number_format($pem->total_harga)}},-</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-md-12 text-right pt-4 border-bottom pb-3">
                <button class="text-success @if($pem->keterangan == 7) btn-danger text-light @endif btn" type="button" data-toggle="modal"
                        data-target="#modalDetail{{$pem->id_peminjaman}}">Detail Transaksi
                </button>
                @if($pem->is_process != 1 && $pem->keterangan == 1 || $pem->keterangan == 7) <button class="btn btn-danger">Batalkan</button> @endif
            </div>
        </div>
    @endforeach
</div>