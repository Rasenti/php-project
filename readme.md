# Mon projet PHP

### Présentation
Mon projet est une encyclopédie des ressources pour jouer à un jeu de rôle. Il est composé d'une page d'accueil, une encyclopédie, et une page d'administration.

**L'Accueil** comporte quelques liens, et est essentiellement une page de présentation, **l'Encyclopédie** représente le gros du site (côté utilisateur), avec une page regroupant tous les articles sous forme de cartes, et des pages par catégorie, puis pour chaque article. Et enfin **l'Administration** est une page accessible uniquement aux administrateurs (contre toute attente) et permettant de gérer la création, l'édition et la suppression des articles.

## Pour commencer
Pour pouvoir utiliser le site il faudra configurer l'externalisation de la configuration PDO. Pour ce faire il faut créer un fichier `db.ini` avec le modèle suivant (aussi disponible dans `db.template.ini`) et le mettre dans le dossier `/data` :
```php
DB_HOST="localhost"
DB_PORT=3306
DB_NAME="dbname"
DB_CHARSET="utf8mb4"
DB_USER="user"
DB_PASSWORD="password"
```
Ensuite le mieux est de copier l'instance de base de données que j'ai mise à disposition dans le dossier `/data`, afin de ne pas avoir d'erreurs dans les requêtes SQL (toutes faites avec des fonctions query, parce qu'on sait bien que les utilisateurs n'oseraient pas casser la base de donnée enfin).

J'ai aussi mis à disposition les images des articles dans le dossier `/uploads` pour avoir des belles cartes.

# La Chronologie

## Au commencement, il y avait le Front
J'ai commencé par créer mon dossier de travail, dans lequel j'ai mis `.devcontainer.json` afin de créer un container avec Docker, un `.gitignore` pour les fichiers à ignorer automatiquement lors des push, et les dossiers `/assets`, `/layout`, `/classes`, `/functions`, `/data` et `/uploads`.

Ensuite j'ai fait le front, en commençant par le header et le footer (que j'ai mis dans des fichiers à part dans layout), puis le corps de la page d'Accueil. Et une fois cela fait je me suis attaqué à la navbar, la redirection entre les pages et l'authentification. C'est là que la partie PHP a vraiment commencé...

## Puis vint l'Authentification
Pour avoir une authentification il me fallait des users, donc j'ai commencé par me faire un tableau de users parce qu'on avait pas encore vu la PDO. J'ai aussi tenté de faire une classe **Users** mais je ne suis pas resté là dessus parce que je savais qu'on allait récupérer les données sous forme de tableau avec la PDO, et je ne voyais pas de valeur ajoutée à les faire en objet pour l'utilisation que j'en aurait. (J'ai supprimé la classe Users, mais on peut la voir dans le commit 'Users recognition').

Après avoir créé un formulaire en méthode `POST` (parce qu'on a des données sensibles qu'on ne veut pas voir apparaitre dansl'url), j'ai créé une page `auth.php` qui se charge de l'authentification en elle-même. Dedans je récupère les champs du formulaire avec la superglobale `$_POST` puis je les compare un à un (dans un `foreach`) avec les utilisateurs de mon tableau.

En parallèle j'ai créé une classe `Utils` afin de faire une méthode statique de redirection (élue méthode de l'année vu son nombre d'utilisations 🎉).

J'ai essayé de gérer les erreurs directement, avec des redirections et messages d'erreur, ce que je n'ai plus forcément fait par la suite (et ai parfois regretté...).

## Et la gestion de Session
Une fois l'Authentification effectuée j'ai peuplé la varibale superglobale `$_SESSION` avec le pseudo de l'utilisateur, puis par la suite son rôle (admin ou non). Et je me suis servi de la session pour ne rendre le lien de navigation **Administration** visible qu'aux administrateurs.

J'ai ensuité aussi géré la déconnexion, en me basant là encore sur le status de la session.

## Ce fût au tour de la PDO
Puis nous avons vu la PDO en cours, donc je l'ai mise en place sur mon projet. J'ai commencé avec un `try/catch` afin d'avoir une erreur en cas d'échec de la connexion :
```php
try {
    //DSN = Data Source Name
    $pdo = new PDO("mysql:host=nom_de_l'hôte;port=port;dbname=nom_de_la_bdd;charset=uft8mb4, 'username', 'password'");
} catch (PDOException $ex){
    echo "La connexion à la BDD a échoué";
}
```
Et j'ai récupéré les utilisateurs sur ma table `users` avec une query SQL et l'ai fetch dans un tableau de users :
```php
$stmt = $pdo->query("SELECT * FROM users")
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

J'ai ensuite fait une page php appelée data dans laquelle j'ai fais une `query` avec des `INNER JOIN` vers les bonnes tables pour obtenir dans un tableau l'ensemble des informations dont j'ai besoin dans le reste de mes pages. Je n'ai plus qu' faire des `require_once` de cette page pour avoir accès à mes données de n'importe où.

## La page Admin
Avec les données disponibles j'ai commencé à faire la page Admin, avec un tableau permettant de voir les articles et leur catégorie, de les éditer, et de les supprimer. Et j'ai fait la page d'édition avec le formulaire prérempli en fonction de l'id de l'article.

Pour cela j'ai fait un `foreach` avec les articles, afin de tous les afficher dynamiquement en fonction des rsultats de ma requête SQL. Puis sur le bouton d'édition (et c'est le même principe pour le delete) je récupère l'id de l'article et le met en paramètre GET dans l'URL de redirection. La page d'édition affiche comme ça les champs préremplis de l'article en fonction de l'id récupéré dans la superglobale `$_GET`, et effectue l'opération d'`UPDATE` sur le bon article.

Dans l'idée j'aurais bien aimé mettre un filtre sur le tableau d'Admin, pour pouvoir trirer par ordre alphabétique soit les titres d'articles, soit les catégories, mais je n'ai pas encore eu le temps.

J'ai aussi fait le menu de la barre latérale avec un `foreach` des noms de catégorie cette fois.

## CRUD
On a déjà le Read avec `PDO` et la query `SELECT` qui me ramène les infos des articles, donc je me suis ensuite attaqué à l'édition d'article.

Pour commencer j'ai volontairement écarté la gestion de fichier, en me concentrant dans un premier temps sur les requêtes avec PDO. J'ai utilisé des `prepare/execute` pour les requêtes car elles sont lancées d'après les inputs de l'utilisateur.