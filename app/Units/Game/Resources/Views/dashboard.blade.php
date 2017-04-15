@extends('core::adm')

@section('content')
    <div class="content-wrapper" style="overflow: hidden;">
    <div class="col-md-9">
        <div class="row">
            @include('core::partials.adm.slides')

            <div class="col-md-6">
                <div class="row">

                    <section class="content-header">
                        <h1>
                            Informações da Conta
                        </h1>
                    </section>

                    <section class="content">

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="small-box bg-green">
                                    <div class="inner box-infor">
                                        <h3>{{$user->mr}}</h3>
                                        <p>Composições Registradas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-files-o"></i>
                                    </div>
                                    <a href="{{ route('song.index', 'registradas') }}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="small-box bg-yellow">
                                    <div class="inner box-infor">
                                        <h3>{{$user->mnr}}</h3>
                                        <p>Composições Não Registradas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-times-circle-o"></i>
                                    </div>
                                    <a href="{{ route('song.index', 'naoregistradas') }}" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <a href="{{route('song.create')}}"><div class="info-box bg-aqua">
                                        <span class="info-box-icon"><i class="fa fa-cloud-upload"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-number">ENVIAR COMPOSIÇÃO</span>
                                            <span class="progress-description">
                    Fazer Upload
                  </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div></a>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->

                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <a href="{{ route('song.register') }}"><div class="info-box bg-green">
                                        <span class="info-box-icon"><i class="fa fa-book"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-number">REGISTRAR COMPOSIÇÃO</span>
                                            <span class="progress-description">
                    Clique Para Registrar
                  </span>
                                        </div>
                                    </div></a>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <a href="#"><div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-server"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">SEU PLANO É: </span>
                                        <span class="info-box-number">PLANO {{strtoupper($user->plain)}}</span>
                                        <span class="progress-description">
                                            Clique e Saiba Mais
                                        </span>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <section class="content-header">
                        <h1>
                            Feed de Atualizações
                        </h1>
                    </section>
                    <section class="content">
                        <div class="row">
                            Sem atualizações no momento
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
    @include('core::partials.adm.right.index')
    </div>
@stop