<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="/my_trip_v2/public/design/style.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" type="image/svg+xml" href="/my_trip_v2/public/favicon.svg">
    <!-- Google font -->
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <title>My trip | Blog voyage </title>
</head>
<body>

    <!-- HEADER = NAVBAR BOOTSTRAP -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <!-- Partie 1: Logo -->
            <a class="navbar-brand" href="index.php">
                <img src="/my_trip_v2/public/my-trip-logo-transparent.png" alt="My trip" class="navbar-logo img-fluid" style="height: 120px; width: auto;">
            </a>

            <!-- Partie 2 : BTN HAMBURGER (visible sur mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Partie 3: Menu de navigation (caché sur mobile) -->
             <div class="collapse navbar-collapse" id="navbarContent">
                <ul class ="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-btn nav-home" href="index.php">Accueil</a>
                    </li>

                    <!-- Dropdown des destinations -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-btn" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Destinations</a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?action=philippines">Philippines</a></li>
                            <li><a class="dropdown-item" href="index.php?action=vietnam">Vietnam</a></li>
                            <li><a class="dropdown-item" href="index.php?action=japan">Japon</a></li>
                            <li><a class="dropdown-item" href="index.php?action=indonesia">Indonésie</a></li>
                        </ul>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=contact">Contact</a>
                    </li>
                </ul>

            <!-- Partie 4: Inscription/Connexion/Deconnexion -->
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION['pseudo'])): //Contrôle de la connexion ?> 

                    <!-- option 1: User connecté -->
                        <li class="nav-item">
                            <span class="navbar-text me-3">
                                Bonjour <strong><?php echo htmlspecialchars($_SESSION['pseudo']); ?></strong>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="index.php?action=logout">Deconnexion</a>
                        </li>

                    <?php else: ?>
                    <!-- option 2 : User non connecté -->
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="index.php?action=login">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-btn" href="index.php?action=register">Inscription</a>
                        </li>
                    <?php endif; ?>
                </ul>                  
             </div>
        </div>
    </nav>

    <!-- Contenu de la page -->
     <main>
        <?php require $viewFile; ?>
     </main> 

     <!-- Footer -->

    <footer class="footer mt-auto py-4 text-white text-center">
        <p class="text-muted m-0">&copy; 2026 Mytrip - Pierre-Matthieu Saudella</p>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>