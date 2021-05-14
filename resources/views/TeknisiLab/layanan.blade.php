@extends('TeknisiLabLayout.layout')

@section('activeBidang')
    nav-item active
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row justify-content-between">
                <h6 class="font-weight-bold text-primary">Daftar Layanan</h6>
                <button chref="#" data-toggle="modal" data-target="#tambah" class="btn btn-outline-success"><i
                        class="fas fa-plus"></i> Tambah
                    Layanan
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-primary">
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th style="text-align:center;">Nama Layanan</th>
                            <th style="text-align:center;">Satuan</th>
                            <th style="text-align:center;">Harga</th>
                            <th style="text-align:center;">Keterangan</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($getLayanan->relasiBidangtoLayanan as $gl => $layanan)
                            <tr>
                                <td style="text-align:center;">{{$gl+1}}</td>
                                <td>{{$layanan->nama_layanan}}</td>
                                <td>{{$layanan->satuan}}</td>
                                <td>IDR {{number_format($layanan->harga)}}</td>
                                <td>{{$layanan->keterangan}}</td>
                                <td>@if($layanan->status == 1)
                                        Diterima
                                    @elseif($layanan->status == 0)
                                        Permohonan
                                    @elseif($layanan->status == 3)
                                        Permohonan Penghapusan
                                    @else
                                        Ditolak
                                    @endif</td>
                                <td>
                                    @if($layanan->status == 0 || $layanan->status==1 || $layanan->status==2)
                                        <button class="btn btn-primary" href="#" data-toggle="modal"
                                                data-target="#terima{{$layanan->id_layanan}}"><i
                                                class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" href="#" data-toggle="modal"
                                                data-target="#tolak{{$layanan->id_layanan}}"><i class="fa fa-trash"></i>
                                        </button>
                                    @elseif($layanan->status==3)
                                        <button class="btn btn-danger" href="#" data-toggle="modal"
                                                data-target="#batal{{$layanan->id_layanan}}"><i class="fa fa-times"></i>
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
                        <h5 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Tambah Layanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-group" method="POST" action="{{route('tambah-layanan-teknisi')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_bidang"
                                   value="{{$getLayanan->id_bidang}}">
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nama Layanan</label>
                                <input type="text" class="form-control" id="nama_layanan" name="nama_layanan"
                                       placeholder="Nama Layanan">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan"
                                       placeholder="Satuan">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga"
                                       placeholder="Harga Layanan">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                       placeholder="Keterangan Layanan">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach($getLayanan->relasiBidangtoLayanan as $glayanan)
            @if($glayanan->status==0 || $glayanan->status==1 || $glayanan->status==2)
                <div class="modal fade" id="terima{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Update
                                    Layanan
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="{{route('update-layanan-teknisi')}}"
                                method="POST">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_layanan" value="{{$glayanan->id_layanan}}">
                                    <input type="hidden" name="old_nama_layanan" value="{{$glayanan->nama_layanan}}">
                                    <input type="hidden" name="id_bidang" value="{{$getLayanan->id_bidang}}">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Nama Layanan</label>
                                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan"
                                               placeholder="Nama Layanan" value="{{$glayanan->nama_layanan}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Satuan</label>
                                        <input type="text" class="form-control" id="satuan" name="satuan"
                                               placeholder="Satuan" value="{{$glayanan->satuan}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Harga</label>
                                        <input type="text" class="form-control" id="harga" name="harga"
                                               placeholder="Harga Layanan" value="{{$glayanan->harga}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                                               placeholder="Keterangan Layanan" value="{{$glayanan->keterangan}}">
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

                <div class="modal fade" id="tolak{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Hapus
                                    Layanan
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/teknisi/layanan/delete/{{$glayanan->id_layanan}}/{{rawurlencode($glayanan->nama_layanan)}}/{{$glayanan->id_bidang}}"
                                method="POST">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    {{method_field('delete')}}
                                    Apakah Anda yakin menghapus layanan {{$glayanan->nama_layanan}}?</b>
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
            @elseif($glayanan->status==3)
                <div class="modal fade" id="batal{{$glayanan->id_layanan}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Batal Hapus
                                    Layanan
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form
                                action="/teknisi/layanan/delete/batal/{{$glayanan->id_layanan}}/{{rawurlencode($glayanan->nama_layanan)}}/{{$glayanan->id_bidang}}"
                                method="GET">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    Apakah Anda yakin membatalkan penghapusan layanan {{$glayanan->nama_layanan}}?</b>
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
        <div aria-live="assertive" aria-atomic="true" style="position: relative;">
            <!-- Position it -->
            <div style="position: absolute; top: 0; right: 0;">
                @foreach ($errors->all() as $error)
                    <div class="toast" role="alert" data-autohide="false" style="position: absolute; top: 0; right: 0;" aria-live="assertive" aria-atomic="true" data-delay="10000">
                        <div class="toast-header">
                            <a class="btn btn-danger"></a>
                            <strong class="mr-auto"> Error</strong>
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
            </div>
        </div>
        <!-- Then put toasts within -->
    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            @if($errors->any())
                $('.toast').toast('show');
            @endif
        });
    </script>
@endsection
