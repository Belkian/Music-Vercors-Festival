<?php
session_start();
if (isset($_SESSION['connecté']) && !empty($_SESSION['user'])) {
    // abort
    header('location:TableauDeBord.php');
    die;
}
$code_erreur = null;
if (isset($_GET['erreur'])) {
    $code_erreur = (int) $_GET['erreur'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Newsletter</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>

<body>
    <?php readfile('./assets/header.php'); ?>
    <div id="main">
        <?php readfile('./assets/navigation.php'); ?>

        <form action="/src/traitement_User.php" method="post" onsubmit="return Validation()">
            <fieldset class="fieldsetInscription">
                <h2>Formulaire d'inscription</h1>

                <div><label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required></div>

                <div><label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required></div>

                <div><label for="mail">Mail :</label>
                <input type="email" id="mail" name="mail" required></div>
                <?php
                if ($code_erreur === 1) {
                ?><p class='error'>Le mail n'est pas valide."</p>
                <?php } ?>

                <div><label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required></div>
                <div><label for="password2">Vérifier le Mot de passe :</label>
                <input type="password" id="password2" name="password2" required></div>
                <?php if ($code_erreur === 3) { ?>
                    <p class='message error'>Les deux mots de passe doivent être identique.</p>
                <?php } ?>
                <?php if ($code_erreur === 4) { ?>
                    <p class='message error'>Le mot de passe doit avoir au moins 8 caractères.</p>
                <?php } ?>
                <?php if ($code_erreur === 2) { ?>
                    <p class='message error'>Tout les champs doivent être remplis.</p>
                <?php } ?>
                <input class="bouton" type="submit" name="submit" value="S'inscrire">
            </fieldset>
        </form>
    </div>
</body>

</html>