<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
  <link href="/css/mobile.css" rel="stylesheet" type="text/css">
</head>
<body>
  
<ons-navigator id="appNavigator" swipeable swipe-target-width="80px">
  <ons-page>
    <ons-splitter id="appSplitter">
      <ons-splitter-content page="tabbar.html"></ons-splitter-content>
    </ons-splitter>
  </ons-page>
</ons-navigator>



<template id="tabbar.html">
  <ons-page id="tabbar-page">
    <ons-toolbar>
      <div class="center"><img src='img/blacklogoAthenaStyle.png' style='width:80px;height:45px;'></img></div>
    </ons-toolbar>

    <ons-tabbar swipeable id="appTabbar" position="auto"> 
      <ons-tab label="Productos" icon="ion-home" page="page1.html" onclick="vaciarLista()" active></ons-tab>
      <ons-tab label="Cesta" icon="ion-edit" page="page2.html" onclick="cesta()"></ons-tab>

    </ons-tabbar>

  </ons-page>
</template>

<template id="page1.html">
  <ons-page id="page1">
  <input class="text-input" list="prendas" name="buscador" id="buscador" placeholder="Buscador" onchange=mostrarEnPantalla()></input>
  <datalist id="prendas"></datalist> 
   <ons-toolbar>
    <div class="left">
      <ons-toolbar-button onclick="prev()">
        <ons-icon icon="md-chevron-left"></ons-icon>
      </ons-toolbar-button>
    </div>
    <div class="center">Productos</div>
    <div class="right">
      <ons-toolbar-button onclick="next()">
        <ons-icon icon="md-chevron-right"></ons-icon>
      </ons-toolbar-button>
    </div>
    </ons-toolbar>
    <ons-carousel swipeable overscrollable auto-scroll id="carr">
    </ons-carousel>
  </ons-page>
</template>

<template id="page2.html">
  <ons-page id="page2">
    <ons-toolbar>
      <div class="center">Cesta</div>
    </ons-toolbar>
   
    <div id="caja" class="caja_flotante">
    <br>
      <br>
    <!--<form action="?action=comprar" method="GET">-->
      
      
      <ons-list id="compra" class="list list--noborder" style="text-align:center">
      
      </ons-list>
      <br>
      <div style="text-align:center">
      <input type="submit" name ="action" value="comprar" class="button" onclick="comprar()"></input>
      <input id="items" hidden name="productes" value=""></input>
      <input type="button" value="vaciar cesta" class="button" onclick="vaciarCesta()">
      </div>
      <br><br>
      
    <!--</form>-->

  </div>
  </ons-page>

</template>
<ons-alert-dialog id="dialog-1">
  <div class="alert-dialog-title">Alerta!</div>
  <div class="alert-dialog-content">
    Ha ocurrido un error!
  </div>
  <div class="alert-dialog-footer">
    <ons-alert-dialog-button onclick="hideAlertDialog()">Aceptar</ons-alert-dialog-button>
  </div>
</ons-alert-dialog>
  
<script>
  
  /* Funciones para mover el carrusel */
  var prev = function() {
    var carousel = document.getElementById('carr');
    carousel.prev();
  };

  var next = function() {
    var carousel = document.getElementById('carr');
    carousel.next();
  };
 

</script>
<script src="/imports/funcionesMobile.js"></script>
<script src="/imports/funcionesMobileCesta.js"></script>
</body>
</html>
