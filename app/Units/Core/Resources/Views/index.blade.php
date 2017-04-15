
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="Content-Language" content="pt-br" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Futebol Fácil</title>
    <meta property="og:url"           content="http://www.futebolfacil.com.br" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Futebol Fácil Ao Vivo" />
    <meta property="og:description"   content="Venha dar seu chute e ganhar prêmios" />
    <meta property="og:image"         content="http://www.futebolfacil.com/skins/aovivofacil.com.br/images/logo.png" />

    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('geral.css') }}">
    <link rel="stylesheet" href="{{ url('pluginfa/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('pluginfa/css/font-awesome.min.css') }}">
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