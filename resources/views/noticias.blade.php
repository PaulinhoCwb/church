@extends('layouts.site')
@section('content')
<div class="container-fluid" id="back-news">
    <div class="row">
        <div class="col-md-9 col-xs-12">
            {{-- @foreach ($noticias as $noticia)
                <div class="block-news mb-3 mt-2">
                    <h3>{{ $noticia->titulo }}</h3>
    
                    <div class="content-news">
                    <p>{{ $noticia->body }}</p>
                    </div>
                    <div>
                    <small>{{ $noticia->created_at }}</small> <span>João Paulo</span> <a href="#" class="float-right btn btn-info">Ler
                            Mais</a>
                    </div>
                </div> 
            @endforeach --}}
             <div class="block-news mb-3 mt-2">
                <h3>Titulo da noticia</h3>

                <div class="content-news">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim impedit excepturi, quod
                        voluptatem quas atque quo obcaecati odit adipisci reiciendis! Reiciendis molestias
                        quisquam odit in suscipit libero voluptate iure deleniti?</p>
                </div>
                <div>
                    <small>12/03/2019</small> <span>João Paulo</span> <a href="#" class="float-right btn btn-info">Ler
                        Mais</a>
                </div>
            </div>
            {{-- <div class="block-news mb-3">
                <h3>Titulo da noticia</h3>

                <div class="content-news">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim impedit excepturi, quod
                        voluptatem quas atque quo obcaecati odit adipisci reiciendis! Reiciendis molestias
                        quisquam odit in suscipit libero voluptate iure deleniti?</p>
                </div>
                <div>
                    <small>12/03/2019</small> <span>João Paulo</span> <a href="#" class="float-right btn btn-info">Ler
                        Mais</a>
                </div>
            </div>
            <div class="block-news mb-3">
                <h3>Titulo da noticia</h3>

                <div class="content-news">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim impedit excepturi, quod
                        voluptatem quas atque quo obcaecati odit adipisci reiciendis! Reiciendis molestias
                        quisquam odit in suscipit libero voluptate iure deleniti?</p>
                </div>
                <div>
                    <small>12/03/2019</small> <span>João Paulo</span> <a href="#" class="float-right btn btn-info">Ler
                        Mais</a>
                </div>
            </div>  --}}
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