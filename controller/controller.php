<?php 

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

