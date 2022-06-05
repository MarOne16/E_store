<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include('Links.php'); ?>
	<link rel="stylesheet" href="Style/login.css">

	<title>Document</title>
</head>
<body>
<?php
    include('navbar.php');
    include('sidebar.php');
?>
<div class="home">
<?php
    if(isset($_POST['searchBtn'])){
        include('connexion.php');
        $search = $_POST['search'];
        $req = $pdo->prepare("SELECT * FROM products WHERE nom LIKE ?");
        $req->execute(["%".$search."%"]);
        $results = $req->fetchAll();
		
        //header("location:search.php?result=".$result);
    }
    ?>
    
<div class="container container-articles" >
        <h2 class="CategoriesTitle Article-title"><?= $search ?></h2>
        <button class="btn btnAdd"><a href="addArticle.php">Add Arcticle</a></button>
        <div class="row">
	<?php
	foreach($results as $result)
		{
			?>
			<div class="widget">
                <div class="card" style="width: 30 px">
                    <img class="card-img-top" src="<?= $result['image'];?>"alt="card image" style="width: 100%;">
                    <div class="card-body">
                        <h4 class="card-title" ><?= $result['nom']; ?></h4>
                        <p class="card-text" ><?= $result['price']."DH";?></p>
                        <button class="btn btn-article"><a href="#" class="" >Détail article</a></button>
                    </div>
                </div>
            </div>
		<?php
	}
	?>
	<script src="../Javascript/Home.js">
    </script>
	</div>
    </div>
	</div>
</body>
</html>