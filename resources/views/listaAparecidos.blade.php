<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Desaparecidos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .acciones {
            text-align: center;
            margin-bottom: 20px;
        }

        .acciones a {
            background-color: #ebac25ff;
            color: white;
            padding: 8px 14px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        .acciones a:hover {
            background-color: #af6e1eff;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ebac25ff;
            color: white;
        }

        tr.aparecido {
            background-color: #ecfeff;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        button {
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px;
        }

        .eliminar {
            background-color: #dc2626;
            color: white;
        }

        .eliminar:hover {
            background-color: #991b1b;
        }

        .btn-aparecer {
            background-color: #16a34a;
            color: white;
        }

        .btn-aparecer:hover {
            background-color: #166534;
        }

        .btn-desaparecer {
            background-color: #2563eb;
            color: white;
        }

        .btn-desaparecer:hover {
            background-color: #1e40af;
        }

        .editar {
            color: #ebac25ff;
            text-decoration: none;
            font-weight: bold;
            margin-right: 8px;
        }

        .editar:hover {
            text-decoration: underline;
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ebac25ff;
            text-decoration: none;
        }

        .volver:hover {
            text-decoration: underline;
        }

        .mensaje {
            text-align: center;
            color: #555;
            padding: 20px;
        }
    </style>
</head>
<body>

<h1>Lista de Aparecidos</h1>

<div class="acciones">
    <a href="{{ route('desaparecidos.create') }}">Registrar nuevo</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        
        @forelse ($humanos as $humano)
            
            <tr class="{{ $humano->rol_id == 2 ? 'aparecido' : '' }}">
                <td>{{ $humano->id }}</td>
                <td>{{ $humano->nombres }}</td>
                <td>{{ $humano->apellidos }}</td>
                <td>

                    <!-- EDITAR -->
                    <a class="editar"
                       href="{{ route('desaparecidos.edit', $humano->id) }}">
                        Editar
                    </a>

                    <!-- ELIMINAR -->
                    <form action="{{ route('desaparecidos.destroy', $humano->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="eliminar"
                                onclick="return confirm('¿Seguro que deseas eliminar este registro?')">
                            Eliminar
                        </button>
                    </form>

                    <!-- BOTÓN INTELIGENTE (APARECER / DESAPARECER) -->
                    <form action="{{ route('desaparecidos.toggle', $humano->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('PUT')

                        @if ($humano->rol_id == 1)
                            <button type="submit"
                                    class="btn-aparecer"
                                    onclick="return confirm('¿Marcar como aparecida?')">
                                Marcar como aparecida
                            </button>
                        @else
                            <button type="submit"
                                    class="btn-desaparecer"
                                    onclick="return confirm('¿Marcar como desaparecida?')">
                                Marcar como desaparecida
                            </button>
                        @endif
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="mensaje">
                    No hay desaparecidos registrados
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<a class="volver" href="{{ url('/') }}">Volver al inicio</a>

</body>
</html>
