<?php
function add_compra(){
    //añade los productos de la cesta a la tabla compra
    global $pdo;
    $table = "compra";
    
    $query = "INSERT INTO     $table (produc_id, username, fecha_compra, cantidad)
                        VALUES (?,?,?,?)";
                       
    //echo $query;
    try { 
        //si no existe cesta da error
        if(!isset($_GET['productes'])){
            $data["error"] = "No existe cesta";
            return 0;
        }

        $vec = explode('-', $_GET['productes']);

        if(sizeof($vec)==0){
            $data["error"] = "La cesta esta vacia";
            return 0;
        }
        //si la cesta está vacía da error
        if($vec[0] == ""){
            $data["error"] = "La cesta esta vacia";
            return 0;
        }else{
            $cantidad = 1;
            $fecha=date( 'Y-m-d');
            foreach($vec as $k){
                $a=array(intval($k),$_SESSION['username'], $fecha, $cantidad);
                //print_r ($a);
                $consult = $pdo->prepare($query);
                $a=$consult->execute($a);
                if (1>$a) echo'<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                <strong>Inserción incorrecta!</strong> No se ha podido procesar la compra.
              </div>';//echo "<h1> Inserción incorrecta. No se ha podido procesar la compra. </h1>";
                else echo'<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                <strong>Éxito!</strong> Compra procesada correctamente.
              </div>';//echo "<h1> Compra procesada! </h1>";
            }
        }    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}
?>