<!-- tabla con codigo, nombre, cantidad, precio unitario y total y precio total del pedido-->
<!DOCTYPE html>
<html>
  <head>
  <title>Cesta de la compra</title>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <h1> Cesta de la compra </h1>
  <table id = "compra">
      <tr>
          <th>Código de producto</th>
          <th>Borrar</th>

      </tr>
      <!-- Encontrar la forma de coger los datos de la URL de add -->
      <?php

      include_once(dirname(__FILE__)."/includes/metodos_cesta.php");
      if(isset($_SESSION["cesta"])){
        $tareas = explode('#', $_SESSION["cesta"]);
      }else{
        $tareas = Array();
      }

      foreach($tareas as $k => $tarea){
        if (0 < strlen($tarea)){
          $link = '?action=borrar&pos=' . $k;
          echo "<tr>";
          echo "<td>"; echo $tarea; 
          $query = "SELECT nombre FROM producto WHERE produc_id = $tarea";
          $rows = ejecutarQuery($query);

          echo "</td>
          
          <td>";   


          echo "    <a href="; echo $link; echo"  id='borrar' class='button' ><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
          <path fill-rule='evenodd' d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z'/>
        </svg> </a>
      </td>
      </tr>";



        }
       }

       if(contarCesta() == 0){
         echo "<h2> La cesta está vacía </h2>";
       }
      ?>
  </table>
  <div class="botones">
  <?php
  $enlace ="?action=realizar_compra";
  echo "<a href=";echo $enlace;echo"id='aceptar' class='button'>Aceptar</a>";
  //<button type="button" class="button" onclick="alert('Compra realizada')">Aceptar</button>
  ?>
  <button type="button" class="button" onclick="alert('Compra cancelada')">Cancelar</button>
</div>

  </body>
</html>