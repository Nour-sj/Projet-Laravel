

## Projet de création d’une application web avec le framework PHP Laravel

Le but de ce projet est de réaliser un site de recette de cuisine à l’aide du framework PHP Laravel.
Le site est composé de :
- **Une page d’Accueil** affichant un texte de bienvenue et les 3 dernières recettes.
- **La page recettes**, qui affichent une liste de toutes les recettes avec une barre de recherche.
- **La page d’une recette**, affichée après avoir été cliquée sur l’une d’elle dans la liste.
- **Une page de contact** avec un formulaire.

## Guide d'installation 
- Pour cloner notre application web, copiez la clé `HTTPS` ou `SSH` du repository, ouvrez une fenêtre de Terminal, Remplacez le répertoire de travail actuel par l'emplacement où vous souhaitez que le répertoire soit cloné, Tapez la commande `git clone`, puis collez l'URL que vous avez copiée précédemment, appuyez sur Entrée pour créer votre clone local.
- Installez les dépendances de l'application web à partir de composer avec la commande suivante `composer install`
- Configurez les accès dans le fichier **.env** pour permettre une connexion à la base de donnée, spécifiez l’utilisation de SQLite et le chemin d’accès au
  fichier **database.db** :
   - `DB_CONNECTION`=sqlite
   - Mettez le PATH de votre fichier **database.db** dans `DB_DATABASE`
   - Remplissez les options  `DB_HOST` `DB_PORT` `DB_USERNAME` et `DB_PASSWORD`- Lancez le serveur web.
- Lancez le serveur web, et entrez la commande suivante `php artisan serve` dans le répertoire de l'application, le projet devrait être accessible à l’url suivante:
  http://localhost:8000

- Créez une base de données vide pour le projet Laravel, Utilisez une base SQLite plutôt que MySQL.
- Lancez les migrations avec du Seeding avec la commande suivante `php artisan migrate:fresh --seed`




