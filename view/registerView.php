<section class="auth-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="auth-card">
                    <h1 class="auth-title text-center mb-4">Inscription</h1>

                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="index.php?action=register" method="POST">
                        <div class="mb-3">
                            <label for="pseudo" class="form-label">Pseudo</label>
                            <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                    </form>

                    <p class="text-center mt-4">
                        Déjà un compte ? <a href="index.php?action=login">Connectez-vous</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
