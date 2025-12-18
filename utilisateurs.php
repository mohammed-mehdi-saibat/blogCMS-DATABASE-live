<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM utilisateur ORDER BY date_de_creation DESC");
$users = $stmt->fetchAll();

$articleCount = $pdo->query("SELECT COUNT(*) FROM article")->fetchColumn();
$userCount    = $pdo->query("SELECT COUNT(*) FROM utilisateur")->fetchColumn();
$categoryCount = $pdo->query("SELECT COUNT(*) FROM categorie")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Utilisateurs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .user-card {
            background: #fff;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
        }

        .user-card h2 {
            font-weight: 600;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            border-bottom: 1px solid #dee2e6;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 500;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        .badge-role {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            background: #6c63ff;
            color: #fff;
        }

        .user-count {
            font-size: 14px;
            color: #777;
        }


        .table td:last-child,
        .table th:last-child {
            white-space: nowrap;
            width: 150px;
        }

        .table-responsive {
            overflow: visible;
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
                    <li class="colorlib-active"><a href="utilisateurs.php">Utilisateurs (<?= $userCount ?>)</a></li>
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
                        <div class="col-xl-9 py-5 px-md-5">

                            <div class="user-card">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h2>Utilisateurs</h2>
                                    <span class="user-count">
                                        <?= count($users) ?> utilisateurs
                                    </span>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Rôle</th>
                                                <th>Créé le</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $user) { ?>
                                                <tr>
                                                    <td><?= $user['id'] ?></td>
                                                    <td><?= htmlspecialchars($user['nom']) ?></td>
                                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                                    <td>
                                                        <span class="badge-role">
                                                            <?= htmlspecialchars($user['utilisateur_role']) ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?= date("d M Y", strtotime($user['date_de_creation'])) ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
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