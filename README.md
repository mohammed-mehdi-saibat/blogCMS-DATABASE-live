BlogCMS — Livrable 2

🚧 En cours / Partiellement terminé

📌 Objectif du livrable 2

Ce livrable vise à mettre en place le cœur fonctionnel du CMS, avec un dashboard administrateur, la gestion des articles et des catégories, ainsi qu’une interface utilisateur améliorée.

✅ Fonctionnalités implémentées
🔐 Authentification & Sécurité

Page de login sécurisée

Mots de passe hashés avec bcrypt

Protection contre les attaques XSS

Requêtes SQL sécurisées via PDO (requêtes préparées)

🗄️ Base de données

Connexion centralisée via config/database.php

Support MySQL / PostgreSQL

Configuration externalisée et sécurisée

🧩 Administration

Dashboard administrateur (structure en place)

Gestion des articles (CRUD)

Création

Lecture

Mise à jour

Suppression

Gestion des catégories (CRUD)

🎨 Interface utilisateur

Templates basés sur Bootstrap

Amélioration de la lisibilité et de la navigation

Séparation claire logique / affichage

📁 Structure du projet
config/
└── database.php # Configuration connexion BDD
includes/
└── functions.php # Fonctions utilitaires
public/
└── index.php # Point d’entrée de l’application
templates/
└── admin/ # Vues dashboard admin
└── partials/ # Composants UI réutilisables

🔧 Installation

Cloner le dépôt :

git clone https://github.com/mohammed-mehdi-saibat/blogCMS-DATABASE-live

Configurer la base de données :

config/database.php

Modifier les identifiants (host, dbname, user, password).

Configurer le serveur web :

Racine du serveur → dossier /public

Importer le schéma SQL (si fourni)

📅 État d’avancement

Connexion base de données

Authentification sécurisée

CRUD Articles

CRUD Catégories

Finalisation dashboard admin

Améliorations UI supplémentaires

🚀 Prochaines étapes — Livrable 3

Système de commentaires

Gestion des utilisateurs (rôles, permissions)

Sécurité avancée (sessions, CSRF, validations)

Documentation complète

👤 Auteur

Mohammed Mehdi Saibat
Projet académique — BlogCMS
