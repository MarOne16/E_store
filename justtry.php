<?php
include('connexion.php');

        $pl=$_GET['email'];
        $lk="select * from sellers_acount where email= '$pl';";
        $req=$pdo->prepare( $lk);
        $req->execute();
        $status=$req->fetchAll();
        if ($status['id_status'] != 0 && $status['id_status'] != 2 && $status['id_status'] != 3 && $status['id_status'] != 4 ) {
            session_start();
            $_SESSION['email'] = $_GET['email'];
            header('location:Dahsboard.php?');
        } 
    else{
        if ($status['id_status'] == 2) {
            header('location:connect.php?err=4' . '&email=' . $_GET['email']);
        } 
        elseif ($status['id_status']== 3) {
            header('location:connect.php?err=3' . '&email=' . $_GET['email']);
        } 
        elseif ($status['id_status'] == 4) {
            header('location:connect.php?err=5' . '&email=' . $_GET['email']);
        }
        else {
            header('location:connect.php?err=2' . '&email=' . $_GET['email']);}

    }








    $pl=$_GET['email'];
    $lk="select * from sellers_acount where email= '$pl';";
    $req=$pdo->prepare( $lk);
    $req->execute();
    $status=$req->fetchAll();
    if($status['id_status'] = 1){  
        header('location:Dahsboard.php');
    }
    if($status['id_status'] != 1){
        header('location:connect.php?id_status='.$status['id_status'] .'&email='.$_GET['email']);
    }
?>