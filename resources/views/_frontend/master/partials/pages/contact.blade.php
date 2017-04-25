<div id="contact" class="container-fluid">
    <h2 class="text-center">CONTACTAR</h2>
    <hr>
    <div class="row">
        <div class="col-sm-5 slideanim">
            <h4>Mercado Municipal de Achada Riba</h4>
            <p><span class="fa fa-map-marker"></span> Cabo Verde, Santiago, Stª Catarina, Assomada</p>
            <p><span class="fa fa-mobile"></span> +238 2653986</p>
            <p><span class="fa fa-phone"></span> +238 2653986</p>
            <p><span class="fa fa-envelope"></span> mercadomunicipal.st@gmail.com</p>
        </div>
        <div class="col-sm-7 slideanim">
            <div class="row">

                {!!Form::open(['route'=>'mailToSagmma', 'method'=>'POST'])!!}

                @if(Auth::check())
                    <div class="col-sm-4 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          {!!Form::text('name', Auth::user()->name, ['class'=>'form-control disabled', 'readonly'=>'readonly'])!!}
                        </div>
                    </div>

                    <div class="col-sm-4 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          {!!Form::text('email', Auth::user()->email, ['class'=>'form-control disabled', 'readonly'=>'readonly'])!!}
                        </div>
                    </div>
                @else
                    <div class="col-sm-4 form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!!Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Indique o seu nome', 'required'])!!}
                        </div>
                    </div>

                    <div class="col-sm-4 form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          {!!Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Indique o seu email', 'required'])!!}
                        </div>
                    </div>
                @endif

                <div class="col-sm-4 form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                      {!!Form::text('subject', null, ['class'=>'form-control', 'placeholder'=>'Assunto', 'required'])!!}
                    </div>
                </div>


            </div>
            {!!Form::textarea('mensagem', null, ['class'=>'form-control', 'placeholder'=>'Escreva a sua mensagem...', 'required', 'size' => '40x6'])!!}
            <br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    {!!Form::submit('Enviar', ['class'=>'btn btn-secondary','style'=>'border-radius: 0px; padding: 5px 20px 5px 20px'])!!}
                </div>
            </div>
            {!!Form::close()!!}

        </div>
    </div>
</div>
<br>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="table-responsive">
            <div style="width: 100%; height: 400px;">
                {!! Mapper::render() !!}
            </div>
        </div>
    </div>
</div>
