<?php 

    //Démarrage de la session
    session_start();

    // Inclusion du contrôleur
    require_once 'controller/controller.php';

    // Récupérer l'action depuis l'URL 
    if (isset($_GET['action'])){

        $action = $_GET['action'];

    } else {

        $action = "home"; // Action par défaut
    }

    // Routing : appeler la bonne fonction selon l'action 
    switch($action){

        case 'home':
            homeController();
            break;

        case 'philippines':
            philippinesController();
            break;
        
        case 'vietnam':
            vietnamController();
            break;
        
        case 'japan':
            japanController();
            break;
        
        case 'indonesia':
            indonesiaController();
            break;
        
        case 'contact':
            contactController();
            break;
        
        default :
            errorController();
            break;
    }