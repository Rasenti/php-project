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

Aussi pour tester la partie admin il faut se connecter avec le seul user admin :
```
email : rasen@gmail.com
password : ras
```

J'ai aussi mis à disposition les images des articles dans le dossier `/uploads` pour avoir des belles cartes.

## A savoir
J'ai fait plusieurs branches GIT tout au long du projet, mais je n'en parle pas particulièrement par la suite, parce que j'ai fais des merges progressifs, donc l'évolution générale du projet se voit dans la branche admin. J'ai essayé de faire une branche par feature majeure, et je ne pense pas que trop de "vieux code" se soit perdu dans l'histoire, bien que j'ai delete les branches au fur et à mesure au début (avant de me rendre compte que ça pouvait être bien de les laisser pour l'historique).

J'ai aussi une page de test (`/test.php`) sur laquelle je faisais mes tests quand c'était possible.

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

En effet, les articles affichés récupèrent des données dans plusieurs tables de la BDD :
- la table `pages` qui contient les articles en eux-mêmes
- la table `images` qui contient les illustrations
- la table `categories` (reliée à `pages` via une table étrangère) qui contient les noms des catégories d'articles.

Plus tard j'ai factorisé la connexion en créant une méthode statique de la classe Utils qui s'occupe de faire la connexion PDO, et une autre permettant de faire un `SELECT * FROM` de n'importe quelle table. Et j'en ai profité pour inclure un fichier `db.ini` avec les informations de connexion pour externaliser la configuration de PDO.

## La page Admin vint ensuite
Avec les données disponibles j'ai commencé à faire la page Admin, avec un tableau permettant de voir les articles et leur catégorie, de les éditer, et de les supprimer. Et j'ai fait la page d'édition avec le formulaire prérempli en fonction de l'id de l'article.

