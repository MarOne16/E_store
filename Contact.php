<!DOCTYPE html>
<html lang="en">
<head>
<?php include('Links.php'); ?>
<link rel="stylesheet" href="Style/login.css">
<link rel="stylesheet" href="Style/Contact.css">
    <title>Estore - Contact Page</title>
</head>
<body>
<?php
    include('navbar.php');
?>
<div class="container">
    <div class="contactBox">
        <div class="part1">
            <h3>Get in Touch</h3>
            <p>If you any question or a comment contact us at anytime</p>
        </div>
        <div class="part2">
        <form action="actionInscription.php" class="form" method="GET" name="inscript"  >
            <div class="form">
                <input type="text" class="form-control" name="nom" value="<?php if (isset ($_GET['nom'])) echo $_GET['nom'];?>" placeholder="Your Name">
            </div>
            <div class="form">
                <input type="text"  class="form-control" name="prenom" value="<?php if (isset ($_GET['prenom']))echo $_GET['prenom'];?>" placeholder="Your last name">
            </div>
            <div class="form">
                <input type="mail" class="form-control" name="login" value="<?php if (isset ($_GET['login']))echo $_GET['login'];?>" placeholder="Your email">
            </div>
            <div class="btn_col">
            <button type="submit" class="btn valider" name="valider">Send</button>
            </div>
        </table>
        </form>
        </div>
    </div>
</div>
</body>
</html>