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
          <th>Código</th>
          <th>Nombre</th>
          <th>Precio unitario</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Borrar</th>
      </tr>
      <!-- Encontrar la forma de coger los datos de la URL de add -->
      <?php
      $tareas = explode('#', $_SESSION["cesta"]);
      foreach($tareas as $k => $tarea){
        if (0 < strlen($tarea)){
          $link = '/todo.php?action=borrar&pos=' . $k;
          echo "<li>".$tarea . "  <button href ='" . $link ."' class='boton'>Hecho</button>"."</li>";
        }
       }
      ?>
      <tr>
          <td></td><td>Camiseta de manga larga con estampado de flores</td><td></td><td>Total</td><td></td><td></td>
      </tr>
  </table>
  <div class="botones">
  <button type="button" class="button" onclick="alert('Compra realizada')">Aceptar</button>
  <button type="button" class="button" onclick="alert('Compra cancelada')">Cancelar</button>
</div>

  </body>
</html>