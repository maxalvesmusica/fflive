@extends('core::site')

@section('content')
    <div class="container-fluid corpo-ind2">
        <div class="container">



            <div class="col-md-12">
                <!--login-->

                <div class="register-box">
                    <div class="register-box-body">
                        <div class="row">

                            <p class="login-box-msg"><b>CADASTRE-SE, É GRÁTIS!</b></p>

                            {{ Form::open(['route' => 'user.store']) }}

                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control" name="name" placeholder="Seu Nome Completo" required>
                                        <span class="form-control-feedback"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control" name="aname" placeholder="Nome Artístico" required>
                                        <span class="form-control-feedback"><i class="fa fa-user-secret"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control cpf" name="cpf" placeholder="CPF" required>
                                        <span class="form-control-feedback"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control cep" name="cep" placeholder="CEP" required>
                                        <span class="form-control-feedback"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control rua" name="street" placeholder="Rua" required>
                                        <span class="form-control-feedback"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control cidade" name="city" placeholder="Cidade" required>
                                        <span class="form-control-feedback"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control estado" name="state" placeholder="Estado" required>
                                        <span class="form-control-feedback"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control bairro" name="neighborhood" placeholder="Bairro" required>
                                        <span class="form-control-feedback"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control numero" name="number" placeholder="Número" required>
                                        <span class="form-control-feedback"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control phone" name="phone" placeholder="Telefone com DDD" required>
                                        <span class="form-control-feedback"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <input type="email" class="form-control" name="email" placeholder="Seu E-mail" required>
                                        <span class="form-control-feedback"><i class="fa fa-envelope"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <input type="password" class="form-control" name="password" placeholder="Digite uma Senha" required>
                                        <span class="form-control-feedback"><i class="fa fa-lock"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <div class="checkbox icheck">
                                                <div class="col-md-12">
                                                    <label>
                                                        <input type="checkbox"> Aceito os <a href="#">Termos</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-xs-4">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat">Cadastrar</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                        <!-- /.form-box -->

                    </div>
                </div>
            </div>
            <!-- /.register-box -->

            <!--login-->
        </div>



    </div>
    </div>
@stop

@section('scripts')
    <script src="{{url('js/jquery.mask.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        ;(function($)
        {
            'use strict';
            $(document).ready(function() {
            $(".cep").mask("99999-999");
            $(".phone").mask("(99) 99999-9999");
            $('.cpf').mask('999.999.999-99', {reverse: true});
            $(".cep").blur(function () {
                var cep = $.trim($(this).val());
                var url = 'http://clareslab.com.br/ws/cep/json/' + cep + '/';
                $.post(url, {cep: cep},
                function (rs) {
                    rs = $.parseJSON(rs);
                    if (rs != 0) {
                        $(".rua").val(rs.endereco);
                        $(".bairro").val(rs.bairro);
                        $(".cidade").val(rs.cidade);
                        $(".estado").val(rs.uf);
                        $(".numero").focus();
                    }
                })
                });
            });
        })(window.jQuery);
    </script>
@stop