<?php 

    require_once 'Manager.php';

    class UserManager extends Manager {

    /* Méthode d'inscription */
        public function registerUser($pseudo, $email, $password) {

            // mdp hashé pour sécurité
            $hachedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Connexion à la $db 
            $db = $this->dbConnect();

            // Préparation de la requête SQL
            $requete = $db->prepare('INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)');

            // Lier les parametres de la requête
            $requete->execute([
                ':pseudo' => $pseudo,
                ':email' => $email,
                ':password' => $hachedPassword
            ]);

            return true; //inscription réussie
        }
    
    /* Méthode de connexion */
        public function loginUser($email, $password) {

            // Connexion à la $db
            $db = $this->dbConnect();

            // Rechercher l'user avec son email : requete SQL 
            $requete = $db->prepare('SELECT * FROM users WHERE email = :email');
            $requete->execute([':email' => $email]);

            // Récupère les données
            $user = $requete->fetch(PDO::FETCH_ASSOC); // 1 seul ligne et transforme en tablea associatif (+simple à lire) 

            //Verifie si le mdp correspond à l'user
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }

            return false; // Email != mdp 
        }
    }