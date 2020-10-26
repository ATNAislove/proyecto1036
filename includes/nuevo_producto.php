<?php
function nuevo_producto()
{
    global $pdo;
    $datos = $_REQUEST;
    $table = "producto";
    if (count($_REQUEST) < 4) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO     $table (nombre, precio, descripcion, img)
                        VALUES (?,?,?,?)";
                       
    //echo $query;
    try { 
        $a=array($_REQUEST['nombre_product'],intval($_REQUEST['precio']), $_REQUEST['descripcion'],$_REQUEST['img']);
        //print_r ($a);
        $consult = $pdo->prepare($query);
        $a=$consult->execute($a);
        if (1>$a) echo "<h1> Inserción incorrecta. </h1>";
        else echo "<h1> Producto añadido correctamente! </h1>";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}