<?php
session_start();
include('database.php');
$ref_payement = $_GET['idpaye'];
$ref_client = $_GET['idclient'];

 $modif_status = $con -> prepare('UPDATE client SET status = "he" WHERE id = ?');
 $modif_status -> execute(array($ref_client));
//$nb_modifs = $con->exec('UPDATE chambre SET id_client = $_SESSION["idclient"] WHERE id_payement = $_SESSION["ref_payement"] ');

//$chambre = $con -> prepare('UPDATE chambre SET id_client = ? WHERE id_payement = ?');
//$chambre -> execute(array($idclient, $ref_payement));

 $modif_paye = $con -> prepare('UPDATE payement SET paye = "yes" WHERE id = ?');
 $modif_paye -> execute(array($ref_payement));
		 
header('Location: ec_paye.php');


?>