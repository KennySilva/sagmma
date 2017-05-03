@extends('exportation.master.app')
@section('content')
    <div class="row">
        <div class="jumbotron">
            <h3 class="text-center">SAGMMA</h3>
            <p class="text-center">Utilizadores do Sistema</p>
        </div>
    </div>
    <div class="row">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Utilizadores</h3>
            </div>
            <div class="box-body">
                <div class='table-responsive'>
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>BI</th>
                                <th>Telefone</th>
                                <th>Idade</th>
                                <th>Morada</th>
                                <th>Data de Registo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->ic}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->age}}</td>
                                    <td>{{$user->zone}}</td>
                                    <td>{{$user->created_at}}</td>
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
