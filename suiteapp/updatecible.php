<?php
include('database.php');
$montant = htmlspecialchars($_POST['montant']);
$ref_payement = htmlspecialchars($_POST['ref_payement']);


// $client = $con -> prepare('INSERT INTO client(nom, prenom, sexe) VALUES(?,?,?)');	
// $client -> execute (array($nom, $prenom, $sexe));

// $modif_paye = $con -> prepare('UPDATE payement SET paye = "yes" WHERE id = ?');
// $modif_paye -> execute(array($ref_payement));

//session_start();
//$_SESSION['montant'] = $montant;
//$_SESSION['ref_payement'] = $ref_payement;				 


//$chambre -> CloseCursor();


// header('Location: reqclient.php');

$req = $con ->prepare('UPDATE payement SET montant = :montant WHERE id = :idpayement');
$req->execute(array(
'montant' => $montant,
'idpayement' => $ref_payement));

header('Location: pchambre.php');
?>