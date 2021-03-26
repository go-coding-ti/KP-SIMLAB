@extends('TeknisiLabLayout.layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Berita</h6>
            </div>
            <div class="card-body">
                <form action="{{route('tambah-post-berita-teknisi')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <td><label for="id_laboratorium">Laboratorium</label></td>
                            <td>
                                <select name="id_laboratorium" id="id_laboratorium" class="custom-select" required>
                                    <option>- Pilih Laboratorium -</option>
                                    @foreach($menuSidebar as $lab)
                                        <option
                                            value="{{$lab->labRelation->id_laboratorium}}">{{$lab->labRelation->nama_lab}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="judul">Judul</label></td>
                            <td>
                                <textarea type="text" class="form-control" name="judul" id="judul" rows="1"
                                          placeholder="Judul"></textarea>
                            <!-- @if($errors->has('judul'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                        </span>
                                    @endif -->
                            </td>
                        </tr>
                        <tr>
                            <td><label for="konten">Konten</label></td>
                            <td>
                                <textarea class="form-control" name="isi" id="isi" rows="10"
                                          placeholder="Berita"></textarea>
                            <!-- @if($errors->has('konten'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('konten') }}</strong>
                                        </span>
                                    @endif -->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="/teknisi/berita" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Tambah Pengumuman</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_javascript')
    <script src="{{asset('/assets/admin/js/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('konten')
        })
    </script>
@endsection
