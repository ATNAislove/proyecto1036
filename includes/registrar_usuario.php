<?php
function registrar($table){
    //recoje los datos del formulario de registro y crea un usuario con esos datos
    //puede fallar si se introduce un nombre de usuario ya existente, pues son unicos, no se pueden repetir
    global $pdo;
    $datos = $_REQUEST;
    if (count($_REQUEST) < 4) { //si hay algun campo vacio en el formulario no hace nada
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO     $table (username, email, passwd, tipo)
                        VALUES (?,?,?,?)"; //instruccion SQL
                       
    //echo $query;
    try { 
        $tipo='normal';
        $a=array($_REQUEST['username'],$_REQUEST['email'], $_REQUEST['passwd'],$tipo); //array con los datos
        //print_r ($a);
        $consult = $pdo->prepare($query);
        $a=$consult->execute($a);
        if (1>$a) echo "<h1> Inserción incorrecta. Vuelve a intentarlo con un nombre distinto. </h1>";
        else echo "<h1> Usuario registrado! </h1>";
        
        $_SESSION['username']=$_REQUEST['username'];
        $_SESSION["tipo"] = "normal";
    
    } catch (PDOException $e) {
        echo ($e->getMessage());
    }
}
?>