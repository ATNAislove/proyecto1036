<!DOCTYPE html>
<html>
    <head>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Registro</h1>

        <form action="?action=registrar" method="POST">
        <label for="usuario">Usuario:</label><br><br>
        <input type="text" id="username" name="username" value="John" required><br><br>
        <label for="correo">Correo:</label><br><br>
        <input type="text" id="email" name="email" value="John@gmail.com" oninput="validarCorreo()" required><br><br>
        <label for="passwd">Contraseña:</label><br><br>
        <input type="password" id="passwd" name="passwd" value="0000" required><br><br>
        <input type="submit" class="button" value="Enviar">
        </form> 

        <script src="/imports/funciones.js"></script>
    </body>
</html>