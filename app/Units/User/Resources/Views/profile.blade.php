@extends('core::user')

@section('content')

    <img class="profile-user-img img-responsive img-circle" src="{{ $user->avatar }}" alt="User profile picture">

    <h3 class="profile-username text-center">{{ $user->name.' - '.$user->loginff }}</h3>

    <p class="text-muted text-center"><i class="fa fa-envelope"></i> {{ $user->email }}</p>
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb" style="overflow: hidden;">
                <div class="col-md-12">
                    <form class="form-inline" style="width: 100%; max-width: 270px; margin: auto;">
                        @if (\Auth::user()->loginff)
                            @if (\Auth::user()->balance > 20.00)
                                <a href="{{route('transfer.request')}}" class="btn btn-success">Solicitar Transferência</a>
                            @endif
                        @else
                            <br> Crie seu cadastro em <a href="http://www.futebolfacil.com/#/?lang=pt-br&btag=FFTV" target="_blank">Futebol Fácil</a> Para solicitar transferência do saldo.
                            <br> Já tem cadastro?
                            <input type="text" name="loginff" class="loginff" placeholder="Insira aqui o login">
                            <a href="javascript:login();" class="btn btn-primary login">Salvar</a>
                        @endif
                    </form>
                </div>
            </ol>
        </div>
    </div>
@stop