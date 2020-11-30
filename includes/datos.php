<?php
include(dirname(__FILE__)."/conector_BD.php");
global $pdo;
header('Content-type: application/json');
$result = $pdo->prepare("SELECT produc_id, nombre, precio, img FROM producto");
$result->execute();
$datos = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($datos);
?>