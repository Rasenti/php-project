<?php
require_once 'layout/header.php';
$title = 'Accueil';
?>

<main>

    <div class="banner">
        <div class="banner_txt">
            <p>Bienvenue dans l’univers fantastique de</p>
            <p class="banner_title">Jonction</p>
            <p>Plongez dans un monde médiéval fantastique riche en aventures épiques, en mystères et en magie. Jonction offre une expérience de jeu immersive où vous pouvez incarner des héros courageux, explorer des terres lointaines et affronter des créatures légendaires.</p>
            <button>Encyclopédie</button>
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

            <article class = "card col-3 m-2">
                <div>
                    <a href="">
                        <img src="" alt="">
                    </a>
                </div>
                <div>
                    <h3></h3>
                    <p></p>
                </div>
            </article>

            <article class = "card col-3 m-2">
                <div>
                    <a href="">
                        <img src="" alt="">
                    </a>
                </div>
                <div>
                    <h3></h3>
                    <p></p>
                </div>
            </article>

            <article class = "card col-3 m-2">
                <div>
                    <a href="">
                        <img src="" alt="">
                    </a>
                </div>
                <div>
                    <h3></h3>
                    <p></p>
                </div>
            </article>

        </div>

    </section>

    <div class="newsletter_banner">
        <section class="newsletter">
    
            <div class="row">
                <div class="col-lg-6">
                    <h3>Inscrivez-vous à notre Newsletter !</h3>
                    <p>Notre but est de vous offrir la meilleure expérience de jeu possible, et pour cela nous ajoutons régulièrement du contenu. Donc n’hésitez pas à vous inscrire à la newsletter, pour ne rien rater des nouveautés dans Jonction !</p>
                </div>
    
                <div class="col-lg-6">
                    <form action="" method="POST">
                        <input class="form-control mb-3" type="text" name="lastName" id="lastName" placeholder="Nom"/>
                        <input class="form-control mb-3" type="text"        name="firstName" id="firstName" placeholder="Prénom"/>
                        <input class="form-control mb-3" type="email" name="email" id="email" placeholder="E-mail*"/>
                        
                        <button class="mb-3" type="submit">S'inscrire</button>
    
                    </form>
                </div>
            </div>
    
        </section>
    </div>

</main>

<?php
require_once 'layout/footer.php';