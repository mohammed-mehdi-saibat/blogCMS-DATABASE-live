<?php
require_once 'config/database.php';

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM article WHERE article_id = ?");
$stmt->execute([$id]);
$article = $stmt->fetch();

if (!$article) {
    die("Article not found!");
}

$catStmt = $pdo->query("SELECT * FROM categorie");
$categories = $catStmt->fetchAll();

$articleCount = $pdo->query("SELECT COUNT(*) FROM article")->fetchColumn();
$userCount    = $pdo->query("SELECT COUNT(*) FROM utilisateur")->fetchColumn();
$categoryCount = $pdo->query("SELECT COUNT(*) FROM categorie")->fetchColumn();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Article</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
</head>

<body>

    <div id="colorlib-page">
        <aside id="colorlib-aside" role="complementary" class="js-fullheight">
            <nav id="colorlib-main-menu">
                <ul>
                    <li><a href="index.php">Articles (<?= $articleCount ?>)</a></li>
                    <li><a href="utilisateurs.php">Utilisateurs (<?= $userCount ?>)</a></li>
                    <li><a href="categories.php">Categories (<?= $categoryCount ?>)</a></li>
                </ul>
            </nav>
            <h1 id="colorlib-logo" class="mb-4"><a href="index.html" style="background-image: url(images/bg_1.jpg);">Andrea <span>Moore</span></a></h1>
            <div class="mb-4">
                <h3>Subscribe for newsletter</h3>
                <form action="#" class="colorlib-subscribe-form">
                    <div class="form-group d-flex">
                        <div class="icon"><span class="icon-paper-plane"></span></div>
                        <input type="text" class="form-control" placeholder="Enter Email Address Or Name">
                    </div>
                    <div class="form-group d-flex">
                        <div class="icon"><span class="icon-paper-plane"></span></div>
                        <input type="text" class="form-control" placeholder="Enter Password ">
                    </div>
                </form>
            </div>
            <p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://intranet.youcode.ma/profile" target="_blank">Mohammed Mehdi Saibat</a>
            </p>
        </aside>

        <div id="colorlib-main">
            <section class="ftco-section ftco-no-pt ftco-no-pb">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-xl-8 py-5 px-md-5">
                            <h2>Edit Article</h2>
                            <form action="update_article.php" method="post">
                                <input type="hidden" name="article_id" value="<?= $article['article_id'] ?>">

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="titre" class="form-control" value="<?= htmlspecialchars($article['titre']) ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="contenu" class="form-control" rows="6" required><?= htmlspecialchars($article['contenu']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Image URL</label>
                                    <input type="text" name="img_url" class="form-control" value="<?= htmlspecialchars($article['img_url']) ?>">
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="categorie_id" class="form-control" required>
                                        <?php foreach ($categories as $cat) { ?>
                                            <option value="<?= $cat['categorie_id'] ?>" <?php if ($cat['categorie_id'] == $article['categorie_id']) {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                                <?= htmlspecialchars($cat['categorie_nom']) ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Update Article</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>

</html>