<?php
require 'config.php';

if (!empty($_POST['nom']) && isset($_POST['nom']) && !empty($_POST['prenom']) && isset($_POST['prenom']) && !empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['telephone']) && isset($_POST['telephone']) && !empty($_POST['adressePostale']) && isset($_POST['adressePostale'])) {

    $nom = htmlspecialchars(strip_tags($_POST['nom']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
    $adressePostale = htmlspecialchars(strip_tags($_POST['adressePostale']));
    $telephone = htmlspecialchars(strip_tags($_POST['telephone']));
    $enfantsOui = htmlspecialchars(strip_tags($_POST['enfantsOui']));

    if (is_numeric($telephone)) {
        $telephone = $telephone;
    } else {
        header('localisation : /../index.php?erreur=' . ERREUR_TELEPHONE);
        exit;
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = htmlentities($email);
    } else {
        header('location: ../index.php?email=' . ERREUR_EMAIL);
        exit;
    }

    if (!empty($_POST['nombrePlaces']) && isset($_POST['nombrePlaces'])) {

        $nombrePlaces = (int) $_POST['nombrePlaces'];
        $NombreLugesEte = (int) $_POST['NombreLugesEte'];


        if ($enfantsOui === true) {
            $nombreCasquesEnfants = (int) htmlspecialchars(strip_tags($_POST['nombreCasquesEnfants']));
        } else {
            $nombreCasquesEnfants = 0;
        }

        if (htmlspecialchars(strip_tags($_POST['tarifReduit'])) === false) {
            $tarif = $nombrePlaces * ($NombreLugesEte + $nombreCasquesEnfants);
        } else {
            $tarif_reduit = $nombrePlaces * ($NombreLugesEte + $nombreCasquesEnfants);
        }
    } else {
        header('location: /../index.php?message=' . ERREUR_CHAMP_VIDE);
    }
} else {
    header('location: /../index.php?erreur=' . ERREUR_CHAMP_VIDE);
}
