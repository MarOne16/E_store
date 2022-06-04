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
    $statment = $pdo->prepare('SELECT * FROM products ORDER BY create_date asc');
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
                    <i class="uil uil-users-alt"></i>
                    <span class="text">all products</span>
                </div>


            <div class="activity">
            <table class="table">
                <?php
                $statment = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
                $statment->execute();
                $products = $statment->fetchAll(PDO::FETCH_ASSOC);
                ?>
    <thead>
      <tr>
        <th scope="col">IMAGE</th>
        <th scope="col">Titel</th>
        <th scope="col">Price</th>
        <th scope="col">Create</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as  $product) : ?>
        <tr>
          <td>
            <img src="<?php echo $product['image'] ?>" class="thumb-image" alt="">
          </td>
          <td><?php echo $product['title']  ?></td>
          <td><?php echo $product['price']  ?></td>
          <td><?php echo $product['create_date']  ?></td>

        </tr>
      <?php endforeach; ?>
    </tbody>
            </div>
        </div>

    </section>

    <script src="script.js"></script>
</body>

</html>