Pour cela j'ai fait un `foreach` avec les articles, afin de tous les afficher dynamiquement en fonction des rsultats de ma requête SQL. Puis sur le bouton d'édition (et c'est le même principe pour le delete) je récupère l'id de l'article et le met en paramètre GET dans l'URL de redirection. La page d'édition affiche comme ça les champs préremplis de l'article en fonction de l'id récupéré dans la superglobale `$_GET`, et effectue l'opération d'`UPDATE` sur le bon article.

Dans l'idée j'aurais bien aimé mettre un filtre sur le tableau d'Admin, pour pouvoir trirer par ordre alphabétique soit les titres d'articles, soit les catégories, mais je n'ai pas encore eu le temps.

J'ai aussi fait le menu de la barre latérale avec un `foreach` des noms de catégorie cette fois.

## Et le CRUD s'imposa
On a déjà le Read avec `PDO` et la query `SELECT` qui me ramène les infos des articles, donc je me suis ensuite attaqué à l'édition d'article.

Pour commencer j'ai volontairement écarté la gestion de fichier, en me concentrant dans un premier temps sur les requêtes avec PDO. J'ai utilisé des `prepare/execute` pour les requêtes car elles sont lancées d'après les inputs de l'utilisateur, et utilise les id récupérés dans GET pour cibler les bons articles en base de donnée. 

J'ai commencé par l'édition mais avec une version simplifiée qui ne modifie que les données de la table `pages`.

Ensuite la création, en prenant cette fois le temps de peupler toutes les tables de la BDD. Et comme j'écris sur plusieurs tables, et notamment une table étrangère, j'ai agencé les requêtes dans le bon ordre afin de récupérer les id après création pour les utiliser dans les requêtes suivantes. Je n'ai pas eu de blocage réel, juste quelques petites erreurs dans des noms de variables ou de table, mais tout a rapidement marché.

Après quoi j'ai fait la suppression, avec la même logique. Au début j'ai voulu le faire différemment, en utilisant le `onclick()` dans le HTML, avec du JS, et en créant une fonction `deleteArticle` mais ça m'emmenait trop loin (notamment il fallait que je me replonge un peu dans JS) donc j'ai abandonné pour rester sur la même logique avec une redirection sur une page de script. Après cela pareil, pas de blocage réel, et j'ai quand même pris le temps de faire un backup de ma BDD au cas où il y avait des effets de bord.

Et enfin, j'ai finalisé l'édition en intégrant les modifications aux autres tables.

*Note : J'ai découvert `LastInsertId` après avoir fini toute l'architecture de mon CRUD, donc je ne suis pas revenu dessus, mais je pourrais sûrement simplifier ça du coup.*

## Après quoi ce fût au tour du File Upload
Pour les illustrations d'articles j'ai un champ d'upload de fichier, et j'ai géré l'enregistrement de l'image au début des pages de script de création et d'édition. J'ai utilisé la même méthode que dans le cours, avec la récupération du `tmp_name` dans la variable superglobale `$_FILES` et la définition d'un chemin pour le déplacement de l'image vers `/uploads/`. 

Tout a rapidement fonctionné, mais il arrive parfois que la page mouline pendant un certain temps (voire indéfiniment) lorsque j'ajoute une image. Je n'ai pas réussi à identifier si c'est dû à Docker, WAMP ou autre chose, mais ça reste à la marge donc je ne m'en suis pas plus occupé que ça.

## Et de l'Encyclopédie
Un peu de front à nouveau ici, avec la création des cartes d'articles dans l'encyclopédie, en isolant les id dans les paramètres GET pour afficher les bons articles au clic.

J'ai aussi géré le "filtre" des articles par catégorie avec la barre latérale, en créant une page `categorie` qui va afficher les articles de la catégorie sélectionnée en cherchant dans les articles si les id de catégorie sont correspondant avec l'id de la catégorie sélectionnée.

Et j'en ai profité pour faire un affichage des 3 premiers articles sur la page d'accueil.

## La Gestion des erreurs vînt mettre son grain de sel
C'est ici que je suis tombé sur mon plus gros écueil. 

J'ai voulu faire une gestion des erreurs dans les champs du formulaire d'inscription au cas par cas, et pour cela j'ai fait une classe contenant des méthodes statiques permettant de contrôler chaque type de champ (email, password, date, longueur des chaines de caractères, etc...).

Jusque là pas de problème, mais mon formulaire d'inscription se trouve sur ma page d'accueil, et l'ajout effectif de l'utilisateur après remplissage du formulaire se fait sur une page `subscribe.php`, et j'ai eu du mal a déterminer où faire mon `try/catch`. 

Je voyais deux options possibles :
1. Afficher les erreurs directement au niveau du formulaire (avec une div qui apparait en cas d'erreur en dessous du fomulaire), mais ça voulait dire faire le `try/catch` sur l'index, et j'avais du mal à faire en sorte que le bout de code ne se déclenche qu'à l'envoie du formulaire, sans rechargement de la page (qui empêche l'affichage de l'erreur), et sans envoie du script d'inscription dans tous les cas.

2. Afficher les erreurs sur une nouvelle page (mais j'ai du mal à me résoudre à cette solution car je ne trouve pas ça très user friendly), auquel cas je peux mettre la vérification au début du script d'inscription avec un exit pour ne pas lancer l'ajout en BDD en cas d'échec, et affichage d'une erreur. Je pense que je serai capable de faire ça, et c'est sûrement ce que je vais faire, mais j'aimerai bien essayer à nouveau de trouver une solution pour faire la méthode 1.

### Après moult réflexion

J'ai fini par trouver une solution en mettant le `try/catch` dans la page de script, et en créant un tableau d'erreurs que j'ajoute dans ma session pour qu'il soit récupéré au niveau de l'index :

```php
if (!empty($_POST)) { 
    
    try {
        $firstname = FormValidator::validateStringLength($_POST['firstname'], 45);
        $lastname = FormValidator::validateStringLength($_POST['lastname'], 45);
        $pseudo = FormValidator::validateStringLength($_POST['pseudo'], 45);
    } catch (InvalidLengthException $lengthException) {
        $lengthError = $lengthException->getMessage();
        $errors['length'] = $lengthError;
    }

    try {
        $email = FormValidator::validateEmailFormat($_POST['email']);
    } catch (InvalidEmailException $emailException) {
        $emailError = $emailException->getMessage();
        $errors['email'] = $emailError;
    }

    try {    
        $birthdate = FormValidator::validateDateFormat($_POST['birthdate']);
    } catch (InvalidDateException $dateException) {
        $dateError = $dateException->getMessage();
        $errors['date'] = $dateError;
    }

    try {
        $password = FormValidator::validatePasswordMatch($_POST['password'], $_POST['passwordConfirm']);
    } catch (InvalidPasswordConfirmationException $passwordException) {
        $passwordError = $passwordException->getMessage();
        $errors['password'] = $passwordError;
    }

}

if (!empty($nameError) || !empty($emailError) || !empty($dateError) || !empty($passwordError)) 
{
    session_start();
    $_SESSION['errors'] = $errors;
    Utils::redirect('index.php#newsletter_banner');
}
```

Après cela j'ai juste eu a créer une div sous mon formulaire qui affiche les erreurs si `$_SESSION['errors']` n'est pas vide.

Et pour le reste des gestions d'erreur disséminées dans le code, j'en ai fait certaines directement, et j'en ai reporté d'autres à plus tard, mais je me rend compte que c'était une erreur car je vais devoir repasser sur tout mon code, et je suis sûr que je vais en oublier...

## Et à la fin, il ne resta que la Refactorisation
J'ai commencé par mettre de la PHP doc là où je n'en avais pas encore mis (à savoir partout...).

Ensuite j'ai checké un peu tout ce que j'avais fait jusque là, et je me suis rendu compte que j'avais oublié de gérer la newsletter dans l'inscription, donc j'ai fait un ajout à ce niveau là, avec une checkbox et une gestion `if/else` dans le script.

Après j'étais globalement satisfait du reste :)

En améliorations, je pense que j'aurais pu factoriser quelques éléments au niveau des query pdo, peut être faire une fonction pour les statements, avec la query en paramètre, mais je ne sais pas si la plus value serait intéressante. J'aurais aussi peut-être pu faire une fonction ou une méthode statique pour les query de récupération d'id, et faire une classe spécifique pour les méthodes concernant PDO plutôt que de les faire dans Utils.