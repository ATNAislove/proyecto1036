<?php
//añade los productos de la cesta a la tabla compra
include(dirname(__FILE__)."/../includes/conector_BD.php");
global $pdo;
header('Content-type: application/json');
$table = "compra";
$query = "INSERT INTO     $table (produc_id, username, fecha_compra, cantidad)
                    VALUES (?,?,?,?)";
$jason = array('resultado' => 'KO');
                    
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
            //pongo el usuario us2 porque en la aplicacion movil no hemos implementado el inicio de sesion
            $a=array(intval($k),'us1', $fecha, $cantidad);
            //print_r ($a);
            $consult = $pdo->prepare($query);
            $a=$consult->execute($a);
            $valor = '';
            if (1>$a) {$valor = 'KO' ;//echo "<h1> Inserción incorrecta. No se ha podido procesar la compra. </h1>";
                break;
            }else $valor = 'OK';//echo "<h1> Compra procesada! </h1>";}
            //$result = JSON.encode(array('resultado' => $valor));
            //$datos = $result->fetchAll(PDO::FETCH_ASSOC);
            //print(array('resultado' => $valor));
            $jason = array('resultado' => $valor);
            
        }
        echo json_encode($jason);
    }    
} catch (Exception $e) {
    echo json_encode(array('resultado' => 'KO'));
}
?>