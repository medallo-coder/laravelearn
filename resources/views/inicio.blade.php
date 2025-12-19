<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio | Personas Desaparecidas</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f6f1ec; /* cálido, sobrio */
            color: #3a2e2a;
        }

        header {
            background-color: #7a2e2e; /* rojo oscuro */
            color: #fff;
            padding: 30px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.2rem;
        }

        nav {
            background-color: #a94442;
            padding: 15px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
        }

        .mensaje {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }

        .mensaje h2 {
            color: #7a2e2e;
            margin-top: 0;
        }

        .imagen {
            text-align: center;
            margin-bottom: 40px;
        }

        .imagen img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .imagen p {
            font-size: 0.9rem;
            color: #555;
            margin-top: 10px;
        }

        .acciones {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .acciones a {
            background-color: #7a2e2e;
            color: #fff;
            padding: 15px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .acciones a:hover {
            background-color: #5f2222;
        }

        footer {
            background-color: #3a2e2a;
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<header>
    <h1>App de Personas Desaparecidas</h1>
    <p>Memoria, búsqueda y justicia</p>
</header>

<nav>
    <a href="{{ route('desaparecidos.create') }}">Registrar Desaparecido</a>
    <a href="{{ route('desaparecidos.index') }}">Lista de Desaparecidos</a>
    <a href="{{ route('aparecidos.informacion') }}">Lista de Aparecidos</a>
    <a href="{{ route('zonas.index') }}">Organizaciones</a>
</nav>

<div class="container">

    <div class="mensaje">
        <h2>¿Por qué esta plataforma?</h2>
        <p>
            Esta aplicación busca apoyar la documentación, búsqueda y visibilización
            de personas desaparecidas, así como el trabajo incansable de familias y
            organizaciones que no dejan de buscar.
        </p>
    </div>

    <div class="imagen">
        <img 
            src="https://agenciapresentes.org/sitio/wp-content/uploads/2024/05/Marcha-10-mayo-madres-buscadoras-2023_foto-geo-gonzalez_2-1.jpg" 
            alt="Madres buscadoras en marcha">
        <p>
            Madres buscadoras marchando el 10 de mayo.  
            Fotografía: Geo González / Agencia Presentes
        </p>
    </div>

    <div class="acciones">
        <a href="{{ route('desaparecidos.create') }}">➕ Registrar Caso</a>
        <a href="{{ route('desaparecidos.index') }}">📋 Ver Casos</a>
        <a href="{{ route('zonas.index') }}">🏛️ Organizaciones</a>
    </div>

</div>

<footer>
    © {{ date('Y') }} — Proyecto de apoyo a la búsqueda de personas desaparecidas
</footer>

</body>
</html>
