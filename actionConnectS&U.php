<?php
if (isset($_GET['valider'])) {
    include('connexion.php');
    $req = $pdo->prepare("select count(*) existe from sellers_acount  where email=? and psw=?;");
    $req->execute(array($_GET['email'], $_GET['psw']));
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
            header('location:Dahsboard.php');
        } else {
           // $err = "";
           // switch ($result) {
           //     case 1:
           //         $err = 2;
           //         break;
           //     case 3:
           //         $err = 4;
           //         break;
           //     case 4:
           //         $err = 5;
           //         break;
           //     case 5:
           //         $err = 6;
           //         break;
           //     }
                header('location:connect.php?result='.$result.'&email=' . $_GET['email']);
        }
    }
} 
    

                //header('location:connect.php?err='.  $err.'&result='.$result);

               // header('location:connect.php?err=' . $err.'&email=' . $_GET['email']);

               // header('location:justtrycopy.php?email='.$_GET['email']);
          


  
?>
