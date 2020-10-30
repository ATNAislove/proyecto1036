<!-- tabla con codigo, nombre,  precio y boton para borrar-->
<!DOCTYPE html>
<html>
  <head>
  <title>Cesta de la compra</title>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <?php 
  //si la cesta está vacía, te informa
    if(contarCesta()==0){
      echo'<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
        <strong>Aviso!</strong> La cesta está vacía.
      </div>';
    }
  ?>
  <h1> Cesta de la compra </h1>
  <table id = "compra">
      <tr>
          <th>Código de producto</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Borrar</th>

      </tr>
      <?php

      include_once(dirname(__FILE__)."/../includes/metodos_cesta.php");
      //si existe una cesta recoje los datos, si no existe es un array vacío
      if(isset($_SESSION["cesta"])){
        $tareas = explode('#', $_SESSION["cesta"]);
      }else{
        $tareas = Array();
      }
      //para cada elemento de la cesta muestra una linea en la tabla
      //hace una consulta para mostrar todos los datos de cada producto
      foreach($tareas as $k => $tarea){
        if (0 < strlen($tarea)){
          $link = '?action=borrar&pos=' . $k;
          echo "<tr>";
          echo "<td>"; echo $tarea; echo "</td>";
          $query = "SELECT * FROM producto WHERE produc_id = $tarea";
          $rows = ejecutarQuery($query);
          foreach ($rows as $row){
            echo "<td>";
            echo ucwords($row["nombre"]);
            echo "</td>";
            
            echo "<td>";
            echo $row["precio"];
            echo " € </td>";
            
          }

          echo "<td>";   

          echo "    <a href="; echo $link; echo"  id='borrar' class='button' ><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
          <path fill-rule='evenodd' d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z'/>
        </svg> </a>
      </td>
      </tr>";



        }
       }
      ?>
  </table>
  <div class="botones">
  <!-- Si se pulsa aceptar procesa la compra
      si se pulsa vaciar cesta borra los elementos de la cesta-->
  <a href='?action=realizar_compra' id='aceptar' class='button'>Aceptar</a>
  <a href='?action=vaciar_cesta' id='vaciar_cesta' class='button'>Vaciar cesta</a>
</div>
  </body>
</html>