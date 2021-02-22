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
          @if(session('success'))
			    <div class="alert alert-success col-md-6 offset-md-3" role="alert">
				  <center>
		  			{{session('success')}}
		  		</center>
			    </div>
	      	@endif
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Layanan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <a class= "btn btn-success text-white" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Layanan</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Layanan</th>
                      <th>Satuan</th>
                      <th>Harga</th>
                      <th>Bidang</th>
                      <th>Keterangan</th>
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
                    @foreach($layanan as $layanan1)
                        <tr>
                            <td>{{$layanan1->id_layanan}}</td>
                            <td>{{$layanan1->nama_layanan}}</td>
                            <td>{{$layanan1->satuan}}</td>
                            <td> Rp. {{$layanan1->harga}}</td>
                            <td>{{$layanan1->id_bidang}}</td>
                            <td>{{$layanan1->keterangan}}</td>
                            <td>
                              <!-- Edit -->
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update{{$layanan1->id_layanan}}"><i class="fa fa-edit"></i></button>
                              <!--Delete -->
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$layanan1->id_layanan}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- smpe sini -->
            @foreach($layanan as $layananModal)
                <!-- Modal Delete -->
                    <div class="modal fade" id="delete{{$layananModal->id_layanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit Angkatan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin menghapus pengumuman?</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tidak</button>
                                    <a href="layananadmin/{{$layananModal->id_layanan}}/delete"><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Ya</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Delete -->
                    <div class="modal fade" id="update{{$layananModal->id_layanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Layanan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/layananadmin/update" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id_layanan" value="{{$layananModal->id_layanan}}">
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Nama Layanan</label>
                                            <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" value="{{$layananModal->nama_layanan}}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Satuan</label>
                                            <input type="text" class="form-control" id="satuan" name="satuan" value="{{$layananModal->satuan}}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Harga</label>
                                            <input type="text" class="form-control" id="harga" name= "harga" value="{{$layananModal->harga}}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_bidang" class="font-weight-bold text-dark">Bidang</label>
                                            <input type="text" class="form-control" id="id_bidang" name="id_bidang" value="{{$layananModal->id_bidang}}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan" class="font-weight-bold text-dark">Keterangan</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{$layananModal->keterangan}}" placeholder="">
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
            @endforeach
          <!-- Modal -->
	        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	          <div class="modal-dialog" role="document">
	             <div class="modal-content">
	                <div class="modal-header">
	                  <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Layanan</h5>
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                      <span aria-hidden="true">&times;</span>
	                    </button>
	                </div>
	                <div class="modal-body">
	      	          <form action="/layananadmin/create" method="POST">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label class="font-weight-bold text-dark">Nama Layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="">
                      </div>
                      <div class="form-group">
                        <label class="font-weight-bold text-dark">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="">
                      </div>
                      <div class="form-group">
                        <label class="font-weight-bold text-dark">Harga</label>
                        <input type="text" class="form-control" id="harga" name= "harga" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="id_bidang" class="font-weight-bold text-dark">Bidang</label>
                        <input type="text" class="form-control" id="id_bidang" name="id_bidang" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="keterangan" class="font-weight-bold text-dark">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="">
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
