<?php
try{
    $pdo=new PDO('mysql:host=localhost; dbname=db_storeUpdate','root','');

}
catch(Exception $e){
die("erreur de connexion au base de données!".$e->getMessage());
}
$pdo->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>