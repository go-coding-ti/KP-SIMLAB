@extends('adminlayout.layout')

@section('active2')
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
          @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="text-success fas fa-check mr-1"></i> {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
          @endif
          <!-- Copy drisini -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <a class= "btn btn-success text-white" href="beritaadmin/addberita"><i class="fas fa-plus"></i> Tambah Berita</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>

                      <th style="text-align:center;">Judul</th>
                      <th style="text-align:center;">Berita</th>
                      <th style="text-align:center;">Tanggal Dibuat</th>
                      <th style="text-align:center;">Aksi</th>
                    </tr>
                  </thead>
                  {{-- <!-- <tfoot>
                  <tr>
                      <th>ID Peminjam</th>
                      <th>ID Layanan</th>
                      <th>Tanggal Order</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Selesai</th>
                      <th>Jumlah</th>
                      <th>File</th>
                    </tr>
                  </tfoot> --> --}}
                  <tbody>
                    @foreach($pengumuman as $p => $peng)
                        <tr>
                            <td>{{$p +1 }}</td>

                            <td>{{$peng->judul}}</td>
                            <td>{{ \Illuminate\Support\Str::limit($peng->isi, 50) }}</td>
                            <td>{{ date('d F Y', strtotime($peng->created_at)) }}</td>
                            <td>
                              <!-- Show -->
                              <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#show{{$peng->id_berita}}"><i class="fa fa-eye"></i></button>
                              <!-- Edit -->
                              <a href="beritaadmin/{{$peng->id_berita}}/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                              <!--Delete -->
                              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$peng->id_berita}}"><i class="fa fa-trash"></i></button>
                              <!-- Modal Delete -->
                              <div class="modal fade" id="delete{{$peng->id_berita}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit Angkatan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/beritaadmin/delete/{{$peng->id_berita}}" method="POST">
                                      <div class="modal-body">
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      Apakah Anda yakin menghapus pengumuman?</b>
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
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            @foreach($pengumuman as $pengs)
            <!-- Modal Show -->
                <div class="modal fade" id="show{{$pengs->id_berita}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $pengs->judul }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Nama Laboratorium</label>
                                        <input type="text" class="form-control" id="no_telp" name= "no_telp" value="{{$pengs->relasiBeritaToLaboratorium->nama_lab}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Tanggal Dibuat</label>
                                        <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" value="{{ date('d F Y', strtotime($pengs->created_at)) }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="konten">Konten</label>
                                        <textarea class="form-control" name="isi" id="isi" rows="5"readonly>{{$pengs->isi}}</textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Update -->
                @endforeach
@endsection
