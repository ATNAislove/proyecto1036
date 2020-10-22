<!DOCTYPE html>
<html>
    <head>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Registro</h1>

        <form action="?action=registrar" method="POST">
        <label for="usuario">Usuario:</label><br><br>
        <input type="text" id="username" name="username" value="John"><br><br>
        <label for="correo">Correo:</label><br><br>
        <input type="text" id="email" name="email" value="John@gmail.com"><br><br>
        <label for="passwd">Contraseña:</label><br><br>
        <input type="password" id="passwd" name="passwd" value="0000"><br><br>
        <input type="submit" value="Enviar">
        </form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "".</p>

    </body>
</html>