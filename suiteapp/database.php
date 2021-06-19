<?php
try 
{
$con = new PDO('mysql:host=localhost;dbname=suiteapp','root','');
}
catch (Exception $e)
{
die ('Erreur technique'.$e->getMessage());
}

?>