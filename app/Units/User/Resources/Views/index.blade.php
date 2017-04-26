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
                            <br> Crie seu cadastro em <a href="http://www.futebolfacil.com/#/?lang=pt-br&btag=FFTV" target="_blank">Futebol Fácil</a> Para solicitar transferência do saldo.
                            <br> Já tem cadastro?
                            <input type="text" name="loginff" class="loginff" placeholder="Insira aqui o login">
                            <a href="javascript:login();" class="btn btn-primary login">Salvar</a>
                        @endif
                    </form>
                </div>
            </ol>
            @if (count($bonus) != 0)
            <div class="alert alert-info" role="alert">
                <p>Estamos analisando seu <b>{{$bonus->type}}</b> para liberar seu bônus de R$ 5,00.</p>
            </div>
            @endif
        </div>
    </div>
    @if (date('Y-m-d H:i:s') > $date)
        <b>O tempo de palpite acaba quando algum dos jogos iniciar. Volte amanhã e aproveite!</b>
    @else
    @foreach ($matches as $match)
        <div class="row">
            <div class="col-md-12">
                <ul class="list-unstyled top_profiles scroll-view">
                    <li class="media event">
                        <div class="media-body">

                            <div class="col-md-6 m-t-10">
                                <p class="title" href="#"><strong>{{ $match->tone }}</strong> <small>vs</small> <strong>{{ $match->ttwo }}</strong></p>
                                <p>Campeonato: {{ $match->championship }}</p>
                                <p> <small>{{ $match->present()->date }}</small></p>
                            </div>

                            <div class="col-md-6 m-t-10">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        @inject('game', 'App\Domains\Games\Game')
                                        <?php
                                        $score = $game->where('match_id', $match->id)->where('user_id', \Auth::user()->id)->first();
                                        $r = $score ? explode('x', $score->score) : null;
                                        ?>
                                        <input type="text" name="vone" id="vone{{$match->id}}" class="form-control form-palpite"
                                               <?php if ($r) { ?>
                                               value="{{$r[0]}}" disabled
                                        <?php }?>
                                        >
                                        <div class="input-group-addon">X</div>
                                        <input type="text" name="vtwo" id="vtwo{{$match->id}}" onblur="save({{$match->id}})" class="form-control form-palpite"
                                               <?php if ($r) { ?>
                                               value="{{$r[1]}}" disabled
                                        <?php }?>
                                        >
                                    </div>
                                </div>

                            </div>
                    </li>
                </ul>

            </div>
        </div>
    @endforeach
    <div class="col-md-12">
        <div class="col-md-12">
            <p style="text-align: center;"><b>Clique no botão abaixo e compartilhe a publicação para concluir.</b></p>
            <p style="text-align: center;"><small>*A promoção só será valida para aqueles que compartilharem a publicação.</small></p>
        </div>
        <div style="width: 100%; max-width: 140px; margin: auto auto 20px auto;">
            <div class="fb-share-button"
                 data-href="{{ $link->link }}"
                 size="large"
                 data-layout="button_count">
            </div>
        </div>
    </div>
    @endif
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
        function save(match) {
            var vone = $("#vone"+match).val();
            var vtwo = $("#vtwo"+match).val();
            if (vone === '' || vtwo === '') {
                alert("Preencha os campos");
                return false
            }
            var result = vone+'x'+vtwo;
            $.get("{!! route('game.store') !!}",
                {
                    match_id:match,
                    score:result
                }).done(function() {
                $("#vone"+match).prop('disabled', true);
                $("#vtwo"+match).prop('disabled', true);
            });
        }
    </script>
@stop