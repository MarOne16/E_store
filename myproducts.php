
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->

    <!----===== Iconscout CSS ===== -->
    <?php
    include('Links.php');
    ?>
    <link rel="stylesheet" href="Style/Dashbord.css">
    <link rel="stylesheet" href="Style/sidebar.css">
    <!-- Bootstrap CSS -->

    <title>Admin Dashboard Panel</title> 
    
</head>
<body>
<?php
include('navbar.php');
include('sidebar_seller.php');
include('connexion.php');

session_start();
if(isset($_GET['email'])){
$_SESSION['email']=$_GET['email'];
}


//$errors = $_GET['errors']?? null;

    //$pl = $_GET['email'];
    $lk = "select * from sellers_acount WHERE email=? ";
    $req = $pdo->prepare($lk);
    $req->execute(array( $_SESSION['email']));
    $status = $req->fetch();

    // $result=array_shift($status);
    $idseler =$status[0];

    $statement = $pdo->prepare("SELECT * from products where id_seller = $idseler");
    $statement->execute();
    $products=$statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
<div class="body">
  <div class="container containeroftable">
            <table class="table">
                
      <tr class="headeroftable">
        <td class="detailofproduct titleofproduct">IMAGE</td>
        <td class="detailofproduct titleofproduct">Titel</td>
        <td class="detailofproduct titleofproduct">Price</td>
        <td class="detailofproduct titleofproduct">Create</td>
        <td class="detailofproduct titleofproduct">id seler</td>
        <td colspan="2" class="detailofproduct titleofproduct">Action</td>
      </tr>
      <?php foreach ($products as  $product){ ?>
        <tr class="MyProductRow">
          <td>
            <img  src="<?php echo $product['image'] ?>"  class="pictureofproduct" alt="">
          </td>
          <td class="detailofproduct"><?php echo $product['nom']  ?></td>
          <td class="detailofproduct"><?php echo $product['price']  ?></td>
          <td class="detailofproduct"><?php echo $product['create_date']  ?></td>
          <td class="detailofproduct"><?php echo $product['id_seller']  ?></td>
        <td>
            <a class="btn btn_nav" href="sellerupdate.php?id=<?php echo $product['id_product'] ?>" >Edit</a>
      <td>
            <form method="post" action="sellerdelete.php" style="display: inline-block">
                <input  type="hidden" name="id" value="<?php echo $product['id_product'] ?>"/>
                <button type="submit" class="btn btn_nav">Delete</button>
            </form>
        </td>
        </tr>
      <?php }; ?>
            </div>
        </div>

            </div>
        </div>
    </section>
      </div>
    <script src="script.js"></script>
</body>
</html>