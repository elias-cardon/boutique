<header>
    <?php
    require_once('include/header.php');
    ?>
</header>
<link rel="stylesheet" type="text/css" href="src/css/Users.css">


<?php

include 'src/php/Base.php';

$users = new Base\User();
?>


<table class="user">
    <thead>
    <tr>
        <th>Login</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users->getUsers() as $user) { ?>
        <tr>
            <td><?= $user['login'] ?></td>
            <td><?= $user['prenom'] ?></td>
            <td><?= $user['nom'] ?></td>
            <td><?= $user['email'] ?></td>
        </tr>
    <?php } ?>

    </tbody>
</table>

<footer>
    <?php
    require_once('include/footer.php');
    ?>
</footer>