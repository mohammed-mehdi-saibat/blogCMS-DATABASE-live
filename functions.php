<?php

require_once("config/database.php");

function showArticles($pdo)
{
    $sql = "SELECT * FROM article;";
    $stmt = $pdo->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($articles as &$article) {

        $catId = $article['categorie_id'];
        $catStmt = $pdo->prepare("SELECT categorie_nom FROM categorie WHERE categorie_id = ?");
        $catStmt->execute([$catId]);
        $category = $catStmt->fetch(PDO::FETCH_ASSOC);
        $article['categorie_nom'] = $category['categorie_nom'] ?? 'Unknown';


        $comStmt = $pdo->prepare("SELECT COUNT(*) as comment_count FROM commentaire WHERE article_id = ? AND commentaire_status = 'approuve'");
        $comStmt->execute([$article['article_id']]);
        $count = $comStmt->fetch(PDO::FETCH_ASSOC);
        $article['comment_count'] = $count['comment_count'] ?? 0;
    }

    return $articles;
}


showArticles($pdo);
