<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Desaparecido</title>
</head>
<body>

<h1>Editar Desaparecido</h1>

<form action="{{ route('zonas.update', $organizaciones->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre Organización:</label><br>
    <input type="text" name="nombre_organizacion" value="{{ $organizaciones->nombre_organizacion }}" required>
    <br><br>

    <label>Apellidos:</label><br>
    <input type="text" name="zona" value="{{ $organizaciones->zona }}" required>
    <br><br>

    <button type="submit">Actualizar</button>
</form>

<br>

<a href="{{ route('zonas.index') }}">Volver a la lista</a>

</body>
</html>
