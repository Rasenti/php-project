<?php
$title = 'Administration';
require_once 'layout/header.php';
?>

<main class="main_sidebar">
<?php require_once __DIR__ . '/layout/sidebar.php' ?>    

    <div class="d-flex flex-column w-100">

        <div class="m-4">
            <a href="/project/creator.php">
                <button>Créer</button>
            </a>
        </div>

        <div class="m-4 mt-0">
            <table class="table table-bordered">

                <thead class="table-dark">

                    <tr>
                    <th scope="col">Titre de l'Article</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Éditer</th>
                    <th scope="col">Supprimer</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($articlesWithCategories as $el) { ?>
                        <tr>
                            <td><?php echo $el['title']?></td>
                            <td><?php echo $el['name']?></td>
                            <td><a href="/project/editor.php?id=<?php echo $el['id'] ?>"><img alt="Éditer" src="uploads/editpen.svg"/></a></td>
                            <td><input type="image" id="delete" name="delete" alt="Supprimer" src="uploads/trashbin.svg" onclick="deleteArticle($el['title'], $el['name'])" /></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>

</main>

<?php
require_once 'layout/footer.php';