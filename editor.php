<?php
$title = 'Éditeur';
require_once 'layout/header.php';
?>

<main class="main_sidebar">
<?php require_once __DIR__ . '/layout/sidebar.php' ?> 

    <form action="edit.php" method="POST">

        <input class="form-control mb-3" type="email" name="email" id="email" placeholder="E-mail"/>
        <input class="form-control mb-3" type="password" name="password" id="password" placeholder="Mot de passe"/>

        <?php if (isset($_GET['error'])) { ?>
            <div class="error mb-3">
                <?php echo ErrorCode::getErrorMessage(intval($_GET['error'])); ?>
            </div>
        <?php } ?>

        <button type="submit">Connexion</button>

    </form>

</main>

<?php
require_once 'layout/footer.php';