<?php
$title = 'Éditeur';
require_once 'layout/header.php';
?>

<main class="main_sidebar">
<?php require_once __DIR__ . '/layout/sidebar.php' ?>

    <div class="d-flex flex-column w-100">

        <form class="edit_form text-center" action="edit.php" method="POST">

            <input class="form-control mb-3" type="text" name="title" id="title" placeholder="Titre de l'article"/>
            <input class="form-control mb-3" type="text" name="categorie" id="categorie" placeholder="Catégorie"/>
            <input class="form-control mb-3" type="file" name="image" id="image" placeholder="Image de l'article"/>
            <textarea class="form-control mb-3" name="content" id="content" rows="6" placeholder="Contenu de l'article..."/></textarea>

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