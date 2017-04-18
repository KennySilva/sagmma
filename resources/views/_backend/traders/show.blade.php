@extends('_backend.master.app')

@section('htmlheader_title')
    Comerciantes
@endsection

@section('contentheader_title')

@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabTrad" data-toggle="tab">COMERCIANTES</a></li>
                            @permission(['manage-resources'])
                            <li><a href="#tabPlace" data-toggle="tab">ESPAÇOS</a></li>
                            @endpermission

                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            {{ csrf_field() }}
                            <div class="tab-pane fade in active" id="tabTrad">
                                <show-trader></show-trader>
                            </div>
                            @permission(['manage-resources'])
                            <div class="tab-pane fade" id="tabPlace">
                                <show-place></show-place>
                            </div>
                            @endpermission


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
@endpush
