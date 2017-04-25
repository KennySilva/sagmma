<div id="market_team" class="container-fluid bg-grey">
    <div class="text-center">
        <h2>Equipa da gestão do mercado</h2>
        <h4>Juntos podemos podemos andar rumo ao sucesso</h4>
    </div>
    <div class="row slideanim">
        <div class="col-md-12 col-md-push-1">
            {{-----------------------------------------------------------}}
            <div class="col-md-3">
                <div class="thumbnail">
                    <div class="caption">
                        <h4>Diretor(a)</h4>
                        <p>Dr. Nelson Marcarenha</p>
                        <p><a href="img/frontend_img/team/diretor_test.png" data-lightbox="photo1" data-title="Diretor Dapromoção da Economia Local" class="label label-danger" rel="tooltip" title="Ver"><i class="fa fa-eye"></i></a>
                            <a href="" class="label label-primary" rel="tooltip" title="Enviar email para o Diretor" data-toggle="modal" data-target="#modal-director"><i class="fa fa-envelope"></i></a></p>
                        </div>
                        <img src="img/frontend_img/team/diretor_test.png" alt="...">
                    </div>
                </div>
                {{-----------------------------------------------------------}}
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>Gestor(a)</h4>
                            <p>Maria Semedo</p>
                            <p><a href="img/frontend_img/team/gestor_test.png" data-lightbox="photo1" data-title="Gestor do Mercado Novo" class="label label-danger" rel="tooltip" title="Ver"><i class="fa fa-eye"></i></a>
                                <a href="" class="label label-primary" rel="tooltip" title="Enviar email para o Gestor" data-toggle="modal" data-target="#modal-manager"><i class="fa fa-envelope"></i></a></p>
                            </div>
                            <img src="img/frontend_img/team/gestor_test.png" alt="...">
                        </div>
                    </div>
                    {{-----------------------------------------------------------}}
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <div class="caption">
                                <h4>Auxiliar Administrativo</h4>
                                <p>Jacinto Gomes</p>
                                <p><a href="img/frontend_img/team/auxiliar_test.png" data-lightbox="photo1" data-title="Auxiliar Administrativo" class="label label-danger" rel="tooltip" title="Ver"><i class="fa fa-eye"></i></a>
                                    <a href="" class="label label-primary" rel="tooltip" title="Enviar email para o Auxiliar Administrativo" data-toggle="modal" data-target="#modal-auxiliar"><i class="fa fa-envelope"></i></a></p>
                                </div>
                                <img src="img/frontend_img/team/auxiliar_test.png" alt="...">
                            </div>
                        </div>

                    </div>
                </div>

                {{------------------------Modals Diretor-----------------------------------}}
                <div id="modal-director" class="modal fade" role="dialog" tabindex="-1" data-width="760">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"><i class="fa fa-send faa-passing animated faa-slow"></i></h5>
                            </div>
                            {!!Form::open(['route'=>'mailToDirector', 'method'=>'POST'])!!}
                            <div class="modal-body">
                                <div class="row">
                                    @if(Auth::check())
                                        <div class="col-sm-4 form-group">
                                            {!!Form::text('name', Auth::user()->name, ['class'=>'form-control disabled', 'readonly'=>'readonly'])!!}
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            {!!Form::text('email', Auth::user()->email, ['class'=>'form-control disabled', 'readonly'=>'readonly'])!!}
                                        </div>
                                    @else
                                        <div class="col-sm-4 form-group">
                                            {!!Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Indique o seu nome', 'required'])!!}
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            {!!Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Indique o seu email', 'required'])!!}
                                        </div>
                                    @endif

                                    <div class="col-sm-4 form-group">
                                        {!!Form::text('subject', null, ['class'=>'form-control', 'placeholder'=>'Assunto', 'required'])!!}
                                    </div>

                                    <div class="col-md-12 form-group">
                                        {!!Form::textarea('mensagem', null, ['class'=>'form-control', 'placeholder'=>'Escreva  aqui a sua mensagem', 'size' => '30x4', 'required'])!!}

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        {!!Form::submit('Enviar', ['class'=>'btn btn-link'])!!}
                                        {!!Form::submit('Cancelar', ['class'=>'btn btn-link', 'data-dismiss'=>'modal'])!!}
                                    </div>
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>

                {{------------------Modal Manager-----------------------}}
                <div id="modal-manager" class="modal fade" role="dialog" tabindex="-1" data-width="760">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"><i class="fa fa-send faa-passing animated faa-slow"></i></h5>
                            </div>
                            {!!Form::open(['route'=>'mailToManager', 'method'=>'POST'])!!}
                            <div class="modal-body">
                                <div class="row">
                                    @if(Auth::check())
                                        <div class="col-sm-4 form-group">
                                            {!!Form::text('name', Auth::user()->name, ['class'=>'form-control disabled', 'readonly'=>'readonly'])!!}
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            {!!Form::text('email', Auth::user()->email, ['class'=>'form-control disabled', 'readonly'=>'readonly'])!!}
                                        </div>
                                    @else
                                        <div class="col-sm-4 form-group">
                                            {!!Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Indique o seu nome', 'required'])!!}
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            {!!Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Indique o seu email', 'required'])!!}
                                        </div>
                                    @endif

                                    <div class="col-sm-4 form-group">
                                        {!!Form::text('subject', null, ['class'=>'form-control', 'placeholder'=>'Assunto', 'required'])!!}
                                    </div>

                                    <div class="col-md-12 form-group">
                                        {!!Form::textarea('mensagem', null, ['class'=>'form-control', 'placeholder'=>'Escreva  aqui a sua mensagem', 'size' => '30x4', 'required'])!!}

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        {!!Form::submit('Enviar', ['class'=>'btn btn-link'])!!}
                                        {!!Form::submit('Cancelar', ['class'=>'btn btn-link', 'data-dismiss'=>'modal'])!!}
                                    </div>
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>

                {{-----------------Modal Auxiliar-----------------------}}
                <div id="modal-auxiliar" class="modal fade" role="dialog" tabindex="-1" data-width="760">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"><i class="fa fa-send faa-passing animated faa-slow"></i></h5>
                            </div>
                            <div class="modal-body">
                                {!!Form::open(['route'=>'mailToAux', 'method'=>'POST'])!!}
                                <div class="modal-body">
                                    <div class="row">
                                        @if(Auth::check())
                                            <div class="col-sm-4 form-group">
                                                {!!Form::text('name', Auth::user()->name, ['class'=>'form-control disabled', 'readonly'=>'readonly'])!!}
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                {!!Form::text('email', Auth::user()->email, ['class'=>'form-control disabled', 'readonly'=>'readonly'])!!}
                                            </div>
                                        @else
                                            <div class="col-sm-4 form-group">
                                                {!!Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Indique o seu nome', 'required'])!!}
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                {!!Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Indique o seu email', 'required'])!!}
                                            </div>
                                        @endif

                                        <div class="col-sm-4 form-group">
                                            {!!Form::text('subject', null, ['class'=>'form-control', 'placeholder'=>'Assunto', 'required'])!!}
                                        </div>

                                        <div class="col-md-12 form-group">
                                            {!!Form::textarea('mensagem', null, ['class'=>'form-control', 'placeholder'=>'Escreva  aqui a sua mensagem', 'size' => '30x4', 'required'])!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            {!!Form::submit('Enviar', ['class'=>'btn btn-link'])!!}
                                            {!!Form::submit('Cancelar', ['class'=>'btn btn-link', 'data-dismiss'=>'modal'])!!}
                                        </div>
                                    </div>
                                </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
