<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Print</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script>
    <script src=" http://www.position-absolute.com/creation/print/jquery.printPage.js" charset="utf-8"></script>
</head>
<body>
    <a class="btnPrint btn btn" href="{{URL::to('export/printPreview')}}">print</a>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.btnPrint').printPage();
    });
    </script>
</body>
</html>
