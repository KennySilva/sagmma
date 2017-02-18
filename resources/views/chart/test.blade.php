<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


    <title>My Charts</title>

    {!! Charts::assets() !!}

</head>
<body>
    <center>
        {!! $chart->render() !!}
    </center>
</body>
</html>
