<?php
/* ejecutar SQL  */

/* query y valor pueden ser nulos, o sea no pasarse como parรกmetros */
function ejecutarSQL($query,$valor) {

	global $pdo;
	
	try{
		$consult = $pdo->prepare($query);
		$a=$consult->execute($valor); 
	}
    catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        return NULL;
    }
    return $a;
						  
}


function ejecutarQuery($query){
    global $pdo;
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    if (is_array($rows)) {/* Ejecutar query*/
        return $rows;
}
}
?>