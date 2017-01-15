<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Type information</title>
</head>
<body>
    <form class="" action="postImport" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="typeofplace" value="typeofplace">
        <input type="submit" name="" value="Import">
    </form>
</body>
</html>
