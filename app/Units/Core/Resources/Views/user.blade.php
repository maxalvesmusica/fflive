
<html>
<head>
    <link rel="icon" href="{{ url('favicon.ico') }}" />
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="Content-Language" content="pt-br" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Futebol Facil | Apostas Esportivas Online</title>
    <meta name="description" content="O melhor site de apostas esportivas online do Brasil. Site desenvolvido e administrado por Brasileiros.">
    <meta name="keywords" content="apostas esportivas,apostas online,futebol facil,cashout">
    @yield('metas')
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/geral.css') }}">
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=1789909471319616";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="container-fluid">

    <div class="center-box">

        <div class="row">
            <div class="logo"><a href="."><img src="{{ url('img/logo.png') }}"></a></div>
        </div>

        <div class="row">
            <div class="col-md-12">


                <div class="times">

                    <!--lado1 DO PERFIL-->
                    <div class="col-md-12">
                        <div class="row">

                            <!-- Profile Image -->
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <!-- Menu Responsivo, fixo no topo -->
                                    <div class="navbar-default menu-usuario" role="navigation">
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
                                                    <li><a href="{{ route('user.index') }}">HOME</a></li>
                                                    <li><a href="{{ route('user.games') }}">DEIXE SEU PALPITE</a></li>
                                                    <li class="active"><a href="{{ route('user.bonus') }}"><b>GANHE BÔNUS!</b></a></li>
                                                    <li><a href="{{ route('logout') }}">SAIR</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim do Menu responsivo -->
                                    @yield('content')

                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                        </div>
                    </div>
                    <!--/lado1 DO PERFIL-->

                </div>

            </div>
        </div>

    </div>

</div>

<script src="{{ url('bootstrap/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>