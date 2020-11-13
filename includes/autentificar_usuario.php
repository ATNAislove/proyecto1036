<?php

function autentificar_usuario(){
    //busca en la tabla de usuario si hay un usuario con esos datos
    //si hay una coincidencia inicia la sesion
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
    $query = "SELECT username, passwd, tipo FROM  $table WHERE username = $usuario_comillas;";
	$atributos = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    $cadena = '';
    foreach ($atributos as $row) {

        foreach ($row as $key => $val) {
            $cadena.= $val."#";
        }
    }
    
    $atributos = explode( '#', $cadena );
    $aux = array_pop($atributos);
    if($usuario == null || $usuario == ''){
        $data["error"] = "No has introducido usuario";
        print "No has introducido usuario";
        return;
    }

    else if($contrasenya == null || $contrasenya == ''){
        $data["error"] = "No has introducido contraseña";
        print "No has introducido contraseña";
        return;
    }
    
    else if(count($atributos) == 0){
        print "El usuario no está";
        return;
    }


    else if(strcmp($usuario, $atributos[0])==0 && strcmp($contrasenya,$atributos[1])==0){
        print "Bienvenido";
        $_SESSION['username']=$usuario;
        $_SESSION['tipo']=$atributos[2];
        return;
    }


    
    

    //Comprobar que el usuario no existe
    print "El usuario no está";



}
?>