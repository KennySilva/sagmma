@extends('errors.master.app')
@section('content')
    <div class="content" id="grad">
        <div class="title">SAGMMA</div>
        <div class="">
            <h1>Página não Encontrada</h1>
            <h1 style="font-family: 'lato', serif;">ERRO 404</h1>
        </div>
    </div>
    <br><br>
    <div class="row">
        <a href="/" class="btn btn-default"><i class="fa fa-home"></i>| Sítio</a>
        <a href="/home" class="btn btn-default"><i class="fa fa-backward"></i>| SAGMMA</a>
    </div>

    <div class="row">
        @if (Auth::check())
            <h1><span class="label label-default">{{ Auth::user()->name }} -> Certifique URL</span></h1>
        @endif
    </div>
@endsection
