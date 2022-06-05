<?php

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: products.php');
    exit;
}
require_once('connexion.php');

$statement = $pdo->prepare("DELETE FROM products WHERE id_product = :id ");
$statement->bindValue(':id',$id);
$statement->execute();

header('Location: myproducts.php');