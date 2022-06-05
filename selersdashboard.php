<?php

?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include('Links.php');
    ?>
    <link rel="stylesheet" href="Style/Dashbord.css">
    <link rel="stylesheet" href="Style/sidebar.css">
    <link rel="stylesheet" href="Style/login.css">
    <!----======== CSS ======== -->

    <title>Admin Dashboard Panel</title> 
</head>
<body>
<?php

include('navbar.php');
include('sidebar_seller.php');
include('connexion.php');
session_start();
if(isset($_SESSION['email'])){
    $_SESSION['email'];
}

?>

    <section class="dashboard dashbordHome">
        <div class="container">
            <div class="overview">
                    <h3 class="CategoriesTitle">Dashboard</h3>
                <?php
                $lk = "select * from sellers_acount WHERE email=? ";
    $req = $pdo->prepare($lk);
    $req->execute(array( $_SESSION['email']));
    $status = $req->fetch();

    // $result=array_shift($status);
    $idseler =$status[0];
    ?>
                        <h1><?=$idseler?></h1>

            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>