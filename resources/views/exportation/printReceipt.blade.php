@extends('_backend.master.app')

@section('htmlheader_title')
    Imprimir
@endsection

@section('contentheader_title')
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
    <div class="row">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-print"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Relarório</span>
                <span class="info-box-number">Imprimir Recibo de @foreach ($taxation->employees as $emp)
                    {{$emp->name}}
                @endforeach</span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <a class="btnPrint btn btn-success btn-lg btn-flat" href="{{ route('printReceipt', $id) }}"><i class="fa fa-circle-o-notch fa-lg fa-spin"></i>  <b>Imprimir Agora</b></a>

            <a class="btn btn-default btn-lg btn-flat" href="{{URL::to('sagmma/taxations')}}"><i class="fa fa-undo fa-lg fa-spin"></i>  <b>Voltar</b></a>
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
