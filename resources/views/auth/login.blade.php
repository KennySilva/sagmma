@extends('auth.auth')

@section('sagmma-style')
    <link href="{{ asset('/css/custom/custom.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('htmlheader_title')
    Iniciar Sessão
@endsection



@section('content')
    <body class="login-page">
        <div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><i class="fa fa-lock fa-2x faa-burst animated faa-slow"></i></a>
    </div>

    {{-- <div class="notice notice-info">
        <strong><i class="fa fa-sign-in"></i></strong>    Atentique-se para iniciar a sessão.
    </div> --}}


@if (count($errors) > 0)
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="list-unstyled">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="login-box-body">
    <p class="login-box-msg"><h3 class="text-center">Autenticar</h3></p>
    <form action="{{ url('/auth/login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Palavra Passe" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> Manter Sessão
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            </div><!-- /.col -->
        </div>
    </form>

    <div class="social-auth-links text-center">
        <p>«Iniciar Sessão com»</p>
        <div style="padding: 1px;" class="col-md-12">

            <div style="padding: 1px;" class="col-md-6">
                <a href="{{ url('social/facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Facebook</a>
            </div>

            <div style="padding: 1px;" class="col-md-6">
                <a href="{{ url('social/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>Google+</a>
            </div>

        </div>
    </div><!-- /.social-auth-links -->
    <br>
    <hr>
    <a href="{{ url('/password/email') }}">Recuperar Palavra Passe</a><br>
    <a href="{{ url('/auth/register') }}" class="text-center">Registar</a>
    <hr>
    <a href="{{ url('/') }}" class="text-center"><i class="fa fa-home faa-shake animated"></i></a>

</div><!-- /.login-box-body -->

</div><!-- /.login-box -->

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
