@extends('TeknisiLabLayout.layout')

@section('activeBidang')
    nav-item active
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row justify-content-between">
                <h6 class="font-weight-bold text-primary">Daftar Bidang</h6>
                <button chref="#" data-toggle="modal" data-target="#tambah" class="btn btn-outline-success"><i
                        class="fas fa-plus"></i> Tambah
                    Bidang
                </button>
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
                                        Permohonan
                                    @elseif($bidang->status==3)
                                        Permohonan Penghapusan
                                    @else
                                        Tidak Diterima
                                    @endif</td>
                                <td>
                                    @if($bidang->status == 0)
                                        <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#update{{$bidang->id_bidang}}"><i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#hapus{{$bidang->id_bidang}}"><i class="fa fa-trash"></i>
                                        </button>
                                    @elseif($bidang->status == 1)
                                        <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#update{{$bidang->id_bidang}}"><i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#hapus{{$bidang->id_bidang}}"><i class="fa fa-trash"></i>
                                        </button>
                                        <a class="btn btn-primary"
                                           href="/teknisi/layanan/{{$bidang->id_bidang}}/{{rawurlencode($bidang->nama_bidang)}}"><i
                                                class="fa fa-door-open"></i> Layanan</a>
                                    @elseif($bidang->status==3)
                                        <button class="btn btn-danger" href="#" data-toggle="modal"
                                                data-target="#batal{{$bidang->id_bidang}}"><i class="fa fa-times"></i>
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
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Tambah Bidang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-group" method="POST" action="{{route('tambah-bidang-teknisi')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nama Bidang</label>
                                <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                       placeholder="Nama Bidang">
                            </div>
                            <div class="form-group">
                                <label for="id_lab" class="font-weight-bold text-dark">Pilihan Lab</label>
                                <select name="id_lab[]" id="id_lab" required
                                        class="form-control js-example-basic-multiple" style="width: 100%"
                                        multiple="multiple">
                                    @foreach($menuSidebar as $hA)
                                        <option
                                            value="{{$hA->labRelation->id_laboratorium}}">{{$hA->labRelation->nama_lab}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach($getBidang as $gbidang)
            @if($gbidang->status==0 || $gbidang->status==1)
                <div class="modal fade" id="update{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Update Bidang
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/teknisi/bidang/update"
                                method="POST">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_bidang" value="{{$gbidang->id_bidang}}">
                                    <input type="hidden" name="old_nama_bidang" value="{{$gbidang->nama_bidang}}">
                                    <input type="hidden" name="id_laboratorium"
                                           value="{{$gbidang->relasiBidangToLaboratorium->id_laboratorium}}">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Nama Bidang</label>
                                        <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                               placeholder="" value="{{$gbidang->nama_bidang}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_lab" class="font-weight-bold text-dark">Laboratorium</label>
                                        <select name="id_lab" id="id_lab" class="custom-select" required>
                                            <option
                                                value="{{$gbidang->relasiBidangToLaboratorium->id_laboratorium}}">{{$gbidang->relasiBidangToLaboratorium->nama_lab}}</option>
                                            @foreach($getLab as $gl)
                                                <option value="{{$gl->id_laboratorium}}">{{$gl->nama_lab}}</option>
                                            @endforeach
                                        </select>
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

                <div class="modal fade" id="hapus{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Hapus Bidang
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/teknisi/bidang/delete/{{$gbidang->id_bidang}}/{{rawurlencode($gbidang->nama_bidang)}}/{{$gbidang->relasiBidangToLaboratorium->id_laboratorium}}"
                                method="POST">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    Apakah Anda yakin menolak bidang {{$gbidang->nama_bidang}}?</b>
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
            @elseif($gbidang->status==3)
                <div class="modal fade" id="batal{{$gbidang->id_bidang}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Hapus Bidang
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/teknisi/bidang/delete/batal/{{$gbidang->id_bidang}}/{{rawurlencode($gbidang->nama_bidang)}}/{{$gbidang->relasiBidangToLaboratorium->id_laboratorium}}"
                                method="GET">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    Apakah Anda yakin membatalkan penghapusan bidang {{$gbidang->nama_bidang}}?</b>
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

@section('toast')
    @if($errors->any())
        <!-- Then put toasts within -->
        @foreach ($errors->all() as $error)
            <div class="toast mx-4" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <a class="btn btn-danger"> </a>
                    <strong class="mr-auto">Bootstrap</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <li>{{ $error }}</li>
                </div>
            </div>
        @endforeach
    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
            @if($errors->any())
            $(document).ready(function () {
                $('.toast').toast('show');
            });
            @endif
        });
    </script>
@endsection
