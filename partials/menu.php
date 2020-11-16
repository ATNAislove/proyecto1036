<nav>
      <ul class="navli"><!-- Barra de navegacion-->
        <li class="navli"><a class="navli" href="./portal.php?action=home"><img src="/img/white3logoAthenaStyle.png" width="60" height="25"/></a></li>
        <li class="navli"><a class="navli" href="?action=nosotros">¿Quines somos?</a></li>
        <li class="navli"><a class="navli" href="?action=productos">Productos</a></li>
        

        <?php 		
        include_once(dirname(__FILE__)."/../includes/metodos_cesta.php");
        //si el usuario no ha iniciado sesion
        if (!isset($_SESSION['username'])){
                echo '<li class="navli" style="float:right"><a class="navli" href="?action=entrar">Entrar</a></li>';
                echo '<li class="navli" style="float:right"><a class="navli" href="?action=registro">Registrarme</a></li>';
        }
        else{//si el usuario existe
          //si el usuario es de tipo admin puede ver los pedidos y registrar productos
           if($_SESSION['tipo'] == 'admin'){
                echo '<li class="navli"><a class="navli" href="?action=listar_pedidos">Listar pedidos</a></li>';
                echo '<li class="navli"><a class="navli" href="?action=registrar_producto">Registrar Producto</a></li>';
                //si el usuario es de tipo normal puede ver su cesta de la compra
           }elseif ($_SESSION['tipo'] == 'normal'){
             if(!isset($_SESSION['cestaCompra'])){
              $_SESSION['cestaCompra'] = '0';
             }
                echo '<li class="navli" style="float:right"><a class="navli" href="?action=cesta"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-basket2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
                <path fill-rule="evenodd" d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
              </svg> Cesta: ('; echo contarCesta(); echo'  articulos)</a></li>';
           }
           echo '<li class="navli" style="float:right"><a class="navli" href="?action=salir">Salir</a></li>';
        }
        ?>
       <ul>
</nav>