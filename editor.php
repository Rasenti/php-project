<?php
$title = 'Éditeur';
require_once 'data/datas.php';
require_once 'layout/header.php';
// var_dump($_GET)

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo "L'id de l'article n'est pas renseigné";
    exit;
  }
  
$urlId = intval($_GET['id']);

if ($urlId === 0) {
    http_response_code(400);
    echo "L'id de l'article est incorrect";
    exit;
}

$articlesIds = array_column($articles, 'id');
$articleKey = array_search($urlId, $articlesIds);

if ($articleKey === false) {
    http_response_code(404);
    echo "Article non trouvé";
    exit;
}

$article = $fullArticle[$articleKey];
// var_dump($article);
?>

<main class="main_sidebar">
<?php require_once __DIR__ . '/layout/sidebar.php' ?>

    <div class="d-flex flex-column w-100">

        <form class="edit_form text-center" action="edit.php?id=<?php echo $urlId ?>" method="POST" enctype="multipart/form-data">

            <input class="form-control mb-3" type="text" name="title" id="title" placeholder="Titre de l'article" value="<?php echo $article['title'] ?>"/>
            <select class="form-control mb-3" type="text" name="categorie" id="categorie" placeholder="Catégorie">
                <option value=""><?php echo $article['cat_name'] ?></option>
                <?php foreach ($categories as $categorie) { 
                    if ($categorie['cat_name'] !== $article['cat_name']) { ?>
                        <option value="<?php echo $categorie['cat_name']?>"><?php echo $categorie['cat_name']?></option>
                    <?php }
                } ?>
            </select>
            <input class="form-control mb-3" type="file" name="image" id="image" placeholder="Image de l'article"/>
            <textarea class="form-control mb-3" name="content" id="content" rows="12" placeholder="Contenu de l'article..."/><?php echo $article['content'] ?></textarea>

            <?php if (isset($_GET['error'])) { ?>
                <div class="error mb-3">
                    <?php echo ErrorCode::getErrorMessage(intval($_GET['error'])); ?>
                </div>
            <?php } ?>

            <button type="submit">Éditer</button>

        </form>

    </div>

</main>

<?php
require_once 'layout/footer.php';