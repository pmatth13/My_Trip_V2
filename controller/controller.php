<?php 

    require_once 'model/Manager.php';
    require_once 'model/UserManager.php';
    require_once 'model/ArticleManager.php';

    // Affichage des différentes vue avec les différentes fonctions

    function homeController() { 

        //Afficher la vue
        $viewFile = 'view/homeView.php';
        require 'view/base.php';
    }

    function philippinesController(){

        // Récupérer les articles de cette destination
        $articleManager = new ArticleManager();
        $articles = $articleManager->getArticlesByDestination('Philippines');

        $viewFile = 'view/philippinesView.php';
        require 'view/base.php';
    }

    function vietnamController(){

        $articleManager = new ArticleManager();
        $articles = $articleManager->getArticlesByDestination('Vietnam');

        $viewFile = 'view/vietnamView.php';
        require 'view/base.php';
    }

    function japanController() {

        $articleManager = new ArticleManager();
        $articles = $articleManager->getArticlesByDestination('Japan');

        $viewFile = 'view/japanView.php';
        require 'view/base.php';
    }

    function indonesiaController() {

        $articleManager = new ArticleManager();
        $articles = $articleManager->getArticlesByDestination('Indonesia');

        $viewFile = 'view/indonesiaView.php';
        require 'view/base.php';
    }

    function contactController(){

        $viewFile = 'view/contactView.php';
        require 'view/base.php';
    }

    function errorController() {

        $viewFile = 'view/errorView.php';
        require 'view/base.php';
    }

    // -----------------------------------------------------------------------Function d'Authentification 

     function registerUserController(){

        //Vérification si des données POST ont été envoyées
        if(!empty($_POST)){

            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userManager = new UserManager();
            $result = $userManager->registerUser($pseudo, $email, $password);

            if($result){

                // Connexion automatique après inscription
                $user = $userManager->loginUser($email, $password);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo'];
                $_SESSION['email'] = $user['email'];

                header('Location: index.php?action=home');
                exit;
            } else {
                $error = "Erreur : cet email est deja utilise.";
                $viewFile = 'view/registerView.php';
                require 'view/base.php';
            }
        } else {

            $viewFile = 'view/registerView.php';
            require 'view/base.php';
        }
    }

    function loginUserController(){

        //Vérification si des données POST ont été envoyées
        if(!empty($_POST)){

            // Traiter la CONNEXION : Récupère les données du formulaire
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userManager = new UserManager();
            $user = $userManager->loginUser($email, $password);

            if($user) {
                // Stocker les infos en SESSION
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo'];
                $_SESSION['email'] = $user['email'];

                // Redirection vers l'acceuil
                header('Location: index.php?action=home');
                exit;
            } else {
                $error = " Erreur : email ou mot de passe inccorect.";
                $viewFile = 'view/loginView.php';
                require 'view/base.php';
            }
        } else {

            $viewFile = 'view/loginView.php'; // la bonne View
            require 'view/base.php';          // Inclut base.php qui inclura $viewFile
        }
    }

    function logoutController(){

        //Détruire toutes les variables de la SESSION
        session_unset();
        //Détruire la session
        session_destroy();
        //Rediriger vers l'accueil
        header('Location: index.php');
        exit;
    }

    // ------------------------------------------------------------------Functions liés aux articles
    function createArticleController(){

        // Vérifier que l'utilisateur est admin
        if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
            header("Location: index.php");
            exit;
        }

        // Vérification de l'envoi des données POST
        if (!empty($_POST)) {

            // Si true alors: on récupère les infos
            $title = $_POST['title'];
            $content = $_POST['content'];
            $destination = $_POST['destination'];
            $image_url = !empty($_POST['image_url']) ? $_POST['image_url'] : null;  // permet d'enregister null dans la bdd si pas d'image
            $author_id = $_SESSION['user_id'];

            // Gestion de l'upload de l'image plus tard

            // Création de l'article
            $articleManager = new ArticleManager();
            $articleManager->createArticle($title, $content, $destination, $author_id, $image_url);

            // Redirige vers la destination
            header('Location: index.php?action=' . strtolower($destination));
            exit;

        } else {

            // Si false alors
            $destination = $_GET['destination'] ?? 'Philippines';  // Par défaut Philippines
            $viewFile= 'view/createArticleView.php';
            require 'view/base.php';
        }
    }

    function articleController(){

        // Récupère l'ID depuis l'URL
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];

            // Récupérer l'article
            $articleManager = new ArticleManager();
            $article = $articleManager->getArticleById($id);

            // Vérifier que l'article existe
            if (!$article) {
                // Article introuvable -> page d'erreur
                errorController();
                return;
            }

            // Afficher la vue
            $viewFile = 'view/articleView.php';
            require 'view/base.php';

        } else {
            // Pas d'ID dans l'URL -> page d'erreur
            errorController();
            return;
        }
    }

    function deleteArticleController(){

        // Vérifier que l'utilisateur est admin
        if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
            header("Location: index.php");
            exit;
        }

        //  Récupérer l'ID depuis l'URL
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];

           // Récupérer l'article AVANT suppression (pour avoir la destination)
            $articleManager = new ArticleManager();
            $article = $articleManager->getArticleById($id);

            // Vérifier que l'article existe
            if (!$article) {
                errorController();
                return;
            }

            // Sauvegarder la destination
            $destination = $article['destination'];

            // Suppression
            $articleManager->deleteArticle($id);

            // Rediriger vers la page de destination
            header('Location: index.php?action=' . strtolower($destination));
            exit;
        }
    }

    function editArticleController() {
    
        // Vérifier que l'utilisateur est admin
        if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
            header("Location: index.php");
            exit;
        }

        // Si POST : traitement de la modification
        if (!empty($_POST)) {
            
            // Récupérer les données du formulaire
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $destination = $_POST['destination'];
            $image_url = !empty($_POST['image_url']) ? $_POST['image_url'] : null;

            // Modifier l'article
            $articleManager = new ArticleManager();
            $articleManager->editArticle($id, $title, $content, $destination, $image_url);

            // Rediriger vers l'article modifié
            header("Location: index.php?action=article&id=" . $id);
            exit;

        } else {
            
            // Affichage du formulaire : récupérer l'article à modifier
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];

                // Récupérer l'article
                $articleManager = new ArticleManager();
                $article = $articleManager->getArticleById($id);

                // Vérifier que l'article existe
                if (!$article) {
                    errorController();
                    return;
                }

                // Afficher le formulaire
                $viewFile = 'view/editArticleView.php';
                require 'view/base.php';

            } else {
                // Pas d'ID -> erreur
                errorController();
                return;
            }
        }
    }