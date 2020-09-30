<script src="https://kit.fontawesome.com/68a550b660.js" crossorigin="anonymous"></script>
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
/>

<nav id="nav-index">
    <div id="top-title">
        <a href="index.php"><h3 class="animate__animated animate__backInLeft">La Bonne Planque</h3></a><i
                class="fas fa-gamepad"></i>
    </div>
    <?php
    if (!isset($_SESSION['login'])) {
        ?>
        <div class="btn_center">
            <div class="btn animate__animated animate__bounceIn"><a href="connexion.php">Se connecter</a></div>
            <div class="btn animate__animated animate__bounceIn"><a href="inscription.php">S'inscrire</a></div>
        </div>
        <?php
    }
    ?>
    <?php
    $pageSelected = 'profil';
    if (isset($_SESSION['login'])) {
        ?>

        <div class="btn_center">
            <ul class="menu-nav">
                <?php if ($pageSelected == 'profil') { ?>
                    <li class="btn"><a href="index.php">ACCUEIL</a></li>
                <?php } ?>
                <li class="btn"><a href="profil.php">PROFIL</a></li>
                <?php if ($pageSelected == 'profil') { ?>
                    <li class="btn"><a href="admin.php">ADMIN</a></li>
                <?php } ?>
                <li class="btn"><a href="logout.php">DECONNEXION</a></li>
            </ul>
        </div>
        <?php
    }
    ?>
</nav>

