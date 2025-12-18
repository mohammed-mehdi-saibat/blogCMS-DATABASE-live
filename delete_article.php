<?php
require_once 'config/database.php';

if (!isset($_GET['id'])) {
    die('Article ID missing');
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM article WHERE article_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);


header("Location: index.php");
exit;
