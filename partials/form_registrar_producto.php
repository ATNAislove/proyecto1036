<!DOCTYPE html>
<html>
    <head>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Añadir producto</h1>

        <form action="?action=nuevo_producto" method="POST">
        <label for="Nombre">Nombre:</label><br><br>
        <input type="text" id="nombre_product" name="nombre_product" value="Camiseta basica" required><br><br>
        <label for="precio">Precio:</label><br><br>
        <input type="number" id="precio" name="precio" value="12" oninput="validarPrecio()" required><br><br>
        <label for="descripcion">Descripcion:</label><br><br>
        <input type="text" id="descripcion" name="descripcion" value="camiseta simple" required><br><br>
        <label for="img">Imagen:</label><br><br>

        <?php  
        
        if(isset($_POST['submit'])){
                    echo "<input type='text' id='url' name='url' value="; echo"/img/"; echo $_FILES['tmp_file']['name'];echo" oninput='validarImagen()' required>";
        }else{
            echo "<input type='text' id='url' name='url' value='/img/bosque.jpg' required>";
        }     ?>
        
        <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';
        document.getElementById('fade').style.display='block'" class="button" >Seleccionar imagen</a>
        
        <br><br>
        <input type="submit" class="button" value="Enviar">
        </form> 

<!-- Intento de imagenes -->
     
     <div id="light" class="white_content">
     <button type="button" class="exit" onclick="document.getElementById('light').style.display='none';
     document.getElementById('fade').style.display='none'">x</button>
     <form action="?action=upload" method="POST" enctype="multipart/form-data">
        <br> 
        <h1> Seleccionar imágenes </h1> <br> 
        <br> 
        
        <input type="file" accept="img/*" name="tmp_file" id="tmp_file" onchange="handleFiles(event)">
        <canvas id="canvas" width="300" height="300"></canvas>
        
        <br><br>
        <input type="submit" class="button" value="Subir" id="botonImg" name="submit">
        
        </div>
        <div id="fade" class="black_overlay"></div>
    </form> 
    <script src="/imports/funciones.js"></script>

    </body>
</html>