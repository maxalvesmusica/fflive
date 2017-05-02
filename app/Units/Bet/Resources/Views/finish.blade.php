@extends('core::user')

@section('content')
        <div class="col-md-12">
        	<h3>Promoção válida apenas pra quem compartilhar essa imagem em modo publico no seu Facebook</h3>
            <div class="col-md-12">
                <iframe src="https://m.facebook.com/plugins/share_button.php?href={{url('img/'.$img->link)}}&layout=button&size=large&mobile_iframe=true&width=119&height=28&appId" width="119" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>
            <div class="col-md-12">
                <a href="{{ route('transmission.user')}}" class="btn btn-info">Confirmar</a>
            </div>
        	<div class="thumbnail">
        		<img src="{{url('img/'.$img->link)}}" alt="">
        	</div>	
        </div>
@stop