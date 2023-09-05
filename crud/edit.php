<?php
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../data/datas.php';

//Je stock la valeur entière de l'id récupéré dans GET
$pageId = intval($_GET['id']);
//Je passe le nom de ma catégorie en minuscule avec la première lettre en majuscule
$categorie = ucfirst(strtolower($_POST['categorie']));
var_dump($_POST);
var_dump($categorie);
//J'enregistre l'image uploadée sur mon serveur
if (isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $filename = $file['name'];
    $destination = __DIR__ . "/../uploads/" . $filename;
    move_uploaded_file($file['tmp_name'], $destination);
}

//Je mets à jour l'article sur la table pages
$stmt = $pdo->prepare("UPDATE pages SET title=:title, content=:content WHERE id=:id");
$stmt->execute([
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'id' => $pageId
]);

//SI UNE IMAGE A ETE UPLOAD
if (!empty($filename)) {
//Je récupère l'id de l'image existante associée à l'article qu'on édite
    $stmt = $pdo->prepare("SELECT images_id FROM pages WHERE id=:id");
    $stmt->execute(['id' => $pageId]);
    $imageId = $stmt->fetch(PDO::FETCH_ASSOC);

// Je mets à jour l'image sur la table images
    $stmt = $pdo->prepare("UPDATE images SET img_name=:name WHERE id=:imageId");
    $stmt->execute([
        'name' => $filename,
        'imageId' => $imageId['images_id']
    ]);
}

//Je récupère l'id de la catégorie qu'on édite
$stmt = $pdo->prepare("SELECT id FROM categories WHERE cat_name=:name");
$stmt->execute(['name' => $categorie]);
$categorieId = $stmt->fetch(PDO::FETCH_ASSOC);

//Je mets à jour la clé étrangère sur la table categories_has_pages
$stmt = $pdo->prepare("UPDATE categories_has_pages SET categories_id=:categorieId WHERE pages_id=:pageId");
$stmt->execute([
    'categorieId' => $categorieId['id'],
    'pageId' => $pageId
]);

Utils::redirect('/admin.php');