<?php
$title = 'Connexion';
require_once 'layout/header.php';
require_once 'classes/ErrorCode.php'
?>

<main>

    <?php if (isset($_GET['error'])) { ?>
        <div class="error">
            <?php echo ErrorCode::getErrorMessage(intval($_GET['error'])); ?>
        </div>
    <?php } ?>

    <div class="col-lg-6">
        <form action="auth.php" method="POST">

            <input class="form-control mb-3" type="email" name="email" id="email" placeholder="E-mail"/>
            <input class="form-control mb-3" type="password" name="password" id="password" placeholder="Mot de passe"/>
            
            <button class="mb-3" type="submit">Connexion</button>

        </form>
    </div>

</main>

<?php
require_once 'layout/footer.php';