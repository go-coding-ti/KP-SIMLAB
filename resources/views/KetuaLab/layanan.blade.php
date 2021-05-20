@extends('KetuaLabLayout.layout')

@section('activeBidang')
    nav-item active
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Layanan</h6>
            </div>
            <div class="card-body">
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
                                        Aktif
                                        @if($layanan->status_aktif==0)

                                        @elseif($layanan->status_aktif==1)

                                        @elseif($layanan->status_aktif==2)
                                            - Permohonan pengaktifan
                                        @elseif($layanan->status_aktif==3)
                                            - Permohonan penonaktifan
                                        @endif
                                    @elseif($layanan->status == 0)
                                        Belum Diterima
                                    @elseif($layanan->status == 2)
                                        Tidak Aktif
                                        @if($layanan->status_aktif==0)

                                        @elseif($layanan->status_aktif==1)

                                        @elseif($layanan->status_aktif==2)
                                            - Permohonan pengaktifan
                                        @elseif($layanan->status_aktif==3)
                                            - Permohonan penonaktifan
                                        @endif
                                    @elseif($layanan->status == 3)
                                        Permohonan Penghapusan
                                    @endif</td>
                                <td>
                                    <button class="btn btn-warning" href="#" data-toggle="modal"
                                            data-target="#lihat{{$layanan->id_layanan}}"><i class="fa fa-eye"></i>
                                    </button>
                                    @if($layanan->status == 0)
                                        <button class="btn btn-primary" href="#" data-toggle="modal"
                                                data-target="#terima{{$layanan->id_layanan}}"><i
                                                class="fa fa-check"></i>
                                        </button>
                                        <button class="btn btn-danger" href="#" data-toggle="modal"
                                                data-target="#tolak{{$layanan->id_layanan}}"><i class="fa fa-trash"></i>
                                        </button>
                                    @elseif ($layanan->status == 1)
                                        @if($layanan->status_aktif == 0)
                                            <button class="btn btn-primary" href="#" data-toggle="modal"
                                                    data-target="#aktifkan{{$layanan->id_layanan}}"><i
                                                    class="fa fa-check-circle"></i> Aktifkan
                                            </button>
                                        @elseif ($layanan->status_aktif==1)
                                            <button class="btn btn-danger" href="#" data-toggle="modal"
                                                    data-target="#nonaktifkan{{$layanan->id_layanan}}"><i
                                                    class="fa fa-times-circle"></i> Nonaktifkan
                                            </button>
                                        @endif
                                    @elseif($layanan->status==3)
                                        <button class="btn btn-primary" href="#" data-toggle="modal"
                                                data-target="#terimaHapus{{$layanan->id_layanan}}"><i
                                                class="fa fa-check"></i>
                                        </button>
                                        <button class="btn btn-danger" href="#" data-toggle="modal"
                                                data-target="#tolakHapus{{$layanan->id_layanan}}"><i class="fa fa-trash"></i>
                                        </button>
                                    @endif
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
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Menerima
                                Layanan
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Nama Layanan</label>
                                    <input type="text" class="form-control"
                                           value="{{$glayanan->nama_layanan}}" placeholder="" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Satuan</label>
                                    <input type="text" class="form-control"
                                           value="{{$glayanan->satuan}}" placeholder="" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Harga</label>
                                    <input type="text" class="form-control"
                                           value="IDR {{number_format($glayanan->harga)}}" placeholder="" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Bidang</label>
                                    <input type="text" class="form-control"
                                           value="{{$glayanan->relasiLayananToBidang->nama_bidang}}" placeholder="" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Keterangan</label>
                                    <input type="text" class="form-control"
                                           value="{{$glayanan->keterangan}}" placeholder="" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if($glayanan->status==0)
                <div class="modal fade" id="terima{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Menerima
                                    Layanan
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/kepala/layanan/terima"
                                method="POST">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    Apakah Anda yakin menerima layanan {{$glayanan->nama_layanan}}?</b>
                                    <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
                                    <input type="hidden" name="nama_layanan" value="{{$glayanan->nama_layanan}}">
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

                <div class="modal fade" id="tolak{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Menolak
                                    Layanan
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/kepala/layanan/tolak"
                                method="POST">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    Apakah Anda yakin menolak layanan {{$glayanan->nama_layanan}}?</b>
                                    <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
                                    <input type="hidden" name="nama_layanan" value="{{$glayanan->nama_layanan}}">
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
            @elseif ($glayanan->status == 1)
                @if($glayanan->status_aktif == 1)
                    <div class="modal fade" id="nonaktifkan{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Menerima
                                        Layanan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/kepala/layanan/nonaktifkan"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin mengajukan penonaktifan layanan {{$glayanan->nama_layanan}} ?</b>
                                        <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
                                        <input type="hidden" name="nama_layanan" value="{{$glayanan->nama_layanan}}">
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
                @elseif ($glayanan->status_aktif==0)
                    <div class="modal fade" id="aktifkan{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Menerima
                                        Layanan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="/kepala/layanan/aktifkan"
                                    method="POST">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah Anda yakin ingin mengajukan pengaktifkan layanan {{$glayanan->nama_layanan}} ?</b>
                                        <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
                                        <input type="hidden" name="nama_layanan" value="{{$glayanan->nama_layanan}}">
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
                @endif
            @elseif($glayanan->status==3)
                <div class="modal fade" id="terimaHapus{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Menerima
                                    Layanan
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/kepala/layanan/terima/hapus"
                                method="POST">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    Apakah Anda yakin menerima penghapusan layanan {{$glayanan->nama_layanan}}?</b>
                                    <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
                                    <input type="hidden" name="nama_layanan" value="{{$glayanan->nama_layanan}}">
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

                <div class="modal fade" id="tolakHapus{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Menolak
                                    Layanan
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/kepala/layanan/tolak/hapus"
                                method="POST">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    Apakah Anda yakin menolak layanan {{$glayanan->nama_layanan}}?</b>
                                    <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
                                    <input type="hidden" name="nama_layanan" value="{{$glayanan->nama_layanan}}">
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
