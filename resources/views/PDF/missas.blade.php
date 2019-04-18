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
                <h1>Pedidos de missas / Inteções - ação de graças</h1> 
              </div>
            @foreach ($intencoes as $intencao)
                <div class="row">
                    <div class="col-xs-12">
                            <div class="alert @if ($intencao->type == 1)
                                alert-danger
                            @else
                                alert-success
                            @endif">
                                    <strong>{{ $intencao->contato }}!</strong><br>
                                    <p>{{ $intencao->intencao }}</p>.
                            </div>
                    </div>
                </div>
            @endforeach
        

    </div>

</body>

</html>
