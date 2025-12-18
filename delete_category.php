<?php
require_once 'config/database.php';


if (!isset($_GET['id'])) {
    die('Category ID is missing.');
}

$categoryId = (int) $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM categorie WHERE categorie_id = ?");
$stmt->execute([$categoryId]);
$category = $stmt->fetch();

if (!$category) {
    die('Category not found.');
}


$deleteStmt = $pdo->prepare("DELETE FROM categorie WHERE categorie_id = ?");
$deleteStmt->execute([$categoryId]);


header('Location: categories.php');
exit;
