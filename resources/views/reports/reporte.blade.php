<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Órdenes Finalizadas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Órdenes Finalizadas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Oficio</th>
                <th>Fecha de Creación</th>
                <th>Fecha de cierre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $orden)
                <tr>
                    <td>{{ $orden->id }}</td>
                    <td>{{ $orden->oficio }}</td>
                    <td>{{ $orden->created_at }}</td>
                    <td>{{ $orden->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

