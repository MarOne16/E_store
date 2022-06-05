<?php
require_once('connexion.php');
$id = $_GET['id_seller']?? null;

if(!$id){
    header('location:Dahsboard.php');
}


$statment = $pdo->prepare("update sellers_acount 
        set id_status = 2 where id_seller = $id   ;");
$statment->execute();
header('location:Dahsboard.php');

?>
