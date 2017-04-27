@extends('core::user')

@section('content')
    <div class="row">
        <div class="img-pormocao-home"><img src="{{url('img/home.jpg')}}"></div>
    </div>
    <div class="row">
        <div class="img-pormocao-home2"><a href="{{route('user.whats', $user->id)}}"><img src="{{url('img/promowhats.jpg')}}"></a></div>
    </div>

    <div class="row">
        <div class="img-pormocao-home2"><a href="{{route('user.insta', $user->id)}}"><img src="{{url('img/promoinsta.jpg')}}"></a></div>
    </div>

    <div class="row">
        <div class="img-pormocao-home2"><a href="{{route('user.face', $user->id)}}"><img src="{{url('img/promoface.jpg')}}"></a></div>
    </div>
@stop