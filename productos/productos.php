<html>
    <head>
    <title>Productos</title>
        <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <h1> Nuestros productos </h1>

    <!-- Galeria de productos -->
    <?php
        $table = "producto";
        $query = "SELECT * FROM $table";
        #Ejecuta la sentencia
        $rows=ejecutarSQL($query,NULL);

        #Hacer una lista de cadenas con todos los atributos
        $lista = array();
        $cadena = '';

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
            #Estoy muy cerca, pero salen fallos raros :´( 
            
            $atributos = explode( '#', $fila );

            /*
            $produc_id = $atributos[0];
            $nombre = $atributos[1];
            $precio = $atributos[2];
            $descripcion = $atributos[3];
            $img = $atributos[4];
            */
            print "<div> ";
            print "<a target='_blank' href='/img/black2logoAthenaStyle.png'>";
            print "<img src='/img/black2logoAthenaStyle.png' alt='Forest' width='600' height='400' >
            </a>";
            print "<div>";
            print ($atributos[1]);
            print "<br>";
            print ($atributos[2]. " €");
            print "</div> 
            </div> ";

        }

        #Separar la cadena en otro array

    ?>
    <!--
    <div class="gallery">
  <a target="_blank" href="img_5terre.jpg">
    <img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>
-->

</body>
</html>