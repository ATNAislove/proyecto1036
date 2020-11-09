<!DOCTYPE html>
<html>
    <head>
    <link href="/css/style.css" rel="stylesheet" type="text/css">

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      </head>

<body>
     <p>This is the main content. To display a lightbox click <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">here</a>
     </p>
     <div id="light" class="white_content">
     <button type="button" class="exit" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">x</button>

     <br> 
     <h1> Seleccionar imágenes </h1> <br> 
     <br> 
     
     <input type="file" accept="image/*" name="tmp_file" id="upload" onchange="handleFiles(event)">

     <canvas id="canvas" width="300" height="300"></canvas>
     
     <br><br>
     <input type="submit" class="button" value="Subir" name="submit">
    
    </div>
     <div id="fade" class="black_overlay"></div>
    <script src="/imports/funciones.js"></script>

</body>
</html>