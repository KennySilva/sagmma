@extends('exportation.master.app')
@section('content')
    <div class="row">
        <div class="jumbotron">
            <div class="col-md-12 col-md-offset-10">
                <span class="text-center"><img src="/img/logo/logo.jpg" alt="" height="47" width="55"></span>
            </div>
            <h4 class="text-center">Camara Municipal de Santa Catarina</h4>
            <h4 class="text-center">Direção de Promoção da Economia Local</h4>
            <h4 class="text-center">Unidade da Gestão do Mercado Novo de Achada Riba</h4>
            <br>
            <br>
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
                    <h3>hcvvfdsjchvdsbcjhdhcsvdcjhdsvcbjhdscvbjhfdvcfdjhfvbjhfdvdjhfcjfdvfjhdvjdfvjvcjfdvjfdvfdvjd</h3>
                    {{-- <div class='table-responsive'>
                        <table class='table table-striped table-bordered table-hover'>
                            <thead>
                                <tr>
                                    <th>Identificação</th>
                                    <th>Funcionario</th>
                                    <th>Espaço</th>
                                    <th>Valor Cobrado</th>
                                    <th>Responsável</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$taxation->id}}</td>
                                    @foreach ($taxation->employees as $emp)
                                        <td>{{$emp->name}}</td>
                                    @endforeach

                                    @foreach ($taxation->places as $place)
                                        <td>{{$place->name}}</td>
                                    @endforeach
                                    <td>{{$taxation->income}}</td>
                                    <td>{{$taxation->author}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}


                </div>
                <br>
                <div class="box-footer">
                    <h4>Imprimido por <i><b>{{ Auth::User()->name }}</b></i></h4>
                </div>
            </div>

        </div>
    @endsection
