<?php 

    class Manager {
        protected $db; // Permet de vérifier si une connexion existe afin d'optimiser les connexion à la db

        protected function dbConnect(){

            if ($this->db === null) { // si $db est null alors on crée la connexion sinon on return $this->$db

                $this->db = new PDO('mysql:host=localhost;dbname=my_trip_v2;charset=utf8', 'root', '');
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Permet d'afficher une erreur pour faciliter le deboguage
            
            }
           return $this->db;
            
        }
    }