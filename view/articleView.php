<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <article>
                <!-- Titre -->
                <h1 class="mb-4"><?= htmlspecialchars($article['title']) ?></h1>

                <!-- Infos (destination et date) -->
                <p class="text-muted mb-4">
                    <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($article['destination']) ?> | 
                    <i class="fas fa-calendar"></i> <?= date('d/m/Y à H:i', strtotime($article['created_at'])) ?>
                </p>

                <!-- Boutons admin (uniquement si admin connecté) -->
                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1): ?>
                    <div class="mb-3">
                        <a href="index.php?action=editArticle&id=<?= $article['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <a href="index.php?action=deleteArticle&id=<?= $article['id'] ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                            <i class="fas fa-trash"></i> Supprimer
                        </a>
                    </div>
                <?php endif; ?>

                <hr>

                <!-- Image de l'article -->
                <?php if (!empty($article['image_url'])): ?>
                    <div class="mb-4">
                        <img src="<?= htmlspecialchars($article['image_url']) ?>" 
                             alt="<?= htmlspecialchars($article['title']) ?>" 
                             class="img-fluid rounded">
                    </div>
                <?php endif; ?>

                <!-- Contenu de l'article (HTML de TinyMCE) -->
                <div class="article-content">
                    <?= $article['content'] ?>
                </div>

                <hr class="my-5">

                <!-- Bouton retour -->
                <a href="index.php?action=<?= strtolower($article['destination']) ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour aux articles
                </a>

            </article>

        </div>
    </div>
</div>