<?php
$central = "/registro.php";
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/paginaPrincipal.php");
include(dirname(__FILE__).$central); 
include(dirname(__FILE__)."/partials/footer.php");
?>