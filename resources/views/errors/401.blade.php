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
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h1 class="panel-title text-center">Acesso Restringido</h1>
                </div>
                <div class="panel-body">
                    <img class="img-responsive center-block" src="{{ asset('img/error/lock-1.png') }}" alt="">
                </div>
                <strong class="text-center">
                    <p>Não tens Acesso a esta pagina</p>
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
