<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h2 class="mb-4">Créer un nouvel article</h2>
            
            <p class="alert alert-info">Article pour la destination : <strong><?= htmlspecialchars($destination) ?></strong></p>

            <form method="POST" action="index.php?action=createArticle&destination=<?= htmlspecialchars($destination) ?>" enctype="multipart/form-data">

                <!-- Champ caché destination -->
                <input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">

                <!-- Titre -->
                <div class="mb-3">
                    <label for="title" class="form-label">Titre de l'article :</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <?php if(isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endif; ?>

               <!-- Image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Image de couverture (optionnel) :</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/png,image/gif,image/webp">
                    <small class="text-muted">Formats acceptés : JPG, PNG, GIF, WEBP (max 5 Mo)</small>
                </div>

                <!-- Contenu -->
                <div class="mb-3">
                    <label for="content" class="form-label">Contenu :</label>
                    <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
                </div>

                <!-- Boutons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Publier l'article</button>
                    <a href="index.php?action=<?= strtolower($destination) ?>" class="btn btn-secondary">Annuler</a>
                </div>

            </form>
        
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
                    content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; }',
                    setup: function(editor) {
                        editor.on('change', function() {
                            tinymce.triggerSave();
                        });
                    }
                });

                // Synchroniser TinyMCE avant soumission du formulaire
                document.querySelector('form').addEventListener('submit', function() {
                    tinymce.triggerSave();
                });
            </script>

        </div>
    </div>
</div>
