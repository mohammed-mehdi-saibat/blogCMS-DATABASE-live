<?php
require_once 'config/database.php';

$catStmt = $pdo->query("SELECT * FROM categorie");
$categories = $catStmt->fetchAll();

$articleCount = $pdo->query("SELECT COUNT(*) FROM article")->fetchColumn();
$userCount    = $pdo->query("SELECT COUNT(*) FROM utilisateur")->fetchColumn();
$categoryCount = $pdo->query("SELECT COUNT(*) FROM categorie")->fetchColumn();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Andrea - Free Bootstrap 4 Template by Colorlib</title>
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

    <style>
        .category-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s;
        }

        .category-card:hover {
            transform: translateY(-3px);
        }

        .category-card h4 {
            margin-bottom: 10px;
            font-weight: 600;
        }

        .category-card .btn {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>

        <aside id="colorlib-aside" role="complementary" class="js-fullheight">
            <nav id="colorlib-main-menu">
                <ul>
                    <li><a href="index.php">Articles (<?= $articleCount ?>)</a></li>
                    <li><a href="utilisateurs.php">Utilisateurs (<?= $userCount ?>)</a></li>
                    <li class="colorlib-active"><a href="categories.php">Categories (<?= $categoryCount ?>)</a></li>
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
                            <h2 class="mb-4">Categories</h2>

                            <?php if ($categories): ?>
                                <?php foreach ($categories as $category): ?>
                                    <div class="category-card">
                                        <h4><?= htmlspecialchars($category['categorie_nom']) ?></h4>
                                        <p>Category ID: <?= $category['categorie_id'] ?></p>
                                        <a href="delete_category.php?id=<?= $category['categorie_id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="icon-trash"></i> Delete
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No categories yet.</p>
                            <?php endif; ?>

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