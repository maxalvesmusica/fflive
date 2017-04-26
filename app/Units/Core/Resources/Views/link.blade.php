@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Link</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        {{ Form::open(['route' => 'core.update']) }}
                        <div class="col-md-4 m-t-10">
                            <label>Link</label>
                            <input type="text" class="form-control" name="link" value="{{$link->link}}">
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