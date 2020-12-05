<?php
include(dirname(__FILE__)."/conector_BD.php");

global $pdo;
header('Content-type: application/json');
$min = 0;
$max = 9999;

//Datos crudos desde request
//$json = file_get_contents('php://input');
//Conversión a objeto PHP
//$data = json_decode($json);

if(isset($_REQUEST['min'])) $min = intval($_REQUEST['min']);
if(isset($_REQUEST['max'])) $max = intval($_REQUEST['max']);


$result = $pdo->prepare("SELECT produc_id, nombre, precio, img FROM producto
                        WHERE precio BETWEEN $min AND $max");
$result->execute();
$datos = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($datos);

?>