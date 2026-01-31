<?php 

    require_once 'model/Manager.php';
    require_once 'model/UserManager.php';

    // Affichage des différentes vue avec les différentes fonctions

    function homeController() { 

        //Afficher la vue
        $viewFile = 'view/homeView.php';
        require 'view/base.php';
    }

    function philippinesController(){

        $viewFile = 'view/philippinesView.php';
        require 'view/base.php';
    }

    function vietnamController(){

        $viewFile = 'view/vietnamView.php';
        require 'view/base.php';
    }

    function japanController() {

        $viewFile = 'view/japanView.php';
        require 'view/base.php';
    }

    function indonesiaController() {

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

    // Function d'Authentification 

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
