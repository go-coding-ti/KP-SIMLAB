
@php
    if(is_null(Auth::user())){
     $user_id = 0;
    }else{
     $user_id = Auth::user()->id;
    }
@endphp
<!-- HEADER -->
  @extends('UserPage.layoutUserberita')
<!-- /HEADER -->
@section('content')

<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-12">
            
                <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="/images/{{$Berita->first()->relasiBeritaToLaboratorium->foto_lab}}" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{$Berita->first()->created_at}}</div>
                    <h2 class="card-title">{{$Berita->first()->judul}}</h2>
                    <p class="card-text">{{$Berita->first()->isi}}</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($Berita as $item => $i)
                @if ($item > 0)
                    <div class="col-lg-6">
                        <!-- Blog post-->                   
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="/images/{{$i->relasiBeritaToLaboratorium->foto_lab}}" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">{{$i->created_at}}</div>
                                <h2 class="card-title h4">{{$i->judul}}</h2>
                                <p class="card-text">{{$i->isi}}</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>    
                    </div>
                    
                @endif
                
                @endforeach
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav>
        </div>
            
        
    </div>
</div>

@endsection