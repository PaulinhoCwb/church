@extends('layouts.site')
@section('content')
<div class="container">
    {{-- <div class="row mt-2">
            <div class="col">
                <h3 class="d-block text-uppercase">
                    Sagrada Eucaristia
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus cupiditate laboriosam dolor quisquam officiis, voluptatum maiores ipsum optio natus voluptates sapiente quibusdam placeat reiciendis earum eos nisi eius in quo?</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-users"></i> Diego Ari Cheniski</li>
                    <li><i class="fas fa-phone"></i> (41) 99870-1117</li>
                    <li><i class="fas fa-question"></i></li>
                </ul>
            </div>
            <div class="col">
                <h3 class="d-block text-uppercase">
                    Legião de Maria 
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus cupiditate laboriosam dolor quisquam officiis, voluptatum maiores ipsum optio natus voluptates sapiente quibusdam placeat reiciendis earum eos nisi eius in quo?</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-users"></i> Deolice Maria Dorigo</li>
                    <li><i class="fas fa-phone"></i> (41) 99915-1741</li>
                    <li><i class="fas fa-question"> (41) 3043-0775</i></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3 class="d-block text-uppercase">
                    Apostolado da Oração
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus cupiditate laboriosam dolor quisquam officiis, voluptatum maiores ipsum optio natus voluptates sapiente quibusdam placeat reiciendis earum eos nisi eius in quo?</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-users"></i> Élida Savioli </li>
                    <li><i class="fas fa-phone"></i> (41) 99976-8326</li>
                    <li><i class="fas fa-question"> (41) 3242-8548</i></li>
                </ul>
            </div>
            <div class="col">
                <h3 class="d-block text-uppercase">
                    Santa Maria
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus cupiditate laboriosam dolor quisquam officiis, voluptatum maiores ipsum optio natus voluptates sapiente quibusdam placeat reiciendis earum eos nisi eius in quo?</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-users"></i></li>
                </ul>
            </div>
        </div> --}}
    <div class="row">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h4>
                    Ministros Extraordinários da Sagrada Eucaristia
                </h4> <br>
                <i class="fas fa-user"></i> Diego Ari Cheniski <br>
                <i class="fas fa-mobile-alt"></i> (41) 99870-1117
            </li>
            <li class="list-group-item">
                <h4>
                    Apostolado da Oração
                </h4>
                <i class="fas fa-user"></i> Élida Savioli <br>
                <i class="fas fa-mobile-alt"></i> (41) 99976-8326 <br>
                <i class="fas fa-phone"></i> (41) 3242-8548
            </li>
            <li class="list-group-item">
                <h4>
                    Legião de Maria
                </h4> <br>
                <i class="fas fa-user"></i> Deolice Maria Dorigo <br>
                <i class="fas fa-mobile-alt"></i> (41) 99915-1741 <br>
                <i class="fas fa-phone"></i> (41) 3043-0775
            </li>
            <li class="list-group-item">
                <h4>
                    Catequese
                </h4> <br>
                <i class="fas fa-user"></i> Irmã Fabiana Silva <br>
                <i class="fas fa-mobile-alt"></i> (41) 98722-5827 <br>
            </li>
            <li class="list-group-item">
                <h4>
                    Capelinhas
                </h4> <br>
                <i class="fas fa-user"></i> Eny Camboim de Oliveira <br>
                <i class="fas fa-phone"></i> (41) 3244-2117 <br>
            </li>
            <li class="list-group-item">
                <h4>
                    Liturgia
                </h4> <br>
                <i class="fas fa-user"></i> Noriko Yotsuya Okura <br>
                <i class="fas fa-mobile-alt"></i> (41) 99982-1710 <br>
                <i class="fas fa-phone"></i> (41) 33432675
            </li>
            <li class="list-group-item">
                <h4>
                    Batismo
                </h4> <br>
                <i class="fas fa-user"></i> Fabiano <br>
                <i class="fas fa-user"></i> Edna Araujo Wrubleski <br>
                <i class="fas fa-mobile-alt"></i> (41) 98401-8716 <br>
                <i class="fas fa-phone"></i> (41) 3274-4144
            </li>
            <li class="list-group-item">
                <h4>Coordenadora dos Coroinhas</h4> <br>
                <i class="fas fa-user"></i> Sonia Aparecida Biscaia Santos <br>
                <i class="fas fa-mobile-alt"></i> (41) 99997-9140 <br>
                <i class="fas fa-phone"></i> (41) 3209-1805
            </li>
            <li class="list-group-item">
                <h4>
                    Equipe da coleta do quilo
                </h4> <br>
                <i class="fas fa-user"></i> Edna Wrubleski <br>
                <i class="fas fa-user"></i> Sebastião <br>
                <i class="fas fa-user"></i> Maria Aparecida Tangerino <br>
                <i class="fas fa-mobile-alt"></i> (41) 99997-9140 <br>
                <i class="fas fa-phone"></i> (41) 3274-4144 - (41) 3077-9032
            </li>
        </ul>
    </div>
</div>
@endsection
@section('javascript')
@parent
@endsection
