<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h2 class="mb-4">Modifier l'article</h2>
            
            <p class="alert alert-info">Article pour la destination : <strong><?= htmlspecialchars($article['destination']) ?></strong></p>

            <form method="POST" action="index.php?action=editArticle">

                <!-- Champ caché id -->
                <input type="hidden" name="id" value="<?= $article['id'] ?>">
                
                <!-- Champ caché destination -->
                <input type="hidden" name="destination" value="<?= htmlspecialchars($article['destination']) ?>">

                <!-- Titre -->
                <div class="mb-3">
                    <label for="title" class="form-label">Titre de l'article :</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>
                </div>

                <!-- Image URL -->
                <div class="mb-3">
                    <label for="image_url" class="form-label">URL de l'image (optionnel) :</label>
                    <input type="text" class="form-control" id="image_url" name="image_url" value="<?= htmlspecialchars($article['image_url'] ?? '') ?>" placeholder="https://exemple.com/image.jpg">
                </div>

                <!-- Contenu -->
                <div class="mb-3">
                    <label for="content" class="form-label">Contenu :</label>
                    <textarea class="form-control" id="content" name="content" rows="10" required><?= htmlspecialchars($article['content']) ?></textarea>
                </div>

                <!-- Boutons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    <a href="index.php?action=article&id=<?= $article['id'] ?>" class="btn btn-secondary">Annuler</a>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- Script TinyMCE -->
<script src="https://cdn.tiny.cloud/1/4y1zkz09jwd58nxeoj7pkq8wt3iiz4ku1n6fg78wmoj8rhu3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: '#content',
        height: 500,
        menubar: false,
        plugins: [
            'lists', 'link', 'charmap', 'preview', 'searchreplace', 'code', 'fullscreen'
        ],
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link | code preview',
        language: 'fr_FR',
        content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; }'
    });
</script>