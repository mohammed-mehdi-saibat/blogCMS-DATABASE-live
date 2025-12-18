<?php
require_once 'config/database.php';
require_once 'functions.php';

if (!isset($_GET['id'])) {
    die("Article ID missing");
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM article WHERE article_id =?");
$stmt->execute([$id]);
$article = $stmt->fetch();

if (!$article) {
    die("Article not found!");
}

$catStmt = $pdo->prepare("SELECT categorie_nom FROM categorie WHERE categorie_id= ?");
$catStmt->execute([$article['categorie_id']]);
$category = $catStmt->fetch();
$article['categorie_nom'] = $category['categorie_nom'] ?? 'Unknown';

$comStmt = $pdo->prepare("SELECT * FROM commentaire WHERE article_id = ? AND commentaire_status = 'approuve' ORDER BY commentaire_date ASC");
$comStmt->execute([$id]);
$comments = $comStmt->fetchAll();


$articleCount = $pdo->query("SELECT COUNT(*) FROM article")->fetchColumn();
$userCount    = $pdo->query("SELECT COUNT(*) FROM utilisateur")->fetchColumn();
$categoryCount = $pdo->query("SELECT COUNT(*) FROM categorie")->fetchColumn();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= htmlspecialchars($article['titre']) ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div id="colorlib-page">

        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>

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
            <section class="ftco-section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-8 ftco-animate">

                            <h2 class="mb-3"><?= htmlspecialchars($article['titre']) ?></h2>

                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i><?= date("F d, Y", strtotime($article['date_de_creation'])) ?></span>
                                <span><i class="icon-folder-o mr-2"></i><?= htmlspecialchars($article['categorie_nom']) ?></span>
                            </p>

                            <img src="<?= htmlspecialchars($article['img_url']) ?>" class="img-fluid mb-4 rounded" alt="">

                            <p><?= nl2br(htmlspecialchars($article['contenu'])) ?></p>

                            <div class="mt-4 mb-5">
                                <a href="edit_article.php?id=<?= $article['article_id'] ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="icon-pencil"></i> Edit
                                </a>
                                <a href="delete_article.php?id=<?= $article['article_id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="icon-trash"></i> Delete
                                </a>
                            </div>

                            <h4 class="mb-4">Comments (<?= count($comments) ?>)</h4>

                            <?php foreach ($comments as $comment): ?>
                                <div class="comment-body mb-4 p-3 bg-light rounded">
                                    <strong><?= htmlspecialchars($comment['auteur_nom']) ?></strong>
                                    <div class="text-muted small mb-2">
                                        <?= date("F d, Y H:i", strtotime($comment['commentaire_date'])) ?>
                                    </div>
                                    <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
                                    <a href="edit_comment.php?id=<?= $comment['commentaire_id'] ?>"
                                        class="btn btn-outline-primary btn-sm ml-2">
                                        <i class="icon-pencil"></i> Edit
                                    </a>
                                    <a href="delete_comment.php?id=<?= $comment['commentaire_id'] ?>&article_id=<?= $article['article_id'] ?>"
                                        class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Delete this comment?')">
                                        <i class="icon-trash"></i> Delete
                                    </a>
                                </div>
                            <?php endforeach; ?>

                            <?php if (!$comments): ?>
                                <p>No comments yet.</p>
                            <?php endif; ?>

                            <h4 class="mb-4">Add a Comment</h4>

                            <form action="add_comment.php" method="POST">
                                <input type="hidden" name="article_id" value="<?= $article['article_id'] ?>">

                                <div class="form-group">
                                    <input type="text" name="auteur_nom" class="form-control" placeholder="Your name" required>
                                </div>

                                <div class="form-group">
                                    <textarea name="contenu" class="form-control" rows="4" placeholder="Your comment" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">Submit Comment</button>
                            </form>

                        </div>

                        <div class="col-md-4"></div>

                    </div>
                </div>
            </section>
        </div>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>