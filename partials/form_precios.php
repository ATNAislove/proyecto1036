<!DOCTYPE html>
<html>
    <head>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Filtrar precios</h1>

        <form action="?action=filtrar" method="GET">
        <label for="min">Min:</label>
        <input type="number" id="min" name="min" required><br><br>
        <label for="max">Max:</label>
        <input type="number" id="max" name="max" required><br><br>
       
        <input type="submit" name = "action" class="button" value="filtrar">
        
        </form> 

        <script src="/imports/funciones.js"></script>
    </body>
</html>