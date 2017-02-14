@extends('exportation.master.app')
@section('content')
    <div class="row">
        <div class="jumbotron">
            <h3 class="text-center">SAGMMA</h3>
            <p class="text-center">Relatório Diário</p>
        </div>
    </div>
    <div class="row">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Registo de Cobrança de {{$date}}</h3>
            </div>
            <div class="box-body">
                <div class='table-responsive'>
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
                            @foreach($taxations as $taxation)
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="col-md-8">
                    <h1>Total: <b>{{$total}}</b></h1>
                </div>
                <hr>

            </div>
            <br>
            <div class="box-footer">
                <h4>Imprimido por <i><b>{{ Auth::User()->name }}</b></i></h4>
            </div>
        </div>

    </div>
@endsection
