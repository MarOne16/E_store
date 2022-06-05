
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/login.css">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Admin Dashboard Panel</title>
    <style>


    </style>
</head>

<body>
    <?php

include('connexion.php');
//$errors = $_GET['errors']?? null;

    $id = $_POST['id'];
    $req = "SELECT * from products WHERE id_product=? ";
    $req = $pdo->prepare($req);
    $req->execute(array( $_GET['id']));
    $product = $req->fetch();
$size=$product['size'];
$color=$product['color'];
    //$idseler =$status[0];
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
                <li><a href="Dahsboard.php>
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <li><a href=" products.php">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">products</span>
                    </a></li>
                <li><a href="sellers.php">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">sellers</span>
                    </a></li>


            </ul>

            <ul class="logout-mode">
                <li><a href="logout.php">
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
                    <span class="text">create product </span>
                </div>
                <div class="container mt-5">
                    <form action="updateproduct.php" method="post" enctype="multipart/form-data" >
                        <div class="form1">
                            <img src="<?php echo $product['image']; ?>" />
                        </div>
                        <div class="form">
                            <input type="text" class="form-control" name="nom" value="<?php  echo $product['nom']; ?>" placeholder="product name" >
                        </div>
                        <div class="form">
                            <input type="text" class="form-control" name="description" value="<?php  echo $product['description']; ?>" placeholder="description">
                        </div>

                        <div class="form">
                            <?php

                               if($product['color']!= " ") {
                                   echo '<h6 style="display:inline;" >you shoosed '.$color.' the color<h6>';
                            }
                            ?>
                            <select name="color" id="">
                                <option value="black" name="black" style="background-color:black ;">black</option>
                                <option value="white" name="white" style="background-color: white;">white</option>
                                <option value="green" name="green" style="background-color: green;">green</option>
                                <option value="pinck" name="pinck" style="background-color:pink ;">pinck</option>
                                <option value="pinck" name="yellow" style="background-color:yellow ;">yellow</option>
                                <option value="red" name="red" style="background-color:red;">red</option>
                                <option value="grey" name="grey" style="background-color:grey ;">grey</option>
                            </select>
                        </div>
                        <div class="form">
                            <select name="category" id="">
                                <option value="electronics" name="electronics">electronics</option>
                                <option value="clothing" name="clothing">clothing</option>
                                <option value="accesicorise" name="accessorize">accesicorise</option>
                            </select>
                        </div>

                        <?php
                        if($product['category']== 'clothing' && $product['size']!= " " ){
                           echo '<h6>  .$size.<h6>
                            <div class="form">
                                <select name="size" id="">
                                    <option name="S" value="S">S</option>
                                    <option name="M" value="M">M</option>
                                    <option name="L" value="L">L</option>
                                    <option name="XL" value="XL">XL</option>
                                    <option name="2XL" value="2XL">2XL</option>
                                    <option name="3XL" value="3XL">3XL</option>
                                </select>
                            </div>';
                    }
                        ?>
                        <div class="form">
                            <input type="text" class="form-control" name="quantity" value="<?php  echo $product['quantity']; ?>" placeholder="quantity" >
                        </div>
                        <div class="form">
                            <input type="text" class="form-control" name="price" value="<?php  echo $product['price']; ?>" placeholder="price" >
                        </div>
               

                        <div class="btn_col">
                            <button type="submit" class="btn valider" name="create">create</button>
                        </div>

                    </form>
                    <?php
                    if(isset($_GET['err'])){
                        if($_GET['err']==1){
                            echo "<h1>product has been created</h1>";
                        }
                        else{
                            echo "<h1>product was not inserted</h1>";
                        }
                    }
          
                    ?>
                </div>

            </div>
    </section>
    <script src="script.js"></script>

</body>

</html>