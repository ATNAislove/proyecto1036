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
        $query = "SELECT     * FROM       $table ";

        $rows=ejecutarSQL($query,NULL);
        if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
            print '<table id="compra"><thead>';

            foreach ( array_keys($rows[0])as $key) {
                echo "<th>", $key,"</th>";

            }
            print "</thead>";
            foreach ($rows as $row) {

                print "<tr>";
                foreach ($row as $key => $val) {
                    echo "<td>", $val, "</td>";
                }
                print "</tr>";
            }
            print "</table>";
            $hola = '';
            foreach ($row as $key => $val) {
               $hola .= $val."#";
            }
            #print($hola);
            $prueba = explode( "#", $hola );
            $id = $prueba[1];
            print($id);


        }
        break;
    
    default:
        $data["error"] = "Accion No permitida";
}
if ($central <> "") include(dirname(__FILE__).$central);
include(dirname(__FILE__)."/partials/footer.php");
?>