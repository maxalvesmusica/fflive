@extends('core::user')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <ul class="list-unstyled top_profiles scroll-view">
                <li class="media event">
                    <div class="media-body">

                        <div class="col-md-6 m-t-10">
                            <span class="badge bg-yellow"> Transmissão Ao Vivo</span>
                            <p class="title" href="#"><strong>{{ $match->tone }}</strong> <small>vs</small> <strong>{{ $match->ttwo }}</strong></p>
                            <p>{{ $match->championship }}</p>
                            <p> <small>{{ $match->present()->date }}</small></p>
                        </div>

                        <div class="col-md-6 m-t-10">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="palpite" class="form-control form-palpite">
                                    <div class="input-group-addon">X</div>
                                    <input type="text" name="palpite" class="form-control form-palpite">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fb-share-button"
                                     data-href="{{ $match->link }}"
                                     size="large"
                                     data-layout="button_count">
                                </div>
                            </div>
                        </div>

                    </div>
                </li>
            </ul>

        </div>
    </div>
@stop