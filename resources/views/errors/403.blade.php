@extends('errors.master.app')
@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h1 style="font-family: 'Francois One', sans-serif; color: rgb(77, 123, 226)" class="panel-title text-center">Acesso Restrito</h1>
            </div>
            <div class="panel-body">
                <span class="sr-only">Loading...</span>
                 <img class="img-responsive center-block" src="{{ asset('img/error/lock-3.png') }}" alt="">
            </div>
            <strong class="text-center">

                @if(Auth::check())
                    <h2><i class="fa fa-exclamation-triangle   faa-flash animated faa-slow"></i> Hei {{ Auth::user()->name }}</h2>
                @else
                    <h2><i class="fa fa-exclamation-triangle   faa-flash animated faa-slow"></i> Hei Utilizador</h2>
                @endif

                <h3>Contacte Administrador para averiguar suas permissões</h3>
                <hr>
                    <a href="/" class="btn btn-primary"><span class="fa fa-home faa-burst animated-hover">   Voltar</span></a>
            </strong>
            <div class="panel-footer">
                <h1 style="font-family: 'Francois One', sans-serif; color: rgb(77, 123, 226)">SAGMMA</h1>
            </div>
        </div>
    </div>
@endsection
