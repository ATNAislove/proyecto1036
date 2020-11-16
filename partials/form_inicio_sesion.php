<!DOCTYPE html>
<html>
    <head>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Inicia sesión</h1>

        <form action="?action=inicio_sesion" method="POST" onsubmit="validarFormularioAutentificar()">
        <label for="usuario">Usuario:</label><br><br>
        <input type="text" id="username" name="username" value="John" ><br><br>
        <label for="passwd">Contraseña:</label><br><br>
        <input type="password" id="passwd" name="passwd" value="0000" ><br><br>
        <input type="submit" class="button" value="Enviar">
        </form> 
        <h2>¿Aún no estas registrado? <a href="?action=registro">Regístrate</a></h2>

<script src="/imports/funciones.js"></script>
    </body>
</html>