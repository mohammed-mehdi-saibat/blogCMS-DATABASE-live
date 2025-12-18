<?php
require_once 'config/database.php';

$comment_id = (int) ($_GET['id'] ?? 0);
$article_id = (int) ($_GET['article_id'] ?? 0);

if ($comment_id && $article_id) {
    $stmt = $pdo->prepare("DELETE FROM commentaire WHERE commentaire_id = ?");
    $stmt->execute([$comment_id]);
}

header("Location: read_more.php?id=" . $article_id);
exit;
