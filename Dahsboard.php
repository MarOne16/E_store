<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .bcontent {
            margin-top: 10px;
        }
    </style>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
</head>

<body>
    <?php

    include('connexion.php');

    session_start();
    if (isset($_SESSION['email'])) {
        
    } else {
        header('location:connect.php');
    }
    ?>
    <?php
    $req1 = $pdo->prepare('select count(id_seller) from sellers_acount;');
    $req1->execute();
    $totalSelerse = $req1->fetch();
    $result1 = array_shift($totalSelerse);

    ?>
    <?php
    $req2 = $pdo->prepare('select count(quantity) from products;');
    $req2->execute();
    $totalproducts = $req2->fetch();
    $result2 = array_shift($totalproducts);

    ?>
    <?php
    $req3 = $pdo->prepare('select count(quantity) from orders;');
    $req3->execute();
    $totalSells = $req3->fetch();
    $result3 = array_shift($totalSells);

    ?>
    <?php
    $statment = $pdo->prepare('SELECT * FROM sellers_acount where id_status = 0 ORDER BY id_seller asc');
    $statment->execute();
    $sellers = $statment->fetchAll(PDO::FETCH_ASSOC);

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
                <li><a href="Dahsboard.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <li><a href="sellers.php">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">sellers</span>
                    </a></li>
                <li><a href="products.php">
                        <i class="uil uil-shopping-cart-alt"></i>
                        <span class="link-name">products</span>
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
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total Likes</span>
                        <span class="number"><?php print($result1); ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Comments</span>
                        <span class="number"><?php print($result2); ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total Share</span>
                        <span class="number"><?php print($result3); ?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">join request</span>
                </div>
                <?php foreach ($sellers as  $seller) : ?>
                    <hr />
                    <div class="card" style="width:80%;">
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <img class="card-img" src="<?php echo $seller['image'] ?>" alt="Suresh Dasari Card">
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <div style="display: block;">
                                        <h5 class="card-title"><?php echo $seller['nom']  ?>&nbsp<?php echo $seller['prenom']  ?> </h5>
                                        <h5 class="card-title"><?php echo $seller['prenom']  ?></h5>
                                    </div>
                                    <h5 class="card-title">cin :<?php echo $seller['cin']  ?></h5>
                                    <p class="card-text">address:<?php echo $seller['address']  ?>&nbsp&nbsp<?php echo $seller['city']  ?></p>
                                    <p class="card-text">email: <?php echo $seller['email']  ?></p>
                                    <p class="card-text">phone: <?php echo $seller['phone']  ?></p>
                                    <div style="display: block;">
                                        <div style="display: inline-block;">
                                                <a name="accepte" href="accept.php ?id_seller=<?php echo $seller['id_seller']  ?>" class="btn btn-primary">accepte</a>
                                                <a name="reject" href="reject.php ?id_seller=<?php echo $seller['id_seller']  ?>" class="btn btn-primary">reject</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </section>

    <script src="script.js"></script>
</body>

</html>