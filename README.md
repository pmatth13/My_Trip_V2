# My Trip - Blog de Voyage

Un blog personnel de voyage développé en PHP avec une architecture MVC, permettant de partager des récits et photos de voyages à travers le monde.

## Fonctionnalités

- **Authentification** : Inscription et connexion sécurisées avec mots de passe hashés
- **Gestion des articles** : CRUD complet (Créer, Lire, Modifier, Supprimer)
- **Upload d'images** : Gestion sécurisée des uploads avec validation du type MIME (sécurité analyse de contenu)
- **Système de commentaires** : Les utilisateurs connectés peuvent commenter les articles
- **Multi-destinations** : Organisation des articles par pays (Philippines, Vietnam, Japon, Indonésie)
- **Interface admin** : Panneau d'administration réservé à l'administrateur
- **Design responsive** : Interface adaptée mobile et desktop avec Bootstrap 5

## Technologies utilisées

| Catégorie | Technologies |
|-----------|-------------|
| **Backend** | PHP 8, Architecture MVC |
| **Base de données** | MySQL avec PDO (requêtes préparées) |
| **Frontend** | HTML5, SCSS, Bootstrap 5 |
| **Éditeur de texte** | TinyMCE |
| **Icônes** | Font Awesome 6 |
| **Police** | Google Fonts (Montserrat) |

## Installation

### Prérequis

- XAMPP (ou équivalent : WAMP, MAMP, LAMP)
- PHP 8.0+
- MySQL 5.7+

### Étapes

1. **Cloner le projet** dans le dossier `htdocs` :
   ```bash
   cd C:/xampp/htdocs
   git clone https://github.com/votre-username/my_trip_v2.git
   ```

2. **Créer la base de données** :
   - Ouvrir phpMyAdmin (http://localhost/phpmyadmin)
   - Créer une base de données nommée `my_trip_v2`
   - Importer le fichier `database/my_trip_v2.sql` (si disponible)

3. **Configurer la connexion** dans `model/Manager.php` :
   ```php
   $this->db = new PDO('mysql:host=localhost;dbname=my_trip_v2;charset=utf8', 'root', '');
   ```

4. **Lancer le serveur** Apache et MySQL via XAMPP

5. **Accéder au site** : http://localhost/my_trip_v2

## Structure du projet

```
my_trip_v2/
├── controller/
│   └── controller.php      # Tous les contrôleurs
├── model/
│   ├── Manager.php         # Connexion BDD (classe parent)
│   ├── UserManager.php     # Gestion des utilisateurs
│   ├── ArticleManager.php  # Gestion des articles
│   └── CommentManager.php  # Gestion des commentaires
├── view/
│   ├── base.php            # Template principal (navbar, footer)
│   ├── homeView.php        # Page d'accueil
│   ├── articleView.php     # Détail d'un article
│   ├── createArticleView.php
│   ├── editArticleView.php
│   ├── loginView.php
│   ├── registerView.php
│   └── [destination]View.php  # Pages par destination
├── public/
│   ├── design/
│   │   ├── style.scss      # Styles SCSS
│   │   └── style.css       # CSS compilé
│   └── uploads/            # Images uploadées
├── index.php               # Point d'entrée (routeur)
└── README.md
```

## Base de données

### Tables

- **users** : `id`, `pseudo`, `email`, `password`, `created_at`
- **articles** : `id`, `title`, `content`, `destination`, `image_url`, `author_id`, `created_at`
- **comments** : `id`, `content`, `article_id`, `author_id`, `created_at`

## Sécurité

- Requêtes SQL préparées (protection injection SQL)
- Mots de passe hashés avec `password_hash()`
- Échappement des données avec `htmlspecialchars()`
- Validation du type MIME pour les uploads d'images
- Vérification des droits utilisateur pour les actions sensibles

## Auteur

**Pierre-Matthieu Saudella**

---

## Journal de développement

1. Création de la structure en MVC (squelette)
2. Création de `base.php` pour la template principale
3. Création du CSS/SCSS
4. Création de `homeView.php`
5. Création du routeur et du controller pour afficher les vues
6. Création des différentes destinations dans le dossier View
   - Ajout des controllers
   - Ajout au routeur
7. Design de chaque `destinationView`
8. Design de la page contact
9. Création de `errorView.php`
10. Front-end terminé / Mise en place de la base de données
11. Création de la BDD avec 3 tables : `users`, `articles`, `comments`
12. Création de `Manager.php`
13. Création de `UserManager.php`
    - Fonction `register` et `login`
14. Création des contrôleurs pour faire le lien
15. Ajout des routes dans l'index
16. Création de `loginView.php` et `registerView.php`
17. Création de `ArticleManager.php`
    - `createArticle()`
    - `getArticlesByDestination()`
    - `getArticleById()`
18. Modification du contrôleur pour appeler l'article
19. Modification de la View pour insérer la card avec l'article dynamiquement
20. Création du formulaire de création d'article
21. Création de `createArticleView.php` avec intégration de TinyMCE
22. Création de la page de détails de l'article
23. Création de `articleView.php`
24. Création de `deleteController` et `editController`
25. Finalisation du CRUD
26. Duplication pour chaque destination
27. Création de l'upload d'image réel
    - Création de la fonction `uploadImage()` dans le controller
    - Modification de `createArticleController()`
    - Modification de `editArticleController()`
28. Création du système de commentaire
    - Création de `CommentManager.php`
    - Création des controllers
29. Modification de `articleView.php`
30. Modification du controller pour intégrer la liste des commentaires sous les articles

---

*Projet réalisé dans le cadre de la formation de dévellopeur web Fullstack avec Believemy © afin de valider le projet passerelle n°2 .*
