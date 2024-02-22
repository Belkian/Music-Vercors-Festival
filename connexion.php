<?php
session_start();
$code_erreur = null;
if (isset($_GET['erreur'])) {
    $code_erreur = (int) $_GET['erreur'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Document</title>
</head>

<body>
    <?php readfile('./assets/header.php'); ?>

    <div id="main">
        <?php readfile('./assets/navigation.php'); ?>
        <form action="src/traitement_User.php" method="post" onsubmit="return Validation()">
            <fieldset>
                <h1>Connexion</h1>
                <label for="mail">Mail :</label>
                <input type="email" id="mail" name="mail" required>
                <?php
                if ($code_erreur === 1) {
                ?>
                    <p class='error'>Le mail n'est pas valide."</p>
                <?php } ?>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <?php if ($code_erreur === 7) { ?>
                    <p class='message error'>Mauvais password</p>
                <?php } ?>
                <input type="submit" name="submit" value="Se connecter">
            </fieldset>
        </form>
    </div>

</body>

</html>