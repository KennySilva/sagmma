@extends('auth.auth')

@section('htmlheader_title')
    Recuperar Palavra Passe
@endsection

@section('content')

    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
            <a href="{{ url('/') }}"><i class="fa fa-unlock fa-2x faa-burst animated faa-slow"></i></a>
            </div><!-- /.login-logo -->

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Ups</strong> Algo não bate bem<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-box-body">
                <p class="login-box-msg">Redefinir Palavra Passe</p>
                <form action="{{ url('/password/reset') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Introduza o email" name="email" value="{{ old('email') }}"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Palavra Passe" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Palavra Passe" name="password_confirmation"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="row">
                        <div class="col-xs-2">
                        </div><!-- /.col -->
                        <div class="col-xs-8">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Guardar Atualização </button>
                        </div><!-- /.col -->
                        <div class="col-xs-2">
                        </div><!-- /.col -->
                    </div>
                </form>

                <a href="{{ url('/auth/login') }}">Lembrei, quero autenticar</a><br>
                <a href="{{ url('/auth/register') }}" class="text-center">Em vez disso, quero criar uma nova conta</a>
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
