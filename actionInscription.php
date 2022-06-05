<?php
    if (isset($_POST['valider'])){
        $_POST['cinphoto'];
        $_POST['photo'];
        if($_POST['psw'] != $_POST['cpsw'])
           header('location:inscription.php?err=1&nom='.$_POST['nom']
                                            .'&prenom='.$_POST['prenom']
                                            .'&email='.$_POST['email']
                                            .'&datenaissance='.$_POST['datenaissance']
                                            .'&address='.$_POST['address']
                                            .'&city='.$_POST['city']
                                            .'&phone='.$_POST['phone']
                                            .'&phone='.$_POST['cin']
                                            );
        else{
            include('connexion.php');
            $req=$pdo->prepare('select count(*) existe
                                from sellers_acount
                                where email=?  ;');
            $req->execute(array($_POST['email']));
            $resultat=$req->fetch();
            if($resultat['existe']==1  )
                header('location:inscription.php?err=2&nom='.$_POST['nom']
                                                .'&prenom='.$_POST['prenom']
                                                .'&datenaissance='.$_POST['datenaissance']
                                                .'&address='.$_POST['address']
                                                .'&city='.$_POST['city']
                                                .'&phone='.$_POST['phone']
                                                .'&email='.$_POST['email']);

            else{
            $req2=$pdo->prepare('select count(*) existe
                                from sellers_acount
                                where email=? and psw=? ;');
            $req2->execute(array($_POST['email'],$_POST['psw']));
            $resultat=$req2->fetch();
            if($resultat['existe']==1)
                header('location:inscription.php?err=3&nom='.$_POST['nom']
                                                    .'&prenom='.$_POST['prenom']
                                                    .'&email='.$_POST['email']);
            else{
               
                /*function randomString($n){
                    $characters='0123456789abcdefghiJklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ';
                    $str='';
                    for($i=0;$i<$n;$i++){
                        $index=rand(0,strlen($characters)-1);
                        $str .=$characters[$index];
                    }
                    return $str;
                }
                if (!is_dir('images')) {
                    mkdir('images');
                }*/

                
                /*$image = $_FILES['photo'];
                $imagepath = '';          
                if ($image && $image['tmp_name']) {
                    $imagepath = 'images/' . randomString(8) . '/' . $image['name'];
                    mkdir(dirname($imagepath));
                    move_uploaded_file($image['tmp_name'], $imagepath);
                }*/
                /*$cinphoto=$_FILES['cinphoto'];
                $imagepath1 = '';          
                if ($cinphoto && $cinphoto['tmp_name']) {
                    $imagepath1='images/'.randomString(8).'/' . $cinphoto['name'];
                    mkdir(dirname($imagepath1));
                    move_uploaded_file($image['tmp_name'], $imagepath1);
                }*/
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $datenaissance=$_POST['datenaissance'];
                $cin=$_POST['cin'];
                $phone=$_POST['phone'];
                $address=$_POST['address'];
                $city=$_POST['city'];
                $email=$_POST['email'];
                $psw =$_POST['psw'];
                $date= date('y-m-d h:i:s');
        
          
               /* $nomphoto_temp=$_FILES['cinphoto']['tmp_name'];
                $nomphoto     =$_FILES['cinphoto']['name'];
                move_uploaded_file($nomphoto_temp,'images/'.$nomphoto);

                $nomphoto_temp1=$_FILES['photo']['tmp_name'];
                $nomphoto1     =$_FILES['photo']['name'];
                move_uploaded_file($nomphoto_temp1,'images/'.$nomphoto1);*/
                /*$req=$pdo->prepare('insert into sellers_acount (nom,prenom,datenaissance,cin,phone,photo,address,city,cin_photo,email,psw,createdate)values(?,?,?,?,?,?,?,?,?,?,?,?);');
                $req->execute(array($_GET['nom'],$_GET['prenom'],$_GET['datenaissance'],$_GET['cin'],$_GET['phone'],$name_file ,$_GET['address'],$_GET['city'],$nomphoto,$_GET['email'],$_GET['psw'],date('y-m-d h:i:s')));
                header('location:inscription.php?err=1');*/


                if (!is_dir('selerimage')) {
                    mkdir('selerimage');
                }
                function randomString($n)
                {
                    $characters = '0123456789abcdefghiJklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ';
                    $str = '';
                    for ($i = 0; $i < $n; $i++) {
                        $index = rand(0, strlen($characters) - 1);
                        $str .= $characters[$index];
                    
                    }
                    return  $str ;
                }
                $image = $_FILES['photo'] ?? null;
                $imagepath = '';
                if ($image && $image['tmp_name']) {
                    $imagepath = 'selerimage/' . randomString(8) . '/' . $image['name'];
                    mkdir(dirname($imagepath));
                    move_uploaded_file($image['tmp_name'], $imagepath);}
                
                    $image1 = $_FILES['cinphoto'] ?? null;
                    $imagepath1 = '';
                    if ($image1 && $image1['tmp_name']) {
                        $imagepath1 = 'selerimage/' . randomString(8) . '/' . $image1['name'];
                        mkdir(dirname($imagepath1));
                        move_uploaded_file($image['tmp_name'], $imagepath1);}
                include('connexion.php');
                $req3=$pdo->prepare("insert into sellers_acount(nom,prenom,datenaissance,cin,phone,photo,address,city,cin_photo,email,psw,createdate)
                        VALUES (:nom,:prenom ,:datenaissance,:cin,:phone,:photo,:address,:city,:cinphoto,:email,:psw,:date)");
                 $req3->bindValue(':nom', $nom);
                 $req3->bindValue(':prenom', $prenom);
                 $req3->bindValue(':datenaissance', $datenaissance);
                 $req3->bindValue(':cin', $cin);
                 $req3->bindValue(':phone', $phone);
                 $req3->bindValue(':photo', $imagepath);
                 $req3->bindValue(':address', $address);
                 $req3->bindValue(':city', $city);
                 $req3->bindValue(':cinphoto',$imagepath1);
                 $req3->bindValue(':email', $email);
                 $req3->bindValue(':psw', $psw);
                 $req3->bindValue(':date', $date);
                 $req3->execute();
                 header('location:connect.php?err=6');
            }
        }
        }
    }
?>
