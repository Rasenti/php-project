<?php
require_once 'classes/Utils.php';

function deleteArticle(string $title): void
{
    try {
        $pdo = Utils::newPDO();
    } catch (PDOException) {
        http_response_code(500);
        echo "La connexion à la BDD a échoué";
        exit;
    }

    //Je commence par enregistrer l'id de la page pour pouvoir supprimer la table categories_has_pages
    $stmtPage = $pdo->prepare("SELECT id FROM pages WHERE title LIKE :title");
    $stmtPage->execute(['title' => $title]);
    $pageId = $stmtPage->fetch(PDO::FETCH_ASSOC);

    //Je récupère ensuite l'id de l'image pour pouvoir ensuite la supprimer de la table images
    $stmtImage = $pdo->prepare("SELECT images_id FROM pages WHERE title LIKE :title");
    $stmtImage->execute(['title' => $title]);
    $imageId = $stmtImage->fetch(PDO::FETCH_ASSOC);

    //Je lance ensuite les suppressions en commençant par la table categories_has_pages
    $stmt = $pdo->prepare("DELETE FROM categories_has_pages WHERE id = :pages_id) ");
    $stmt->execute(['pages_id' => $pageId['id']]);
    //Puis la table pages
    $stmt = $pdo->prepare("DELETE FROM pages WHERE pages_id = :pages_id) ");
    $stmt->execute(['title' => $pageId['id']]);
    //Et enfin la table images
    $stmt = $pdo->prepare("DELETE FROM images WHERE id = :images_id) ");
    $stmt->execute(['images_id' => $imageId['id']]);
};