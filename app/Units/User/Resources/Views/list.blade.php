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

                    <div class="x_content">

                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 20%">Usuário</th>
                                <th>Foto de Perfil</th>
                                <th>E-mail</th>
                                <th>Saldo</th>
                                <th>Cadastro</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <a>{{$user->name}}</a>
                                </td>
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
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end project list -->
                        {{ $users->links() }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop