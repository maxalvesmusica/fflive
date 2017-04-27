@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Saldo: {{$user->name}}</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        {{ Form::open(['route' => ['user.postBalance', $user->id]]) }}
                        <div class="col-md-4 m-t-10">
                            <label>Saldo</label>
                            <input type="number" class="form-control" name="balance" value="{{$user->balance}}" step="any">
                        </div>

                        <div class="col-md-2 m-t-20">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Salvar</button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>

            </div>

        </div>
    </div>
@stop