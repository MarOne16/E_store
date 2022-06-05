<!DOCTYPE html>
<html lang="en">

<head>
<?php include('Links.php'); ?>
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <title>Estore - Home Page</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/product.css">
</head>
<body>
<?php
    include('navbar.php');
    include('sidebar.php');
?>
<div class="home">
<button class="btn btnScroll" id="btnScroll">Up</button>
<header class="header">
            <!-- Slider main container -->
            <div class="swiper">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide"><img src="image/Macbook4K.jfif" alt=""></div>
                <div class="swiper-slide"><img src="image/tv.png" alt=""></div>
                <div class="swiper-slide"><img src="image/samsung.jfif" alt=""></div>
                ...
              </div>
              <!-- If we need pagination -->
              <div class="swiper-pagination"></div>

             

              <!-- If we need scrollbar -->
              <div class="swiper-scrollbar"></div>
            </div>
    <div class="title-section">
            
        <h1 class="big-title">Estore</h1>
        <a href="afficherArticle.php" class="sing-in"><button class="btn-header btn ">Explore More</button></a>
    </div>
</header>
<div class="container container-slider">
<div class="swiper mySwiper">
      <div class="swiper-wrapper swiper-wrapper-slider">
        <div class="swiper-slide slider slider1">
            <h3 class="small-title">Découvrir,<br>et Explorer</h3>
        </div>
        <div class="swiper-slide slider slider2">
        <h3 class="small-title">Shop<br>by Category</h3>
        </div>
        <div class="swiper-slide slider slider3">
        <h3 class="small-title">Gaming <br>accessories</h3>

        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
</div>
<div class="container">
    

    <h2 class="CategoriesTitle">Explore Popular Categories</h2> 
    <div class="boxs">
        <div class="box box1">Smartphones</div>
        <div class="box box2">Accessories</div>
        <div class="box box3">Wristwatches</div>
        <div class="box box4">Sneakers</div>
        <div class="box box5">Computers</div>
    </div>
</div>
    <?php
        include('connexion.php');
        $req=$pdo->prepare('select * from products;');
        $req->execute();
        $articles=$req->fetchAll();
    ?>
    <div class="container" >
    <h2 class="CategoriesTitle">Latest Articles</h2> 

        <div class="row">
            <?php
            foreach ($articles as $article ) {
            ?>
            <div class="widget">
                <div class="card" style="width: 30 px">
                    <img class="card-img-top" src="<?= $article['image'];?>" alt="card image" style="width: 100%;">
                    <div class="card-body">
                        <h4 class="card-title" ><?= $article['nom']; ?></h4>
                        <p class="card-text" ><?= $article['price']."DH";?></p>
                        <button class="btn btn-article"><a href="productDetail.php" class="" >Détail article</a></button>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>

</div>
    <script src="Javascript/Home.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="Javascript/swiper.js"></script>
</body>
</html>
