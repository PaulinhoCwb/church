<!DOCTYPE html>

<html lang="pt_br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Santuario Santa Teresinha do Menino Jesus</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @section('map')
    <script type='text/javascript'>
        var map;
        function GetMap()
        {
            map = new Microsoft.Maps.Map('#myMap', {zoom:15});
            var pin = createFontPushpin(new Microsoft.Maps.Location(-25.4444127,-49.2886561), '\uf041', 'FontAwesome', 30, 'black');
            map.entities.push(pin);
        }
      
        function createFontPushpin(location, text, fontName, fontSizePx, color) {
            var c = document.createElement('canvas');
            var ctx = c.getContext('2d');
            //Define font style
            var font = fontSizePx + 'px ' + fontName;
            ctx.font = font
            //Resize canvas based on sie of text.
            var size = ctx.measureText(text);
            c.width = size.width; 
            c.height = fontSizePx;
            //Reset font as it will be cleared by the resize.
            ctx.font = font;
            ctx.textBaseline = 'top';
            ctx.fillStyle = color;
            ctx.fillText(text, 0, 0);
            return new Microsoft.Maps.Pushpin(location, {
                icon: c.toDataURL(),
                anchor: new Microsoft.Maps.Point(c.width / 2, c.height / 2) //Align center of pushpin with location.
            });
        }
        </script>
         <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AiXgMVGgMOoHCww8NMP9D1i9dKdsS83oLYw3e_oMD0LiH6T14WaZRfKon3sMzWsm' async defer></script>
     
    @show
</head>

<body>
    <!-- carousel  -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-light" style="width: 100%;">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/starosa.svg') }}" width="50" height="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">

                    <a class="nav-link" href="horarios.html">Horarios</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">Localização</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">Fale conosco</a>

                </li>

            </ul>
            <a href="/"  class="btn btn-dark float-right"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
        </div>

    </nav>

    <!-- /carousel  -->
    <!-- Formulario de inteções -->
    <div class="wrapper">
        @yield('content')

        <footer id="main-footer">
            <div class="container-fluid" style="background:#1c313a;">

                <div class="row">

                    <div class="col text-center text-white">

                        <div class="py-4">

                            <h1 class="h3">Santuario Santa Teresinha do Menino Jesus</h1>

                            <p>Copyright © 2019</p>

                        </div>

                    </div>

                </div>

            </div>

        </footer>
    </div>

    @section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @show
</body>

</html>