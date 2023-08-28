<?php
$title = 'Connexion';
require_once 'layout/header.php';
require_once 'classes/ErrorCode.php'
?>

<main>

    <div class="login row justify-content-center align-items-center">
        <div class="col-lg-4 text-center m-3">
            <form action="auth.php" method="POST">

                <input class="form-control mb-3" type="email" name="email" id="email" placeholder="E-mail"/>
                <input class="form-control mb-3" type="password" name="password" id="password" placeholder="Mot de passe"/>
                
                <?php if (isset($_GET['error'])) { ?>
                    <div class="error mb-3">
                        <?php echo ErrorCode::getErrorMessage(intval($_GET['error'])); ?>
                    </div>
                <?php } ?>

                <button type="submit">Connexion</button>

            </form>
        </div>
    </div>

</main>

<?php
require_once 'layout/footer.php';