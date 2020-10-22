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
?>