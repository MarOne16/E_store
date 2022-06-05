<?php


if(isset($_POST['create'])){
    
    
    $idseller=$_POST['idseller'];
    $email= $_POST['email'];



    $category = $_POST['category'];
    $nom = $_POST['nom'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('y-m-d h:i:s');

    $errors = [];


    /*if (!$nom) {
        $errors[] = 'Product title  is required ';
    }
    if (!$price) {
        $errors[] = 'Product price  is required ';
    }*/
    if (!is_dir('images')) {
        mkdir('images');
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
        $image = $_FILES['image'] ?? null;
        $imagepath = '';
        if ($image && $image['tmp_name']) {
            $imagepath = 'images/' . randomString(8) . '/' . $image['name'];
            mkdir(dirname($imagepath));
            move_uploaded_file($image['tmp_name'], $imagepath);}
        
        if (empty($errors)) {
            include('connexion.php');
            $statement = $pdo->prepare("insert into products (id_seller,category,nom,image,color,size,quantity,description,price,create_date)
                    VALUES (:idseller,:category,:nom,:image,:color,:size,:quantity ,:description,:price,:date)");
            $statement->bindValue(':idseller', $idseller);
            $statement->bindValue(':category', $category);
            $statement->bindValue(':nom', $nom);
            $statement->bindValue(':color', $color);
            $statement->bindValue(':size', $size);
            $statement->bindValue(':image', $imagepath);
            $statement->bindValue(':quantity', $quantity);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':date', $date);
            $statement->execute();
            header('location:createProduct.php?err=1&email='.$email );
        }
        else{
            header('location:createProduct.php?err=2&email='.$email);
        }
    }


?>