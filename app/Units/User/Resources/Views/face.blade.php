@extends('core::user')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Facebook</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        @if( ! \Auth::user()->face)
                            <b>Bônus já solicitado</b>
                        @else
                            {{ Form::open(['route' => 'bonus.request']) }}
                            <div class="col-md-4 m-t-10">
                                <label>Email: </label>
                                <input type="text" class="form-control" name="txt" value="{{$user->face}}" step="any">
                                {{ Form::hidden('type', 'face') }}
                            </div>


                            <div class="col-md-2 m-t-20">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Salvar</button>
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>

                <div class="alert alert-info" role="alert"><p>Curta <b>Nossa Página</b>  e nos indique a no mínimo 5 amigos para ter direito
                        a essa promoção·</p></div>

            </div>

        </div>
    </div>
@stop