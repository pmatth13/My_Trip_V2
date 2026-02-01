<!-- TITRE CENTRÉ -->
<section class="country-title py-5 text-center">
    <div class="container">
        <h1 class="display-3 fw-bold">Vietnam</h1>
    </div>
</section>

<!-- GRANDE IMAGE HERO -->
<section class="country-hero">
    <div class="container">
        <img src="/my_trip_v2/public/photo_vietnam.png" alt="Vietnam" class="img-fluid d-block mx-auto rounded hero-image">
    </div>
</section>

<!-- DESCRIPTION -->
<section class="country-description py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="lead">
                    Je suis parti un mois au Vietnam pour un voyage aussi intense qu'inoubliable.<br>
                    Tout a commencé à Hoi An, entre lanternes lumineuses, vieilles maisons et douceur de vivre.<br>
                    J'ai ensuite mis le cap sur la baie d'Ha Long, où j'ai navigué au cœur de paysages brumeux et majestueux.<br>
                    Après une immersion dans l'énergie bouillonnante de Hanoï, j'ai enfourché une moto pour un road trip vers le nord du pays.<br>
                    De Sapa à Cao Bằng, la route m'a fait traverser des montagnes vertigineuses, des rizières à perte de vue et des villages reculés,<br>
                    jusqu'à la spectaculaire montagne percée, point d'orgue de cette aventure hors du commun.

                </p>
            </div>
        </div>
    </div>
</section>

<!-- Articles du Vietnam -->
<section class="country-articles py-5">
    <div class="container">
        <h2 class="text-center mb-5">Mes articles sur le Vietnam :</h2>

        <!-- Bouton admin pour créer un article -->
        <div class="text-center mb-4">
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1): ?>
                <a href="index.php?action=createArticle&destination=Vietnam" class="btn btn-success">
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