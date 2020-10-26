<?php

function addCesta() {
    if(!isset($_GET['product'])){
        print('No se ha podido añadir');
        return;
    }
<<<<<<< HEAD
    if(!isset($_SESSION['cesta'])){
        $_SESSION['cesta'] = '';
    }
    if (0 == strlen($_SESSION['cesta']))
=======
    if (0<= strlen($_SESSION['cesta']))
>>>>>>> e7d61230f9bb78f15e50e0f1e6240b5f884cdaa0
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