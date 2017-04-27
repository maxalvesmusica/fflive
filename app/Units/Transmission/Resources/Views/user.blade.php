@extends('core::user')

@section('content')
    @if (count($transmissions) == 0)
        Estamos sem nenhum jogo nesse momento. Volte em instantes! <br><br>
    @endif
    @foreach ($transmissions as $t)
        <div class="row">
            <div class="col-md-12">
                <ul class="list-unstyled top_profiles scroll-view">
                    <li class="media event">
                        <h4>{{$t->match}}</h4>
                        <div class="fb-share-button"
                             data-href="{{ $t->facebook }}"
                             size="large"
                             data-layout="button_count">
                        </div>
                        <div class="embed-responsive embed-responsive-16by9">
                            {!! $t->link !!}
                        </div>
                        <a href="http://www.futebolfacil.com" target="blank" class="btn btn-block btn-danger" style="max-width: 340px; margin: auto;"><b>APOSTE AQUI</b></a>
                    </li>
                </ul>

            </div>
        </div>
    @endforeach
    <div class="col-md-12">
        <a href="http://www.futebolfacil.com" target="blank" class="btn btn-block btn-danger" style="max-width: 340px; margin: auto;"><b>APOSTE AQUI</b></a>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
    </script>
@stop