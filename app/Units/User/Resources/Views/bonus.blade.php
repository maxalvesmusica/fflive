@extends('core::user')

@section('content')
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
                            <button type="button" onclick="request('face')" class="btn btn-primary botao-confirmar-bonus"><i class="fa fa-thumbs-o-up"></i> Confirmar</button>
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
                            <button type="button" onclick="request('youtube')" class="btn btn-primary botao-confirmar-bonus"><i class="fa fa-youtube-play"></i> Confirmar</button>
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
                            <button type="button" onclick="request('insta')" class="btn btn-primary botao-confirmar-bonus"><i class="fa fa-heart-o"></i> Confirmar</button>
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
        function request(type) {
            $(":button").prop("disabled",true);
            $.get("{!! route('bonus.request') !!}",
            {
                type: type,
                val: $(".instav").val()
            }).done(function() {
                alert("Bonus solicitado. Checaremos as informações e depois liberamos o saldo!");
                window.location.reload();
            });
        }
    </script>
@stop