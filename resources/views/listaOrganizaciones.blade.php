<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizaciones</title>
    <style>
        /* Fondo general y tipografía */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            padding: 40px;
            color: #333;
        }

        /* Título centrado */
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        /* Tabla centrada con estilo suave */
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #ebac25ff;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr {
            transition: background-color 0.3s;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        /* Botones de acción (si agregas en el futuro) */
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .btn-editar {
            background-color: #2563eb;
        }

        .btn-editar:hover {
            background-color: #1e40af;
        }

        .btn-eliminar {
            background-color: #dc2626;
        }

        .btn-eliminar:hover {
            background-color: #991b1b;
        }
    </style>
</head>
<body>
    <h1>Organizaciones</h1><br>
    <a href="{{ route('zonas.create') }}">Registrar Organización</a>
    <table class="tabla-info">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Zona</th>
            </tr>
        </thead>
        <tbody>
@foreach ($organizaciones as $organizacion)
<tr>
    <td>{{ $organizacion->id }}</td>
    <td>{{ $organizacion->nombre_organizacion }}</td>
    <td>{{ $organizacion->zona }}</td>
    <td>
        <!-- EDITAR -->
        <a class="editar" href="{{ route('zonas.edit', $organizacion->id) }}">
            Editar
        </a>
    </td>
</tr>
@endforeach

           



        </tbody>
    </table>
</body>
</html>
