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

                <hr class="my-5">

                <!-- SECTION COMMENTAIRES -->
                <section class="comments-section">
                    <h3 class="mb-4">Commentaires (<?= count($comments) ?>)</h3>

                    <!-- Liste des commentaires -->
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <strong><?= htmlspecialchars($comment['pseudo']) ?></strong>
                                            <small class="text-muted ms-2">
                                                <?= date('d/m/Y à H:i', strtotime($comment['created_at'])) ?>
                                            </small>
                                        </div>
                                        
                                        <!-- Bouton supprimer (admin OU auteur du commentaire) -->
                                        <?php if (isset($_SESSION['user_id']) && 
                                                ($_SESSION['user_id'] == 1 || $_SESSION['user_id'] == $comment['author_id'])): ?>
                                            <a href="index.php?action=deleteComment&id=<?= $comment['id'] ?>&article_id=<?= $article['id'] ?>" 
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Supprimer ce commentaire ?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <p class="mt-2 mb-0"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">Aucun commentaire pour le moment. Soyez le premier à commenter !</p>
                    <?php endif; ?>

                    <!-- Formulaire d'ajout de commentaire -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <h4 class="mb-3">Ajouter un commentaire</h4>
                                <form method="POST" action="index.php?action=addComment">
                                    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                    
                                    <div class="mb-3">
                                        <textarea class="form-control" name="content" rows="4" 
                                                placeholder="Votre commentaire..." required></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-comment"></i> Publier le commentaire
                                    </button>
                                </form>
                            <?php else: ?>
                                <p class="text-center mb-0">
                                    <a href="index.php?action=login">Connectez-vous</a> pour laisser un commentaire
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <hr class="my-5">
                <!-- Bouton retour -->
                <a href="index.php?action=<?= strtolower($article['destination']) ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour aux articles
                </a>

            </article>

        </div>
    </div>
</div>