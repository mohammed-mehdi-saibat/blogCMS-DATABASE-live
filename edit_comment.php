<?php
require_once 'config/database.php';

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM commentaire WHERE commentaire_id = ?");
$stmt->execute([$id]);
$comment = $stmt->fetch();

if (!$comment) {
    die("Comment not found");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contenu = trim($_POST['contenu']);

    $update = $pdo->prepare("UPDATE commentaire SET contenu = ? WHERE  commentaire_id = ?");
    $update->execute([$contenu, $id]);

    header("Location: read_more.php?id=" . $comment['article_id']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Comment</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container mt-5">
        <h3>Edit Comment</h3>

        <form method="POST">
            <div class="form-group">
                <textarea name="contenu" class="form-control" rows="4" required><?= htmlspecialchars($comment['contenu']) ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Save</button>
            <a href="read_more.php?id=<?= $comment['article_id'] ?>" class="btn btn-secondary btn-sm">Cancel</a>
        </form>
    </div>

</body>

</html>