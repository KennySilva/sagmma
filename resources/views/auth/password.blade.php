@extends('auth.auth')

@section('htmlheader_title')
    Recuperar palavra passe
@endsection

@section('content')

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>Sagmma</b></a>
        </div><!-- /.login-logo -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Ups!</strong> Algo não bate bem sertifique os dados.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
            <p class="login-box-msg">Redifina a palavra passe</p>
            <form action="{{ url('/password/email') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Introduza o email" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="row">
                    {{-- <div class="col-xs-2">
                    </div><!-- /.col --> --}}
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary col-xs-offset-0">Enviar link para Redifinir Palavra Passe</button>
                    </div><!-- /.col -->
                    {{-- <div class="col-xs-2">
                    </div><!-- /.col --> --}}
                </div>
            </form>
            <hr>

            <a href="{{ url('/auth/login') }}">Lembrei, quero entrar</a><br>
            <a href="{{ url('/auth/register') }}" class="text-center">Não é preciso, quero criar uma nova conta</a>


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
