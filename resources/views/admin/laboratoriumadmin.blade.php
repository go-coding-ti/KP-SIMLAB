@extends('adminlayout.layout')
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
              <h6 class="m-0 font-weight-bold text-primary">Daftar Laboratorium</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <a class= "btn btn-success text-white" href="xxx"><i class="fas fa-plus"></i> Tambah Laboratorium</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Laboratorium</th>
                      <th>Alamat</th>
                      <th>No Telp</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                  <tr>
                      <th>ID Peminjam</th>
                      <th>ID Layanan</th>
                      <th>Tanggal Order</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Selesai</th>
                      <th>Jumlah</th>
                      <th>File</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                    @foreach($lab as $l => $lab)
                        <tr>
                            <td>{{$l + 1}}</td>
                            <td>{{$lab->nama_lab}}</td>
                            <td>{{$lab->alamat}}</td>
                            <td>{{$lab->no_telp}}</td>
                            <td>
                              <!-- Edit -->
                              <a href="xx" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                              <!--Delete -->
                              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                              <!-- Modal Delete -->
                              <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit Angkatan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="xx" method="POST">
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
          <!-- smpe sini -->

        <!-- Content Row -->
        <div class="row">
        <form method="POST" enctype="multipart/form-data" action="/admin/profile">

        </form>
        </div>

        <!-- Content Row -->

        <div class="row">

        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Content Column -->
          <div class="col-lg-6 mb-4">

            <!-- Color System
            <div class="row">
              <div class="card mb-4">
                <div class="card-header">
                  Default Card Example
                </div>
                <div class="card-body">
                  This card uses Bootstrap's default styling with no utility classes added. Global styles are the only things modifying the look and feel of this default card example.
                </div>
              </div>
          </div> -->

          </div>

          <div class="col-lg-6 mb-4">

          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection
