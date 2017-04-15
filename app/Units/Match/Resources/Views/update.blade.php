@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Editar Jogo</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        {{ Form::model($match, ['route' => ['match.update', $match->id]]) }}
                        <div class="col-md-4 m-t-10">
                            <label>Time1</label>
                            <input type="text" class="form-control" name="tone" value="{{$match->tone}}">
                        </div>

                        <div class="col-md-4 m-t-10">
                            <label>Time2</label>
                            <input type="text" class="form-control" name="ttwo" value="{{$match->ttwo}}">
                        </div>

                        <div class="col-md-4 m-t-10">
                            <label>Campeonato</label>
                            <input type="text" class="form-control" name="championship" value="{{$match->championship}}">
                        </div>

                        <div class="col-md-2 m-t-10">
                            <label>Data</label>
                            <input type="datetime" class="form-control" name="datetime" value="{{$match->datetime}}">
                        </div>

                        <div class="col-md-8 m-t-10">
                            <label>Link da Transmissão</label>
                            <input type="text" class="form-control" name="link" value="{{$match->link}}">
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