<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? "Jonction"; ?></title>
    <link rel="stylesheet" href="/project/assets/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <header class="container-fluid p-0">

        <div class="navbar p-0">
            
            <div class="logo_container col-lg-2 col-6 m-0">
                <a href="/project/index.php">
                    <img class="logo img-fluid" src="/project/uploads/logo.svg" alt="Logo">
                </a>
            </div>
            
            <ul class="navitems d-flex col-lg-8">
                <li class="btn_navbar"><a href="/project/index.php">Accueil</a></li>
                <li class="btn_navbar"><a href="/project/encyclopedie.php">Encyclopédie</a></li>
                <?php if (isset ($_SESSION['admin']) && $_SESSION['admin'] === true) { ?>
                    <li class="btn_navbar"><a href="/project/admin.php">Administration</a></li>
                <?php } ?>
                
            </ul>
            <div class="button_container col-lg-2 col-6 mr-2">
                <?php if (isset($_SESSION['pseudo'])) { ?>
                    <p><?php echo $_SESSION['pseudo'] ?></p>
                    <a href="/project/logout.php"><button class="connect">Déconnexion</button></a>
                <?php } else { ?>
                    <a href="/project/login.php"><button class="connect">Connexion</button></a>
                <?php } ?>
            </div>
        </div>

    </header>