<?php
session_start();
include('database.php');
$client = $con -> prepare('INSERT INTO client(nom, prenom, sexe) VALUES(?,?,?)');	
$client -> execute (array($_SESSION['nom'], $_SESSION['prenom'], $_SESSION['sexe']));

$req = $con ->prepare('UPDATE chambre SET id_client = :idclient WHERE id_payement = :idpayement');
$req->execute(array(
'idclient' => $_SESSION['idclient'],
'idpayement' => $_SESSION['ref_payement']));

//$nb_modifs = $con->exec('UPDATE chambre SET id_client = $_SESSION["idclient"] WHERE id_payement = $_SESSION["ref_payement"] ');

//$chambre = $con -> prepare('UPDATE chambre SET id_client = ? WHERE id_payement = ?');
//$chambre -> execute(array($idclient, $ref_payement));

 $modif_paye = $con -> prepare('UPDATE payement SET paye = "ec" WHERE id = ?');
 $modif_paye -> execute(array($_SESSION['ref_payement']));
		 
header('Location: index.html');
?>