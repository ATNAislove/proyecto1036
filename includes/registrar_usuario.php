<?php
function registrar($table)
{
    global $pdo;
    $datos = $_REQUEST;
    if (count($_REQUEST) < 3) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO     $table (username, email, passwd, tipo)
                        VALUES (?,?,?,?)";
                       
    //echo $query;
    try { 
        $tipo='normal';
        $a=array($_REQUEST['username'],$_REQUEST['email'], $_REQUEST['passwd'],$tipo);
        //print_r ($a);
        $consult = $pdo->prepare($query);
        $a=$consult->execute($a);
        if (1>$a) echo "<h1> Inserción incorrecta. Vuelve a intentarlo con un nombre distinto. </h1>";
        else echo "<h1> Usuario registrado! </h1>";

        //$_SESSION["usuario"] = "normal";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}
?>