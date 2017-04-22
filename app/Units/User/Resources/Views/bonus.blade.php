@extends('core::user')

@section('content')
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

                                        @inject('bonus', 'App\Domains\Bonus\Bonus')
                                        @if ($bonus->where('user_id', \Auth::user()->id)->where('match_id', $match->id)->first())
                                    <div class="col-md-6">
                                            <button type="button" disabled class="btn btn-info botao-confirmar-bonus"><i class="fa fa-thumbs-o-up"></i> Já solicitado</button>
                                    </div>
                                        @else
                                            <div class="col-md-6">
                                            <div class="fb-share-button"
                                                 data-href="{{ $match->link }}"
                                                 size="large"
                                                 data-layout="button_count">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" onclick="request('transmissao', {{$match->id}})" class="btn btn-primary botao-confirmar-bonus"><i class="fa fa-thumbs-o-up"></i> Confirmar</button>
                                            </div>
                                        @endif
                                    <div class="col-md-12 m-t-10">
                                        <p>*Confirme que compartilhou o jogo e ganhe R$5 em bônus.</p>
                                    </div>
                                </div>

                            </div>
                    </li>
                </ul>

            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-12">

            <div class="well well-lg" style="overflow: hidden;">

                <!---->
                <div class="alert alert-info" role="alert">
                    <div class="icone-rede-bonus">
                        <i class="fa fa-facebook-official"></i>
                    </div>
                    <b>CURTA NOSSA PÁGINA E GANHE R$ 5,00 EM BÔNUS!</b>
                    <div class="navbar-right">
                        @if ($user->face)
                            <button type="button" disabled class="btn btn-info botao-confirmar-bonus"><i class="fa fa-thumbs-o-up"></i> Já solicitado</button>
                        @else
                            <button type="button" onclick="request('face', 0)" class="btn btn-primary botao-confirmar-bonus"><i class="fa fa-thumbs-o-up"></i> Confirmar</button>
                        @endif
                    </div>
                </div>
                <!---->

                <div class="alert alert-info" role="alert">
                    <div class="icone-rede-bonus">
                        <i class="fa fa-youtube-play"></i>
                    </div>
                    <b>SE INSCREVA EM NOSSO CANAL E GANHE R$ 5,00 EM BÔNUS!</b>
                    <div class="navbar-right">
                        @if ($user->youtube)
                            <button type="button" disabled class="btn btn-info botao-confirmar-bonus"><i class="fa fa-youtube-play"></i> Já solicitado</button>
                        @else
                            <button type="button" onclick="request('youtube', 0)" class="btn btn-primary botao-confirmar-bonus"><i class="fa fa-youtube-play"></i> Confirmar</button>
                        @endif
                    </div>
                </div>
                <!---->

                <!---->
                <div class="alert alert-info" role="alert">
                    <div class="icone-rede-bonus">
                        <i class="fa fa-instagram"></i>
                    </div>
                    <b>SIGA <span class="badge bg-yellow">@FUTEBOLFACIL</span> E GANHE R$ 5,00 EM BÔNUS!</b>
                    <div class="navbar-right">
                        @if ($user->insta)
                            <button type="button" disabled class="btn btn-info botao-confirmar-bonus"><i class="fa fa-instagram"></i> Já solicitado</button>
                        @else
                            <input type="text" name="instagram" class="form-control input-bonus-insta instav" placeholder="@usuario">
                            <button type="button" onclick="request('insta', 0)" class="btn btn-primary botao-confirmar-bonus"><i class="fa fa-heart-o"></i> Confirmar</button>
                        @endif
                    </div>
                </div>
                <!---->

            </div>

        </div>
    </div>
    <div class="col-md-12">
        <a href="http://www.futebolfacil.com" target="blank" class="btn btn-block btn-danger" style="max-width: 340px; margin: auto;"><b>APOSTE AQUI</b></a>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        function request(type, match) {
            var match = (match != 0) ? match : '';
            if (type == 'insta') {
                var val = $(".instav").val();
                if (! val) {
                    alert("Digite o seu usuário do instagram antes de confirmar");
                    return false;
                }
            }
            $(":button").prop('disabled', true);
            $.get("{!! route('bonus.request') !!}",
            {
                type: type,
                match_id: match,
                val: $(".instav").val()
            }).done(function() {
                alert("Bonus solicitado. Checaremos as informações e depois liberamos o saldo!");
                window.location.reload();
            });
        }
    </script>
@stop