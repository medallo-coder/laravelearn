<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Persona Desaparecida</title>

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

        form {
            background: #ffffff;
            max-width: 500px;
            margin: auto;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        button {
            margin-top: 20px;
            width: 100%;
            background-color: #e19d09ff;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #af621eff;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #eb5025ff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Registrar Persona Desaparecida</h1>

<form action="{{ route('desaparecidos.store') }}" method="POST">
    @csrf

    <label>Nombres:</label>
    <input type="text" name="nombres" required>

    <label>Apellidos:</label>
    <input type="text" name="apellidos" required>

    <label>Edad(Desaparición):</label>
    <input type="number" name="edad" min="0">

    <label>Descripción:</label>
    <textarea name="descripcion"></textarea>

    <label>Lugar Desaparición:</label>
    <input type="text" name="lugar" required>

    <label>Fecha y Hora de desaparición:</label>
    <input type="datetime-local" name="fecha" required>

    <label>Sexo:</label>
    <select name="sexo" required>
        <option value="">Seleccione</option>
        <option value="hombre">Hombre</option>
        <option value="mujer">Mujer</option>
    </select>

    <label>Descripción física:</label>
    <input type="text" name="descripcion_fisica" required>

    <label>Vestimenta:</label>
    <input type="text" name="vestimenta" required>

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('desaparecidos.index') }}">Ver lista de personas</a>

</body>
</html>
