<?php
include('database.php');
$nom = htmlspecialchars(strtolower($_POST['nom']));
$prenom = htmlspecialchars(strtolower($_POST['prenom']));
$sexe = htmlspecialchars(strtolower($_POST['sexe']));
$chambre = htmlspecialchars($_POST['chambre']);


// $client = $con -> prepare('INSERT INTO client(nom, prenom, sexe) VALUES(?,?,?)');	
// $client -> execute (array($nom, $prenom, $sexe));

// $modif_paye = $con -> prepare('UPDATE payement SET paye = "yes" WHERE id = ?');
$paye="no";
// $modif_paye -> execute(array($ref_payement));
 $dispo = $con -> prepare('SELECT * FROM chambre AS t1, payement  AS t2
				  WHERE t1.id_payement = t2.id AND t2.paye = ? AND t1.numero=?');
$dispo->execute(array($paye,$chambre));
while($result = $dispo ->fetch()){
$tab_num[0]=$result['numero'];
$tab_ref[0]=$result['id_payement'];
}

 $disp = $con -> prepare('SELECT * FROM chambre AS t1, payement  AS t2
				  WHERE t1.id_payement = t2.id AND t2.paye = ? AND t1.numero=?');
$disp->execute(array($paye,$chambre));
$res = $disp ->fetch();

if($res){
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
$_SESSION['ref_payement'] = $tab_ref[0];
$_SESSION['idclient'] = $idclient;

header('Location: reqclient.php');

}else{
header('Location: occupe.html');
}

?>