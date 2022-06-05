<?php
if (isset($_GET['valider'])) {
include('connexion.php');
$req = $pdo->prepare("select count(*) existe from admin  where email=? and psw=? ;");
$req->execute(array($_GET['email'],$_GET['psw']));
$resultat=$req->fetch();
if($resultat['existe'] == 0){
    header('location:actionConnectS&U.php?email='.$_GET['email'].'&psw='.$_GET['psw']);}
    else{
        session_start();
        $_SESSION['email']= $_GET['email'];
        header('location:Dahsboard.php');
    } 
} 

