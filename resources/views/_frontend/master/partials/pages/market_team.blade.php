<div id="market_team" class="container-fluid bg-grey">
    <div class="text-center">
        <h2>Equipa da gestão do mercado</h2>
        {{-- <h4>"Atraves da união podemos vazer mais ao favor do crescimento"</h4> --}}
    </div>
    <div class="row slideanim">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">


                <div  class="col-sm-4 col-md-3 diretor">
                    <div class="thumbnail">
                        <a href="img/frontend_img/team/diretor_test.png" data-lightbox="photo1" data-title="Um Mercado com capacidade"><img src="img/frontend_img/team/diretor_test.png" alt="..."></a>

                        <h4 class="text-center"><a href="#" class="" data-toggle="modal" data-target="#perfil_diretor">Diretor</a> | <a href="#" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope-o"></i></a> </h4>
                        {{-- <hr>

                        <p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp; diretor@sagmma.com</p> --}}
                        {{-- ------------------------------------------------- --}}
                        <div class="modal fade" id="perfil_diretor" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id=""></h4>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ------------------------------------------------- --}}


                        <div id="myModal" class="modal fade" role="dialog" tabindex="-1" data-width="760">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Contactar Diretor</h4>
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
                                                {!!Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
                                                {!!Form::submit('Cancelar', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <a href="img/frontend_img/team/gestor_test.png" data-lightbox="photo1" data-title="Um Mercado com capacidade"><img src="img/frontend_img/team/gestor_test.png" alt="..."></a>

                        <h4 class="text-center"><a href="#" data-toggle="modal" data-target="#perfil_gestor">Gestor</a> | <a href="#" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope-o"></i></a> </h4>
                        {{-- <hr>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp; diretor@sagmma.com</p> --}}
                        {{-- ------------------------------------------------------------------ --}}

                        <div class="modal fade" id="perfil_gestor" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id=""></h4>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ------------------------------------------------------------------ --}}

                        <div id="myModal" class="modal fade" role="dialog" tabindex="-1" data-width="760">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
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
                                                {!!Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
                                                {!!Form::submit('Cancelar', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    {!!Form::close()!!}

                                </div>

                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------------------------------>

                    </div>
                </div>

                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <a href="img/frontend_img/team/gestor_test.png" data-lightbox="photo1" data-title="Um Mercado com capacidade"><img src="img/frontend_img/team/auxiliar_test.png" alt="..."></a>

                        <h4 class="text-center"><a href="#" data-toggle="modal" data-target="#perfil_gestor">Auxiliar</a> | <a href="#" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope-o"></i></a> </h4>
                        {{-- <hr>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp; diretor@sagmma.com</p> --}}
                        {{-- ------------------------------------------------------------------ --}}

                        <div class="modal fade" id="perfil_gestor" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id=""></h4>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ------------------------------------------------------------------ --}}

                        <div id="myModal" class="modal fade" role="dialog" tabindex="-1" data-width="760">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
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
                                                    {!!Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
                                                    {!!Form::submit('Cancelar', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal'])!!}
                                                </div>
                                            </div>
                                        </div>
                                        {!!Form::close()!!}
                                    </div>
                                </div>
                                <!------------------------------------------------------------------------------------------------------------------>

                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                    <img src="http://lorempixel.com/300/300" alt="...">
                    <div class="caption">
                    <h3>Tecnico Auxiliar</h3>
                    <hr>

                    <p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp; diretor@sagmma.com</p>
                    <p><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp; facebook.sagmma.diretor</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i></i>&nbsp;&nbsp;&nbsp; diretor@sagmma.com</p>
                    <hr>

                    <!--------------------------------------------------------------------------------------------------------------->
                    <p><a href="#" class="btn btn-default btn-sm" role="button" data-toggle="modal" data-target="#myModal">Enviar Email</a></p>

                    <div id="myModal" class="modal fade" role="dialog" tabindex="-1" data-width="760">
                    <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

</div>
</div>
<!------------------------------------------------------------------------------------------------------------------>

</div>
</div>
</div> --}}
</div>

{{-- <div class="col-sm-6 col-md-4 col-xs-offset-2">
<div class="thumbnail">
<img src="http://lorempixel.com/300/300" alt="...">
<div class="caption">
<h3>Tecnico Auxiliar</h3>
<hr>
<p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp; diretor@sagmma.com</p>
<p><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp; facebook.sagmma.diretor</p>
<p><i class="fa fa-phone" aria-hidden="true"></i></i>&nbsp;&nbsp;&nbsp; diretor@sagmma.com</p>
<hr>

<!--------------------------------------------------------------------------------------------------------------->
<p><a href="#" class="btn btn-default btn-sm" role="button" data-toggle="modal" data-target="#myModal">Enviar Email</a></p>

<div id="myModal" class="modal fade" role="dialog" tabindex="-1" data-width="760">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Modal Header</h4>
</div>
<div class="modal-body">
<p>Some text in the modal.</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
<!------------------------------------------------------------------------------------------------------------------>

</div>
</div>
</div> --}}
</div>
</div>
</div>
