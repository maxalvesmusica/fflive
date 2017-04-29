@extends('core::user')

@section('content')
    @if(\Auth::user()->block == 1)
        <b>Você não pode dar palpites no momento!</b>
    @elseif (date('Y-m-d H:i:s') > $date)
        <b>O tempo de palpite acaba quando algum dos jogos iniciar. Volte amanhã e aproveite!</b>
        <a href="{{ route('bet.user') }}" class="btn btn-info">Meus Palpites</a>
    @else
        <a href="{{ route('bet.user') }}" class="btn btn-info">Meus Palpites</a>
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
                                            <input type="number" name="vone" id="vone{{$match->id}}" class="form-control form-palpite"
                                                   <?php if ($r) { ?>
                                                   value="{{$r[0]}}" disabled
                                            <?php }?>
                                            >
                                            <div class="input-group-addon">X</div>
                                            <input type="number" name="vtwo" id="vtwo{{$match->id}}" onblur="save({{$match->id}})" class="form-control form-palpite"
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
                <a href="{{ route('bet.finish')}}" class="btn btn-info">Salvar Palpites</a>
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