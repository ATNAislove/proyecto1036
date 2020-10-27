<?php
function add_compra()
{
    global $pdo;
    $datos = $_REQUEST;
    $table = "compra";
    if (count($_REQUEST) < 4) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO     $table (produc_id, username, fecha_compra, cantidad)
                        VALUES (?,?,?,?)";
                       
    //echo $query;
    try { 
        if(!isset($_SESSION["cesta"])){
            $data["error"] = "No existe cesta";
            return 0;
        }
        $vec = explode('#', $_SESSION["cesta"]);
    
        if($vec[0] == ""){
            $data["error"] = "La cesta esta vacia";
            return 0;
        }else{
            //$cantidad = 1;
            $fecha=date( "Y-m-d");
            foreach($vec as $k){
                $a=array($k,$_SESSION['username'], $fecha, 1);
                //print_r ($a);
                $consult = $pdo->prepare($query);
                $a=$consult->execute($a);
                if (1>$a) echo "<h1> Inserción incorrecta. No se ha podido procesar la compra. </h1>";
                else echo "<h1> Compra procesada! </h1>";
            }
        }
        
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}
?>