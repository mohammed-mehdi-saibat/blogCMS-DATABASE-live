<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = (int) $_POST['article_id'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $img_url = $_POST['img_url'];
    $categorie_id = (int) $_POST['categorie_id'];

    if (empty($titre) || empty($contenu) || empty($categorie_id)) {
        die("Please fill in all reaquired fields");
    }

    try {
        $stmt = $pdo->prepare("UPDATE article SET titre = ?, contenu = ?, img_url = ?, categorie_id = ? WHERE article_id = ?");
        $stmt->execute([$titre, $contenu, $img_url, $categorie_id, $id]);

        header("Location: index.php?message=Article updated successfuly");
        exit;
    } catch (PDOException  $e) {
        die("Error updating article: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit;
}
