
<html>
<head>
    <link rel="icon" href="{{ url('favicon.ico') }}" />
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="Content-Language" content="pt-br" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Futebol Fácil</title>
    @yield('metas')
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/geral.css') }}">
    <link rel="stylesheet" href="{{ url('pluginfa/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('pluginfa/css/font-awesome.min.css') }}">
</head>
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

                                    <img class="profile-user-img img-responsive img-circle" src="{{ $user->avatar }}" alt="User profile picture">

                                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                    <p class="text-muted text-center"><i class="fa fa-envelope"></i> {{ $user->email }}</p>

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