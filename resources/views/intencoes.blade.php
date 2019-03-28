@extends('layouts.site')
@section('content')
      <!-- Formulario de inteções -->
      <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="text-center">
                    <h1>Pedidos de intenções</h1>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item w-50">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">FALECIMENTOS</a>
                    </li>
                    <li class="nav-item w-50">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                            aria-selected="false">AÇÃO DE GRAÇAS / PEDIDOS</a>
                    </li>

                </ul>
                <div class="tab-content mt-1" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-3 col-xs-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">7º Dia</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 col-xs-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">30º Dia</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Aniversario falecimento</label>
                                    </div>
                                </div>
                                <div class="form-group col-d-3 col-xs-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Sem data</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Nome:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-xs-12">
                                    <label for="">Missa:</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    <label for="">Data:</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    <label for="">Hora:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="">Contato:</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="">Fone</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-success float-right" type="submit">Enviar</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Intenção:</label>
                                    <textarea name="intencao" class="form-control" id="intencao" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="">Missa:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="">Data:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="">Hora:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            <div class="form-row">
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="">Contato:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="">Fone</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <button class="btn btn-success float-right" type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="card-avisos">

                    <div class="icone" style="background-color:yellow;">

                        <i class="fas fa-church fa-3x"></i>

                    </div>

                    <div class="content">

                        <div class="avisos-header">

                            <a href="intencoes.html" class="btn display-4">Inteções de Missas</a>

                        </div>

                    </div>

                </div>
                <div class="card-avisos">

                    <div class="icone" style="background-color:yellow;">

                        <i class="fas fa-church fa-3x"></i>

                    </div>

                    <div class="content">

                        <div class="avisos-header">

                            <a href="intencoes.html" class="btn display-4">Inteções de Missas</a>

                        </div>

                    </div>

                </div>
                <div class="card-avisos">

                        <div class="icone" style="background-color:yellow;">
    
                            <i class="fas fa-church fa-3x"></i>
    
                        </div>
    
                        <div class="content">
    
                            <div class="avisos-header">
    
                                <a href="intencoes.html" class="btn display-4">Inteções de Missas</a>
    
                            </div>
    
                        </div>
    
                    </div>
            </div>
        </div>
        <div class="border-divider mt-2"></div>
    </div>
    <!-- /Formulario de inteções -->
@endsection
@section('javascript')
    @parent
@endsection