<?php
require_once 'config/database.php';
require_once 'functions.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'] ?? '';
    $contenu = $_POST['contenu'] ?? '';
    $categorie_id = $_POST['categorie_id'] ?? '';
    $img_url = $_POST['img_url'] ?? '';
    $utilisateur_id = 1;

    if ($titre && $contenu && $categorie_id && $img_url) {
        $stmt = $pdo->prepare("INSERT INTO article (titre, contenu, categorie_id, img_url, utilisateur_id, date_de_creation) VALUES (?, ?, ?, ?, ?, NOW())");
        if ($stmt->execute([$titre, $contenu, $categorie_id, $img_url, $utilisateur_id])) {
            $message = "Article added successfully!";
        } else {
            $message = "Error adding article.";
        }
    } else {
        $message = "Please fill all fields.";
    }
}


$categories = $pdo->query("SELECT * FROM categorie")->fetchAll();


$articleCount = $pdo->query("SELECT COUNT(*) FROM article")->fetchColumn();
$userCount    = $pdo->query("SELECT COUNT(*) FROM utilisateur")->fetchColumn();
$categoryCount = $pdo->query("SELECT COUNT(*) FROM categorie")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Article - Andrea Blog CMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .form-container {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
        }

        .form-container h2 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-container .btn {
            margin-top: 10px;
        }

        .message {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #e7f3fe;
            border-left: 4px solid #2196F3;
            color: #0b486b;
        }
    </style>
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
            <p class="pfooter">
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://intranet.youcode.ma/profile" target="_blank">Mohammed Mehdi Saibat</a>
            </p>
        </aside>

        <div id="colorlib-main">
            <section class="ftco-section">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-xl-8 py-5 px-md-5">
                            <div class="form-container">
                                <h2>Add New Article</h2>
                                <?php if ($message): ?>
                                    <div class="message"><?= htmlspecialchars($message) ?></div>
                                <?php endif; ?>

                                <form method="POST">
                                    <div class="form-group">
                                        <label for="titre">Titre</label>
                                        <input type="text" name="titre" id="titre" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="contenu">Contenu</label>
                                        <textarea name="contenu" id="contenu" class="form-control" rows="6" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="categorie_id">Categorie</label>
                                        <select name="categorie_id" id="categorie_id" class="form-control" required>
                                            <option value="">Categorie</option>
                                            <?php foreach ($categories as $cat): ?>
                                                <option value="<?= $cat['categorie_id'] ?>"><?= htmlspecialchars($cat['categorie_nom']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="img_url">Image URL</label>
                                        <input type="text" name="img_url" id="img_url" class="form-control" placeholder="https://example.com/image.jpg" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Article</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="js/jquery.min.js">
    </script>
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