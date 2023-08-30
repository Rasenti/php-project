<?php
require_once __DIR__ . '/../classes/Utils.php';

try {
    $pdo = Utils::newPDO();
} catch (PDOException) {
    http_response_code(500);
    echo "La connexion à la BDD a échoué";
    exit;
}

$users = Utils::selectFrom($pdo, 'users');
$categories = Utils::selectFrom($pdo, 'categories');
$articles = Utils::selectFrom($pdo, 'pages');
$images = Utils::selectFrom($pdo, 'images');

$stmt = $pdo->query
    ("SELECT pages.*, categories.cat_name 
    FROM `pages`
    INNER JOIN categories_has_pages 
    ON pages.id = categories_has_pages.pages_id
    INNER JOIN categories 
    ON categories.id = categories_has_pages.categories_id");
$articlesWithCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query
    ("SELECT images.*, categories.*, categories_has_pages.categories_id, pages.*
    FROM `pages`
    INNER JOIN categories_has_pages 
    ON pages.id = categories_has_pages.pages_id
    INNER JOIN categories 
    ON categories.id = categories_has_pages.categories_id
    INNER JOIN images
    ON images.id = pages.images_id");
$fullArticle = $stmt->fetchAll(PDO::FETCH_ASSOC);