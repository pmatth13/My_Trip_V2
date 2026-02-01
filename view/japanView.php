<!-- TITRE CENTRÉ -->
<section class="country-title py-5 text-center">
    <div class="container">
        <h1 class="display-3 fw-bold">Japon</h1>
    </div>
</section>

<!-- GRANDE IMAGE HERO -->
<section class="country-hero">
    <div class="container">
        <img src="/my_trip_v2/public/photo_japon.png" alt="Japon" class="img-fluid d-block mx-auto rounded hero-image">
    </div>
</section>

<!-- DESCRIPTION -->
<section class="country-description py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="lead">
                    Un jour de canicule à Hanoï, sur un coup de tête, nous avons décidé de fuir la chaleur étouffante et de partir au Japon.<br>
                    Direction Tokyo, première immersion dans une ville fascinante, entre modernité démesurée et traditions bien ancrées.<br>
                    Nous avons ensuite pris la route vers les Alpes japonaises, avec une parenthèse nature à Kamikōchi, au cœur de paysages frais et spectaculaires.<br>
                    Le voyage s'est poursuivi à Kyoto, puis à Nara et Osaka, entre temples paisibles, rues animées et découvertes culinaires.<br>
                    Une escapade improvisée, mais parfaitement équilibrée entre grandes villes, nature et culture japonaise.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Articles du Japon -->
<section class="country-articles py-5">
    <div class="container">
        <h2 class="text-center mb-5">Mes articles sur le Japon :</h2>

        <!-- Bouton admin pour créer un article -->
        <div class="text-center mb-4">
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1): ?>
                <a href="index.php?action=createArticle&destination=Japan" class="btn btn-success">
                    <i class="fas fa-plus"></i> Créer un article
                </a>
            <?php endif; ?>
        </div>

        <?php if(!empty($articles)): ?>
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <!-- Card -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 article-card">
                        <img src="<?= !empty($article['image_url']) ? htmlspecialchars($article['image_url']) : '/my_trip_v2/public/default_cover.png' ?>"
                        class="card-img-top"
                        alt="<?= htmlspecialchars($article['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                            <p class="card-text">
                                <?= substr(strip_tags($article['content']), 0, 150) ?>...
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="index.php?action=article&id=<?= $article['id'] ?>" class="btn btn-primary w-100">Lire la suite</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <p class="text-center text-muted">Aucun article pour le moment sur cette destination.</p>
        <?php endif; ?>
    </div>
</section>