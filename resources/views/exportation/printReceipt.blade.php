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
        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-file-text-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Recibo</span>
                    <span class="info-box-number">Recibo de @foreach ($taxation->employees as $emp)
                        {{$emp->name}}
                    @endforeach</span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-link" href="{{URL::to('sagmma/taxations')}}"><i class="fa fa-angle-double-left faa-passing-reverse animated"></i> Voltar</a>

            <a class="btnPrint btn btn-link" href="{{ route('printReceipt', $id) }}"><i class="fa fa-print faa-pulse animated"></i> Imprimir Recibo</a>
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
