<?php

include(dirname(__FILE__)."/includes/pdo_postgres0.php");
$central = "";
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");

if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";
$table="a_cliente";
switch ($action) {

    case "home":
        $central = "/paginaPrincipal.php";
        break;

    case "registro":
        $central = "/registro.php";
        break;

    case "nosotros":
        $central = "/nosotros.php";
    break;

    case "productos":
        $central = "/productos/productos.php";
    break;

    case "cesta":
        $central = "/cestaCompra.php";
        break;
    
    default:
        $data["error"] = "Accion No permitida";
}
if ($central <> "") include(dirname(__FILE__).$central);
include(dirname(__FILE__)."/partials/footer.php");
?>