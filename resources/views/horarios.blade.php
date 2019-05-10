@extends('layouts.site')
@section('content')
<div class="container py-3">
    <div class="col-12">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Domingos e Dias Santos</h5>
                    <small><i class="fas fa-clock fa-2x"></i></small>
                </div>
                <p class="mb-1">09:00 - 11:00 e 18:00 Horas.</p>
                {{-- <small>Donec id elit non mi porta.</small> --}}
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Sábados</h5>
                    <small><i class="fas fa-clock fa-2x"></i></small>
                </div>
                <p class="mb-1">07:3015:00 Horas.</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Dias úteis</h5>
                    <small><i class="fas fa-clock fa-2x"></i></small>
                </div>
                <p class="mb-1">07:30 e 18:00 Horas.</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">2ª feiras</h5>
                    <small><i class="fas fa-clock fa-2x"></i></small>
                </div>
                <p class="mb-1">somente 07:30 Horas.</p>
            </a>
        </div>
    </div>
    <div class="col-12 py-3">
        <blockquote class="blockquote text-center">
            <p class="mb-0">"Para mim a oração é um pulsar de coração, é um simples olhar voltado para o Pai, é um grito de gratidão e de amor, tanto na provação como no auge da alegria".</p>
            <div class="blockquote-footer">Santa Teresinha <cite title="Source Title">Menino Jesus</cite></div>
          </blockquote>
    </div>
</div>
    @endsection
    @section('javascript')
    @parent
    @endsection
