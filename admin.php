<?php
$title = 'Administration';
require_once 'layout/header.php';
?>

<main class="main_sidebar">
<?php require_once __DIR__ . '/layout/sidebar.php' ?>    

    <div class="d-flex flex-column w-100">

        <div class="m-4">
            <button>Créer</button>
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

                    <tr>
                    <td>Coucou</td>
                    <td>Règles</td>
                    <td>Peuples</td>
                    <td>Capacités</td>
                    </tr>

                    <tr>
                    <td>Salut</td>
                    <td>Peuples</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>

                    <tr>
                    <td>Bye</td>
                    <td>Capacités</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

</main>

<?php
require_once 'layout/footer.php';