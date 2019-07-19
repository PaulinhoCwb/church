<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Missas</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }

    </style>

</head>

<body class="login-page" style="background: white">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2><strong>Santuario Santa Teresinha do Menino Jesus.</strong></h2>
                <br>
                Av. Visc. de Guarapuava, 4787 - Batel, Curitiba<br>
                (41) 3333-3333 <br>
                parstateresinhactba@gmail.com <br>
                <br>
            </div>
        </div>
        <div class="jumbotron">
            <h1>Missas</h1>
        </div>
            @foreach ($missas as $missa)
                <div class="row">
                    <div class="col-xs-12">
                        <strong>Missa em memória de {{ $missa->nome }}! 
                        @if ($missa->falecimento == 1)
                            7º dia de falecimento
                        @elseif($missa->falecimento == 2)
                            30º dia de falecimento
                        @elseif($missa->falecimento == 3)
                            1 ano de falecimento
                        @else
                            Sem data
                        @endif
                        </strong><br>
                        <p class="text-muted"><strong>Pedido Por:</strong> {{ $missa->contato }}</p>
                        <p class="text-muted"><strong>Para a missa das:</strong> {{ date("d/m/Y",strtotime($missa->data))}} - {{ $missa->hora }}</p> 
                    </div>
                </div>
                <hr>
            @endforeach
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        <div class="jumbotron">
            <h1>Intenções - ação de graças</h1> 
        </div>
        @foreach ($intencoes as $intencao)
            <div class="row">
                <div class="col-xs-12">
                    <strong>{{ $intencao->contato }} Gostaria de agradeçer!</strong><br>
                    <p>{{ $intencao->intencao }}</p>
                    <p class="text-muted"><strong>Para a missa das:</strong>  {{ $intencao->data}} - {{ $intencao->hora }}</p> 
                </div>
            </div>
            <hr>
        @endforeach
    </div>

</body>

</html>
