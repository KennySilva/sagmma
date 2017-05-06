<!DOCTYPE html>
<html lang="en">
<head>
<style media="screen">
table, td, th {
    border: 2px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 50px;
}
</style>

</head>
<body>
    <div class="">
        <h2>Funcionários do MMSC</h2>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Escalão</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee as $employ)
                    <tr>
                        <td>{{ $employ->name }}</td>
                        <td>{{ $employ->email }}</td>
                        <td>{{ $employ->phone }}</td>
                        <td>{{ $employ->echelon }}</td>
                        <td>{{ $employ->typeofemployees->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
