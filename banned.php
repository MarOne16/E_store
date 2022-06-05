<?php
require_once('connexion.php');
$id = $_GET['id_seller']?? null;

if(!$id){
    header('location:sellers.php');
}


$statment = $pdo->prepare("update sellers_acount 
        set id_status = 5 where id_seller = $id   ;");
$statment->execute();
header('location:sellers.php');

?>
