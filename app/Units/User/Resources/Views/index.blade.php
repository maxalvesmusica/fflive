@extends('core::user')

@section('content')
    <div class="row">
        <div class="img-pormocao-home">
            <a href="{{ route('match.user')}}"><img src="{{url('img/home.jpg')}}"</a>
        </div>
    </div>
    <!--
    <div class="row">
        <div class="img-pormocao-home2"><a href="user.whats"><img src="{{url('img/promowhats.jpg')}}"></a></div>
    </div>

    <div class="row">
        <div class="img-pormocao-home2"><a href="user.insta"><img src="{{url('img/promoinsta.jpg')}}"></a></div>
    </div>

    <div class="row">
        <div class="img-pormocao-home2"><a href="user.face><img src="{{url('img/promoface.jpg')}}"></a></div>
    </div>-->
@stop