<head>
<link href="/css/style.css" rel="stylesheet" type="text/css">
</head>
<?php
session_start();

include(dirname(__FILE__)."/includes/registrar_usuario.php");
include(dirname(__FILE__)."/includes/ejecutarSQL.php");
include(dirname(__FILE__)."/includes/autentificar_usuario.php");
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
        header("location:?action=home");
        break;

    case "inicio_sesion":
        autentificar_usuario();
        header("location:?action=home");
        break;

    case "entrar":
        $central = "/partials/inicio_sesion.php";
        break;

    case "nosotros":
        $central = "/nosotros.php";
    break;

    case "productos":
        $central = "/productos/productos.php";
    break;

    case "listar":
        $rows=table2html($table);
        break;

    case "cesta":
        $central = "/cestaCompra.php";
        break;

    case "add":
        /*Añadir a la cesta*/
        /*Si el usuario no está identificado*/
        if(isset($_SESSION['username']) && $_SESSION['tipo'] == 'normal'){
            /*El objeto puede añadirse a la cesta*/
            print "<p>Cliente registrado</p>";
            print $_REQUEST['client_id'];

            $central = "/cestaCompra.php";
        }else{
            print "<h2>Para añadir a la cesta debes registrarte</h2>";
            $central = "/partials/registro.php";
        }
        //tabla compras
        break;
    case "borrar":
        break;
    case "realizar_compra":
        $central = "<p>Todavía no puedo añadir a la cesta</p>"; //cesta en $_SESSION["cesta"]
        break;

    case "salir":
        session_destroy();
        session_start();
        header("location:?action=home");
    break;
    
    default:
        $data["error"] = "Accion No permitida";
}
if ($central <> "") include(dirname(__FILE__).$central);
include(dirname(__FILE__)."/partials/footer.php");
?>