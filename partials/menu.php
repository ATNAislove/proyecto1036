<nav>
      <ul>
        <li><a href="./portal.php?action=home"><img src="/img/white3logoAthenaStyle.png" width="60" height="25"/></a></li>
        <li><a href="?action=nosotros">¿Quines somos?</a></li>
        <li><a href="?action=productos">Productos</a></li>
        

        <?php 		
        if (!isset($_SESSION['username'])){
                echo '<li style="float:right"><a href="?action=entrar">Entrar</a></li>';
                echo '<li style="float:right"><a href="?action=registro">Registrarme</a></li>';
        }
        else{
           if($_SESSION['tipo'] == 'admin'){
                echo '<li><a href="?action=registrar_producto">Registrar Producto</a></li>';
           }elseif ($_SESSION['tipo'] == 'normal'){
                echo '<li style="float:right"><a href="?action=cesta"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-basket2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
                <path fill-rule="evenodd" d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
              </svg></a></li>';
           }
           echo '<li style="float:right"><a href="?action=salir">Salir</a></li>';
        }
       ?>


        <!--
        <li class="dropdown">
          <a href="news.asp" class="dropbtn">Camisetas</a>
          <div class="dropdown-content">
            <a href="#">Camisetas de manga larga</a>
            <a href="#">Camisetas de manga corta</a>
          </div>
        </li>
        <li><a href="contact.asp">Pantalones</a></li>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Vestidos</a>
          <div class="dropdown-content">
            <a href="#">Vestidos Largos</a>
            <a href="#">Vestidos Midi</a>
            <a href="#">Vestidos Cortos</a>
          </div>
        </li>


        <li style="float:right"><a href="?action=entrar">Entrar</a></li>
        <li style="float:right"><a href="?action=cesta"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-basket2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
          <path fill-rule="evenodd" d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
        </svg></a></li>
      </ul>
      -->
</nav>