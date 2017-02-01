<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Acesso negado</title>
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.css" media="screen" title="no title"/>

</head>
<body style="margin-top: 150px;">
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title text-center">Acesso Restringido <i class="fa fa-lock"></i></h1>
                </div>
                <div class="panel-body">
                    <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                     <img class="img-responsive center-block" src="{{ asset('img/error/lock-3.png') }}" alt="">
                </div>
                <strong class="text-center">
                    <h3>{{ Auth::user()->name }}</h3>
                    <p>Não tens Acesso a esta página</p>
                    <p>
                        <a href="/"><span class="fa fa-arrow-left">   Volatr à página de iníco</span></a>
                    </p>
                </strong>
                <div class="panel-footer text-center">
                    <h6>SAGMMA</h6>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
