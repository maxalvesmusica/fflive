
@extends('core::adm')

@section('content')
<div class="content-wrapper" style="overflow: hidden;">
    <div class="col-md-9">
        <div class="row">

            <section class="content-header">
                <h1>
                    Resultado da pesquisa para: <small>{{$search}}</small>
                </h1>
            </section>

            <!-- conteudo musicas-->
            <section class="content">
                <div class="row">

                    <!-- Conteudo Seguidores-->
                    <div class="col-md-12">
                        <div class="box box-primary">

                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">
                                    @foreach ($users as $user)
                                    <a href="{{route('user.profile', $user->slug)}}"><li>
                                            <img src="{{$user->image}}" alt="User Image">
                                            <a class="users-list-name">{{$user->name}}</a>
                                            <span class="users-list-date">{{$user->state}}</span>
                                        </li></a>
                                    @endforeach
                                </ul>
                                <!-- /.users-list -->

                                <div class="col-md-12 m-b-10">
                    <span class="pull-right-container">
                        <small class="label pull-right"><button type="button" class="btn btn-block btn-primary btn-sm">VER MAIS <i class="fa fa-level-down"></i></button></small>
                    </span>
                                </div>

                            </div>
                            <!-- /.box-body -->

                        </div>
                    </div>
                    <!-- Conteudo Seguidores-->

                </div>
            </section>
            <!-- /.conteudo musicas -->

        </div>
    </div>
    @include('core::partials.adm.right.index')
</div>

@endsection