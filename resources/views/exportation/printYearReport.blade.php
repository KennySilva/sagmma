@extends('_backend.master.app')

@section('htmlheader_title')
    Visualizar
@endsection

@section('contentheader_title')

@endsection

@section('$contentheader_description')
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-file-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Relarório</span>
                    <span class="info-box-number">Registo de cobrança de {{$year}}</span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Resisto de Cobrança de Impostos</h3>
                    <div class="box-tools pull-right">
                        <span class="label label-primary">{{$year}}</span>
                    </div>
                </div>
                <div class="box-body">
                    <div class='table-responsive'>
                        <table class='table table-striped table-active table-hover'>
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
                </div>
                <div class="box-footer">
                    <a class="btnPrint btn btn-primary btn-sm btn-flat" href="{{ route('printThisYearReport', $year) }}"><i class="fa fa-print"></i>  <b>Imprimir</b></a>
                    <a class="btn btn-default btn-sm btn-flat" href="{{URL::to('sagmma/taxations')}}"><i class="fa fa-reply"></i> <b>Voltar</b></a>

                    <div class="box-tools pull-right">
                        <span class="text-info">Total de Receita: <span class="label label-danger">{{$total}}$00</span></span>
                    </div>

                </div>
            </div>
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
