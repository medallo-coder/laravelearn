<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Desaparecido</title>
</head>
<body>

<h1>Editar Desaparecido</h1>

<form action="{{ route('desaparecidos.update', $humanos->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombres:</label><br>
    <input type="text" name="nombres" value="{{ $humanos->nombres }}" required>
    <br><br>

    <label>Apellidos:</label><br>
    <input type="text" name="apellidos" value="{{ $humanos->apellidos }}" required>
    <br><br>

    <button type="submit">Actualizar</button>
</form>

<br>

<a href="{{ route('desaparecidos.index') }}">Volver a la lista</a>

</body>
</html>
