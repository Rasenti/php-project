<footer>
    <div class="footer container-fluid">
        <div class="row">

            <div class="footer_column col-3">

                    <a href="/index.php" class="d-flex justify-content-center">
                        <img class="footer_logo" src="/uploads/logo.svg" alt="Logo Jonction">
                    </a>

            </div>

            <div class="footer_column col-3">
                <a href="index.php">Accueil</a>
            </div>

            <div class="footer_column col-3">
                <a href="encyclopedie.php">Encyclopédie</a>
            </div>

            <?php if (isset ($_SESSION['admin']) && $_SESSION['admin'] === 1) { ?>
                <div class="footer_column col-3">
                    <a href="admin.php">Administration</a>
                </div>
            <?php } ?>

        </div>

        <div class="copy_tos">
            <div class="copyright">
                <p>©2023 Jonction | All Rights Reserved</p>
            </div>

            <div class="tos">
                <p>Mentions légales – CGV – Crédits</p>
            </div>
        </div>
    </div>

</footer>

</body>

</html>