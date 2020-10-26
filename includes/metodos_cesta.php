<?php

function addCesta() {
    if(!isset($_GET['product'])){
        print('No se ha podido añadir');
        return;
    }
    if (0<= strlen($_SESSION['cesta']))
        $_SESSION['cesta'] .=  $_GET['product'];
    else
        $_SESSION['cesta'] .= '#' . $_GET['product'];
}
function borrarDeLaCesta(){
    $pos = $_REQUEST['pos'];
    $vec = explode('#', $_SESSION["cesta"]);
    //print_r($vec,$pos);
    array_splice($vec, intval($pos), 1);
    $_SESSION['cesta'] = implode('#', $vec);
}

?>