<?php
$email=$_GET['email'];
$psw=$_GET['psw'];
    include('connexion.php');
    $req = $pdo->prepare("select count(*) existe from sellers_acount  where email= '$email' and psw='$psw' ;");
    $req->execute();
    $resultat = $req->fetch();
    if ($resultat['existe'] == 0) {
        header('location:connect.php?err=1&email=' . $_GET['email']);
    } else {
        $pl = $_GET['email'];
        $lk = "select id_status from sellers_acount WHERE email= '$pl' ";
        $req = $pdo->prepare($lk);
        $req->execute();
        $status = $req->fetch();

        // $result=array_shift($status);
        $result = (int)$status[0];


        if ($result == 2) {
            session_start();
            $_SESSION['email'] = $_GET['email'];
            header('location:selersdashboard.php');
        } else {

                header('location:connect.php?result='.$result.'&email=' . $_GET['email']);
        }
    }

    

   


  
?>
