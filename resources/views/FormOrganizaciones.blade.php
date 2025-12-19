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

<form action="{{ route('zonas.store') }}" method="POST">
    @csrf

    <label>Nombre de la Organización:</label>
    <input type="text" name="nombre_organizacion" required>
   
    <label>Zona:</label>
    <input type="text" name="zona" required>

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('desaparecidos.index') }}">Ver lista de personas desaparecidas</a>

</body>
</html>
