<!DOCTYPE html>
<html>
<head>
    <title>Página Não encontrada</title>
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/bower_components/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/bower_components/font-awesome-animation/dist/font-awesome-animation.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
    <style>
    html, body {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
        display: table;
        font-weight: 100;
        font-family: 'Tangerine', serif;
        background-color: #D2D6DE;
        font-size: 48px;
        text-shadow: 4px 4px 4px #aaa;
    }

    .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }

    .content {
        text-align: center;
        display: inline-block;
        padding: 50px;
        border: 5px solid rgb(101, 101, 101);
        border-radius: 15px;
        text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
        /*box-shadow: 10px 10px 5px grey;*/
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .title {
        font-size: 96px;
    }

    #grad {
        background: red; /* For browsers that do not support gradients */
        background: -webkit-linear-gradient(#63c2ff, #ffffff); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#63c2ff, #ffffff); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#63c2ff, #ffffff); /* For Firefox 3.6 to 15 */
        background: linear-gradient(to #63c2ff, #ffffff); /* Standard syntax (must be last) */
    }


    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
