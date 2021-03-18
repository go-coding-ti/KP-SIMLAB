@extends('KetuaLabLayout.layout')
@section('activeBerita')
    nav-item active
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Berita {{$beritaLab->nama_lab}}</h5>
            </div>
            <div class="card-body">
                @foreach($beritaLab->berita as $berita)
                    <div class="card"
                         style="border-bottom-color: lightgrey; border-radius: 0; border-left-color: white; border-right-color: white; border-top-color: white; margin-bottom: 15px;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img class="img-fluid" style="max-height: 150px; "
                                         src="{{$beritaLab->foto_lab}}"
                                         alt="">
                                </div>
                                <div class="col-sm-8">
                                    <a href="#" class="text-black-50 text-decoration-none"><h5 class="font-weight-bold">
                                            {{$berita->judul}}</h5></a>
                                    <p>{{\Illuminate\Support\Str::limit($berita->isi, 300)}}</p>
                                    <div class="row d-flex">
                                        <div class="col-sm-7 ">
                                            <p><i class="fa fa-clock"></i> {{$berita->timestamp}}</p>

                                        </div>
                                        {{--<div class="col-sm-5">
                                            <a href="#" class="btn btn-primary btn-icon-split float-right">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                                <span class="text">Lihat Berita</span>
                                            </a>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
