<?php
    if(isset($_GET['valider'])){
        include('connexion.php');
        $req = $pdo->prepare("select count(*) existe from admin  where email=? and psw=?;");
        $req->execute(array($_GET['email'],$_GET['psw']));
        $resultat=$req->fetch();
        if($resultat['existe'] == 0){
            header('location:connecAdmin.php?err=1&email='.$_GET['email']);}
            else{
                session_start();
                $_SESSION['email']= $_GET['email'];
                header('location:Dahsboard.php');
            } 
    } 

?>
