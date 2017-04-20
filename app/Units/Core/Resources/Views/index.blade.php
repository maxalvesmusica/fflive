
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
    <meta property="og:url"           content="http://www.futebolfacil.com.br" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Futebol Fácil Ao Vivo" />
    <meta property="og:description"   content="Venha dar seu chute e ganhar prêmios" />
    <meta property="og:image"         content="http://www.futebolfacil.com/skins/aovivofacil.com.br/images/logo.png" />

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


<div class="container-fluid">

    <div class="center-box">

        <div class="row">
            <div class="logo"><a href="."><img src="{{ url('img/logo.png') }}"></a></div>
        </div>

        <div class="row">
            <div class="palpite-gratis"><img src="{{ url('img/palpite.png') }}"></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('social.redirect') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook icon-face"></i>
                    <b>ENTRAR COM O FACEBOOK</b></a>
            </div>
            <div class="col-md-12">
                <a href="http://www.futebolfacil.com" target="blank" class="btn btn-block btn-danger" style="max-width: 340px; margin: auto;"><b>APOSTE AQUI</b></a>
            </div>
        </div>

    </div>

</div>






<!-- Scripts bootstrap-->
<script src="{{ url('bootstrap/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</body>
</html>