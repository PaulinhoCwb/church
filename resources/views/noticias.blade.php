@extends('layouts.site')
@section('content')
<div class="container-fluid" id="back-news">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            @foreach ($noticias as $noticia)
                <div class="block-news mb-3 mt-2">
                    <h3 class="d-block text-center">{{ $noticia->titulo }}</h3>
    
                    <div class="content-news">
                        <img src="{{ asset('img/media/'.$noticia->photo) }}" class="img-resposive" width="150" height="150" alt="">
                        <p class="ml-3">{{ $noticia->body }}</p>
                    </div>
                    <div>
                        <div class="float-right">
                            <small>{{ $noticia->created_at }}</small> <span class="text-muted">João Paulo</span>
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('javascript')
    @parent
@endsection