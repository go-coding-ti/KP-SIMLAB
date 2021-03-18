@extends('KetuaLabLayout.layout')

@section('activePeminjaman')
    nav-item active
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Admin Profile</h1>
        </div>
        <hr style="margin-top: 20px" class="sidebar-divider my-0"> -->

        <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <!-- Copy drisini -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjaman</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th style="text-align:center;">Nama</th>
                            <th style="text-align:center;">Layanan</th>
                            <th style="text-align:center;">Tanggal Peminjaman</th>
                            <th style="text-align:center;">Harga Total</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $d => $doto)
                            <tr>
                                <td style="text-align:center;">{{$d + 1}}</td>
                                <td>{{\Illuminate\Support\Str::limit($doto->relasiPeminjamanToUser->name, 50) }}</td>
                                <td>{{\Illuminate\Support\Str::limit($doto->relasiPeminjamanToLayanan->nama_layanan, 50)}}</td>
                                <td>{{$doto->tgl_pinjam}}</td>
                                <td> RP. {{$doto->total_harga}}</td>
                                <td>@if($doto->keterangan==1)
                                        <a class="btn btn-primary text-white">Menunggu Konfirmasi</a>
                                    @elseif($doto->keterangan==2)
                                        <a class="btn btn-success text-white">Terkonfirmasi</a>
                                    @else
                                        <a class="btn btn-danger text-white">Ditolak</a>
                                    @endif
                                </td>
                                <td>
                                    @if($doto->keterangan==1)
                                        <a class="btn btn-outline-success btn-sm"
                                           href="/kepala/peminjaman/approve/{{$doto->id_peminjaman}}">
                                            <i class="fa fa-check-circle"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#showRefuse{{$doto->id_peminjaman}}"><i
                                                class="fa fa-ban"></i></a>
                                        </button>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#show{{$doto->id_peminjaman}}"><i class="fa fa-eye"></i>
                                        </button>
                                    @elseif($doto->keterangan==2)
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#show{{$doto->id_peminjaman}}"><i class="fa fa-eye"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#show{{$doto->id_peminjaman}}"><i class="fa fa-eye"></i>
                                        </button>
                                @endif
                                <!-- Show -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- smpe sini -->

    @foreach($data as $datas)
        <!-- Modal Show -->
            <div class="modal fade" id="show{{$datas->id_peminjaman}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Peminjaman</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Nama</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                           value="{{$datas->relasiPeminjamanToUser->name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Layanan</label>
                                    <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                           value="{{$datas->relasiPeminjamanToLayanan->nama_layanan}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Tanggal Order</label>
                                    <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                           value="{{$datas->tgl_order}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Tanggal Peminjaman</label>
                                    <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                           value="{{$datas->tgl_pinjam}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Tanggal Selesai</label>
                                    <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                           value="{{$datas->tgl_selesai}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Jumlah</label>
                                    <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                           value="{{$datas->jumlah}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Satuan</label>
                                    <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                           value="{{$datas->satuan}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Harga</label>
                                    <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                           value="{{$datas->harga}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Total Harga</label>
                                    <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                           value="{{$datas->total_harga}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Keterangan</label>
                                    <br>
                                    @if($datas->keterangan==1)
                                        <a class="btn btn-primary text-white">Menunggu Konfirmasi</a>
                                    @elseif($datas->keterangan==2)
                                        <a class="btn btn-success text-white">Terkonfirmasi</a>
                                    @else
                                        <a class="btn btn-danger text-white">Ditolak</a>
                                    @endif
                                </div>
                                @if($datas->keterangan==3)
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Alasan</label>
                                        <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                               value="{{$datas->alasan}}" readonly>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Update -->
            @if($datas->keterangan==1)
                <div class="modal fade" id="showRefuse{{$datas->id_peminjaman}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data Peminjaman</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('kepala-lab-refusal')}}">
                                    @csrf
                                    <input type="hidden" value="{{$datas->id_peminjaman}}" name="id_peminjaman">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Nama</label>
                                        <input type="text" class="form-control"
                                               value="{{$datas->relasiPeminjamanToUser->name}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Layanan</label>
                                        <input type="text" class="form-control"
                                               value="{{$datas->relasiPeminjamanToLayanan->nama_layanan}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Tanggal Order</label>
                                        <input type="text" class="form-control"
                                               value="{{$datas->tgl_order}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Tanggal Peminjaman</label>
                                        <input type="text" class="form-control"
                                               value="{{$datas->tgl_pinjam}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Tanggal Selesai</label>
                                        <input type="text" class="form-control"
                                               value="{{$datas->tgl_selesai}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Jumlah</label>
                                        <input type="text" class="form-control"
                                               value="{{$datas->jumlah}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Satuan</label>
                                        <input type="text" class="form-control"
                                               value="{{$datas->satuan}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Harga</label>
                                        <input type="text" class="form-control"
                                               value="{{$datas->harga}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Total Harga</label>
                                        <input type="text" class="form-control"
                                               value="{{$datas->total_harga}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Keterangan</label>
                                        <br>
                                        @if($datas->keterangan==1)
                                            <a class="btn btn-primary text-white">Menunggu Konfirmasi</a>
                                        @elseif($datas->keterangan==2)
                                            <a class="btn btn-success text-white">Terkonfirmasi</a>
                                        @else
                                            <a class="btn btn-danger text-white">Ditolak</a>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Alasan</label>
                                        <input type="text" class="form-control" id="alasan" name="alasan"
                                               value="">
                                    </div>
                                    <div class="form-group modal-footer">
                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#showRefuse{{$doto->id_peminjaman}}">
                                            <i class="fa fa-ban"> Refuse</i></a>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    @endif
    @endforeach

@endsection
