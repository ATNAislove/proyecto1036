<?php
function nuevo_producto(){
  //recoje los datos del formulario de añadir un producto y lo añade a la tabla producto
    global $pdo;
    $table = "producto";
    if (count($_REQUEST) < 4) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO     $table (nombre, precio, descripcion, img)
                        VALUES (?,?,?,?)";
                       
    //echo $query;
    try { 
        $a=array($_REQUEST['nombre_product'],intval($_REQUEST['precio']), $_REQUEST['descripcion'],$_REQUEST['url']);
        //print_r ($a);
        $consult = $pdo->prepare($query);
        $a=$consult->execute($a);
        if (1>$a) echo'<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
        <strong>Inserción incorrecta!</strong> No se ha podido añadir el producto.
        </div>';//echo "<h1> Inserción incorrecta. </h1>";
        else echo'<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
        <strong>Éxito!</strong> Producto añadido correctamente.
        </div>';//echo "<h1> Producto añadido correctamente! </h1>";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}