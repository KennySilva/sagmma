@extends('auth.auth')

@section('sagmma-style')
    <link href="{{ asset('/css/custom/custom.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('htmlheader_title')
    Registar a minha conta
@endsection

@section('content')

    <body class="register-page">
        <div class="register-box">
            <div class="login-logo">
                <a href="{{ url('/') }}"><i class="fa fa-user-plus fa-2x faa-burst animated faa-slow"></i></a>
            </div>
            {{--
            <div class="notice notice-info">
                <strong><i class="fa fa-user-plus"></i></strong>    Registe-se e obtenha uma conta.
            </div> --}}
            <div class="register-box-body">
                <p class="login-box-msg"><h3 class="text-center">Registar</h3></p>
                <form action="{{ url('/auth/register') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Nome Completo" name="name" value="{{ old('name') }}"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <p class="help-block text-danger" style="color: #DD4B39;">{{ $errors->first('name') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Escolhe um nome de Utilizador" name="username" value="{{ old('username') }}"/>
                        <span class="fa fa-user-o form-control-feedback"></span>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <p class="help-block text-danger" style="color: #DD4B39;">{{ $errors->first('username') }}</p>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                        <input type="number" class="form-control" placeholder="Introduza o nº de BI" name="ic" value="{{ old('ic') }}"/>
                        <span class="fa fa-id-card form-control-feedback"></span>
                        @if ($errors->has('ic'))
                            <span class="help-block">
                                <p class="help-block text-danger" style="color: #DD4B39;">{{ $errors->first('ic') }}</p>
                            </span>
                        @endif
                    </div>
                    <hr>

                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="exemplo@sagmma.com" name="email" value="{{ old('email') }}"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <p class="help-block text-danger" style="color: #DD4B39;">{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Palavra Passe" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <p class="help-block text-danger" style="color: #DD4B39;">{{ $errors->first('password') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Confirme a Palavra Passe" name="password_confirmation"/>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <p class="help-block text-danger" style="color: #DD4B39;">{{ $errors->first('password_confirmation') }}</p>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group has-feedback">
                        <label class="radio-inline">
                            <input type="radio" id="gender" value="M" name="gender">  <i class="fa fa-male"></i>&nbsp;&nbsp;Masculino
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="gender" name="gender" value="F">  <i class="fa fa-female"></i>&nbsp;&nbsp;Feminino
                        </label>
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <p class="help-block text-danger" style="color: #DD4B39;">{{ $errors->first('gender') }}</p>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-12 pull-left table-responsive">
                        <div class="g-recaptcha" data-sitekey="6LeuixEUAAAAAEkNQh8jVGirE3kI0hytNvNhM9sn"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <p class="help-block text-danger" style="color: #DD4B39;">{{ $errors->first('g-recaptcha-response') }}</p>
                            </span>
                        @endif
                    </div>
                    <br>
                    <br>
                    <br>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Registar</button>
                </form>
                <br>
                <div class="social-auth-links text-center">
                    <p>«Autenticar com»</p>
                    <div style="padding: 1px;" class="col-md-12">

                        <div style="padding: 1px;" class="col-md-6">
                            <a href="{{ url('social/facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Facebook</a>
                        </div>

                        <div style="padding: 1px;" class="col-md-6">
                            <a href="{{ url('social/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>Google+</a>
                        </div>

                    </div>
                </div>
                <br>
                <hr>

                <a href="{{ url('/auth/login') }}" class="text-center">Minha Conta</a><br>
                <hr>
                <a href="{{ url('/') }}" class="text-center"><i class="fa fa-home faa-shake animated"></i></a>
            </div>
        </div>

        @include('auth.scripts')

        <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
        </script>
    </body>

@endsection
