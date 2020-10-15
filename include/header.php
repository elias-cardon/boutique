<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body>
<header>
    <header class="header-area">
        <!-- site-navbar start -->
        <div class="navbar-area">
            <div class="container">
                <nav class="site-navbar">
                    <!-- site logo -->
                    <a href="#home" class="site-logo">La Bonne Planque</a>

                    <!-- site menu/nav -->
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="boutique.php">Boutique</a></li>
                        <li><a href="panier.php">Panier</a></li>
                        <?php
                        session_name('header');
                        session_start();
                        if (!isset($_SESSION['login'])) { ?>
                            <li><a href="inscription.php">Inscription</a></li>
                            <li><a href="connexion.php">Connexion</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        $pageSelected = 'profil';
                        if (isset($_SESSION['login'])) {
                            ?>
                            <li><a href="profil.php">Profil</a></li>
                            <li><a href="logout.php">Déconnexion</a></li>
                            <?php
                        }
                        session_write_close();
                        ?>

                    </ul>

                    <!-- nav-toggler for mobile version only -->
                    <button class="nav-toggler">
                        <span></span>
                    </button>
                </nav>
            </div>
        </div><!-- navbar-area end -->
    </header>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
</body>
</html>