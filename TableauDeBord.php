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
    <?php readfile('./assets/header_user.php'); ?>

    <div id="main">
        <?php readfile('./assets/navigation_user.php'); ?>
        <?php readfile('./reservation.php'); ?>
</body>

</html>