@extends('layouts.site')
@section('content')
<div class="container-fluid" id="back-news">
    <div class="row">
        <div class="col-md-9 col-xs-12">
            @foreach ($noticias as $noticia)
                <div class="block-news mb-3 mt-2">
                    <h3 class="d-block text-center">{{ $noticia->titulo }}</h3>
    
                    <div class="content-news">
                        <img src="{{ asset('img/starosa.svg') }}" class="img-resposive" width="150" height="150" alt="">
                        <p>{{ $noticia->body }}</p>
                    </div>
                    <div>
                        <small>{{ $noticia->created_at }}</small> <span>João Paulo</span> <a href="#" class="float-right btn btn-info">Ler
                            Mais</a>
                    </div>
                </div> 
            @endforeach
        </div>
        <div class="col-md-3 col-xs-12 mt-2">
            <div class="block-intecoes">
                <i class="fas fa-thumbtack top-avisos" style="width: 30px;height: 30px; border-radius: 35px;background-color: #f75353 !important; line-height: 30px;color: white; text-align: center;"></i>
                <h5>Avisos</h5>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, minus.
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    @parent
@endsection