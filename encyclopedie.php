<?php
$title = 'Encyclopédie';
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/data/datas.php';
?>

<main class="main_sidebar">
<?php require_once __DIR__ . '/layout/sidebar.php' ?>

    <div class="corpus row w-100 justify-content-center">

        <?php foreach ($fullArticle as $article) { ?>
            <article class ="card col-3 m-4 p-0">

                <div class="card_img">
                    <a href="article.php?id=<?php echo $article['id'] ?>">
                        <img src="uploads/<?php echo $article['img_name'] ?>" alt="<?php echo $article['alt'] ?>">
                    </a>
                </div>

                <div class="card_text">
                    <h3><?php echo $article['title'] ?></h3>
                    <h4><?php echo $article['cat_name'] ?></h4>
                    <p><?php echo substr($article['content'], 0, 300) . "..." ?></p>
                    <a class="text-black text-decoration-none d-flex justify-content-end" href="article.php?id=<?php echo $article['id'] ?>">Lire la suite...</a>
                </div>

            </article>
        <?php } ?>

    </div>

</main>

<?php
require_once 'layout/footer.php';