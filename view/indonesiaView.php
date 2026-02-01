<!-- TITRE CENTRÉ -->
<section class="country-title py-5 text-center">
    <div class="container">
        <h1 class="display-3 fw-bold">Indonésie</h1>
    </div>
</section>

<!-- GRANDE IMAGE HERO -->
<section class="country-hero">
    <div class="container">
        <img src="/my_trip_v2/public/photo_indonesie.png" alt="Indonésie" class="img-fluid d-block mx-auto rounded hero-image">
    </div>
</section>

<!-- DESCRIPTION -->
<section class="country-description py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="lead">
                    Mon voyage en Indonésie a commencé à Bali, où j'ai passé mon niveau 1 de plongée et découvert les fonds marins tropicaux.<br>
                    Je suis ensuite parti à Java pour explorer des paysages volcaniques impressionnants, avec l'ascension du volcan Ijen et du Bromo.<br>
                    Le voyage s'est poursuivi par trois semaines à Sulawesi, rythmées par de nombreuses plongées, notamment à Bunaken, un véritable paradis sous-marin.<br>
                    Pour terminer cette aventure, j'ai rejoint Lombok, entre sessions de surf, détente et moments de repos bien mérités.<br>
                    Un itinéraire varié, entre océans, volcans et îles sauvages, qui résume parfaitement la richesse de l'Indonésie.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Articles de l'Indonésie -->
<section class="country-articles py-5">
    <div class="container">
        <h2 class="text-center mb-5">Mes articles sur l'Indonésie :</h2>

        <!-- Bouton admin pour créer un article -->
        <div class="text-center mb-4">
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1): ?>
                <a href="index.php?action=createArticle&destination=Indonesia" class="btn btn-success">
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