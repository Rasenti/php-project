<?php
$title = 'Encyclopédie';
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/data/datas.php';

$id = intval($_GET['id']) ?? null;

if ($id === null) {
    http_response_code(404);
    echo "L'Article n'existe pas :(";
    exit;
}

$articlesIds = array_column($fullArticle, 'id');
$articleKey = array_search($id, $articlesIds);
if ($articleKey === false) {
    http_response_code(404);
    echo "Produit non trouvé";
    exit;
}

$article = $fullArticle[$articleKey];
?>

<main class="main_sidebar">
<?php require_once __DIR__ . '/layout/sidebar.php' ?>

    <div class="article w-100 p-5">

        <div class="image_container">
            <img class="w-100" src="uploads/<?php echo $article['img_name']?>" alt="<?php echo $article['alt']?>">
        </div>
        <h1><?php echo $article['title']?></h1>
        <p><?php echo $article['content']?></p>

    </div>

</main>

<?php
require_once 'layout/footer.php';