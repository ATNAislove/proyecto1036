<?php
#includes
include_once(dirname(__FILE__)."/../includes/table2html.php");
?>

<html>
    <head>
    <title>Productos</title>
        <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>

    <?php
    $user = '';
    if(isset($_SESSION['username']) && $_SESSION['tipo'] == 'normal'){
        $user = $_SESSION['username'];
    }
 $table = "producto";
 #Ejecuta la sentencia
 $rows=table2html($table);

 #Hacer una lista de cadenas con todos los atributos
 $lista = array();
 $cadena = '';
 #var_dump($rows);

 foreach ($rows as $row) {

 foreach ($row as $key => $val) {
     $cadena.= $val."#";
 }

}
$lista = explode( "##", $cadena );
        #$atributos = array();
        $aux = array_pop($lista);

        #var_dump($lista);
        foreach($lista as $fila){
            
            $atributos = explode( '#', $fila );

    ?>
    <div class='gallery'>
    <a target='_blank' href='/img/perchero.jpg'>
    <img src='/img/perchero.jpg' alt='Forest' width='600' height='400' ></a>

    <div class='desc'> 
    <h2>
        <?php echo ucwords($atributos[1]) ;?>
    <br>
        <?php echo $atributos[2]. " €" ;?>
    </h2>
    <a href="?action=add&client_id=<?php echo $user; ?>&product=<?php echo $atributos[0] ?>"  id="addCesta" class="button" >Añadir a la cesta
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-basket2-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm4-1a1 1 0 0 0-1 1v2a1 1 0 1 0 2 0v-2a1 1 0 0 0-1-1z"/>
</svg>
</a>
    </div>
    </div>

    <br>

        <?php } ?>
    </body>
</html>
