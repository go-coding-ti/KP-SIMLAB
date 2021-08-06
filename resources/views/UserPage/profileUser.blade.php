@extends('UserPage.layoutUser')

@section('content')
    <div class="container mt-4">
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
                </div>
            </div>
        </div>
    </div>
    @foreach($penyewaan as $modal)
        <div class="modal fade bd-example-modal-lg" id="modalDetail{{$modal->id_peminjaman}}" tabindex="-1"
             role="dialog" aria-labelledby="myExtraLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="card">
                        <div class="modal-header pt-4 no-border shadow-sm">
                            <h4 class="card-title text-center font-weight-bolder">Detail Transaksi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-xl-8 col-sm-11 ml-3">
                                    {{--Disini untuk detail transaksi nya--}}
                                    <div class="card shadow-sm no-border mb-2">
                                        <div class="card-body">
                                            <table class="col-12 mb-3">
                                                <tbody>
                                                <tr>
                                                    <td class="align-middle">
                                                        <h5 class="font-weight-bold align-middle">Status Transaksi</h5>
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <button data-toggle="collapse"
                                                                data-target="#collapse{{$modal->id_peminjaman}}"
                                                                aria-expanded="true"
                                                                aria-controls="collapse" class="btn text-success">Lihat
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-12">
                                                <div id="collapse{{$modal->id_peminjaman}}" class="collapse"
                                                     aria-labelledby="headingOne"
                                                     data-parent="#accordion">
                                                    <div class="card">
                                                        <div class="card-body ml-2">
                                                            <div class="timeline">
                                                                @foreach($modal->progress as $progs)
                                                                    <div class="entry">
                                                                        <div class="title">
                                                                            <h3>{{date('d F Y', strtotime($progs->created_at))}}</h3>
                                                                            <p>{{date('H:m', strtotime($progs->created_at))}}</p>
                                                                        </div>
                                                                        <div class="body">
                                                                            <p>{{ucwords($progs->progress_name)}}</p>
                                                                            <ul>
                                                                                <li>{{ucwords($progs->progress_detail)}}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                {{--Nomor Invoice--}}
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="text-dark font-weight-lighter">No. Invoice</h6>
                                                    <h6 class="font-weight-bold text-success">
                                                        INV\XXX\XXX\10\03\2021</h6>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                {{--Tanggal Penyewaan--}}
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="text-dark font-weight-lighter">Tanggal Penyewaan</h6>
                                                    <h6 class="font-weight-bold text-dark">10 Maret 2021</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--Detail Produk--}}
                                    <div class="card shadow-sm no-border mb-2">
                                        <div class="card-body">
                                            <table class="col-12 mb-3">
                                                <tbody>
                                                <tr>
                                                    <td class="align-middle">
                                                        <h5 class="font-weight-bold align-middle">Detail Produk</h5>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col-md-12 col-xl-4 col-sm-12">
                                                        <img src="http://dev.ipb.ac.id/media/images/lab-fmipa1.jpg"
                                                             class="img-fluid">
                                                    </div>
                                                    <div class="col-xl-5 col-md-12 col-sm-12">
                                                        <h5>Laboratorium struktur dan bahan fakultas teknik1</h5>
                                                        <p style="font-size: small;">SEM dengan coating</p>
                                                        <p style="font-size: small;">2 sampel x
                                                            Rp 900,000,-</p>
                                                    </div>
                                                    <div class="col-xl-3 col-md-12 col-sm-12 border-left text-center">
                                                        <p style="font-size: small;">Total</p>
                                                        <h5>Rp 1,800,000,-</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($modal->keterangan != 3 and $modal->keterangan != 7 and $modal->keterangan != 1)
                                        {{--Rincian Pembayaran--}}
                                        <div class="card shadow-sm no-border mb-2">
                                            <div class="card-body">
                                                <table class="col-12 mb-3">
                                                    <tbody>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <h5 class="font-weight-bold align-middle">Detail
                                                                Pembayaran</h5>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="col-12 mb-3">
                                                    <tbody>
                                                    <tr class="mb-2">
                                                        <td class="align-middle">
                                                            <h6 class="align-middle text-gray-500 font-weight-light">
                                                                Metode
                                                                Pembayaran</h6>
                                                        </td>
                                                        <td class="align-middle">
                                                            <h6 class="text-right text-gray-500 font-weight-light">
                                                                Transfer
                                                                BCA</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <h6 class="align-middle text-gray-500 font-weight-light">
                                                                Total
                                                                Harga</h6>
                                                        </td>
                                                        <td class="align-middle">
                                                            <h6 class="text-right text-gray-500 font-weight-light">Rp
                                                                1,800,000,-</h6>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="col-12">
                                                    <tbody>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <h5 class="font-weight-bold align-middle">Total</h5>
                                                        </td>
                                                        <td class="align-middle">
                                                            <h6 class="text-right text-gray-500 font-weight-light">Rp
                                                                1,800,000,-</h6>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                    @if($modal->keterangan == 3)
                                        <div class="card shadow-sm no-border mb-2 red-ditolak-card-background">
                                            <div class="card-body">
                                                <table class="col-12 mb-3">
                                                    <tbody>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <h5 class="font-weight-bold text-light align-middle">Alasan
                                                                Penolakan</h5>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="col-12 text-light font-weight-bold">
                                                    {{$modal->alasan}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($modal->keterangan == 6)
                                        <div class="card shadow-sm no-border mb-2">
                                            <div class="card-body">
                                                <table class="col-12 mb-3">
                                                    <tbody>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <h5 class="font-weight-bold text-dark align-middle">Hasil
                                                                Uji</h5>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="col-12 text-light font-weight-bold">
                                                    <a class="btn btn-primary" href="{{$modal->file_hasil}}"><i
                                                            class="fa fa-download"></i> Download Hasil</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($modal->keterangan == 4)
                                        {{--Upload File jika Pemblian dikonfirmasi--}}
                                        <div class="card shadow-sm no-border mb-2">
                                            <div class="card-body">
                                                <table class="col-12 mb-3">
                                                    <tbody>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <h5 class="font-weight-bold align-middle">Bukti
                                                                Pembayaran</h5>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="col-12">
                                                    <form method="post" action="{{route('upload-bukti-pembayaran')}}"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                               value="{{$modal->id_peminjaman}}">
                                                        <table class="col-12 mb-3">
                                                            <tbody>
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <div class="custom-file">
                                                                        <input name="file" type="file"
                                                                               class="custom-file-input"
                                                                               id="InputFile" required>
                                                                        <label class="custom-file-label"
                                                                               for="InputFile">Choose
                                                                            file...</label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-right">
                                                                    <button type="submit" class="btn btn-success">Submit
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($modal->keterangan == 7)
                                        {{--Upload File jika Ada Perbaikan--}}
                                        <div class="card shadow-sm warning-gradient-90-card no-border mb-2">
                                            <div class="card-body">
                                                <table class="col-12 mb-3">
                                                    <tbody>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <h5 class="font-weight-bold align-middle">Perbaikan Data</h5>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="col-12">
                                                    <form method="post" action="{{route('perbaikan-file')}}"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                               value="{{$modal->id_peminjaman}}">
                                                        <table class="col-12 mb-3">
                                                            <tbody>
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <div class="custom-file">
                                                                        <input name="file[]" type="file"
                                                                               class="custom-file-input"
                                                                               id="InputFile" required multiple>
                                                                        <label class="custom-file-label"
                                                                               for="InputFile">Choose
                                                                            file...</label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-right">
                                                                    <button type="submit" class="btn btn-warning">Submit
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-3 col-md-10 text-center col-sm-10 mr-3 card shadow-sm no-border"
                                     style="width: ">
                                    {{--Disini Contact Us / Bantuan--}}
                                    <div class="card-body pr-0">
                                        <button class="text-success btn col-11 text-dark font-weight-bold" type="button"
                                                data-toggle="modal" data-target=".bd-example-modal-lg">Hubungi
                                        </button>
                                        <button class="btn btn-success-custom col-11 text-dark font-weight-bold">
                                            Bantuan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('js')
    <script>
        $('#InputFile').on('change', function () {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection
