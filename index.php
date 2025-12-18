<?php
require_once 'config/database.php';
require_once 'functions.php';
$articles = showArticles($pdo);

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
		.btn-add-article {
			background: #6c63ff;
			color: #fff;
			padding: 10px 20px;
			border-radius: 25px;
			font-weight: 500;
			text-decoration: none;
			transition: background 0.2s, transform 0.2s;
		}

		.btn-add-article:hover {
			background: #5751d1;
			transform: translateY(-2px);
			color: #fff;
		}

		.article-actions .btn {
			margin-right: 10px;
		}
	</style>
</head>

<body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu">
				<ul>
					<li class="colorlib-active"><a href="index.php">Articles (<?= $articleCount ?>)</a></li>
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
			<section class="ftco-section ftco-no-pt ftco-no-pb">
				<div class="container">
					<div class="row d-flex">
						<div class="col-xl-8 py-5 px-md-5">
							<div class="d-flex justify-content-between align-items-center mb-4">
								<h2>Articles</h2>
								<a href="add_article.php" class="btn-add-article">+ Add Article</a>
							</div>

							<div class="row pt-md-4">
								<?php foreach ($articles as $article) { ?>
									<div class="col-md-12">
										<div class="blog-entry ftco-animate d-md-flex">
											<a href="<?= $article['img_url'] ?>" class="img img-2" style="background-image: url('<?= $article['img_url'] ?>');" target="_blank"></a>
											<div class="text text-2 pl-md-4">
												<h3 class="mb-2"><a href="single.html"><?= $article['titre'] ?></a></h3>
												<div class="meta-wrap">
													<p class="meta">
														<span><i class="icon-calendar mr-2"></i><?= date("F d, Y", strtotime($article['date_de_creation'])); ?></span>
														<span><a href="single.html"><i class="icon-folder-o mr-2"></i><?= $article['categorie_nom'] ?></a></span>
														<a href="read_more.php?id=<?= $article['article_id'] ?>"><span><i class="icon-comment2 mr-2"></i><?= $article['comment_count'] ?> <?= $article['comment_count'] == 1 ? "Comment" : "Comments" ?></span></a>
													</p>
												</div>
												<p class="mb-4"><?= $article['contenu'] ?></p>
												<div class="article-actions mt-3 d-flex align-items-center">
													<a href="edit_article.php?id=<?= $article['article_id'] ?>" class="btn btn-sm btn-outline-primary mr-2"><i class="icon-pencil"></i> Edit</a>
													<a href="delete_article.php?id=<?= $article['article_id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this article?')"><i class="icon-trash"></i> Delete</a>
													<a href="read_more.php?id=<?= $article['article_id'] ?>" class="btn-custom ml-auto">Read More <span class="ion-ios-arrow-forward"></span></a>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
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