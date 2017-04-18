@extends('_backend.master.app')
@section('htmlheader_title')
    Mercados
@endsection
@section('contentheader_title')
    Mercados Municipais de Santa Catarina
@endsection
@section('main-content')
    <div class="sagmma_container">
        {{ csrf_field() }}
        <!------------------------------------------------------------------------------------->
        <show-market></show-market>
        <!------------------------------------------------------------------------------------->
    </div>
@endsection
