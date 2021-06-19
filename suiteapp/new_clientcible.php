<?php
include('database.php');
$nom = htmlspecialchars(strtolower($_POST['nom']));
$prenom = htmlspecialchars(strtolower($_POST['prenom']));
$sexe = htmlspecialchars(strtolower($_POST['sexe']));
$ref_payement = htmlspecialchars($_POST['ref_payement']);


// $client = $con -> prepare('INSERT INTO client(nom, prenom, sexe) VALUES(?,?,?)');	
// $client -> execute (array($nom, $prenom, $sexe));

// $modif_paye = $con -> prepare('UPDATE payement SET paye = "yes" WHERE id = ?');
// $modif_paye -> execute(array($ref_payement));

$recup = $con -> query('SELECT MAX(id) AS num_p FROM client');
			$result = $recup ->fetch();
			$idclient = $result['num_p'] + 1;
				 
//$chambre = $con -> prepare('UPDATE chambre SET id_client = ? WHERE id_payement = ?');
//$chambre -> execute(array($idclient, $ref_payement));

//$chambre -> CloseCursor();
session_start();
$_SESSION['nom'] = $nom;
$_SESSION['prenom'] = $prenom;
$_SESSION['sexe'] = $sexe;
$_SESSION['ref_payement'] = $ref_payement;
$_SESSION['idclient'] = $idclient;

header('Location: reqclient.php');


?>