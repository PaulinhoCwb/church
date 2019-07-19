@extends('layouts.site')
@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <ul class="list-unstyled mt-2" id="list-warning">
                @forelse ($avisos as $aviso)
                <li class="warning-list">
                    <h2 class="title">{{ $aviso->titulo }}</h2>
                    <div class="content-warning">
                        <img src="{{ asset('img/avisos-1.png') }}" class="float-right" alt="" width="80">
                        <p>{{ $aviso->body }}.</p>
                    </div>
                    <div class="warning-date">
                        <small>{{ $aviso->created_at }}</small>
                    </div>
                </li> 
                @empty
                <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Avisos!</h4>
                        <p>Não existe avisos publicados, para essa seção.</p>
                        <hr>
                        <p class="mb-0">Caso queira maiores informações entrar em contato pelo fale conosco.</p>
                      </div>
                @endforelse 
            </ul>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    @parent
@endsection