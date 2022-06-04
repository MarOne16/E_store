<!DOCTYPE html>
<html lang="en">
<head>
<?php include('Links.php'); ?>
<link rel="stylesheet" href="./Style/login.css">
    <title>Document</title>
</head>
<body>

<div class="container mt-5">

        <form action="actionInscription.php" class="form" method="GET" name="inscript"  >
            <div class="form">
                <input type="text" class="form-control" name="nom" value="<?php if (isset ($_GET['nom'])) echo $_GET['nom'];?>" placeholder="Your Name"required>
            </div>
            <div class="form">
                <input type="text"  class="form-control" name="prenom" value="<?php if (isset ($_GET['prenom']))echo $_GET['prenom'];?>" placeholder="Your last name"required>
            </div>
            <div class="form">
                <input type="date" class="form-control" name="datenaissance" value="<?php if (isset ($_GET['datenaissance']))echo $_GET['datenaissance'];?>" placeholder="Date of Birth"required>
            </div>
            <div class="form">
                <input type="mail" class="form-control" name="cin" value="<?php if (isset ($_GET['cin']))echo $_GET['cin'];?>" placeholder="CIN">
            </div>
            <div class="form">
                <input  type="tel" class="form-control" name="phone" placeholder=" your phone" value="<?php if (isset ($_GET['phone']))echo $_GET['phone'];?>" required>  
            </div>
            <div class="form1">
                <label for="photo">Your photo  </label>
                <input type="file" class="form-control1" name="photo" value="<?php if (isset ($_GET['photo'])) echo $_GET['photo'];?>"  >
            </div>
            <div class="form">
                <input type="text"  class="form-control" name="address" placeholder="Your address" value="<?php if (isset ($_GET['address']))echo $_GET['address'];?>"required >
            </div>
            <div class="form">
                <input type="text"  class="form-control" name="city" placeholder=" your city" value="<?php if (isset ($_GET['city']))echo $_GET['city'];?>" required>  
            </div>
            <div class="form1">
                <label for="photo">Your id photo </label>
                <input type="file"  class="form-control1" name="cin_photo" value="<?php if (isset ($_GET['cin_photo']))echo $_GET['cin_photo'];?>" required >
            </div>
            <div class="form">
                <input type="mail" class="form-control" name="email" value="<?php if (isset ($_GET['email']))echo $_GET['email'];?>" placeholder="Your email"required>
            </div>
            <div class="form">
                <input type="password"  class="form-control" name="psw" placeholder="Your password"required>
            </div>
            <div class="form">
                <input type="password"  class="form-control" name="cpsw" placeholder="Confirm your password"required>
            </div>
            
            <tr>
                <td colspan="2">
                    <?php
                    if(isset($_GET['err'])){
                        switch($_GET['err']){
                            case 1:
                                echo"<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>mot de passe doit etre identique a confirmer mot de passe!</h5>";
                            break;
                            case 2:echo"<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>veuillez choisir un autre login!</h5>";
                            break;
                            case 3:echo"<h5 class='bg-danger w-50 p-2  text-light mb-4 error'>you are already registered</h5>";
                            break;
                            default:
                            echo "<h5 class='bg-success w-50 p-2  text-light  error'>inscription ressuite </h5><br>
                            <button class='btn btn-success w-50 mb-4'><a class='link-light' href='connect.php' >Se connecter</a></button><br>";
                            break;

                        }
                    }
                    
                    ?>
                </td>
            </tr>
            <div class="btn_col">
            <button type="submit" class="btn valider" name="valider">valider</button>
            <button type="reset" class="btn reset" name="annuler">annuler</button>
            </div>
        </table>
        </form>
</body>
</html>