@extends('_backend.master.app')

@section('htmlheader_title')
    Imprimir
@endsection

@section('contentheader_title')
    Imprimir Informações
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-6">

            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-user-secret"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Utilizadores</span>
                    <span class="info-box-number">Imprimir {{ $totalUsers }} utilizadores</span>
                </div>
            </div>
        </div>
    </div>
    
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btnPrint btn btn-link" href="{{URL::to('export/printUserPreview')}}"><i class="fa fa-print faa-pulse animated"></i>  Imprimir</a>
            <a class="btn btn-link" href="{{URL::to('user/users')}}"><i class="fa fa-angle-double-left faa-passing-reverse animated"></i> Voltar</a>
        </div>
    </div>

@endsection

@push('scripts')
    <script src=" http://www.position-absolute.com/creation/print/jquery.printPage.js" charset="utf-8"></script>
    <script>
    $(document).ready(function() {
        $('.btnPrint').printPage();
    });
    </script>
@endpush
