<?php
$title = 'Accueil';
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/data/datas.php';
?>

<main>

    <div class="banner">
        <div class="banner_txt">
            <p>Bienvenue dans l’univers fantastique de</p>
            <p class="banner_title">Jonction</p>
            <p>Plongez dans un monde médiéval fantastique riche en aventures épiques, en mystères et en magie. Jonction offre une expérience de jeu immersive où vous pouvez incarner des héros courageux, explorer des terres lointaines et affronter des créatures légendaires.</p>
            <a href="/encyclopedie.php"><button>Encyclopédie</button></a>
        </div>
    </div>

    <section class="txt_bloc">

        <h2>Bienvenue dans le jeu de rôle Jonction !</h2>
        <hr>
        <div>
            <p>Que vous soyez un joueur avide à la recherche d’une nouvelle campagne de jeu de rôle ou un maître du jeu talentueux cherchant à donner vie à vos propres récits, notre site est votre destination ultime. Nous mettons à votre disposition une collection complète de ressources gratuites pour faciliter votre expérience de jeu dans le jeu de rôle Jonction.</p>

            <h3>Pour les joueurs :</h3>

            <ul>
                <li>Choisissez parmi huit peuples uniques, chacun doté de ses propres capacités spéciales et de son histoire fascinante. Explorez les détails de chaque peuple et découvrez celui qui correspond le mieux à votre style de jeu.</li>
                <li>Parcourez notre vaste galerie de personnages pré-tirés pour vous aider à démarrer rapidement. Chaque personnage est soigneusement conçu avec une feuille de personnage prête à l’emploi, des antécédents détaillés et des croquis illustratifs.</li>
                <li>Plongez dans notre bibliothèque d’histoires et de quêtes passionnantes. Des scénarios captivants, des intrigues complexes et des défis palpitants attendent votre groupe de héros. Explorez des donjons mystérieux, combattez des créatures légendaires et sauvez des royaumes en péril.</li>
            </ul>
            <h3>Pour les maîtres du jeu :</h3>
            <ul>
                <li>Accédez à nos outils de création de campagnes, qui vous permettent de construire des mondes fantastiques personnalisés. Créez des royaumes, peuplez-les de PNJ intéressants et élaborez des intrigues captivantes pour surprendre vos joueurs.</li>
                <li>Explorez notre bestiaire complet, rempli de créatures fantastiques, de monstres redoutables et d’animaux mystérieux. Chaque créature est accompagnée de statistiques complètes, de descriptions détaillées et de conseils pour intégrer ces adversaires dans vos parties.</li>
                <li>Consultez notre guide du maître du jeu, une ressource précieuse regorgeant de conseils pratiques, d’astuces de narration et de règles avancées pour rendre vos parties encore plus immersives et palpitantes.</li>
            </ul>

            <p>Donc peu importe que vous soyez un joueur en quête d’aventure ou un maître du jeu plein d’imagination, Jonction vous offre la possibilité de créer des histoires inoubliables et de vivre des expériences uniques.</p>
            <p>Rejoignez-nous dès maintenant et plongez dans l’aventure extraordinaire de Jonction !</p>
        </div>

    </section>

    <section class="articles">

        <h2>L'Encyclopédie</h2>
        <hr>

        <div class = "row justify-content-center">
            
            <?php for ($i=0; $i<3; $i++) { 
                $article = $fullArticle[$i] ?>
                <article class ="home_card card col-3 m-4 p-0">

                    <div class="card_img">
                        <a href="article.php?id=<?php echo $article['id'] ?>">
                            <img src="uploads/<?php echo $article['img_name'] ?>" alt="<?php echo $article['alt'] ?>">
                        </a>
                    </div>

                    <div class="card_text">
                        <h3><?php echo $article['title'] ?></h3>
                        <h5><?php echo $article['cat_name'] ?></h5>
                        <p><?php echo substr($article['content'], 0, 100) . "..." ?></p>
                        <a class="text-black text-decoration-none d-flex justify-content-end" href="article.php?id=<?php echo $article['id'] ?>">Lire la suite...</a>
                    </div>

                </article>
            <?php } ?>

            <a class="all_articles text-decoration-none m-4" href="encyclopedie.php"><button>Tous les Articles</button></a>

        </div>

    </section>

    <div class="newsletter_banner mt-4">

        <section class="newsletter">
    
            <div class="row">

                <div class="news_text col-lg-6">

                    <h3>Inscrivez-vous !</h3>
                    <p>Notre but est de vous offrir la meilleure expérience de jeu possible, et pour cela nous ajoutons régulièrement du contenu. Donc n’hésitez pas à vous inscrire pour ne rien rater des nouveautés dans Jonction !</p>

                </div>
    
                <div class="col-lg-6">

                    <form action="subscribe.php" method="POST">

                        <input class="form-control mb-3" type="text" name="firstname" id="firstname" placeholder="Prénom"/>
                        <input class="form-control mb-3" type="text" name="lastname" id="lastname" placeholder="Nom"/>
                        <input class="form-control mb-3" type="text" name="pseudo" id="pseudo" placeholder="Pseudo"/>
                        <input class="form-control mb-3" type="date" name="birthdate" id="birthdate" placeholder="Date de naissance"/>
                        <input class="form-control mb-3" type="email" name="email" id="email" placeholder="E-mail"/>
                        <input class="form-control mb-3" type="password" name="password" id="password" placeholder="Mot de passe"/>
                        <input class="form-control mb-3" type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirmez le mot de passe"/>

                        <button class="mb-3" type="submit">S'inscrire</button>

                        <?php if (!empty($_SESSION['errors']))
                        { 
                            $errors = $_SESSION['errors'];
                            $errorString = implode("<br> ", $errors); 
                            ?>
                                <p class="error"><?php echo $errorString ?></p>
                            <?php 
                            $_SESSION['errors'] = "";
                        } ?>

                    </form>

                </div>

            </div>
    
        </section>

    </div>

</main>

<?php
require_once 'layout/footer.php';