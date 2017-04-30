@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Palpites {{$count}}</h2>
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
                                <th>Palpite</th>
                                <th>Resultado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bets as $bet)
                            <tr>
                                <td>#</td>
                                <td>
                                    <a href="http://www.facebook.com/{{$bet->user->idface}}" target="_blank">{{$bet->user->name}}</a>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <img src="{{$bet->user->avatar}}" class="avatar" alt="Avatar">
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <small>{{$bet->user->email}}</small>
                                </td>
                                <td>
                                    <?php
                                        $r = explode('x', $bet->score);
                                        $result = ($bet->score == $bet->match->score) ? 'Acertou!' : '';
                                        ?>
                                    <button type="button" class="btn btn-success btn-xs">{{$bet->match->tone." $r[0]X$r[1] ".$bet->match->ttwo}}</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm">{{ $result }}</button>
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