<!-- tabla con codigo, nombre,  precio y boton para borrar-->
<!DOCTYPE html>
<html>
  <head>
  <title>Cesta de la compra</title>
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
    <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
    <link href="/css/mobile.css" rel="stylesheet" type="text/css">
  </head>
  <body>

  <h1 style="text-align:center"> Cesta de la compra </h1>
  <div id="caja" class="caja_flotante">
    <form action="?action=comprar" method="GET">
      <br>
      <br>
      
      <ons-list id="compra" class="list list--noborder" style="text-align:center">
      
      </ons-list>
      <br>
      <div style="text-align:center">
      <input type="submit" name ="action" value="comprar" class="button" onclick="vaciarCesta()"></input>
      <input id="items" hidden name="productes" value=""></input>
      <input type="button" value="vaciar cesta" class="button" onclick="vaciarCesta()">
      </div>
      <br><br>
      
    </form>

  </div>

  <!-- 
 <ons-list>
       <ons-list-item><span class="miItem">BLUE</span> <ons-button class="elimina">X</ons-button></ons-list-item>
      <ons-list-item><span class="miItem">RED</span> <ons-button class="elimina">X</ons-button></ons-list-item>
    </ons-list>

    <ons-button modifier="large">Comprar</ons-button>

  -->

<script src="/imports/funcionesCesta.js"></script>
  </body>
</html>