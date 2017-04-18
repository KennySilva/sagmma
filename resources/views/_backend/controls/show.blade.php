@extends('_backend.master.app')
@section('htmlheader_title')
    Controlar Recursos
@endsection
@section('contentheader_title')
    Controlar Recursos
@endsection
@section('main-content')
    <div class="sagmma_container">
        {{ csrf_field() }}
        <!------------------------------------------------------------------------------------->
        <show-control></show-control>
        <!------------------------------------------------------------------------------------->
    </div>
@endsection
