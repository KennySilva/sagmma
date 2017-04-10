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
            <div class="col-sm-2 col-md-2">
                <img src="/uploads/avatars/{!! $user->avatar !!}"
                alt="" class="img-rounded img-responsive" />
                <hr>
                <form class="" enctype="multipart/form-data" action="/user/profiles" method="post">
                    <input v-model="updateimage" id="input-2" type="file" multiple class="file-loading" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <button v-if="updateimage"  type="submit" name="name" class="btn btn-link" name="name">Atualizar Imagem</button>
                    <span class="text-center text-danger" v-else>Selecione uma Imagem</span>
                </form>

            </div>
            <div class="col-sm-4 col-md-4">
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
                                        <td><b>Idade</b></td>
                                        <td><i>{!! $user->age !!}</i></td>
                                    </tr>
                                    <tr>
                                        <td><b>Genero</b></td>
                                        <td><i>{!! $user->gender !!}</i></td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td><i>{!! $user->email !!}</i></td>

                                    </tr>
                                    <tr>
                                        <td><b>Telefone</b></td>
                                        <td><i>{!! $user->phone !!}</i></td>

                                    </tr>
                                    <tr>
                                        <td><b>Ilha</b></td>
                                        <td><i>{!! $user->state !!}</i></td>
                                    </tr>
                                    <tr>
                                        <td><b>Concelho</b></td>
                                        <td><i>{!! $user->council !!}</i></td>
                                    </tr>
                                    <tr>
                                        <td><b>Freguesia</b></td>
                                        <td><i>{!! $user->parish !!}</i></td>
                                    </tr>
                                    <tr>
                                        <td><b>Zona</b></td>
                                        <td><i>{!! $user->zone !!}</i></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tipo</b></td>
                                        <td><i>{!! $user->type !!}</i></td>

                                    </tr>


                                    <tr>
                                        <td><b>Data de atualização</b></td>
                                        <td><i>{!! $user->updated_at->diffForHumans() !!}</i></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-link" type="button" name="button" data-toggle="modal" data-target="#editProfile">Editar Informações Pessoaes</button>


                        <button type="button" id="passEdit" class="btn btn-link pass">Editar Palavra Passe</button>
                        {{-- <button type="button" id="login" class="btn btn-link">Editar Palavra Passe</button> --}}

                        <div id="editPassword" class="hide">
                            <form action="{{url('editPassword')}}" id="popForm" method="post">
                                <div>
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <input type="password" name="old_password" id="old_password" class="form-control input-md" required placeholder="Antiga Palavra Passe">
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
                                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control input-md" required placeholder="Conformação">

                                        @if ($errors->has('new_password_confirmation'))
                                            <p class="text-help text-danger">{{ $errors->first('new_password_confirmation') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" type="button" class="btn btn-primary btn-block" data-loading-text="Sending info.."><i class="fa fa-edit"></i> Atualizar</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div id="myForm" class="hide">
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
                        </div>
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
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                <button type="button" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                            </div>
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
            browseClass: "btn btn-default btn-block",
            showCaption: false,
            showRemove: false,
            showUpload: false,
            showPreview: false,
            browseIcon: "<i class=\"fa fa-user-circle-o\"></i> ",
            allowedFileExtensions: ["jpg", "png", "gif"],
            theme: "gly",
        });

        $(document).ready(function(){
            $('#popover').popover({
                html : true,
                title: function() {
                    return $("#popover-head").html();
                },
                content: function() {
                    return $("#popover-content").html();
                }
            });
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
                title: 'Editar Palavra Passe',
                html:true,
                content:  $('#editPassword').html()
            });
        });

        </script>

    @endpush
