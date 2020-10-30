<?php

function addCesta() {
    //añade un producto a la cesta
    if(!isset($_GET['product'])){
        print('No se ha podido añadir');
        return;
    }
    //si no existe una cesta la crea
    if(!isset($_SESSION['cesta'])){
        $_SESSION['cesta'] = '';
    }
    //si es el primer elemento de la cesta lo añade
    //si no es el primero, le pone un separador y lo añade
    if (0 == strlen($_SESSION['cesta'])){
        $_SESSION['cesta'] .=  $_GET['product'];
    }else{
        $_SESSION['cesta'] .= '#' . $_GET['product'];
    }
}
function borrarDeLaCesta(){
    //borra un elemento concreto de la cesta
    $pos = $_REQUEST['pos'];
    $vec = explode('#', $_SESSION["cesta"]);
    //print_r($vec,$pos);
    array_splice($vec, intval($pos), 1);
    $_SESSION['cesta'] = implode('#', $vec);
}

function contarCesta(){
    //cuenta los elementos que tiene la cesta
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
function vaciarCesta(){
    //vacia la cesta
    $_SESSION['cesta'] = '';
}

?>