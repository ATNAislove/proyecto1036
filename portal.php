<head>
<link href="/css/style.css" rel="stylesheet" type="text/css">
</head>
<?php
/**
 * * Descripción: Proyecto tienda de ropa "Athena Style"
 * *
 * * 
 * *
 * * @author  Anna Serisuelo Meneu & Nieves Cubedo Hurtado
 * * @copyright 2020 Cubsuelo
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 1

 * */
session_start();

include(dirname(__FILE__)."/includes/listar.php");
include(dirname(__FILE__)."/includes/registrar_usuario.php");
include(dirname(__FILE__)."/includes/nuevo_producto.php");
include(dirname(__FILE__)."/includes/add_compra.php");
include(dirname(__FILE__)."/includes/metodos_cesta.php");
include(dirname(__FILE__)."/includes/ejecutarSQL.php");
include(dirname(__FILE__)."/includes/autentificar_usuario.php");
include(dirname(__FILE__)."/includes/metodos.php");

$central = "";
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");
include(dirname(__FILE__)."/includes/conector_BD.php");

include(dirname(__FILE__)."/includes/table2html.php");

//Si no se ha seleccionado una opcion va a la página principal, 
//si se ha seleccionado, lleva a la opción seleccionada
if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";
$table="producto";
switch ($action) {

    case "home":
        //página principal
        $central = "/partials/paginaPrincipal.php";
        break;

    case "registro":
        //formulario de registro
        $central = "/partials/form_registrar_usuario.php";
        break;

    case "registrar":
        //Registrar nuevo usuario con esos datos
        $table = "usuario";
        registrar($table);
        header("location:?action=home");
        break;
    case "entrar":
        //formulario inicio sesion
        $central = "/partials/form_inicio_sesion.php";
        break;
    case "inicio_sesion":
        //iniciar sesion de un usuario con sus propiedades segun su tipo
        autentificar_usuario();
        header("location:?action=home");
        //if donde si hay error devuelva el la pagina de entrar y si no, la principal
        break;

    case "nosotros":
        //información sobre la tienda
        $central = "/partials/nosotros.php";
        break;

    case "productos":
        //productos disponibles para su compra
        $central = "/partials/form_precios.php";
    break;

    case "listar_pedidos":
        //lista con todos los pedidos realizados por los clientes
        $tabla = "compra";
        listar($tabla);
        break;

    case "cesta":
        //cesta de la compra del cliente registrado
        $central = "/partials/cestaCompra.php";
        break;

    case "add":
        /*Añadir a la cesta*/
        /*Si el usuario no está identificado*/
        if(isset($_SESSION['username']) && $_SESSION['tipo'] == 'normal'){
            /*El objeto puede añadirse a la cesta*/
            //print "<p>Cliente registrado</p>";
            //print $_REQUEST['client_id'];
            addCesta();
            header("location:?action=productos");
        }else{
            //si el usuario no está identificado debe iniciar sesion o registrarse
            echo'<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            <strong>Aviso!</strong> Para añadir a la cesta debes iniciar sesion.
          </div>';
            $central = "/partials/form_inicio_sesion.php";
        }
        break;
    /*case "borrar":
        //borra un elemento de la cesta
        borrarDeLaCesta();
        header("location:?action=cesta");
        break;
    */
    case "comprar":
        //añade los elementos de la cesta a la tabla compra, vaciando la cesta
        add_compra();
        //vaciarCesta();
        $central = "/partials/cestaCompra.php";
        break;
    /*case "vaciar_cesta":
        //vacia la cesta
        vaciarCesta();
        header("location:?action=cesta");
        break;
    */
    case "registrar_producto":
        //formulario para añadir un nuevo producto a la tienda
        $central = "/partials/form_registrar_producto.php";
        break;
    case "nuevo_producto":
        //añade un nuevo producto a la tienda
        nuevo_producto();
        $central = "/partials/form_registrar_producto.php";
        break;
    case "upload":
        recoger_imagen();
        $central = "/partials/form_registrar_producto.php";
        break;
    case "salir":
        //el usuario se desconecta, cierra la sesion
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