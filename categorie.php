<?php
$title = $_GET['name'];
require_once __DIR__ . '/data/datas.php';
require_once __DIR__ . '/layout/header.php';

$name = ($_GET['name']) ?? null;

if ($name === null) {
    http_response_code(404);
    echo "La catégorie n'existe pas :(";
    exit;
}
?>

<main class="main_sidebar">
<?php require_once __DIR__ . '/layout/sidebar.php' ?>

    <div class="corpus row w-100 justify-content-center">

        <?php foreach ($fullArticle as $article) { 
            if ($article['cat_name'] === $name) { ?>
                <article class ="card col-3 m-4 p-0">

                    <div class="card_img">
                        <a href="article.php?id=<?php echo $article['id'] ?>">
                            <img src="uploads/<?php echo $article['img_name'] ?>" alt="<?php echo $article['alt'] ?>">
                        </a>
                    </div>

                    <div class="card_text">
                        <h3><?php echo $article['title'] ?></h3>
                        <h5><?php echo $article['cat_name'] ?></h5>
                        <p><?php echo substr($article['content'], 0, 300) . "..." ?></p>
                        <a class="text-black text-decoration-none d-flex justify-content-end" href="article.php?id=<?php echo $article['id'] ?>">Lire la suite...</a>
                    </div>

                </article>
            <?php } 
        }?>

    </div>

</main>

<?php
require_once 'layout/footer.php';