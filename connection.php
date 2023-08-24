<?php
$title = 'Connexion';
require_once 'layout/header.php';
?>

<main>

    <div class="col-lg-6">
        <form action="" method="POST">

            <input class="form-control mb-3" type="email" name="email" id="email" placeholder="E-mail*"/>
            <input class="form-control mb-3" type="text" name="password" id="password" placeholder="Mot de passe"/>
            
            <button class="mb-3" type="submit">Connexion</button>

        </form>
    </div>

</main>

<?php
require_once 'layout/footer.php';