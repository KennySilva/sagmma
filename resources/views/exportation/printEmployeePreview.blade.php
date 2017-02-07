@extends('exportation.master.app')
@section('content')
    <div class="row">
        <div class="jumbotron">
            <h3 class="text-center">SAGMMA</h3>
            <p class="text-center">Funcionários</p>
        </div>
    </div>
    <div class="row">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Funcionários</h3>
            </div>
            <div class="box-body">
                <div class='table-responsive'>
                    <table class='table table-striped table-bordered table-hover'>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>BI</th>
                                <th>Telefone</th>
                                <th>Idade</th>
                                <th>Morada</th>
                                <th>Tipo de Funlcionário</th>
                                <th>Data de Registo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->ic}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->age}}</td>
                                    <td>{{$employee->zone}}</td>
                                    <td>{{$employee->typeofemployees->name }}</td>
                                    <td>{{$employee->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer">
                <h6>Responsável {{ Auth::User()->name }}</h6>
            </div>
        </div>

    </div>
@endsection
