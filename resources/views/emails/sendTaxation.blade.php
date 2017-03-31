<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Enviando algo {{$taxation->id}}</h1>
        <h1><a href="http://localhost:8000/sagmma/taxations">Click aqui</a></h1>
        <div>
            Thanks for creating an account with the verification demo app.
            Please follow the link below to verify your email address
            {{ URL::to('acesso_ao_recibo/'.$taxation->id.'/'.$code) }}.<br/>

        </div>
    </body>
</html>
