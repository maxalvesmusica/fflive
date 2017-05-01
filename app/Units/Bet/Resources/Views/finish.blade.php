@extends('core::user')

@section('content')
        <div class="col-md-12">
        	<h3>COPIE E COMPARTILHE ESSA IMAGEM EM SEU FACEBOOK PARA TER DIREITO A ESSA PROMOÇÃO</h3>
        	<div class="thumbnail">
        		<img src="{{url('img/'.$img->link)}}" alt="">
        	</div>
        	<h4>Promoção válida apenas pra quem compartilhar em modo publico no seu Facebook</h4>	

            <div style="width: 100%; max-width: 140px; margin: auto auto 20px auto;">
                <iframe src="https://www.facebook.com/plugins/share_button.php?href={{url('img/'.$img->link)}}&layout=button&size=large&mobile_iframe=true&width=119&height=28&appId" width="119" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                <a href="{{ route('transmission.user')}}" class="btn btn-info">Confirmar</a>
            </div>
        </div>
@stop