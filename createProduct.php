
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Admin Dashboard Panel</title>
    <style type="text/css" >
        .no-des{
            display: none;
        }
    </style>
</head>

<body>
    <div class="body">
    <?php
include('navbar.php');
include('sidebar_seller.php');
include('connexion.php');
//$errors = $_GET['errors']?? null;
session_start();

if(isset($_GET['email'])){
    $_SESSION['email']=$_GET['email'];
    $lk = "select * from sellers_acount WHERE email=? ";
    $req = $pdo->prepare($lk);
    $req->execute(array( $_SESSION['email']));
    $status = $req->fetch();

    // $result=array_shift($status);
    $idseler =$status[0];
}
    ?>

    <section class="dashboard createProduct">

        <div class="dash-content">
            <div class="overview">
                
                <div class="container">
                <h3 class="CategoriesTitle">
                    create product
                </h3>
                   <form action="actioncreateproduct.php" method="post" enctype="multipart/form-data" >
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden >
                        <input type="text" name="idseller" value="<?php echo $idseler; ?>" hidden >
                   <div class="form">
                            <input type="file" class="form-control1" name="image" value="<?php if (isset($_GET['image'])) echo $_GET['image']; ?>" required>
                        </div>
                        <div class="form">
                            <input type="text" class="form-control" name="nom" value="<?php if (isset($_GET['nom'])) echo $_GET['nom']; ?>" placeholder="product name" >
                        </div>
                        <div class="form">
                            <textarea  class="form-control" name="description" cols="6" rows="5" value="<?php if (isset($_GET['description'])) echo $_GET['description']; ?>" placeholder="description" ></textarea>
                        </div>

                        <div class="form">
                            <select name="color" id="" >
                            <option value="" disabled="" selected="" class="form-control" >choose a color </option>
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
                            <select name="category" id="category" class="form-control" onchange="subcategory(this)">
                            <option value="" disabled="" selected="" >choose a category </option>
                                <option value="electronics" name="electronics">electronics</option>
                                <option value="clothing" name="clothing">clothing</option>
                                <option value="accesicorise" name="accessorize">accesicorise</option>
                            </select>
                        </div>
                        <div class="form "  >
                            <select name="subcategory" id="subcategory"  class="no-des" >
                            <option value="" disabled="" selected="" >SubCategory </option>
                                <option value="electronics" name="electronics">phones</option>
                                <option value="clothing" name="clothing">laptop</option>
                                <option value="accesicorise" name="accessorize">desktop</option>
                                <option value="accesicorise" name="accessorize">kitchen electronics</option>
                            </select>
                            <select name="size" id="">
                                <option name="S" value="S">S</option>
                                <option name="M" value="M">M</option>
                                <option name="L" value="L">L</option>
                                <option name="XL" value="XL">XL</option>
                                <option name="2XL" value="2XL">2XL</option>
                                <option name="3XL" value="3XL">3XL</option>
                            </select>
                        </div>
                        <div class="form">
                            <input type="text" class="form-control" name="quantity" value="<?php if (isset($_GET['quantity'])) echo $_GET['quantity']; ?>" placeholder="quantity" >
                        </div>
                        <div class="form">
                            <input type="text" class="form-control" name="price" value="<?php if (isset($_GET['price'])) echo $_GET['price']; ?>" placeholder="price" >
                        </div>
               

                        <div class="btn_col">
                            <button type="submit" class="btn valider" name="create">create</button>
                        </div>

                       </form> 
                        <div> 
                    <?php
                    if(isset($_GET['err'])){
                        if($_GET['err']==1){
                            echo '<h5 style="color:green;" >product has been created</h5>';
                        }
                        else{
                            echo '<h5 style="color:red;" >product was not inserted</h5>';
                        }
                    }
          
                    ?>
                    </div>
                </div>

            </div>
    </section>
    </div>
    <script src="script.js"></script>
    <script>
        function subcategory(answer){
            console.log(answer.value);
            if(answer.value= 'electronics'){
                document.getElementById('subcategory').classList.remove('no-des');
            }
         
        else{
                 document.getElementById('subcategory').classList.add('no-des');}
  
        };
    
         </script>

</body>

</html>