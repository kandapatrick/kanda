<?php
include('database.php');
$numero = htmlspecialchars($_POST['numero']);
$montant = htmlspecialchars($_POST['montant']);
$paye = "no";
$idclient = NULL;
	
$recup = $con -> query('SELECT MAX(id) AS num_p FROM payement');
			$result = $recup ->fetch();
			if($result){
			$idpayement = $result['num_p'] + 1;
			}
			if(!$result){
			$idpayement = 1;
			}
			
$payement = $con -> prepare('INSERT INTO payement(montant, paye) VALUES(?,?)');	
	$payement -> execute (array($montant, $paye));
		
$chambre = $con -> prepare('INSERT INTO chambre(numero, id_payement, id_client) VALUES(?,?,?)');	
	$chambre -> execute (array($numero, $idpayement, $idclient));

header('Location: pchambre.php');
?>