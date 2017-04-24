@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">

                    <div class="x_title">
                        <h2 style="float: left;">Transmissões</h2>
                        <div class="navbar-right m-t-10">
                                <a href="{{ route('transmission.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <!--pesquisa-->
                    <div class="col-md-3 col-sm-4">
                        <input type="date" class="form-control date" value="{{$date}}">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <button onclick="search()" class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar</button>
                    </div>
                    <!--pesquisa-->
                    <div class="x_content">

                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Partida</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transmissions as $t)
                                <tr>
                                    <td>{{$t->id}}</td>
                                    <td>{{$t->match }}</td>
                                    @if($t->live)
                                        <td><a href="{{route('transmission.hide', $t->id)}}" class="btn btn-primary">Ocultar</a></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end project list -->

                    </div>
                </div>

            </div>

        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        function search()
        {
            var date = $(".date").val();
            window.location.href = "{{config('app.url')}}/admin/transmissoes/"+date;
        }
    </script>
@stop