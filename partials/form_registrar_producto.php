<!DOCTYPE html>
<html>
    <head>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Añadir producto</h1>

        <form action="?action=nuevo_producto" method="POST">
        <label for="Nombre">Nombre:</label><br><br>
        <input type="text" id="nombre_product" name="nombre_product" value="Camiseta basica"><br><br>
        <label for="precio">Precio:</label><br><br>
        <input type="number" id="precio" name="precio" value="12"><br><br>
        <label for="descripcion">Descripcion:</label><br><br>
        <input type="text" id="descripcion" name="descripcion" value="camiseta simple"><br><br>
        <label for="img">Imagen:</label><br><br>
        <input type="text" id="url" name="url" value="/img/bosque.jpg">
        <a href="/../partials/form_imagenes.php" class="button">Seleccionar imagen</a>
        
        <br><br>

        <!--<input type="file" id="img" accept="img/*" name="img" id="upload">
		<input type="submit" value="SUBIR" name="submit">
        -->
        <input type="submit" class="button" value="Enviar">
        </form> 


    </body>
</html>