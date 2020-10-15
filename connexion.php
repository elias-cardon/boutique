<?php
if (isset($_POST['submit'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    if ($login && $password) {
        $connect = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'root', '');

        $log = $connect->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $log->execute(array($login));

        $verify = $log->fetch(PDO::FETCH_ASSOC);

        //Vérification si login & password == $_POST['login'] & $_POST['password']
        if (!empty($verify)) {
            if (password_verify($_POST['password'], $verify['password'])) {
                $_SESSION['login'] = $login;
                header('Location:index.php');
                exit();
            } else {
                echo "Impossible de vous authentifier correctement.";
            }
        }
    }else {
        echo "Veuillez saisir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>



    <link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body>
<header>
    <?php
    require_once('include/header.php');
    ?>
</header>
<main>
    <form method="post" action="connexion.php">
        <p>Login</p>
        <input class="input" type="text" name="login">
        <p>Mot de passe</p>
        <input class="input" type="password" name="password"><br/><br/>
        <input class="input" id="connexionSubmit" type="submit" name="submit" value="Valider"><br/>
    </form>
</main>
<footer>
    <?php
    require_once('include/footer.php');
    ?>
</footer>
</body>
<script src="script.js"></script>
</html>