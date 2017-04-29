@extends('core::user')

@section('content')
        <div class="col-md-12">
        	<h3>COPIE E COMPARTILHE ESSA IMAGEM EM SEU FACEBOOK PARA TER DIREITO A ESSA PROMOÇÃO</h3>
        	<div class="thumbnail">
        		<img src="{{url('img/'.$img->link)}}" alt="">
        	</div>

            <div style="width: 100%; max-width: 140px; margin: auto auto 20px auto;">
                <a href="{{ route('transmission.user')}}" class="btn btn-info">Confirmar</a>
            </div>
        </div>
@stop