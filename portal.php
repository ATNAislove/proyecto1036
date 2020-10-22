<head>
<link href="/css/style.css" rel="stylesheet" type="text/css">
</head>
<?php
include(dirname(__FILE__)."/includes/registrar_usuario.php");
include(dirname(__FILE__)."/includes/ejecutarSQL.php");
$central = "";
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");
include(dirname(__FILE__)."/includes/conector_BD.php");

include(dirname(__FILE__)."/includes/table2html.php");

if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";
$table="producto";
switch ($action) {

    case "home":
        $central = "/paginaPrincipal.php";
        break;

    case "registro":
        $central = "/partials/registro.php";
        break;
    case "registrar":
        $table = "usuario";
        registrar($table);
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

    case "listar":
        $rows=table2html($table);
        break;
    
    default:
        $data["error"] = "Accion No permitida";
}
if ($central <> "") include(dirname(__FILE__).$central);
include(dirname(__FILE__)."/partials/footer.php");
?>