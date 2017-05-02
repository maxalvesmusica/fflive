@extends('core::user')

@section('content')
        <div class="col-md-12">
        	<h3>Promoção válida apenas pra quem compartilhar essa imagem em modo publico no seu Facebook</h3>
            <div class="col-md-12">
                <div id="shareBtn" class="btn btn-success clearfix">Compartilhar</div>
                <a href="{{ route('transmission.user')}}" class="btn btn-info">Confirmar</a>
            </div>
        	<div class="thumbnail">
        		<img src="{{url('img/'.$img->link)}}" alt="">
        	</div>	
        </div>
@stop

@section('scripts')
<script>
document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    mobile_iframe: true,
    href: '{{url('img/'.$img->link)}}',
  }, function(response){});
}
</script>
@stop