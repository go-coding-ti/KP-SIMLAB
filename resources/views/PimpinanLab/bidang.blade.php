@extends('PimpinanLayout.layout')

@section('activeBidang')
    nav-item active
@endsection

@php
    $menuSidebar = App\Http\Controllers\Pimpinan\PimpinanUtilites::sideBarMenu();
@endphp

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Bidang</h6>
            </div>
            <div class="card-body">
                @if (\Session::has('error'))
                    <div class="alert alert-error">
                        <ul>
                            <li><strong>{!! \Session::get('error') !!}</strong></li>
                        </ul>
                    </div>
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li><strong>{!! \Session::get('success') !!}</strong></li>
                        </ul>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-primary">
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th style="text-align:center;">Nama Bidang</th>
                            <th style="text-align:center; width:15%">Status</th>
                            <th style="text-align:center; width: 15%">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($getBidang as $gb => $bidang)
                            <tr>
                                <td style="text-align:center;">{{$gb+1}}</td>
                                <td>{{$bidang->nama_bidang}}</td>
                                <td>@if($bidang->status==0 || $bidang->status==3 || $bidang->status==2)
                                        @if($bidang->status_aktif == 1)
                                            <div class="text-primary">Aktif <br>(Sedang ada Perubahan)</div>
                                        @elseif($bidang->status_aktif == 0)
                                            <div class="text-danger">Tidak Aktif <br>(Sedang ada Perubahan)</div>
                                        @elseif($bidang->status_aktif == 3)
                                            <div class="text-warning">Permohonan Nonaktif <br>(Sedang ada Perubahan)
                                            </div>
                                        @elseif($bidang->status_aktif == 2)
                                            <div class="text-warning">Permohonan Pengaktifan <br>(Sedang ada Perubahan)
                                            </div>
                                        @endif
                                    @elseif($bidang->status==1)
                                        @if($bidang->status_aktif == 1)
                                            <div class="text-primary">Aktif</div>
                                        @elseif($bidang->status_aktif == 0)
                                            <div class="text-danger">Tidak Aktif</div>
                                        @elseif($bidang->status_aktif == 3)
                                            <div class="text-warning">Permohonan Nonaktif</div>
                                        @elseif($bidang->status_aktif == 2)
                                            <div class="text-warning">Permohonan Pengaktifan</div>
                                        @endif
                                    @endif</td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="/pimpinan/layanan/{{$bidang->id_bidang}}"><i
                                            class="fa fa-door-open"></i> Layanan</a>
                                    <button class="btn btn-warning" data-toggle="modal"
                                            data-target="#lihat{{$bidang->id_bidang}}"><i
                                            class="fa fa-eye"></i> Lihat
                                    </button>
                                    @if($bidang->status == 1)
                                        @if ($bidang->status_aktif==0)
                                            <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#aktifkan{{$bidang->id_bidang}}"><i
                                                    class="fa fa-check-circle"></i>
                                                Aktifkan
                                            </button>
                                        @elseif($bidang->status_aktif==1)
                                            <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#nonaktifkan{{$bidang->id_bidang}}"><i
                                                    class="fa fa-times-circle"></i>
                                                Nonaktifkan
                                            </button>
                                        @elseif($bidang->status_aktif == 2)
                                            <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#terimaAktif{{$bidang->id_bidang}}"><i
                                                    class="fa fa-edit"></i>
                                                Terima
                                            </button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#tolakAktif{{$bidang->id_bidang}}"><i
                                                    class="fa fa-trash"></i>
                                                Tolak
                                            </button>
                                        @elseif($bidang->status_aktif==3)
                                            <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#terimaNonaktif{{$bidang->id_bidang}}"><i
                                                    class="fa fa-edit"></i>
                                                Terima
                                            </button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#tolakNonaktif{{$bidang->id_bidang}}"><i
                                                    class="fa fa-trash"></i>
                                                Tolak
                                            </button>
                                        @endif
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
            <div class="modal fade" id="lihat{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Detail Bidang
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nama Bidang</label>
                                <input type="text" class="form-control" name="keterangan_aktif"
                                       value="{{$gbidang->nama_bidang}}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nama Bidang</label>
                                <input type="text" class="form-control"
                                       value="{{$gbidang->relasiBidangToLaboratorium->nama_lab}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($gbidang->status==1)
                @if($gbidang->status_aktif==0)
                    <div class="modal fade" id="aktifkan{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i>
                                        Pengaktifan Bidang
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/bidang/self/aktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin mengaktifkan bidang {{$gbidang->nama_bidang}}?</b>
                                        <input type="hidden" name="id_bidang" value="{{$gbidang->id_bidang}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Tidak
                                        </button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Ya
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @elseif($gbidang->status_aktif==1)
                    <div class="modal fade" id="nonaktifkan{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i>
                                        Penonaktifan Bidang
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/bidang/self/nonaktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin menonaktifkan bidang {{$gbidang->nama_bidang}}?</b>
                                        <input type="hidden" name="id_bidang" value="{{$gbidang->id_bidang}}">
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Keterangan Nonaktif</label>
                                            <input type="text" class="form-control" name="keterangan_aktif"
                                                   value="" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Tidak
                                        </button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Ya
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @elseif($gbidang->status_aktif==2)
                    <div class="modal fade" id="terimaAktif{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Terima
                                        Pengaktifan Bidang
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/bidang/terima/aktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin menerima pengaktifan bidang {{$gbidang->nama_bidang}}?</b>
                                        <input type="hidden" name="id_bidang" value="{{$gbidang->id_bidang}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Tidak
                                        </button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Ya
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="tolakAktif{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Tolak
                                        Pengaktifan Bidang
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/bidang/tolak/aktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin menolak pengaktifan bidang {{$gbidang->nama_bidang}}?</b>
                                        <input type="hidden" name="id_bidang" value="{{$gbidang->id_bidang}}">
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Keterangan Penolakan</label>
                                            <input type="text" class="form-control" name="keterangan_aktif"
                                                   value="" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Tidak
                                        </button>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Ya
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @elseif($gbidang->status_aktif==3)
                    <div class="modal fade" id="terimaNonaktif{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Terima
                                        Penonaktifan Bidang
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/bidang/terima/nonaktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin menerima penonaktifan bidang {{$gbidang->nama_bidang}}?</b>
                                        <input type="hidden" name="id_bidang" value="{{$gbidang->id_bidang}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Tidak
                                        </button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Ya
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="tolakNonaktif{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Tolak
                                        Penonaktifan Bidang
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/bidang/tolak/nonaktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin menolak penonaktifan bidang {{$gbidang->nama_bidang}}?</b>
                                        <input type="hidden" name="id_bidang" value="{{$gbidang->id_bidang}}">
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Keterangan Penolakan</label>
                                            <input type="text" class="form-control" name="keterangan_aktif"
                                                   value="" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Tidak
                                        </button>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Ya
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
@endsection
