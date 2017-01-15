@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="bower_components/bootstrap-select/dist/css/bootstrap-select.css">
@endsection


@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    {{-- Sagmma Home --}}
@endsection


@section('main-content')
    <div class="sagmma_container">
        <div class="row">
            <div class="col-md-4">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Utilizadores</span>
                        <span class="info-box-number">{{$totalUsers}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

            <div class="col-md-4">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-red"><i class="fa fa-address-card-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Papeis de Utilizadores</span>
                        <span class="info-box-number">{{$totalRoles}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

            <div class="col-md-4">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-gray"><i class="fa fa-sign-in"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Permissões</span>
                        <span class="info-box-number">{{$totalPermissions}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div>



        <div class="row ">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Acção Rápida</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="fa fa-file"></span>&nbsp;&nbsp;Contratos <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#newContract"><span class="fa fa-plus"></span>&nbsp;&nbsp;Criar Novo</a></li>
                                    <li><a href="#showContract"><span class="fa fa-eye"></span>&nbsp;&nbsp;Listar Registo Recente</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="fa fa-dollar"></span>&nbsp;&nbsp;Cobrança de Imposto <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#newCollection"><span class="fa fa-plus"></span>&nbsp;&nbsp;Criar Novo</a></li>
                                    <li><a href="#showCollection"><span class="fa fa-eye"></span>&nbsp;&nbsp;Listar Registo Recente</a></li>
                                </ul>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="newContract" class="tab-pane fade in active">
                                <h3>newContract A</h3>
                                <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                            </div>
                            <div id="showContract" class="tab-pane fade">
                                <h3>showContract B</h3>
                                <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
                            </div>
                            <div id="newCollection" class="tab-pane fade">
                                <h3>newCollection 1</h3>
                                <p>WInteger convallis, nulla in sollicitudin placerat, ligula enim auctor lectus, in mollis diam dolor at lorem. Sed bibendum nibh sit amet dictum feugiat. Vivamus arcu sem, cursus a feugiat ut, iaculis at erat. Donec vehicula at ligula vitae venenatis. Sed nunc nulla, vehicula non porttitor in, pharetra et dolor. Fusce nec velit velit. Pellentesque consectetur eros.</p>
                            </div>
                            <div id="sowCollection" class="tab-pane fade">
                                <h3>Dropdown 2</h3>
                                <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="bower_components/bootstrap-select/dist/js/bootstrap-select.js" charset="utf-8"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $("#myTab a").click(function(e){
            e.preventDefault();
            $(this).tab('show');
        });
    });
    </script>
@endpush
