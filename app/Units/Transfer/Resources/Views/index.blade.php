@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">

                    <div class="x_title">
                        <h2 style="float: left;">Transfêrencias</h2>
                        <div class="navbar-right m-t-10">
                            @if ($type === 'transferidas')
                                <a href="{{ route('transfer.index') }}" class="btn btn-primary">VER PENDENTES</a>
                            @else
                                <a href="{{ route('transfer.index', 'transferidas') }}" class="btn btn-primary">VER CONCLUIDAS</a>
                            @endif
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
                                <th>Usuário</th>
                                <th>Login FF</th>
                                <th>Valor</th>
                                <th>Status</th>
                                <th>Solicitação</th>
                                <th>Conclusão</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transfers as $transfer)
                                <tr>
                                    <td>{{$transfer->id}}</td>
                                    <td>{{$transfer->user->name}}</td>
                                    <td>{{$transfer->user->loginff}}</td>
                                    <td>{{$transfer->present()->balance}}</td>
                                    <td>{{$transfer->present()->status}}</td>
                                    <td>{{$transfer->present()->request}}</td>
                                    <td>{{$transfer->done == 1 ? $transfer->present()->done : '' }}</td>
                                    <td>
                                        <?php
                                            $class = ($transfer->done == 0) ? 'success' : 'danger';
                                            $txt = ($transfer->done == 0) ? 'Concluir' : 'Desfazer';
                                        ?>
                                        <a href="{{ route('transfer.update', [$transfer->id, $transfer->present()->tp]) }}" class="btn btn-{{$class}}">{{$txt}}</a>
                                    </td>
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
            window.location.href = "{{config('app.url')}}/admin/transferencias/{{$type}}/"+date;
        }
    </script>
@stop