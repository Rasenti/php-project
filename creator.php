<?php
$title = 'Nouvel Article';
require_once 'data/datas.php';
require_once 'layout/header.php';
// var_dump($_GET)

?>

<main class="main_sidebar">
<?php require_once __DIR__ . '/layout/sidebar.php' ?>

    <div class="d-flex flex-column w-100">

        <form class="edit_form text-center" action="create.php" method="POST">

            <input class="form-control mb-3" type="text" name="title" id="title" placeholder="Titre de l'article"/>
            <input class="form-control mb-3" type="text" name="categorie" id="categorie" placeholder="Catégorie"/>
            <input class="form-control mb-3" type="file" name="image" id="image" placeholder="Image de l'article"/>
            <textarea class="form-control mb-3" name="content" id="content" rows="12" placeholder="Contenu de l'article..."/></textarea>

            <button type="submit">Créer</button>

        </form>

    </div>

</main>

<?php
require_once 'layout/footer.php';