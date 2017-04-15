@extends('core::public')

@section('content')
<!-- Conteudo Geral-->
<div class="content-wrapper" style="overflow: hidden;">
    <div class="col-md-9">
        <div class="row">
            <section class="content">
                <div class="row">
                    @include('core::partials.site.aside')
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <section class="content-header">
                                    <h4>
                                        Composições
                                    </h4>
                                </section>
                                @foreach($songs as $song)
                                <?php
                                    $url = "http://rest.s3for.me/".config('app.bucket')."/upload/".$sing->slug."/".$song->file;
                                ?>
                                <div class="col-md-12">
                                    <div class="box box-widget widget-user-2">
                                        <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked">
                                                <li><a>Musica: <b>{{ $song->name }}</b> <span class="pull-right badge bg-blue">{{ $song->genre }}</span></a></li>
                                                <li><a>
                                                        <audio src="{{ $url }}" controls="controls" preload="preload" title="{{ $song->name }}"></audio>
                                                    </a></li>
                                                <li class="pull-left">
                                                    <a><i class="fa fa-play-circle"></i> 7 Execuções
                                                        | <i class="fa fa-thumbs-up"></i> 5 Curtidas </a>
                                                </li>
                                                <li class="pull-right"><a href="#"><i class="fa fa-thumbs-o-up"></i> <b>CURTIR</b></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- /.col -->
                                <div class="col-md-12">
                                <span class="pull-right-container">
                                    <small class="label pull-right"><button type="button" class="btn btn-block btn-primary btn-sm">VER MAIS <i class="fa fa-level-down"></i></button></small>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('core::partials.adm.right.index')
</div>
<!-- Conteudo Geral-->
@stop