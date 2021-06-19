<?php
include('database.php');
$username = htmlspecialchars(strtolower($_POST['username']));
$password = md5($_POST['password']);
$interro = $con -> prepare('SELECT * FROM user WHERE username = ? AND password = ?');
$interro -> execute(array($username,$password));
$verif = $interro -> fetch();
if($verif)
{
session_start();
$_SESSION['username'] = $username;
echo 'yes';
}
else
{
echo '<span style="color:red;font-weight:bold">Les données sont incorrectes, veuillez ressayer</span>';
}

?>