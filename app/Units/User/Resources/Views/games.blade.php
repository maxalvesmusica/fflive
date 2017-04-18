@extends('core::user')

@section('content')
    @if (count($matches) == 0)
        Estamos sem nenhum jogo nesse momento. Volte em instantes! <br><br>
    @endif
    @foreach ($matches as $match)
        <div class="row">
            <div class="col-md-12">
                <ul class="list-unstyled top_profiles scroll-view">
                    <li class="media event">
                        <div class="media-body">

                            <div class="col-md-6 m-t-10">
                                <span class="badge bg-yellow"> Transmissão Ao Vivo</span>
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
                                    <div class="col-md-6">
                                        <div class="fb-share-button"
                                             data-href="{{ $match->link }}"
                                             size="large"
                                             data-layout="button_count">
                                        </div>
                                    </div>
                                    <div class="col-md-12 m-t-10">
                                        <p>*Clique no botão "Compartilhar" para finalizar.</p>
                                    </div>
                                </div>

                            </div>
                    </li>
                </ul>

            </div>
        </div>
    @endforeach
    <div class="col-md-12">
        <a href="http://www.futebolfacil.com" target="blank" class="btn btn-block btn-danger" style="max-width: 340px; margin: auto;"><b>APOSTE AQUI</b></a>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
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