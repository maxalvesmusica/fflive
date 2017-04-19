@extends('core::user')

@section('content')

    <img class="profile-user-img img-responsive img-circle" src="{{ $user->avatar }}" alt="User profile picture">

    <h3 class="profile-username text-center">{{ $user->name.' - '.$user->loginff }}</h3>

    <p class="text-muted text-center"><i class="fa fa-envelope"></i> {{ $user->email }}</p>
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb" style="overflow: hidden;">
                <div class="col-md-12">
                    <form class="form-inline" style="width: 100%; max-width: 270px; margin: auto;">
                        <div class="form-group">
                            <label>Saldo atual:</label>
                            <div class="input-group">
                                <div class="input-group-addon"><h3><b>R$ {{ $user->present()->balance }}</b></h3></div>
                            </div>
                        </div>
                        @if (\Auth::user()->loginff)
                            @if (\Auth::user()->balance > 20.00)
                                <a href="{{route('transfer.request')}}" class="btn btn-block btn-success m-t-10">Solicitar Transferência</a>
                                O prazo para transferência é de 24horas
                            @else
                                <a href="javascript:;" class="btn btn-block btn-success m-t-10">Solicitar Transferência</a>
                                Mínimo de transferência é R$ 20 reais
                            @endif
                        @else
                            <br> Crie seu cadastro em <a href="http://futebolfacil.com" target="_blank">Futebol Fácil</a> Para solicitar transferência do saldo.
                            <br> Já tem cadastro?
                            <input type="text" name="loginff" class="loginff" placeholder="Insira aqui o login">
                            <a href="javascript:login();" class="btn btn-primary login">Salvar</a>
                        @endif
                    </form>
                    @if (count($bonus) != 0)
                    <div class="alert alert-info" role="alert">
                        <p>Estamos analisando seu <b>Instagram</b> para liberar seu bônus de R$ 5,00.</p>
                    </div>
                    @endif
                </div>

            </ol>
        </div>
    </div>
    <div class="col-md-12">
        <a href="http://www.futebolfacil.com" target="blank" class="btn btn-block btn-danger" style="max-width: 340px; margin: auto;"><b>APOSTE AQUI</b></a>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        function login() {
            var login = $(".loginff").val();
            $.get("{!! route('user.update.login') !!}",
            {
                loginff:login
            }).done(function() {
                window.location.reload();
            });
        }
    </script>
@stop