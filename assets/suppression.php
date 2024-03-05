<?php
session_start();
require './../src/class/Database.php';
require './../src/class/User.php';
$Database = new Database();

if (isset($_GET['suppression']) && $_SESSION['connecté'] && !empty($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
    if ($user->getId() === (int) $_GET['suppression']) {
        if ($Database->supprimerUtilisateur($user->getId())) {
            session_destroy();
            header('location: /../connexion.php');
            die;
        }
    } else {
        if ($user->admin()) {
            if ($Database->supprimerUtilisateur($_GET['suppression'])) {

                header('location: ../navigation_admin.php');
                die;
            }
        }
    }
}
header('location: ../connexion.php?erreur');
die;
