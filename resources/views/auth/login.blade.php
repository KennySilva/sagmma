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
            {{-- <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <a href="{{ url('/home') }}"><span class="info-box-icon bg-red"><i class="fa fa-lock"></i></span></a>
            <div class="info-box-content">
            <span class="info-box-text">Faça o login para iniciares a sessão</span>
            <span class="info-box-number">Faça o Login no SGMMA</span>
        </div><!-- /.info-box-content -->
    </div><!-- /.info-box --> --}}
    <div class="login-logo">
        <a href="{{ url('/home') }}">SAGMMA <i class="fa fa-unlock"></i></a>
    </div>

    <div class="notice notice-info">
        <strong>Login</strong>    Atentique-se para iniciar a sessão.
    </div>



    {{-- <div class="login-logo">
    <a href="{{ url('/home') }}"><b>SAGMMA</b></a>
</div><!-- /.login-logo --> --}}

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
    <p class="login-box-msg"><h3 class="text-center">Faça o Login</h3></p>
    <form action="{{ url('/auth/login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> Lembrar de Mim
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            </div><!-- /.col -->
        </div>
    </form>

    <div class="social-auth-links text-center">
        <p>- Se quiseres podes Iniciar Sessão com -</p>
        <div style="padding: 1px;" class="col-md-12">

            <div style="padding: 1px;" class="col-md-6">
                <a href="{{ url('social/facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Facebook</a>
            </div>

            <div style="padding: 1px;" class="col-md-6">
                <a href="{{ url('social/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>Google+</a>
            </div>

        </div>
    </div><!-- /.social-auth-links -->

    <a href="{{ url('/password/email') }}">Já esqueci da Palavra Passe</a><br>
    <a href="{{ url('/auth/register') }}" class="text-center">Quero nova conta</a>

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
