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
            <h2 class="text-center">Recibo</h2>
        </div>
    </div>
    <div class="row">

        <div class="box">
            <div class="box-header with-border">
                {{-- <h3 class="box-title">Registo de Cobrança</h3> --}}
            </div>
            <div class="box-body">
                <p class="text-left">
                    Eu {{$taxation->author}} Recebi do(a) senhor(a) (@foreach ($taxation->employees as $emp)
                        {{$emp->name}}
                    @endforeach)</span>  a quantia de {{$taxation->income}}, no dia {{$taxation->created_at}}
                </p>
                <br>
                <hr>
                <p>Assomada {{date('d-m-y')}}</p>
            </div>
            <hr>
            <br>
            <div class="box-footer">
                <h4>Imprimido por <i><b>{{ Auth::User()->name }}</b></i></h4>
            </div>
        </div>

    </div>
@endsection
