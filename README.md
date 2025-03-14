 Drink Beer

## Description du projet

**Drink Beer** est une application web conçue pour les amateurs de bière. Elle permet de consulter un catalogue de bières, filtrer les bières par catégories, et gérer les données des utilisateurs et des bières via une interface d'administration. L'application est développée avec PHP en suivant l'architecture **Model-View-Controller (MVC)** et utilise **MySQL** comme base de données.

## Objectifs pédagogiques

- Mettre en place un environnement de développement avec **Docker**.
- Utiliser l'architecture **MVC** pour structurer le code.
- Manipuler une base de données SQL avec **PDO**.
- Implémenter des fonctionnalités CRUD (**Create, Read, Update, Delete**) pour les utilisateurs et les bières.
- Assurer la gestion des sessions et des rôles utilisateur (admin/user).

## Fonctionnalités principales

### 1. Gestion des bières
- Affichage d'un **catalogue de bières** avec leurs détails.
- **Ajout, modification et suppression** de bières (uniquement pour les administrateurs).
- **Filtrage des bières par catégories**.

### 2. Gestion des utilisateurs
- Inscription et connexion des utilisateurs.
- Gestion des rôles (**utilisateur** ou **administrateur**).
- Interface d'administration permettant de gérer les utilisateurs (modification/suppression).

### 3. Interface dynamique
- Un **header dynamique** affichant les options en fonction du rôle de l'utilisateur.
- Un **système de sessions** permettant d'afficher un message de bienvenue aux utilisateurs connectés.
- **Mise en page responsive** avec Tailwind CSS.

## Architecture du projet

```
├── README.md
├── app
│   ├── Database.php
│   ├── controllers
│   │   ├── AuthController.php
│   │   ├── BeerController.php
│   │   ├── UserController.php
│   ├── models
│   │   ├── Beer.php
│   │   ├── User.php
│   ├── router.php
│   ├── views
│   │   ├── 404.php
│   │   ├── addBeer.php
│   │   ├── beer.php
│   │   ├── beerDetail.php
│   │   ├── beerForm.php
│   │   ├── footer.php
│   │   ├── head.php
│   │   ├── header.php
│   │   ├── home.php
│   │   ├── inscription.php
│   │   ├── layout.php
│   │   ├── login.php
│   │   ├── userForm.php
│   │   ├── userList.php
├── assets
│   ├── css
│   │   ├── style.css
│   ├── icons
│   │   ├── logo.png
│   ├── images
├── config
│   ├── config.php
├── index.php
```

## Base de données

L'application utilise **MySQL** comme base de données. Voici les principales tables :

### Table `users`
| id  | name |  email | password |          role         |  created_at |
|-----|------|--------|----------|-----------------------|-------------|
| int | text | text   | text     | enum('user', 'admin') |  timestamp  |

### Table `beers`
| id  | name | origin | alcohol | description | average_price | image_url |
|-----|------|--------|---------|-------------|---------------|-----------|
| int | text | text   |  float  |     text    |     float     |   text    |

### Table `categories`
| id  | name  |
|-----|-------|
| int | text  |

### Table `beer_categories`
| beer_id  | category_id  |
|----------|--------------|
|    int   |     int      |

## Installation

1. **Cloner le projet**
   ```sh
   git clone https://github.com/mohajiro/drinkbeer.git
   cd drinkbeer
   ```

2. **Configurer l'environnement**
   - Copier `config.php` et configurer les variables de connexion à la base de données.
 
   DB_HOST=localhost
   DB_NAME=drinkbeer
   DB_USER=root
   DB_PASS=root
   ```

3. **Lancer le projet avec Docker**
   ```sh
   docker-compose up -d
   ```

4. **Exécuter les migrations**
   ```sh
   php artisan migrate
   ```

5. **Accéder à l'application**
   - Ouvrir `http://localhost/drinkbeer/` dans un navigateur.

## Améliorations futures

- Implémenter un système de notation des bières par les utilisateurs.
- Ajouter un espace communautaire avec des commentaires et des recommandations.
- Permettre aux utilisateurs d'ajouter leurs propres bières.
- Intégration d'un paiement en ligne pour l'achat de bières via un API de paiement sécurisé.