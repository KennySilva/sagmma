@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/sagmma/app.css" media="screen" title="no title">
@endsection

@section('htmlheader_title')
    Perfil do Utilizador
@endsection

@section('contentheader_title')
    Perfil do Utilizador
@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <img src="/uploads/avatars/{!! $user->avatar !!}"
                alt="" class="img-rounded img-responsive img-thumbnail center-block"/>
                <hr>
                <form class="" enctype="multipart/form-data" action="/user/profiles" method="post">
                    <input v-model="updateimage" id="input-2" type="file" multiple class="file-loading" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button v-if="updateimage"  type="submit" name="name" class="btn btn-link" name="name">Atualizar Imagem</button>
                    <span v-else class="text-center text-danger">Selecione uma Imagem</span>
                </form>
            </div>

            <div class="col-sm-8 col-md-8">
                <blockquote>
                    <p>{!! $user->name !!}</p> <small><cite title="Source Title">{!! $user->state !!}, {!! $user->council !!}, {!! $user->parish !!}, {!! $user->zone !!} <i class="glyphicon glyphicon-map-marker"></i></cite></small>
                </blockquote>
                <p> <i class="fa fa-envelope"></i> {!! $user->email !!}
                    <br/> <i class="fa fa-globe"></i> sagmma.cmsc.cv
                    <br/> <i class="fa fa-calendar-check-o"></i> {!! $user->created_at->diffForHumans()  !!}
                    <br/> <i class="fa fa-phone"></i> {!! $user->phone !!}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class='table-responsive'>
                            <table class='table table-striped table-hover'>
                                <thead>
                                    <tr>
                                        <th class="text-center" colspan="2">DETALHES DO UTILIZADOR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Nome</b></td>
                                        <td><i>{!! $user->name !!}</i></td>
                                    </tr>
                                    <tr>
                                        <td><b>Utilizador</b></td>
                                        <td><i>{!! $user->username !!}</i></td>
                                    </tr>

                                    <tr>
                                        <td><b>BI</b></td>
                                        <td><i>{!! $user->ic !!}</i></td>
                                    </tr>

                                    <tr>
                                        <td><b>Idade</b></td>
                                        @if ($user->age)
                                            <td><i>{!! $user->age !!}</i></td>
                                        @else
                                            <td><i class="label label-warning">Não Especificado</i></td>
                                        @endif

                                        <td><i></i></td>
                                    </tr>
                                    <tr>
                                        <td><b>Genero</b></td>
                                        @if ($user->gender)
                                            <td><i>{!! $user->gender !!}</i></td>
                                        @else
                                            <td><i class="label label-warning">Não Especificado</i></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td><i>{!! $user->email !!}</i></td>

                                    </tr>

                                    <tr>
                                        <td><b>Telefone</b></td>
                                        @if ($user->phone != 0)
                                            <td><i>{!! $user->phone !!}</i></td>
                                        @else
                                            <td><i class="label label-warning">Não Especificado</i></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td><b>Ilha</b></td>
                                        @if ($user->state)
                                            <td><i>{!! $user->state !!}</i></td>
                                        @else
                                            <td><i class="label label-warning">Não Especificado</i></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td><b>Concelho</b></td>
                                        @if ( $user->council)
                                            <td><i>{!!  $user->council !!}</i></td>
                                        @else
                                            <td><i class="label label-warning">Não Especificado</i></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td><b>Freguesia</b></td>
                                        @if ( $user->parish)
                                            <td><i>{!!  $user->parish !!}</i></td>
                                        @else
                                            <td><i class="label label-warning">Não Especificado</i></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td><b>Zona</b></td>
                                        @if ( $user->zone)
                                            <td><i>{!!  $user->zone !!}</i></td>
                                        @else
                                            <td><i class="label label-warning">Não Especificado</i></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td><b>Tipo</b></td>
                                        <td><i>{!! $user->type !!}</i></td>
                                    </tr>


                                    <tr>
                                        <td><b>Data de atualização</b></td>
                                        @if ( $user->updated_at)
                                            <td><i>{!!  $user->updated_at->diffForHumans() !!}</i></td>
                                        @else
                                            <td><i class="label label-warning">Não Especificado</i></td>
                                        @endif
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-link" type="button" name="button" data-toggle="modal" data-target="#editProfile">Editar Informações</button>
                        |


                        <button type="button" id="passEdit" class="btn btn-link pass">Alterar Palavra Passe</button>
                        {{-- <button type="button" id="login" class="btn btn-link">Editar Palavra Passe</button> --}}

                        <div id="editPassword" class="hide">
                            <form action="{{url('editPassword')}}" id="popForm" method="post">
                                <div>
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <input type="password" name="old_password" id="old_password" class="form-control input-md" required placeholder="Palavra Passe Actual">
                                        @if ($errors->has('old_password'))
                                            <p class="text-help text-danger">{{ $errors->first('old_password') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="password">Palavra Passe:</label> --}}
                                        <input type="password" name="new_password" id="new_password" class="form-control input-md" required placeholder="Nova Palavra Passe">
                                        @if ($errors->has('new_password'))
                                            <p class="text-help text-danger">{{ $errors->first('new_password') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        {{-- <label for="password_confirmation">Confirmação:</label> --}}
                                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control input-md" required placeholder="Confirmar">

                                        @if ($errors->has('new_password_confirmation'))
                                            <p class="text-help text-danger">{{ $errors->first('new_password_confirmation') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" type="button" class="btn btn-primary btn-block" data-loading-text="Sending info.."><i class="fa fa-edit"></i> Alterar</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        {{-- <div id="myForm" class="hide">
                        <form action="/echo/html/{{$user->id}}" id="popForm" method="post">
                        <div>

                        <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control input-md">
                    </div>

                    <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control input-md">
                </div>


                <div class="form-group">
                <label for="denger">Gender:</label>
                <select name="gender" id="gender" class="form-control input-md"><option value="male">Male</option><option value="female">Female</option></select>
            </div>

            <div class="form-group">
            <label for="about">About Me:</label>
            <textarea rows="3" name="about" id="about" class="form-control input-md"></textarea>
        </div>

        <div class="form-group">
        <button type="submit" type="button" class="btn btn-primary" data-loading-text="Sending info.."><em class="icon-ok"></em> Save</button>
    </div>
</div>
</form>
</div> --}}
{{-- <div id="result"></div> --}}



</div>
</div>

<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id=""></h4>
            </div>
            <form id="form_id" class="" action="{{url('editProfile')}}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                                    <span class="fa fa-user form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="username" value="{{$user->username}}"/>
                                    <span class="fa fa-user-circle-o form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}"/>
                                    <span class="fa fa-envelope form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}"/>
                                    <span class="fa fa-phone form-control-feedback"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <input type="number" class="form-control" name="age" value="{{$user->age}}"/>
                                    <span class="fa fa-birthday-cake form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <select id="state" name="state" class="form-control" v-model="profile.state" value="">
                                        <optgroup label="Sotavento">
                                            <option class="hide" value="">{{$user->state}}</option>
                                            <option value="1">Santiago</option>
                                            <option value="2">Maio</option>
                                            <option value="3">Fogo</option>
                                            <option value="4">Brava</option>
                                        </optgroup>
                                        <optgroup label="Barlavento">
                                            <option value="5">Santo Antão</option>
                                            <option value="6">São Nicolau</option>
                                            <option value="7">São Vicente</option>
                                            <option value="8">Sal</option>
                                            <option value="9">Boa Vista</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <!--#################################################################-->
                            <div class="col-md-6">
                                <div class="form-group has-feedback">

                                    <select  id="council"  :disabled="!profile.state" v-else name="state" class="form-control" v-model="profile.council" placeholder="Selecina o conceolho">
                                        <option value="">Concelho</option>
                                        <option class="hide" selected value="">{{$user->council}}</option>
                                        <option v-if="profile.state == 1" value="1">Praia</option>
                                        <option v-if="profile.state == 1" value="2">São Domingos</option>
                                        <option v-if="profile.state == 1" value="3">Santa Catarina</option>
                                        <option v-if="profile.state == 1" value="4">São Salvador do Mundo</option>
                                        <option v-if="profile.state == 1" value="5">Santa Cruz</option>
                                        <option v-if="profile.state == 1" value="6">São Lourenço dos Órgãos</option>
                                        <option v-if="profile.state == 1" value="7">Ribeira Grande de Santiago</option>
                                        <option v-if="profile.state == 1" value="8">São Miguel</option>
                                        <option v-if="profile.state == 1" value="9">Tarafal</option>
                                        <option v-if="profile.state == 2" value="10">Maio</option>
                                        <option v-if="profile.state == 3" value="11">São Filipe</option>
                                        <option v-if="profile.state == 3" value="12">Santa Catarina do Fogo</option>
                                        <option v-if="profile.state == 3" value="13">Mosteiros</option>
                                        <option v-if="profile.state == 5" value="14">Ribeira Grande</option>
                                        <option v-if="profile.state == 5" value="15">Paul</option>
                                        <option v-if="profile.state == 5" value="16">Porto Novo</option>
                                        <option v-if="profile.state == 6" value="17">Ribeira Brava</option>
                                        <option v-if="profile.state == 6" value="18">Tarrafal de São Nicolau</option>
                                        <option v-if="profile.state == 7" value="19">São Vicente</option>
                                        <option v-if="profile.state == 8" value="20">Sal</option>
                                        <option v-if="profile.state == 9" value="21">Boa Vista</option>
                                        <option v-if="profile.state == 4" value="22">Brava</option>
                                    </select>
                                </div>
                            </div>
                            <!--#################################################################-->

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <select id="parish" :disabled="!profile.state || !profile.council" v-else name="state" class="form-control" v-model="profile.parish" placeholder="Selecina o conceolho">
                                        <option class="hide"  value="">{{$user->parish}}</option>
                                        {{-- <option  selected value="">Freguesia</option> --}}

                                        <option v-if="(profile.council == 10 && profile.state == 2) || (profile.council == 2 && profile.state == 1) || (profile.council == 19 && profile.state == 7)" value="1">Nossa Senhora da Luz</option>
                                        <option v-if="(profile.council == 1 && profile.state == 1)" value="2">Nossa Senhora da Graça</option>
                                        <option v-if="profile.council == 2 && profile.state == 1" value="3">São Nicolau Tolentino</option>
                                        <option v-if="(profile.council == 3 && profile.state == 1) || (profile.council == 12 && profile.state == 3)" value="4">Santa Catarina</option>
                                        <option v-if="profile.council == 4  && profile.state == 1" value="5">São Salvador do Mundo</option>
                                        <option v-if="profile.council == 5  && profile.state == 1" value="6">Santiago Maior</option>
                                        <option v-if="(profile.council == 6  && profile.state == 1) || (profile.council == 11  && profile.state == 3)" value="7">São Lourenço</option>
                                        <option v-if="profile.council == 7 && profile.state == 1" value="8">Santíssimo Nome de Jesus</option>
                                        <option v-if="profile.council == 14 && profile.state == 5" value="9">Santo Crucifixo</option>
                                        <option v-if="profile.council == 14 && profile.state == 5" value="17">Nossa Senhora do Livramento</option>
                                        <option v-if="profile.council == 14 && profile.state == 5" value="18">São Pedro Apóstolo</option>
                                        <option v-if="profile.council == 8 && profile.state == 1" value="10">São Miguel Arcanjo</option>
                                        <option v-if="profile.council == 9 && profile.state == 1" value="11">Santo Amaro Abade</option>
                                        <option v-if="profile.council == 11 && profile.state == 3" value="12">Nossa Senhora da Conceição</option>
                                        <option v-if="profile.council == 13 && profile.state == 3" value="13">Nossa Senhora da Ajuda</option>
                                        <option v-if="(profile.council == 16 && profile.state == 5) || (profile.council == 21 && profile.state == 9) || (profile.council == 7 && profile.state == 1)" value="14">São João Baptista</option>
                                        <option v-if="profile.council == 22 && profile.state == 4" value="15">Nossa Senhora do Monte</option>
                                        <option v-if="(profile.council == 17 && profile.state == 6) || (profile.council == 14 && profile.state == 5)" value="16">Nossa Senhora do Rosário</option>
                                        <option v-if="profile.council == 15 && profile.state == 5" value="19">Santo António das Pombas</option>
                                        <option v-if="profile.council == 16 && profile.state == 5" value="20">Santo André</option>
                                        <option v-if="profile.council == 17 && profile.state == 6" value="21">Nossa Senhora da Lapa</option>
                                        <option v-if="profile.council == 18 && profile.state == 6" value="22">São Francisco</option>
                                        <option v-if="profile.council == 20 && profile.state == 8" value="23">Nossa Senhora das Dores</option>
                                        <option v-if="profile.council == 21 && profile.state == 9" value="24">Santa Isabel</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="zone" placeholder="Zona" v-model="profile.zone"/>
                                    <span class="fa fa-thumb-tack form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/locales/pt.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/themes/fa/theme.js') }}" charset="utf-8"> </script>

    <script>
    $("#input-2").fileinput({
        language: "pt",
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false,
        showPreview: false,
        browseIcon: "<i class=\"fa fa-user-circle-o\"></i> ",
        allowedFileExtensions: ["jpg", "png", "gif"],
        theme: "gly",
    });

    // $(function(){
    //     $('#login').popover({
    //
    //         placement: 'top',
    //         title: 'Popover Form',
    //         html:true,
    //         content:  $('#myForm').html()
    //     }).on('click', function(){
    //         $('.btn-link').click(function(){
    //             $('#result').after("form submitted by " + $('#email').val())
    //             $.post('/echo/html/',  {
    //                 email: $('#email').val(),
    //                 name: $('#name').val(),
    //                 gender: $('#gender').val()
    //             }, function(r){
    //                 $('#pops').popover('hide')
    //                 $('#result').html('resonse from server could be here' )
    //             })
    //         })
    //     })
    //
    // });
    $(function functionName() {
        $('#passEdit').popover({
            placement: 'top',
            title: 'Alterar Palavra Passe',
            html:true,
            content:  $('#editPassword').html()
        });
    });

    </script>

@endpush
