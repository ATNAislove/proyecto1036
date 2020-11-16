<!DOCTYPE html>
<html>
    <head>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Inicia sesión</h1>

        <form action="?action=inicio_sesion" method="POST">
        <label for="usuario">Usuario:</label><br><br>
        <input type="text" id="username" name="username" value="John" required><br><br>
        <label for="passwd">Contraseña:</label><br><br>
        <input type="password" id="passwd" name="passwd" value="0000" required><br><br>
        <input type="submit" class="button" value="Enviar">
        </form> 
        <h2>¿Aún no estas registrado? <a href="?action=registro">Regístrate</a></h2>
        
    </body>
</html>