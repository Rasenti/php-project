<?php
$title = 'Nouvel Article';
require_once __DIR__ . '/data/datas.php';
require_once __DIR__ . '/layout/header.php';
// var_dump($_GET)

?>

<main class="main_sidebar">
<?php require_once __DIR__ . '/layout/sidebar.php' ?>

    <div class="d-flex flex-column w-100">

        <form class="edit_form text-center" action="/crud/create.php" method="POST" enctype="multipart/form-data">

            <input class="form-control mb-3" type="text" name="title" id="title" placeholder="Titre de l'article" required/>
            <select class="form-control mb-3" type="text" name="categorie" id="categorie" placeholder="Catégorie" required>
                <option value="">--Catégorie--</option>
                <?php foreach ($categories as $categorie) { ?>
                    <option value="<?php echo $categorie['cat_name']?>"><?php echo $categorie['cat_name']?></option>
                <?php } ?>
            </select>
            <input class="form-control mb-3" type="file" name="image" id="image" placeholder="Image de l'article" required/>
            <textarea class="form-control mb-3" name="content" id="content" rows="12" placeholder="Contenu de l'article..." required/></textarea>

            <button type="submit">Créer</button>

        </form>

    </div>

</main>

<?php
require_once 'layout/footer.php';