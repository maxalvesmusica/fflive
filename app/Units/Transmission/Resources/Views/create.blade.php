@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cadastrar Nova Transmissão</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        {{ Form::open(['route' => 'transmission.store']) }}
                            <div class="col-md-4 m-t-10">
                                <label>Jogo</label>
                                <input type="text" name="match" class="form-control" required/>
                            </div>
                            <div class="col-md-4 m-t-10">
                                <label>Link</label>
                                <textarea rows="4" cols="50" name="link" class="form-control"></textarea>
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