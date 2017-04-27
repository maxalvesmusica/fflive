@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cadastros | Total: {{$count}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <!--pesquisa-->
                    <div class="col-md-3 col-sm-4">
                        <input type="text" class="form-control user" name="user">
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
                                <th style="width: 1%">#</th>
                                <th style="width: 20%">Usuário</th>
                                <th>Login FF</th>
                                <th>Foto de Perfil</th>
                                <th>E-mail</th>
                                <th>Saldo</th>
                                <th>Cadastro</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <a href="http://www.facebook.com/{{$user->idface}}" target="_blank">{{$user->name}}</a>
                                </td>
                                <td>{{$user->loginff}}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <img src="{{ $user->avatar }}" class="avatar" alt="Avatar">
                                        </li>
                                    </ul>
                                </td>
                                <td><small>{{ $user->email }}</small></td>
                                <td><small>R$ {{ $user->present()->balance }}</small></td>
                                <td>{{date('d/m/Y H:i:s', strtotime($user->created_at))}}</td>
                                <td>
                                    <a href="{{ route('user.block', [$user->id, $user->present()->action]) }}" class="btn btn-info">{{$user->present()->active}}</a>
                                    <a href="{{ route('user.balance', $user->id) }}" class="btn btn-info">Saldo</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end project list -->
                        @if ($links)
                            {{ $users->links() }}
                        @endif
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
            var user = $(".user").val();
            window.location.href = "{{config('app.url')}}/admin/usuarios/"+user;
        }
    </script>
@stop