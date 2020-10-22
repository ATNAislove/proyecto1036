<?php
function registrar($table)
{
    global $pdo;
    $datos = $_REQUEST;
    if (count($_REQUEST) < 2) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO     $table (username, passwd)
                        VALUES (?,?)";
                       
    echo $query;
    try { 
        $a=array($_REQUEST['username'], $_REQUEST['passwd']   );
        print_r ($a);
        $consult = $pdo->prepare($query);
        $a=$consult->execute(array($_REQUEST['username'], $_REQUEST['passwd']));
        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else echo "<h1> Usuario registrado! </h1>";

        //$_SESSION["usuario"] = "normal";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}
?>