@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="/bower_components/fullcalendar/dist/fullcalendar.css">
    <link rel="stylesheet" href="/bower_components/fullcalendar/dist/fullcalendar.print.css" media="print">
@endsection
@section('htmlheader_title')
    Início
@endsection
@section('contentheader_title')
@endsection
@section('main-content')
    <div class="sagmma_container">
        @role(['super-admin', 'admin', 'dpel'])
        <div class="row">
            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#totalUsers ">
                    <div class="info-box">
                        <span class="info-box-icon bg-gray"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Todos</span>
                            <span class="info-box-number">{{$users->count()}}</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#activeUsers">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-check-circle-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Ativos</span>
                            <span class="info-box-number">{{$actives->count()}}</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#adminUsers">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Admin</span>
                            <span class="info-box-number">{{$admins->count()}}</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#superAdminUsers">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-id-card-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Super Admin</span>
                            <span class="info-box-number">{{$superAdmins->count()}}</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endrole
        {{-- ------------------------------------Open Modals----------------------------------------------- --}}
        <div class="modal fade" id="totalUsers" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id=""><i class="fa fa-users"></i></h4>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            @foreach ($users as $user)
                                <li class="list-group-item">{{$user->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------------------- --}}
        <div class="modal fade" id="activeUsers" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id=""><i class="fa fa-check-circle-o"></i></h4>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            @foreach ($actives as $active)
                                <li class="list-group-item">{{$active->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------------------- --}}

        <div class="modal fade" id="adminUsers" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id=""><i class="fa fa-user"></i></h4>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            @foreach ($admins as $admin)
                                <li class="list-group-item">{{$admin->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
        {{-- ------------------------------------------------------------------------------------------- --}}

        <div class="modal fade" id="superAdminUsers" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id=""><i class="fa fa-id-card-o"></i></h4>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            @foreach ($superAdmins as $superAdmin)
                                <li class="list-group-item">{{$superAdmin->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
        {{-- --------------------------------------End Modal--------------------------------------------------- --}}

        <div class="row">
            <div class="col-md-12">
                @include('_backend.master.partials.painelCalendar')
            </div>
        </div>
        @role(['super-admin', 'admin', 'dpel', 'manager', 'administrative-assistant'])
        <div class="row">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            @permission(['manage-users', 'manage-admins'])
                            <li><a href="#tabUser" data-toggle="tab">GERIR UTILIZADORES</a></li>
                            @endpermission
                            <li class="active"><a href="#tabTax" data-toggle="tab">GERIR COBRANÇA DE IMPOSTOS</a></li>
                            @permission(['manage-contracts'])
                            <li><a href="#tabContr" data-toggle="tab">GERIR CONTRATOS</a></li>
                            @endpermission
                            <li><a href="#tabCont" data-toggle="tab">CONTROLO DE MATERIAIS</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            {{ csrf_field() }}
                            @permission(['manage-users', 'manage-admins'])
                            <div class="tab-pane fade" id="tabUser">
                                <show-users></show-users>
                            </div>
                            @endpermission

                            <div class="tab-pane fade in active" id="tabTax">
                                <show-taxation></show-taxation>
                            </div>

                            @permission(['manage-contracts'])
                            <div class="tab-pane fade" id="tabContr">
                                <show-contract></show-contract>
                            </div>
                            @endpermission

                            <div class="tab-pane fade" id="tabCont">
                                <show-control></show-control>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endrole

    </div>
@endsection
@push('scripts')
    <script src="/bower_components/jquery-ui/jquery-ui.js" charset="utf-8"></script>
    <script src="/bower_components/moment/moment.js" charset="utf-8"></script>
    {{-- <script src="./node_modules/moment/moment.js" charset="utf-8"></script> --}}
    <script src="/bower_components/fullcalendar/dist/fullcalendar.js" charset="utf-8"></script>
    <script src="/bower_components/fullcalendar/dist/locale/pt.js" charset="utf-8"></script>
    <script src="/js/back/calendarEvents.js" charset="utf-8"></script>
    <script src="/bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js" charset="utf-8"></script>

@endpush
