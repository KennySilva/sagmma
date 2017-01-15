<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Type</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/test.css">


</head>
<body>
    <div class='container '>

        <div class="row">
            <a href="#" class="btn btn-danger">Eliminar tudo</a>
            <a href="{{URL::to('getImport')}}" class="btn btn-success">Importar EVC</a>
            <a href="#" class="btn btn-info">Exportar EVC</a>
        </div>
        <br><br>
        <div class="row">
            <div class='table-responsive'>
                <table class='table table-striped table-bordered table-hover table-condensed'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $key => $type)
                            <tr>
                                <td>{{$type->id}}</td>
                                <td>{{$type->name}}</td>
                                <td><button class="btn btn-primary" type="button" name="button">Editar</button></td>
                                <td><button class="btn btn-danger" type="button" name="button">Eliminar</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>



    </div>
</body>
</html>
