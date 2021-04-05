@extends('KetuaLabLayout.layout')

@section('activeBidang')
    nav-item active
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Bidang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-primary">
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th style="text-align:center;">Nama Bidang</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center; width: 15%">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($getBidang as $gb => $bidang)
                            <tr>
                                <td style="text-align:center;">{{$gb+1}}</td>
                                <td>{{$bidang->nama_bidang}}</td>
                                <td>@if($bidang->status == 1)
                                        Diterima
                                    @elseif($bidang->status == 0)
                                        Belum Diterima
                                    @elseif($bidang->status == 3)
                                       Permohonan Penghapusan
                                       @else
                                       Tidak Diterima
                                    @endif</td>
                                <td>
                                    @if($bidang->status == 0)
                                        <button class="btn btn-primary" data-toggle="modal"
                                           data-target="#terima{{$bidang->id_bidang}}"><i class="fa fa-edit"></i> Terima</button>
                                        <button class="btn btn-danger" data-toggle="modal"
                                           data-target="#tolak{{$bidang->id_bidang}}"><i class="fa fa-trash"></i> Tolak</button>
                                        @elseif($bidang->status == 1)
                                        <a class="btn btn-primary" href="/kepala/layanan/{{$bidang->id_bidang}}/{{rawurlencode($bidang->nama_bidang)}}"><i class="fa fa-door-open"></i> Layanan</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach($getBidang as $gbidang)
            @if($gbidang->status==0)
                <div class="modal fade" id="terima{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Hapus Pengguna
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/kepala/bidang/terima"
                                method="POST">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    Apakah Anda yakin menerima bidang {{$gbidang->nama_bidang}}?</b>
                                    <input type="hidden" name="id_bidang" value="{{$gbidang->id_bidang}}">
                                    <input type="hidden" name="nama_bidang" value="{{$gbidang->nama_bidang}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Tidak
                                    </button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="tolak{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Hapus Pengguna
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/kepala/bidang/tolak"
                                method="POST">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    Apakah Anda yakin menolak bidang {{$gbidang->nama_bidang}}?</b>
                                    <input type="hidden" name="id_bidang" value="{{$gbidang->id_bidang}}">
                                    <input type="hidden" name="nama_bidang" value="{{$gbidang->nama_bidang}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Tidak
                                    </button>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

@endsection
