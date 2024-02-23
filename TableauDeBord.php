<?php
session_start();
require './src/config.php';
require 'src/class/User.php';
require 'src/class/Database_Reservation.php';
require 'src/class/Reservation.php';
$code_erreur = null;
if (isset($_GET['erreur'])) {
    $code_erreur = (int) $_GET['erreur'];
}

if (!isset($_SESSION['connecté']) && empty($_SESSION['user'])) {
    // abort
    header('location: connexion.php');
    die;
}
$user = unserialize($_SESSION['user']);
$email = $user->getMail();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Tableau de bord</title>
</head>

<body>
    <?php include './assets/header_user.php'; ?>

    <div id="main">
        <?php include './assets/navigation_user.php'; ?>
        <div>
            <?php
            $database_reservation = new Database_reservation();
            var_dump($database_reservation->find_Reservation_By_Email($email));
            ?>
        </div>
    </div>
</body>

</html>