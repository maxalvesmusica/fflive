@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="text-center">Login</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content" style="width: 300px; margin: auto;">

                        {{ Form::open(['route' => 'loginmesmo']) }}
                            <div class="row">
                                <div class="col-md-12 m-t-10" style="width: 300px; margin: auto;">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 m-t-10" style="width: 300px; margin: auto;">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2 m-t-20" style="width: 300px; margin: 20px auto;">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">Entrar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection