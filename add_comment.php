<?php

require_once 'config/database.php';

$article_id = (int) $_POST['article_id'];
$auteur_nom = trim($_POST['auteur_nom']);
$contenu = trim($_POST['contenu']);

if ($article_id && $auteur_nom && $contenu) {
    $stmt = $pdo->prepare("INSERT INTO commentaire (article_id, auteur_nom, contenu, commentaire_status, commentaire_date)
    VALUES (?,?,?,'approuve', NOW() )");
    $stmt->execute([$article_id, $auteur_nom, $contenu]);
}

header("Location: read_more.php?id=" . $article_id);
exit;
