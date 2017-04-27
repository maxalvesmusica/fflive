@extends('core::user')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Instagram</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        @if( ! \Auth::user()->insta)
                            <b>Bônus já solicitado</b>
                        @else
                            {{ Form::open(['route' => 'bonus.request']) }}
                            <div class="col-md-4 m-t-10">
                                <label>Número: </label>
                                <input type="text" class="form-control" name="txt" value="{{$user->insta}}" step="any">
                                {{ Form::hidden('type', 'insta') }}
                            </div>

                            <div class="col-md-2 m-t-20">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Salvar</button>
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop