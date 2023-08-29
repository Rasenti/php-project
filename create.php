<?php
require_once 'classes/Utils.php';
require_once 'data/datas.php';

$image = $_POST['image'];
$categorie = $_POST['categorie'];
$title = $_POST['title'];
var_dump($image);

//Je commence par enregistrer l'image en BDD pour pouvoir récupérer son id pour la suite du traitement
$stmt = $pdo->prepare("INSERT INTO images (name) VALUES (:name)");
$stmt->execute(['name' => $image]);

//Je récupère l'id de l'image enregistrée en BDD
$stmtImage = $pdo->prepare("SELECT id FROM images WHERE name LIKE :image");
$stmtImage->execute(['image' => $image]);
$imageId = $stmtImage->fetch(PDO::FETCH_ASSOC);
var_dump($imageId['id']);

//J'insère les données de la table "pages"
$stmt = $pdo->prepare(
    "INSERT INTO pages (title, content, images_id) VALUES
    (:title, :content, :images_id)"
);

$stmt->execute([
    'title' => $title,
    'content' => $_POST['content'],
    'images_id' => $imageId['id'],
]);

//Je récupère l'id de la catégorie et de la page nouvellement crée pour peupler la table categories_has_pages
$stmtCategorie = $pdo->prepare("SELECT id FROM categories WHERE name LIKE :categorie");
$stmtCategorie->execute(['categorie' => $categorie]);
$categorieId = $stmtCategorie->fetch(PDO::FETCH_ASSOC);
var_dump($categorieId['id']);

$stmtPage = $pdo->prepare("SELECT id FROM pages WHERE title LIKE :title");
$stmtPage->execute(['title' => $title]);
$pageId = $stmtPage->fetch(PDO::FETCH_ASSOC);
var_dump($pageId['id']);

$stmt = $pdo->prepare(
    "INSERT INTO categories_has_pages (categories_id, pages_id) VALUES
    (:categories_id, :pages_id)"
);

$stmt->execute([
    'categories_id' => $categorieId['id'],
    'pages_id' => $pageId['id']
]);

Utils::redirect('admin.php');