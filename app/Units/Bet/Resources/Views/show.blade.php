@extends('core::admin')
@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="float: left;">Palpites</h2>
                        <div class="navbar-right m-t-10">
                            <a href="{{ \URL::previous() }}" class="btn btn-primary">VOLTAR</a>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                @if(! empty($bet->games))
                                    @foreach($bet->games as $game)
                                        <div class="col-xs-12 col-sm-6 col-md-4 thumbnail m-t-5" style="background: {{$game->present()->color}}; color: white">
                                            <div class="col-md-12">
                                                <h5><b>{{ $game->match->tone.' X '.$game->match->ttwo }}</b></h5>
                                                <h5><b>{{$game->score." - ".$game->present()->result}}</b></h5>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop