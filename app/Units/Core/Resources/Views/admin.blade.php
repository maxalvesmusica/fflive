<html>
<head>
    <link rel="shortcut icon" href="http://www.futebolfacil.com/favicon.ico" />
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="Content-Language" content="pt-br" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Futebol Facil | Apostas Esportivas Online</title>
    <meta name="description" content="O melhor site de apostas esportivas online do Brasil. Site desenvolvido e administrado por Brasileiros.">
    <meta name="keywords" content="apostas esportivas,apostas online,futebol facil,cashout">
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('geral.css') }}">
    <link rel="stylesheet" href="{{ url('pluginfa/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('pluginfa/css/font-awesome.min.css') }}">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-75043808-1', 'auto');
        ga('send', 'pageview');
    </script>
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
                    <li><a href="{{ route('transfer.index') }}">TRANSFERENCIAS</a></li>
                    <li><a href="{{ route('bonus.index') }}">BONUS</a></li>
                    <li><a href="{{ route('user.list') }}">USUARIOS</a></li>
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