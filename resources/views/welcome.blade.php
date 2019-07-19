
@extends('layouts.site')
@section('map')
    @parent
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
@endsection
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/santa-ter.jpeg" height="500px" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            {{-- <h5>First slide label</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> --}}
          </div>
      </div>
      <div class="carousel-item">
        <img src="img/stateresinha.jpg" height="500px" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            {{-- <h5>First slide label</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> --}}
          </div>
      </div>
      <div class="carousel-item">
        <img src="img/santa-terinha-desenho (2).jpg" height="500px" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            {{-- <h5 class="text-black">First slide label</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> --}}
          </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
  <div class="container mt-3 ">
        
    <div class="border-divider mb-3 mt-3"></div>

    <div class="row">
        <div class="col-md-4 col-xs-12 text-center">
            <div class="card-avisos">
                <div class="icone bg-light">
                    <i class="fas fa-church fa-3x text-white"></i>
                </div>
                <div class="content">
                    <div class="avisos-header">
                        <a href="{{ route('avisos') }}" class="btn display-4">Avisos Paroquiais</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-12 text-center">

            <div class="card-avisos">

                <div class="icone bg-light">

                    <i class="fas fa-church fa-3x text-white"></i>

                </div>

                <div class="content">

                    <div class="avisos-header">
                        <a href="{{ route('catequese') }}" class="btn display-4">Catequese</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-4 col-xs-12 text-center">

            <div class="card-avisos">

                <div class="icone bg-light">

                    <i class="fas fa-church fa-3x text-white"></i>

                </div>

                <div class="content">

                    <div class="avisos-header">

                        <a href="{{ route('news') }}" class="btn display-4">Notícias da Comunidade</a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

<div class="container mt-3" style="background-color:#fff;">

    <div class="row">

        <div class="col-md-4 col-xs-12 text-center">

            <div class="card-avisos">

                <div class="icone bg-light" >

                    <i class="fas fa-church fa-3x text-white"></i>

                </div>

                <div class="content">

                    <div class="avisos-header">

                        <a href="{{ route('intencoes') }}" class="btn display-4">Intenções de Missas</a>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 col-xs-12 text-center">

            <div class="card-avisos">

                <div class="icone bg-light">

                    <i class="fas fa-church fa-3x text-white"></i>

                </div>

                <div class="content">

                    <div class="avisos-header">
                        <a href="{{ route('movimentos') }}" class="btn display-4">Movimentos na Paróquia</a>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 col-xs-12 text-center">

            <div class="card-avisos">

                <div class="icone bg-light">

                    <i class="fas fa-church fa-3x text-white"></i>

                </div>

                <div class="content">

                    <div class="avisos-header">

                        <a href="{{ route('horarios') }}" class="btn display-4">Horários de Missas</a>

                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="border-divider mb-3 mt-3">

    </div>
</div>
<!-- /Conteudo aviso  -->
<!-- Localização -->
<div class="container-fluid">
<div id="myMap" style="position:relative;height:400px;"></div>
<div class="border-divider mb-3 mt-3">

</div>
</div>
<!-- /Localização -->
<div class="container">
<div class="row">
    <div class="col-md-6 col-xs-12">
        <h4 class="text-center">Contatos</h4>
        <div class="d-block text-muted">
            <i class="fas fa-map-marker" style="width: 30px;height: 30px; border-radius: 35px;background-color: #f75353 !important; line-height: 30px;color: white; text-align: center;"></i>
                Av. Visc. de Guarapuava, 4787 - Batel, Curitiba - PR, 80240-010
        </div>

        <div class="d-block text-muted mt-3">
            <i class="fas fa-phone" style="width: 30px;height: 30px; border-radius: 35px;background-color: #51d466 !important; line-height: 30px;color: white; text-align: center;"></i>
                (41) 9 9722-2527
        </div>
        <div class="d-block text-muted mt-3">
            <i class="fas fa-envelope" style="width: 30px;height: 30px; border-radius: 35px;background-color: #32c8de !important; line-height: 30px;color: white; text-align: center;"></i>
                parstateresinhactba@gmail.com
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <h4>Fale Conosco</h4>
        <form action="{{ route('contact-us') }}" id="contact-us" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" name="name" autocomplete="off" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="text" name="email" autocomplete="off" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Mensagem</label>
                <textarea name="mensagem" id="mensagem" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-dark float-right">Enviar</button>
        </form>
    </div>
</div>
</div>
@endsection
@section('javascript')
    @parent
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/contact-us.js') }}"></script>
@endsection