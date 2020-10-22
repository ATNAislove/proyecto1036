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
            print "<div class='gallery'> ";
            print "<a target='_blank' href='/img/perchero.jpg'>";
            print "<img src='/img/perchero.jpg' alt='Forest' width='600' height='400' >
            </a>";
            
            print "<div class='middle'>
            <div class='text'>";
            print $atributos[3];
            print"</div>
          </div>";
          
            print "<div class='desc'>";
            print ($atributos[1]);
            print "<br>";
            print ($atributos[2]. " €");
            print "</div> <br> 
            <button type='button' class='button' onclick='alert('Compra realizada')'>Añadir a la cesta</button>
            </div> <br>";

        }
    ?>

</body>
</html>
