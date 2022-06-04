
<?php
    if (isset($_GET['valider'])){
        if($_GET['psw'] != $_GET['cpsw'])
           header('location:inscription.php?err=1&nom='.$_GET['nom']
                                            .'&prenom='.$_GET['prenom']
                                            .'&email='.$_GET['email']
                                            .'&datenaissance='.$_GET['datenaissance']
                                            .'&address='.$_GET['address']
                                            .'&city='.$_GET['city']
                                            .'&phone='.$_GET['phone']
                                            .'&phone='.$_GET['cin']
                                            );
        else{
            include('connexion.php');
            $req=$pdo->prepare('select count(*) existe
                                from sellers_acount
                                where email=?  ;');
            $req->execute(array($_GET['email']));
            $resultat=$req->fetch();
            if($resultat['existe']==1  )
                header('location:inscription.php?err=2&nom='.$_GET['nom']
                                                .'&prenom='.$_GET['prenom']
                                                .'&datenaissance='.$_GET['datenaissance']
                                                .'&address='.$_GET['address']
                                                .'&city='.$_GET['city']
                                                .'&phone='.$_GET['phone']
                                                .'&email='.$_GET['email']);

            else{
            $req2=$pdo->prepare('select count(*) existe
                                from sellers_acount
                                where email=? and psw=? ;');
            $req2->execute(array($_GET['email'],$_GET['psw']));
            $resultat=$req2->fetch();
            if($resultat['existe']==1)
                header('location:inscription.php?err=3&nom='.$_GET['nom']
                                                    .'&prenom='.$_GET['prenom']
                                                    .'&email='.$_GET['email']);
            else{
                $req3=$pdo->prepare('insert into sellers_acount(nom,prenom,datenaissance,cin,phone,photo,address,city,cin_photo,email,psw) values(?,?,?,?,?,?,?,?,?,?,?);');
                $req3->execute(array($_GET['nom'],
                                    $_GET['prenom'],
                                    $_GET['datenaissance'],
                                    $_GET['cin'],
                                    $_GET['phone'],
                                    $_GET['photo'],
                                    $_GET['address'],
                                    $_GET['city'],
                                    $_GET['cin_photo'],
                                    $_GET['email'],
                                    $_GET['psw']));
                header('location:connect.php?err=6');
            }
        }
        }
        }
?>
