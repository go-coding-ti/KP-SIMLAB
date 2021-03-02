@extends('adminlayout.layout')

@section('collapse1')
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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Laboratorium</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#create"><i class="fas fa-plus"></i> Tambah Laboratorium</button>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th style="text-align:center;">Nama Laboratorium</th>
                            <th style="text-align:center;">Alamat</th>
                            <th style="text-align:center;">No Telp</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lab as $l => $labs)
                            <tr>
                                <td>{{$l + 1}}</td>
                                <td>{{$labs->nama_lab}}</td>
                                <td>{{$labs->alamat}}</td>
                                <td>{{$labs->no_telp}}</td>
                                <td>
                                    <!-- Show -->
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#show{{$labs->id_laboratorium}}"><i class="fas fa-eye"></i></button>
                                    <!-- Edit -->
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update{{$labs->id_laboratorium}}"><i class="fa fa-edit"></i></button>
                                    <!--Delete -->
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$labs->id_laboratorium}}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
          <!-- smpe sini -->
    @foreach($lab as $labz)

        <!-- Modal Show -->
        <div class="modal fade" id="show{{$labz->id_laboratorium}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Data Laboratorium</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <img class="rounded mx-auto d-block" src="/images/{{$labz->foto_lab}}" alt="not found" style="width:400px; height:200px;">
                            <input type="hidden" name="id_lab" value="{{$labz->id_laboratorium}}" >
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nama Laboratorium</label>
                                <input type="text" class="form-control" id="nama_lab" name="nama_lab" value="{{$labz->nama_lab}}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Alamat Laboratorium</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$labz->alamat}}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name= "no_telp" value="{{$labz->no_telp}}" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Update -->
        <!-- Modal Update -->
            <div class="modal fade" id="update{{$labz->id_laboratorium}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Data Laboratorium</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('updateLab')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="id_lab" value="{{$labz->id_laboratorium}}">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Nama Laboratorium</label>
                                    <input type="text" class="form-control" id="nama_lab" name="nama_lab" value="{{$labz->nama_lab}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Alamat Laboratorium</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$labz->alamat}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name= "no_telp" value="{{$labz->no_telp}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Pilih Foto : </label>
                                    <input type="file" id="gambar" name="gambar">
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
            <div class="modal fade" id="delete{{$labz->id_laboratorium}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Hapus Data Lab</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="laboratorium/delete/{{$labz->id_laboratorium}}" method="POST">
                            <div class="modal-body">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                Apakah Anda yakin menghapus Lab?</b>
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
                        <h5 class="modal-title" id="exampleModalLabel">Isi Data Laboratorium</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('createLab')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nama Laboratorium</label>
                                <input type="text" class="form-control" id="nama_lab" name="nama_lab" value="" placeholder="Nama Lab" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Alamat Laboratorium</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="" placeholder="Alamat Lab" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name= "no_telp" value="" placeholder="Nomor Telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Pilih Foto : </label>
                                <input type="file" id="gambar" name="gambar" required>
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
