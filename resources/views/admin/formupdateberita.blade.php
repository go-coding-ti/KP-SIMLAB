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
              <h6 class="m-0 font-weight-bold text-primary">Perbaharui Berita</h6>
            </div>
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <table class="table table-borderless">
                        <tbody>
                      
                            <tr>
                                <td><label for="judul">Laboratorium</label></td>
                                <td>
                                <div class="form-group">
                                            <select name="id_laboratorium" id="id_laboratorium" class="custom-select" required>
                                                <option>- Pilih Laboratorium -</option>
                                                @foreach($labs as $lab)
                                                    <option value="{{$lab->id_laboratorium}}">{{$lab->nama_lab}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <!-- <textarea type="text" class="form-control" name="id_laboratorium" id="id_laboratorium" rows="1" placeholder="Laboratorium">{{$beritas -> id_laboratorium}}</textarea> -->
                                    <!-- @if($errors->has('judul'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('judul') }}</strong>
                                        </span> 
                                    @endif -->
                                </td>
                            </tr>
                            <tr>
                                <td><label for="judul">Judul</label></td>
                                <td>
                                    <textarea  type="text" class="form-control" name="judul" id="judul" rows="1" >{{$beritas -> judul}}</textarea>                                    <!-- @if($errors->has('judul'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('judul') }}</strong>
                                        </span> 
                                    @endif -->
                                </td>
                            </tr>
                            <tr>
                                <td><label for="konten">Konten</label></td>
                                <td>
                                    <textarea class="form-control" name="isi" id="isi" rows="10" placeholder="Berita">{{$beritas -> isi}}</textarea>
                                    <!-- @if($errors->has('konten'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('konten') }}</strong>
                                        </span> 
                                    @endif -->
                                </td>
                            </tr>
                      
                        </tbody>
                        
                    </table>
                    <a href="" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Pengumuman</button>
                </form>
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


@section('custom_javascript')
<script src="{{asset('/assets/admin/js/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('konten')
        })
    </script>
@endsection