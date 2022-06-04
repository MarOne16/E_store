<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil</title>
</head>
<body>
    <h1>hello</h1>
    <div>   
  <?php



session_start();
if(isset($_SESSION['email'])){
    echo"bienvenu ".$_SESSION['email'];
}
else{
    header('location:connect.php?err=2');
}
?>
</div>

<div style="padding: 10px;" >
     <button style="background-color: blue ; " ><a href="ajouter_Maison" style="color:bisque"  >Ajouter Maison</a></button>
</div>
    <br>
    <div>
        <button style="background-color: blue ; " ><a href="logout.php" style="color:white;" >se déconnecter</a>
</button>
    </div>
</body>
</html>