

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
    - Remplissez les options  `DB_HOST` `DB_PORT` `DB_USERNAME` et `DB_PASSWORD`
- Lancez le serveur web, et entrez la commande suivante `php artisan serve` dans le répertoire de l'application, le projet devrait être accessible à l’url suivante:
  http://localhost:8000
- Créez une base de données vide pour le projet Laravel, Utilisez une base SQLite plutôt que MySQL.
- Lancez les migrations avec du Seeding avec la commande suivante `php artisan migrate:fresh --seed`
- Récupérez la base de données **database.db** du répertoire **database/recettes/** de l’application, remplacez le fichier **database.db** dans **database/database.db** par le fichier que vous avez récupéré.

## Les parties implémentées
- La page d’Accueil affichant les 3 dernières recettes est accessible via l'URL http://localhost:8000 ou en cliquant sur le bouton **Home** dans le menu 
- La page recettes, qui affichent une liste de toutes les recettes est accessible via l'URL http://localhost:8000/recettes ou en cliquant sur le bouton **Recettes** dans le menu
- La page d’une recette sera affichée après avoir été cliquée dans la liste, ou via l'URL http://localhost:8000/recettes/{url_recette}
- La page de contact est accessible via l'URL http://localhost:8000/contact ou en cliquant sur le bouton **Contact** dans le menu
- Pour l’ajout d'une recette, il faut aller sur l'URL http://localhost:8000/admin/recettes/create un message indiquant que la recette a bien été créée sera affiché sur la même page
- Pour l’édition d'une recette il faut aller sur l'URL http://localhost:8000/admin/recettes/edit et cliquer sur le bouton `modifier`à côté de la recette qu'on veut modifier, on sera rediriger vers l'URL http://127.0.0.1:8000/admin/recettes/edit_recette/{id_de_la_recette}
- Pour la suppression d'une recette il faut aller sur l'URL http://localhost:8000/admin/recettes/edit et cliquer sur le bouton `supprimer`à côté de la recette qu'on veut supprimer, un message indiquant que la recette a bien été supprimée sera affiché sur la même page  
- Ajout de fichiers média pour les recettes
- La Gestion des commentaires : 
   - Pour ajouter un commentaire dans la page d’une recette, il faut remplir le formulaire en bas de la recette avec le nom de l'utilisateur et le commentaire, et cliquer sur le bouton `commenter`.
   - Si l'utilisateur n'existe pas dans la base de données, le commentaire sera publié sous le nom **inconnu**
   - On peut vérifier que le commentaire a bien été ajouté à la base de données, les commentaires sont affichés en dessous de la recette.
- L'Identification : 
   - Utilisation d’un starterkit breeze
   - On peut créer un nouveau utilisateur à l'URL http://localhost:8000/register
   - On peut se connecter au compte utilisateur à l'URL http://localhost:8000/login
     - exemple : 
       - Email: test.utilisateur@gmail.com
       - Password: testutilisateur
    
       
            

