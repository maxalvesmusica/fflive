@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cadastrar Novo Jogo</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        {{ Form::open(['route' => 'match.store']) }}
                            <div class="col-md-4 m-t-10">
                                <label>Time1</label>
                                <input type="text" class="form-control" name="tone">
                            </div>

                            <div class="col-md-4 m-t-10">
                                <label>Time2</label>
                                <input type="text" class="form-control" name="ttwo">
                            </div>

                            <div class="col-md-4 m-t-10">
                                <label>Campeonato</label>
                                <input type="text" class="form-control" name="championship">
                            </div>

                            <div class="col-md-3 m-t-10">
                                <label>Data</label>
                                <input type="date" class="form-control" name="date">
                            </div>

                            <div class="col-md-3 m-t-10">
                                <label>Hora</label>
                                <input type="time" class="form-control" name="time">
                            </div>

                            <div class="col-md-4 m-t-10">
                                <label>Link da Transmissão</label>
                                <input type="text" class="form-control" name="link">
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