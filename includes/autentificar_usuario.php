<?php

function autentificar_usuario()
{
    global $pdo;

    /*
    buscar usuario y passwd en DB y comparar con $_POST
    según el resultado fijar la variable de sesion of mostar error

    $_SESSION["usuario"] = role
    */
    $datos = $_REQUEST;
    if (count($_REQUEST) < 2) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }

    #recogemos el usuario y la contraseña
    $usuario = $_REQUEST['username'];
    $contrasenya = $_REQUEST['passwd'];
    $usuario_comillas = "'" .$usuario ."'"; 

    global $pdo;
    $table = 'usuario';
    $query = "SELECT username, passwd FROM  $table WHERE username = $usuario_comillas;";
	$atributos = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    $cadena = '';
    foreach ($atributos as $row) {

        foreach ($row as $key => $val) {
            $cadena.= $val."#";
        }
   
    }
    
    $atributos = explode( '#', $cadena );
    $aux = array_pop($atributos);

    
    if(strcmp($usuario, $atributos[0])==0 && strcmp($contrasenya,$atributos[1])==0){
        print "Bienvenido";
        
        return;
    }

    print "No se ha podido encontrar el usuario";

}

?>