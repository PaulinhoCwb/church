@extends('layouts.site')
@section('content')
      <!-- Formulario de inteções -->
      <div class="container">
            @if ($type == 'success')
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Sua solictação!</strong> {{ $message }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            @endif
            @if ($type == 'error')
            <div class="alert alert-error alert-dismissible fade show mt-3" role="alert">
            <strong>Error!</strong> {{ $message }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            @endif
        <div class="row">
            <div class="col-md-12 col-xs-12">
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
                        <form action="{{ route('save.intencoes') }}" id="falecimento" method="post">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="type" value="1">
                            <div class="form-row">
                                <div class="form-group col-md-3 col-xs-12">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="falecimento" value="1" class="custom-control-input" id="setedia">
                                        <label class="custom-control-label" for="setedia">7º Dia</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 col-xs-12">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="falecimento" value="2" class="custom-control-input" id="mes">
                                        <label class="custom-control-label" for="mes">30º Dia</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="falecimento" value="3" class="custom-control-input" id="niver">
                                        <label class="custom-control-label" for="niver">Aniversario falecimento</label>
                                    </div>
                                </div>
                                <div class="form-group col-d-3 col-xs-12">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="falecimento" value="4" class="custom-control-input" id="sdate">
                                        <label class="custom-control-label" for="sdate">Sem data</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Nome:</label>
                                    <input type="text" name="nome" id="nome" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="">Data Missa:</label>
                                    <input type="text" name="data" id="data" class="form-control data">
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="">Hora Missa:</label>
                                    <input type="text" name="hora" id="hora" class="form-control hora">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Observações</label>
                                    <textarea name="observacao" id="observacao" cols="30" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="">Contato:</label>
                                    <input type="text" name="contato" id="contato" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="">Fone</label>
                                    <input type="text" name="fone" id="fone" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-success float-right" type="submit">Enviar</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{ route('save.intencoes') }}" id="intencao" method="post">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="type" value="2">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Intenção:</label>
                                    <textarea name="intencao" class="form-control" id="intencao" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="">Data Missa:</label>
                                        <input type="text" name="data" class="form-control data">
                                    </div>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="">Hora:</label>
                                        <input type="text" name="hora"  class="form-control hora">
                                    </div>
                                </div>
                            <div class="form-row">
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="">Contato:</label>
                                        <input type="text" name="contato" class="form-control">
                                    </div> 
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="">Fone</label> 
                                        <input type="text" name="fone" id="fone" class="form-control">
                                    </div>
                                </div>
                                <button class="btn btn-success float-right" type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> =
    </div>
    <!-- /Formulario de inteções -->
@endsection
@section('javascript')
    @parent
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
    <script>
        $.fn.datepicker.dates['pt-BR'] = {
            days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
            daysShort: ["Dom", "Seg", "Ter", "Qua", "Quin", "Sex", "Sáb"],
            daysMin: ["Do", "Se", "Te", "Qa", "Qi", "Se", "Sa"],
            months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            today: "Today",
            clear: "Clear",
            format: "dd/mm/yyyy",
            titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
            weekStart: 0
        };
    </script>
    <script>
        $(document).ready(function (){
            $('.data').datepicker({
                autoclose: true,
                todayHighlight: true,
                language: 'pt-BR'
            });
            $('.hora').timepicker({
                minuteStep: 30,
                defaultTime: "",
                showMeridian: false,
                icons: {
                    'up': 'fas fa-arrow-up',
                    'down': 'fas fa-arrow-down'
                }
            });
        });
    </script>
@endsection