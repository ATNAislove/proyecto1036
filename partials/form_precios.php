<!DOCTYPE html>
<html>
    <head>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Filtrar precios</h1>

        <form id="formulario">
            
            <label for="buscador">Busca tu prenda:</label>
            <input list="prendas" name="buscador" id="buscador" onchange=mostrarEnPantalla()>
            <datalist id="prendas"></datalist> <br><br>
            <label for="min">Min:</label>
            <input type="number" id="min" name="min" required>
            <label for="max">Max:</label>
            <input type="number" id="max" name="max" required><br><br>
        
            <input type="submit" name="action" class="button" value="filtrar" onclick=preciosFiltrados()>

                   
        </form> 

        <div  id="carr" class="visor">  
        </div>

    <script src="/imports/funcionesPrecios.js"></script>
    </body>
</html>