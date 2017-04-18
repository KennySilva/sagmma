@extends('_backend.master.app')
@section('sagmma-style')
@endsection

@section('htmlheader_title')
    Gerir Contratos
@endsection

@section('contentheader_title')
    Gerir Contratos
@endsection

@section('main-content')
    <div class="sagmma_container">
        {{ csrf_field() }}
        <!------------------------------------------------------------------------------------->
        <show-contract></show-contract>
        <!------------------------------------------------------------------------------------->
    </div>
@endsection
