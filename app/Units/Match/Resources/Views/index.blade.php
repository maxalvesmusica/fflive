@extends('core::admin')

@section('content')
    <div class="container-fluid m-t-40">
        <div class="container">

            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="x_panel">

                    <div class="x_title">
                        <h2 style="float: left;">Jogos</h2>
                        <div class="navbar-right m-t-10">
                            <a href="{{ route('match.create') }}" class="btn btn-primary">CADASTRAR JOGO</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 55%">Jogo</th>
                                <th style="width: 25%">Resultado</th>
                                <th>#Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($matches as $match)
                            <tr>
                                <td>#</td>
                                <td>
                                    <a>{{ $match->tone.' X '.$match->ttwo }}</a>
                                    <p><small>{{ $match->present()->date }}</small></p>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <?php $r = explode('x', $match->score); ?>
                                        <input type="text" name="vone" value="{{$r[0]}}" id="vone{{$match->id}}" class="form-control form-palpite">
                                        <div class="input-group-addon">X</div>
                                        <input type="text" name="vtwo" value="{{$r[1]}}" id="vtwo{{$match->id}}" class="form-control form-palpite">
                                        <a href="#" class="input-group-addon" onclick="save({{$match->id}});return false;">Salvar</a>
                                    </div>
                                <td>
                                    <a href="{{ route('match.details', $match->id) }}" class="btn btn-success btn-sm">PALPITES</a>
                                    <a href="{{ route('match.block', $match->id) }}" class="btn btn-info btn-sm">{{$match->present()->button}}</a>
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
        function save(match) {
            var vone = $("#vone"+match).val();
            var vtwo = $("#vtwo"+match).val();
            var result = vone+'x'+vtwo;
            $.get("{!! route('match.score') !!}",
            {
                match:match,
                score:result
            }).done(function() {
                alert("Resultado Salvo!");
            });
        }
    </script>
@stop