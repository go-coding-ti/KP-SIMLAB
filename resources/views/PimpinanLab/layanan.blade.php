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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Layanan</h6>
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
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th style="text-align:center;">Nama Layanan</th>
                            <th style="text-align:center;">Satuan</th>
                            <th style="text-align:center;">Harga</th>
                            <th style="text-align:center;">Keterangan</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($getLayanan as $gl => $layanan)
                            <tr>
                                <td style="text-align:center;">{{$gl+1}}</td>
                                <td>{{$layanan->nama_layanan}}</td>
                                <td>{{$layanan->satuan}}</td>
                                <td>IDR {{number_format($layanan->harga)}}</td>
                                <td>{{$layanan->keterangan}}</td>
                                <td>@if($layanan->status == 1)
                                        @if($layanan->status_aktif == 0)
                                            <div class="text-danger">Layanan Nonaktif</div>
                                        @elseif($layanan->status_aktif == 1)
                                            <div class="text-primary">Layanan Aktif</div>
                                        @elseif($layanan->status_aktif==2)
                                            <div class="text-warning">Permohonan Pengaktifan</div>
                                        @elseif($layanan->status_aktif==3)
                                            <div class="text-warning">Permohonan Nonaktif</div>
                                        @endif
                                    @elseif($layanan->status == 0 || $layanan->status == 3)
                                        @if($layanan->status_aktif == 0 )
                                            <div class="text-danger">Layanan Nonaktif <br>(Sedang ada perubahan)</div>
                                        @elseif($layanan->status_aktif == 1)
                                            <div class="text-warning">Layanan Aktif <br>(Sedang ada perubahan)</div>
                                        @elseif($layanan->status_aktif==2)
                                            <div class="text-warning">Permohonan Pengaktifan <br>(Sedang ada perubahan)
                                            </div>
                                        @elseif($layanan->status_aktif==3)
                                            <div class="text-warning">Permohonan Nonaktif <br>(Sedang ada perubahan)
                                            </div>
                                        @endif
                                    @elseif($layanan->status == 2)
                                        @if($layanan->status_aktif == 0)
                                            <div class="text-danger">Layanan Nonaktif<br>(Sedang ada perubahan)</div>
                                        @elseif($layanan->status_aktif == 1)
                                            <div class="text-warning">Layanan Aktif<br>(Sedang ada perubahan)</div>
                                        @elseif($layanan->status_aktif==2)
                                            <div class="text-warning">Permohonan Pengaktifan<br>(Sedang ada perubahan)</div>
                                        @elseif($layanan->status_aktif==3)
                                            <div class="text-warning">Permohonan Nonaktif<br>(Sedang ada perubahan)</div>
                                        @endif
                                    @endif</td>
                                <td>
                                    @if($layanan->status == 1)
                                        @if ($layanan->status_aktif == 0)
                                            <button class="btn btn-primary" href="#" data-toggle="modal"
                                                    data-target="#aktif{{$layanan->id_layanan}}"><i
                                                    class="fa fa-check-circle"></i> Aktifkan
                                            </button>
                                        @elseif ($layanan->status_aktif == 1)
                                            <button class="btn btn-danger" href="#" data-toggle="modal"
                                                    data-target="#nonaktif{{$layanan->id_layanan}}"><i
                                                    class="fa fa-times-circle"></i> Nonaktifkan
                                            </button>
                                        @elseif($layanan->status_aktif == 2)
                                            <button class="btn btn-success" href="#" data-toggle="modal"
                                                    data-target="#terimaAktif{{$layanan->id_layanan}}"><i
                                                    class="fa fa-check-square"></i> Terima
                                            </button>
                                            <button class="btn btn-danger" href="#" data-toggle="modal"
                                                    data-target="#tolakAktif{{$layanan->id_layanan}}"><i
                                                    class="fa fa-trash"></i> Tolak
                                            </button>
                                        @elseif($layanan->status_aktif==3)
                                            <button class="btn btn-success" href="#" data-toggle="modal"
                                                    data-target="#terimaNonaktif{{$layanan->id_layanan}}"><i
                                                    class="fa fa-check-square"></i> Terima
                                            </button>
                                            <button class="btn btn-danger" href="#" data-toggle="modal"
                                                    data-target="#tolakNonaktif{{$layanan->id_layanan}}"><i
                                                    class="fa fa-trash"></i> Tolak
                                            </button>
                                        @endif
                                    @endif
                                    <button class="btn btn-warning" href="#" data-toggle="modal"
                                            data-target="#lihat{{$layanan->id_layanan}}"><i
                                            class="fa fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach($getLayanan as $glayanan)
            <div class="modal fade" id="lihat{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Detail Layanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Nama Layanan</label>
                                    <input type="text" class="form-control"
                                           value="{{$glayanan->nama_layanan}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Satuan</label>
                                    <input type="text" class="form-control"
                                           value="{{$glayanan->satuan}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Harga Layanan</label>
                                    <input type="text" class="form-control"
                                           value="{{$glayanan->harga}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Keterangan Layanan</label>
                                    <input type="text" class="form-control"
                                           value="{{$glayanan->keterangan}}" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if($glayanan->status==1)
                @if($glayanan->status_aktif==0)
                    <div class="modal fade" id="aktif{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i>
                                        Pengaktifan Layanan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/layanan/self/aktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin mengaktifkan layanan "{{$glayanan->nama_layanan}}"?</b>
                                        <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Tidak
                                        </button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Ya
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @elseif($glayanan->status_aktif==1)
                    <div class="modal fade" id="nonaktif{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i>
                                        Pengaktifan Layanan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/layanan/self/nonaktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin menonaktifkan layanan "{{$glayanan->nama_layanan}}"?</b>
                                        <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
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
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Ya
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @elseif($glayanan->status_aktif==2)
                    <div class="modal fade" id="terimaAktif{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i>
                                        Pengaktifan Layanan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/layanan/terima/aktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin menerima pengaktifan layanan "{{$glayanan->nama_layanan}}
                                        "?</b>
                                        <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Tidak
                                        </button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Ya
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="tolakAktif{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Menolak
                                        Pengaktifan Layanan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/layanan/tolak/aktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin menolak pengaktifan layanan "{{$glayanan->nama_layanan}}"?</b>
                                        <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
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
                @elseif($glayanan->status_aktif==3)
                    <div class="modal fade" id="terimaNonaktif{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Menerima
                                        Nonaktif Layanan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/layanan/terima/nonaktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin menerima nonaktif layanan "{{$glayanan->nama_layanan}}"?</b>
                                        <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Tidak
                                        </button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Ya
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="tolakNonaktif{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Menolak
                                        Nonaktif Layanan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/pimpinan/layanan/tolak/nonaktif"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin menolak nonaktif layanan "{{$glayanan->nama_layanan}}"?</b>
                                        <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
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
