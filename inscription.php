<?php
//SECURE PASSWORD N VERIF IF LOGIN ALREADY EXIST
session_start();
if (isset($_POST['submit'])) {
    $login = htmlentities(trim($_POST['login']));
    $email = htmlentities(trim($_POST['email']));
    $password = htmlentities(trim($_POST['password']));
    $repeatpassword = htmlentities(trim($_POST['repeatpassword']));

    if ($login && $email && $password && $repeatpassword) {
        if ($password == $repeatpassword) {
            //CRYPTAGE MDP
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 15));

            $db = mysqli_connect('localhost', 'root', '') or die('Erreur');
            mysqli_select_db($db, 'boutique');

            //VERIFIER SI LE EMAIL EXISTE DEJA
            $request = " SELECT email FROM utilisateurs WHERE email = '" . $_POST['email'] . "' ";
            $query = mysqli_query($db, $request);
            $test_login = mysqli_fetch_array($query);

            if (!empty($test_login))
            {
            echo "Cet email existe déjà ! Veuillez en choisir un autre.";
            }else{
                $query = mysqli_query($db, "INSERT INTO utilisateurs (login, email, password) VALUES('$login', '$email', '$password');");

                die("Inscription terminée. <a href='connexion.php'>Connectez-vous</a>.");
            }

        } else {
            echo "Les mots de passes doivent être identiques";
        }
    } else {
        echo "Veuillez saisir tous les champs";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>



    <link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body>
<header>
    <?php
    require_once('include/header.php');
    ?>
</header>
<main>
	<form method="post" action="inscription.php">
        <p>Login</p>
        <input class="input" type="text" name="login">
        <p>Votre email</p>
        <input class="input" type="text" name="email">
        <p>Mot de passe</p>
        <input class="input" type="password" name="password">
        <p>Répétez votre mot de passe</p>
        <input class="input" type="password" name="repeatpassword"><br><br>
        <input class="input" type="submit" name="submit" value="Valider">
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