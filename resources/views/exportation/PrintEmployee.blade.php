@extends('_backend.master.app')

@section('htmlheader_title')
    Imprimir
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
    <div class="row">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Funciionários</span>
                <span class="info-box-number">Imprimir {{ $totalEmployees }} Funcionários</span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 pull-left">
            <a class="btnPrint btn btn-success btn-lg btn-flat" href="{{URL::to('export/printEmployeePreview')}}"><i class="fa fa-print fa-5x"></i></a>
            <a class="btn btn-default btn-lg btn-flat" href="{{URL::to('sagmma/employees')}}"><i class="fa fa-times fa-5x "></i></a>
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
