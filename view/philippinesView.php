<!-- TITRE CENTRÉ -->
<section class="country-title py-5 text-center">
    <div class="container">
        <h1 class="display-3 fw-bold">Philippines</h1>
    </div>
</section>

<!-- GRANDE IMAGE HERO -->
<section class="country-hero">
    <div class="container">
        <img src="/my_trip_v2/public/photo_phillipines.png" alt="Philippines" class="img-fluid d-block mx-auto rounded hero-image">
    </div>
</section>

<!-- DESCRIPTION -->
<section class="country-description py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="lead">
                J’ai passé un mois à voyager aux Philippines, entre mer et montagnes.<br>
                 Mon aventure a commencé par une croisière autour de Coron et d’El Nido, à Palawan, où j’ai découvert des lagons turquoise et des îlots sauvages.<br>
                 J’ai ensuite posé mes valises à Siargao, rythmée par le surf, la nature et une ambiance détendue. Pour finir, j’ai pris de la hauteur dans le nord du pays avec les rizières en terrasses de Banaue, un décor spectaculaire et hors du temps qui a parfaitement conclu ce voyage.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Article de ce PAYS -->
<section class="country-articles py-5">
    <div class="container">
        <h2 class="text-center mb-5">Mes articles sur les Philippines :</h2>

        <!-- Uniquement visible par l'admin pour créer un article -->
        <div class="text-center mb-4">
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1): ?>
                <a href="index.php?action=createArticle&destination=Philippines" class="btn btn-success">
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
                        <img src="<?=  !empty($article['image_url']) ? htmlspecialchars($article['image_url']) : '/my_trip_v2/public/default_cover.png' ?>"
                        class="card-img-top"
                        alt="<?= htmlspecialchars($article['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
            
                            <p class="card-text">
                                <?= substr(strip_tags($article['content']), 0, 150) // strip_tags() supprime les balises HTML de TinyMCE pour un aperçu propre?>...
                            </p>
                            <p class="text-muted small">
                                <?= htmlspecialchars($article['destination']) ?>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="index.php?action=article&id=<?=  $article['id'] ?>" class="btn btn-primary w-100">Lire la suite</a>
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