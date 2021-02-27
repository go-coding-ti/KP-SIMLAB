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
              <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjaman</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Layanan</th>
                      <th>Tanggal Peminjaman</th>
                      <th>Tanggal Selesai</th>
                      <th>Jumlah</th>
                      <th>Harga Total</th>
                      <th>Status</th>



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
                    @foreach($data as $d => $doto)
                        <tr>
                            <td style="text-align:center;">{{$d + 1}}</td>
                            <td>{{$doto->relasiPeminjamanToUser->name}}</td>
                            <td>{{$doto->relasiPeminjamanToLayanan->nama_layanan}}</td>
                            <td style="text-align:center;">{{$doto->tgl_pinjam}}</td>
                            <td style="text-align:center;">{{$doto->tgl_selesai}}</td>
                            <td style="text-align:center;">{{$doto->jumlah}}</td>
                            <td> RP. {{$doto->total_harga}}</td>
                            <td>@if($doto->keterangan==1)
                                    <a href="#" class="btn btn-primary text-white">Menunggu Konfirmasi</a>
                            @elseif($doto->keterangan==2)
                                    <a href="#" class="btn btn-success text-white">Terkonfirmasi</a>
                            @else
                                    <a href="#" class="btn btn-danger text-white">Ditolak</a>
                            @endif
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
