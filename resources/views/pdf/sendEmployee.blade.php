@extends('exportation.master.app')
@section('content')
    <div class="row">
        <div class="jumbotron">
            <div class="col-md-12">
                <CENTER><img src="/img/logo/logo.jpg" alt="" height="47" width="55"></CENTER>
            </div>
            <h5 class="text-center">Camara Municipal de Santa Catarina</h5>
            <h5 class="text-center">Direção de Promoção da Economia Local</h5>
            <h5 class="text-center">Unidade da Gestão do Mercado Novo de Achada Riba</h5>
            <br>
            <h2 class="text-center">Funcionários</h2>
        </div>
    </div>
    <div class="row">

        <div class="box">
            <div class="box-header with-border">
                {{-- <h3 class="box-title">Registo de Cobrança</h3> --}}
            </div>
            <div class="box-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <hr>
            <br>
            <div class="box-footer">
                {{-- <h4>Enviado por <i><b>{{ Auth::User()->name }}</b></i></h4> --}}
            </div>
        </div>

    </div>
@endsection
