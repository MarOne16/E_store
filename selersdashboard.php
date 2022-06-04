<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$errors = [];

    $title ="";
    $Description="";
    $price ="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $Description = $_POST['Description'];
    $price = $_POST['price'];
    $date = date('y-m-d h:i:s');


    if (!$title) {
        $errors[] = 'Product title  is required ';
    }
    if (!$price) {
        $errors[] = 'Product price  is required ';
    }
    if (!is_dir('images')) {
        mkdir('images');
    }
    if (empty($errors)) {
        $image = $_FILES['image'] ?? null;
        $imagepath = '';
        if ($image && $image['tmp_name'] ) {
            $imagepath = 'images/' . randomString(8) . '/' . $image['name'];
            mkdir(dirname($imagepath));
            move_uploaded_file($image['tmp_name'], $imagepath);
        }


        $statement = $pdo->prepare("insert into products (title,image,Description,price,create_date)
                VALUES (:title,:image ,:Description,:price,:date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', '');
        $statement->bindValue(':Description', $Description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);
        $statement->execute();
        header('location:index.php');
    }

}
function randomString($n){
    $characters='0123456789abcdefghiJklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ';
    $str='';
    for($i=0;$i<$n;$i++){
        $index=rand(0,strlen($characters)-1);
        $str .=$characters[$index];
    }
}
?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin Dashboard Panel</title> 
</head>
<body>
<?php

include('connexion.php');

session_start();
if(isset($_SESSION['email'])){
    echo"bienvenu ".$_SESSION['email'];
}
else{
    header('location:connect.php?err=2');
}
?>
<?php
$req=$pdo->prepare('select count(id_seller) from sellers_acount;');
$req->execute();
$totalSelerse=$req->fetch();
$test=array_shift( $totalSelerse );

?>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name"></span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">my products</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">home</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">create product</span>
                </a></li>


            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
<?php 
        $pl=$_GET['email'];
        $lk="select id_status from sellers_acount WHERE email= '$pl' ";
        $req=$pdo->prepare( $lk);
        $req->execute();
        $status=$req->fetch();
    
    // $result=array_shift($status);
    $result=(int)$status[0];
    
    $err = "";

switch ($result) {
    case 1:
        $err = 2;
        break;
    case 2:
        $err = 3;
        break;
    case 3:
        $err = 4;
        break;
    case 4:
        $err = 5;
        break;
    case 5:
        $err = 6;
        break;
}

?>
             <h1> Create new product</h1>
    <?php if (!empty($errors)) :  ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error) : ?>
                <div><?php echo $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="mb-3">
            <label>Product Image</label>
            <br>
            <input type="file" name="image"  >
        </div>
        <div class="mb-3">
            <label>Product Title</label>
            <input type="text" class="form-control"  name="title" value="<?php echo $title; ?>" >
        </div>
        <div class="mb-3">
            <label>short Description</label>
            <input type="text" class="form-control"  name="title" value="<?php echo $title; ?>" >
        </div>

        <div class="mb-3">
            <label>Product Description</label>
            <textarea class="form-control" name="Description" value="<?php echo $Description; ?>"  ></textarea>
        </div>
        <div class="mb-3">
            <label> Product price</label>
            <input type="number" step=".01" class="form-control" name="price"  value="<?php echo $price; ?>"  >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>