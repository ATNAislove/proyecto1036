<!DOCTYPE html>
<html>
    <head>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h2>Registro</h2>

        <form action="?action=registrar" method="POST">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" value="John"><br>
        <label for="passwd">Contraseña:</label><br>
        <input type="password" id="passwd" name="passwd" value="Doe"><br><br>
        <input type="submit" value="Enviar">
        </form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "".</p>

    </body>
</html>