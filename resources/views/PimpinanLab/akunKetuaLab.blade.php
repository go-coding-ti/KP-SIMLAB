@extends('PimpinanLayout.layout')
@section('activeAkun')
    nav-item active
@endsection
@php
    $menuSidebar = App\Http\Controllers\Pimpinan\PimpinanUtilites::sideBarMenu();
@endphp
@section('content')
    <div class="container-fluid">
        <div class="card-footer py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">Kepala Lab - {{$dataPengguna->first()->labRelation->nama_lab}}</h5>
            <button chref="#" data-toggle="modal" data-target="#tambah" class="btn"><i class="fas fa-plus"></i>Tambah
                Kepala Lab
            </button>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('error'))
            <div class="alert alert-error">
                <ul>
                    <li><strong>{!! \Session::get('error') !!}</strong></li>
                </ul>
            </div>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li><strong>{!! \Session::get('success') !!}</strong></li>
                </ul>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th style="text-align:center;">Nama</th>
                            <th style="text-align:center;">Email</th>
                            <th style="text-align:center;">No. Hp</th>
                            <th style="text-align:center; width:8%">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataPengguna as $u => $users)
                            <tr>
                                <td style="text-align:center;">{{$u+1}}</td>
                                <td>{{$users->userRelation->name}}</td>
                                <td>{{$users->userRelation->email}}</td>
                                <td>{{$users->userRelation->no_hp}}</td>
                                <td>
                                    <button class="btn btn-primary" href="#" data-toggle="modal"
                                            data-target="#kelola{{$users->userRelation->id}}"><i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger" href="#" data-toggle="modal"
                                            data-target="#delete{{$users->userRelation->id}}"><i
                                            class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-group" method="POST" action="/pimpinan/ketuas/tambah"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Nama Kepala Lab">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Password">
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
        <!-- End Modal Tambah -->
    @foreach($dataPengguna as $modalDataPengguna)
        <!-- Modal Update -->
            <div class="modal fade" id="kelola{{$modalDataPengguna->userRelation->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Kelola Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/pimpinan/ketua/update"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="oldName" value="{{$modalDataPengguna->userRelation->name}}">
                                <input type="hidden" name="oldEmail" value="{{$modalDataPengguna->userRelation->email}}">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{$modalDataPengguna->userRelation->name}}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           value="{{$modalDataPengguna->userRelation->email}}">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Update -->
            <!-- Modal Delete -->
            <div class="modal fade" id="delete{{$modalDataPengguna->userRelation->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Hapus Pengguna
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form
                            action="/pimpinan/ketua/delete/{{$modalDataPengguna->userRelation->id}}/{{$modalDataPengguna->id_laboratorium}}"
                            method="POST">
                            <div class="modal-body">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                Apakah Anda yakin menghapus Lab?</b>
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
            <!-- End Modal Delete -->
        @endforeach
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
