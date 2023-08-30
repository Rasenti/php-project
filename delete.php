<?php
require_once __DIR__ . '/classes/Utils.php';
require_once __DIR__ . '/data/datas.php';

$id = intval($_GET['id']) ?? null;

if ($id === null) {
  echo "Merci de préciser un id d'article à supprimer";
  exit;
}

//Essai d'utilisation d'une fonction avec le "onclick()" dans le html de la page admin
//Abandonné en faveur d'un lien vers la page de script avec des paramètres GET
//
// function deleteArticle(string $title): void
// {
    // try {
    //     $pdo = Utils::newPDO();
    // } catch (PDOException) {
    //     http_response_code(500);
    //     echo "La connexion à la BDD a échoué";
    //     exit;
    // }

    //Je commence par enregistrer l'id de la page pour pouvoir supprimer la table categories_has_pages
    // $stmtPage = $pdo->prepare("SELECT id FROM pages WHERE title LIKE :title");
    // $stmtPage->execute(['title' => $title]);
    // $pageId = $stmtPage->fetch(PDO::FETCH_ASSOC);

    //Je récupère l'id de l'image pour pouvoir ensuite la supprimer de la table images
    $stmtImage = $pdo->prepare("SELECT images_id FROM pages WHERE id=:pages_id");
    $stmtImage->execute(['pages_id' => $id]);
    $imageId = $stmtImage->fetch(PDO::FETCH_ASSOC);

    //Je lance ensuite les suppressions en commençant par la table categories_has_pages
    $stmt = $pdo->prepare("DELETE FROM categories_has_pages WHERE pages_id=:pages_id");
    $stmt->execute(['pages_id' => $id]);

    //Puis la table pages
    $stmt = $pdo->prepare("DELETE FROM pages WHERE id=:pages_id");
    $stmt->execute(['pages_id' => $id]);

    //Et enfin la table images
    $stmt = $pdo->prepare("DELETE FROM images WHERE id=:images_id");
    $stmt->execute(['images_id' => $imageId['images_id']]);
// };
Utils::redirect('admin.php');