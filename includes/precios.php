<?php
include(dirname(__FILE__)."/conector_BD.php");

global $pdo;
header('Content-type: application/json');
$min = $_GET['min'];
$max = $_GET['max'];

$result = $pdo->prepare("SELECT produc_id, nombre, precio, img FROM producto
                        WHERE precio BETWEEN $min AND $max");
$result->execute();
$datos = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($datos);

?>