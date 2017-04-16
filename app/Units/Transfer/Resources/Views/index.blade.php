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
                            @if ($type == '0')
                                <a href="{{ route('transfer.index', 'transferidas') }}" class="btn btn-primary">VER CONCLUIDAS</a>
                            @else
                                <a href="{{ route('transfer.index') }}" class="btn btn-primary">VER PENDENTES</a>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 20%">Usuário</th>
                                <th style="width: 20%">Login FF</th>
                                <th style="width: 25%">Valor</th>
                                <th style="width: 25%">Status</th>
                                <th style="width: 9%">#Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transfers as $transfer)
                                <tr>
                                    <td>#</td>
                                    <td>{{$transfer->user->name}}</td>
                                    <td>{{$transfer->user->loginff}}</td>
                                    <td>{{$transfer->present()->balance}}</td>
                                    <td>{{$transfer->present()->status}}</td>
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