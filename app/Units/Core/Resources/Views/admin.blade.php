<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="Content-Language" content="pt-br" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Futebol Fácil</title>
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('geral.css') }}">
    <link rel="stylesheet" href="{{ url('pluginfa/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('pluginfa/css/font-awesome.min.css') }}">
</head>

<body>

<!-- Menu Responsivo, fixo no topo -->
<div class="navbar-default menu-admin" role="navigation">
    <div class="container">
        <div class="navbar-header">

            <!--Botao oculto para menu responsivo -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span style="background:#fff;" class="icon-bar"></span><span style="background:#fff;" class="icon-bar"></span> <span style="background:#fff;" class="icon-bar"></span>
            </button>
        </div>

        <!-- OpÃ§Ãµes do Menu -->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @if (\Auth::check())
                    <li><a href="{{ route('match.index') }}">JOGOS</a></li>
                    <li><a href="{{ route('user.list') }}">CADASTROS</a></li>
                    <li><a href="{{ route('logout') }}">SAIR</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- Fim do Menu responsivo -->
@yield('content')
<!-- Scripts bootstrap-->
<script src="{{ url('bootstrap/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>