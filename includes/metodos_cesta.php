<?php

function addCesta() {
    if(!isset($_GET['product'])){
        print('No se ha podido añadir');
        return;
    }
    if(!isset($_SESSION['cesta'])){
        $_SESSION['cesta'] = '';
    }
    if (0 == strlen($_SESSION['cesta'])){
        $_SESSION['cesta'] .=  $_GET['product'];
    }else{
        $_SESSION['cesta'] .= '#' . $_GET['product'];
    }
}
function borrarDeLaCesta(){
    $pos = $_REQUEST['pos'];
    $vec = explode('#', $_SESSION["cesta"]);
    //print_r($vec,$pos);
    array_splice($vec, intval($pos), 1);
    $_SESSION['cesta'] = implode('#', $vec);
}

function contarCesta(){
    if(!isset($_SESSION["cesta"])){
        return 0;
    }
    $vec = explode('#', $_SESSION["cesta"]);

    if($vec[0] == ""){
        return 0;
    }else{
        return count($vec);
    }

}

?>