<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    {{-- <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" /> --}}
    <title></title>
</head>
<body>
    <div class='table-responsive'>
        <table class='table table-striped table-bordered table-hover table-condensed'>
            <thead>
                <tr>
                    <th>ID</th>
                    {{-- <th>Nome</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        {{-- <td>{{ $data->name }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
