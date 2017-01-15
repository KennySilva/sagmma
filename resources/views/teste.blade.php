<!DOCTYPE html>
<html>
<head>
    <title>Minimum Setup</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bower_components/bootstrap-calendar/css/calendar.css">
</head>
<body>

    <div id="calendar"></div>

    <script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="bower_components/underscore/underscore.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap-calendar/js/language/pt-BR.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap-calendar/js/calendar.js"></script>

    <h1>sta tudo bom</h1>


    <script type="text/javascript">
        var calendar = $("#calendar").calendar(
            {
                language: 'pt-BR'
                tmpl_path: "/tmpls/",
                events_source: function () { return []; }
            });
    </script>


</body>
</html>
