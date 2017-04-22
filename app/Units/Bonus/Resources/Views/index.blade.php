@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">

                    <div class="x_title">
                        <h2 style="float: left;">Bonus</h2>
                        <div class="navbar-right m-t-10">
                            @if ($type === 'transferidas')
                                <a href="{{ route('bonus.index') }}" class="btn btn-primary">VER PENDENTES</a>
                            @else
                                <a href="{{ route('bonus.index', 'transferidas') }}" class="btn btn-primary">VER CONCLUIDAS</a>
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
                                <th>Email/Login/Jogo</th>
                                <th>Rede</th>
                                <th>Status</th>
                                <th>Solicitação</th>
                                <th>Conclusão</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bonus as $b)
                                <tr>
                                    <td>{{$b->id}}</td>
                                    <td>{{$b->user->name }}</td>
                                    <td>
                                    @if ($b->type == 'transmissao')
                                        {{$b->match->tone.' X '.$b->match->ttwo}}
                                    @else
                                        {{($b->type == 'insta') ? $b->user->insta : $b->user->email }}</td>
                                    @endif
                                    <td>{{$b->type }}</td>
                                    <td>{{$b->present()->status}}</td>
                                    <td>{{$b->present()->request}}</td>
                                    <td>{{$b->done == 1 ? $b->present()->done : '' }}</td>
                                    <td>
                                        <?php
                                        $class = ($b->done == 0) ? 'success' : 'danger';
                                        $txt = ($b->done == 0) ? 'Concluir' : 'Desfazer';
                                        ?>
                                        <a href="{{ route('bonus.update', [$b->id, $b->user->id]) }}" class="btn btn-{{$class}}">{{$txt}}</a>
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
            window.location.href = "{{config('app.url')}}/admin/bonus/{{$type}}/"+date;
        }
    </script>
@stop