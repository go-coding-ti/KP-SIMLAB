@extends('adminlayout.layout')

@section('collapse2')
    collapse-item active
@endsection

@section('active3')
      nav-item active
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bidang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#create"><i class="fas fa-plus"></i>Tambah Bidang</button>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th style="text-align:center;">Nama Bidang</th>
                            <th style="text-align:center;">Nama Laboratorium</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bidang as $b => $bidangs)
                            <tr>
                                <td>{{$b + 1}}</td>
                                <td>{{$bidangs->nama_bidang}}</td>
                                <td>@if ($bidangs->id_laboratorium == null)
                                    Tidak terdapat laboratorium
                                    @else
                                    {{$bidangs->relasiBidangToLaboratorium->nama_lab}}
                                    @endif
                                </td>
                                <td>

                                    <!-- Edit -->
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update{{$bidangs->id_bidang}}"><i class="fa fa-edit"></i></button>
                                    <!--Delete -->
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$bidangs->id_bidang}}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @foreach($bidang as $bidangz)
        <!-- Modal Update -->
            <div class="modal fade" id="update{{$bidangz->id_bidang}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Data Bidang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('updateBidang')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="id_bidang" value="{{$bidangz->id_bidang}}">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Nama Bidang</label>
                                    <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" value="{{$bidangz->nama_bidang}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="id_lab" class="font-weight-bold text-dark">Nama Laboratorium</label>
                                    <select name="id_lab" id="id_lab" class="custom-select" required>
                                        @if ($bidangz->id_laboratorium == null)
                                            <option value=""> - pilih Laboratorium - </option>
                                        @else
                                            <option value="{{$bidangz->id_laboratorium}}">{{$bidangz->relasiBidangToLaboratorium->nama_lab}}</option>
                                        @endif
                                        @foreach($allLab as $lab)
                                            <option value="{{$lab->id_laboratorium}}">{{$lab->nama_lab}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Update -->

            <!-- Modal Delete -->
            <div class="modal fade" id="delete{{$bidangz->id_bidang}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Hapus Data Bidang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="bidangadmin/delete/{{$bidangz->id_bidang}}" method="POST">
                            <div class="modal-body">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                Apakah Anda yakin menghapus Bidang ini?</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tidak</button>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Ya</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Delete -->
    @endforeach
    <!-- Modal Create -->
        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bidang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('createBidang')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nama Bidang</label>
                                <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" value="" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="id_lab" class="font-weight-bold text-dark">Nama Laboratorium</label>
                                <select name="id_lab" id="id_lab" class="custom-select" required>
                                    <option value=""> - Pilih Laboratorium - </option>
                                    @foreach($allLab as $lab)
                                        <option value="{{$lab->id_laboratorium}}">{{$lab->nama_lab}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Create -->
@endsection
