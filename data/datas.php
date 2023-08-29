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

$stmtSelect = $pdo->query
    ("SELECT pages.*, categories.name 
    FROM `pages`
    INNER JOIN categories_has_pages 
    ON pages.id = categories_has_pages.pages_id
    INNER JOIN categories 
    ON categories.id = categories_has_pages.categories_id");
$articlesWithCategories = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

function editArticle()
{

}