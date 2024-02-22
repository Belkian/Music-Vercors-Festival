<?php
require 'config.php';

if (!empty($_POST['nom']) && isset($_POST['nom']) && !empty($_POST['prenom']) && isset($_POST['prenom']) && !empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['telephone']) && isset($_POST['telephone']) && !empty($_POST['adressePostale']) && isset($_POST['adressePostale'])) {

    $nom = htmlspecialchars(strip_tags($_POST['nom']));
    $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
    $adressePostale = htmlspecialchars(strip_tags($_POST['adressePostale']));
    $telephone = htmlspecialchars(strip_tags($_POST['telephone']));
    $enfantsOui = htmlspecialchars(strip_tags((bool)$_POST['enfantsOui']));
    $vanNuit1 = htmlspecialchars(strip_tags((bool)$_POST['vanNuit1']));
    $vanNuit2 = htmlspecialchars(strip_tags((bool)$_POST['vanNuit2']));
    $vanNuit3 = htmlspecialchars(strip_tags((bool)$_POST['vanNuit3']));
    $van3Nuit = htmlspecialchars(strip_tags((bool)$_POST['van3Nuit']));

    if (is_numeric($telephone)) {
        $telephone = $telephone;
    } else {
        header('localisation : /../index.php?erreur=' . ERREUR_TELEPHONE);
        exit;
    }

    // email verificiation et nettoyage des caractère spéciaux
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = htmlentities($email);
    } else {
        header('location: ../index.php?email=' . ERREUR_EMAIL);
        exit;
    }

    //prix et nombre de nuit pour la tente 

    $Prix_jour_tente = 0;
    $nombre_de_nuit_tente = 0;
    if ($tenteNuit1 == true) {
        $Prix_jour_tente = 5 + $Prix_jour_tente;
        $nombre_de_nuit_tente = 1 + $nombre_de_nuit_tente;
    }
    if ($tenteNuit2 == true) {
        $Prix_jour_tente = 5 + $Prix_jour_tente;
        $nombre_de_nuit_tente = 1 + $nombre_de_nuit_tente;
    }
    if ($tenteNuit3 == true) {
        $Prix_jour_tente = 5 + $Prix_jour_tente;
        $nombre_de_nuit_tente = 1 + $nombre_de_nuit_tente;
    }

    if ($tenteNuit1 == true &&  $tenteNuit2 == true && $tenteNuit3 == true) {
        $tente3Nuit = true;
        $tenteNuit1 = false;
        $tenteNuit2 = false;
        $tenteNuit3 = false;
        $Prix_jour = 12;
    } else {
        header('location: ../index.php?erreur=' . ERREUR_CHAMP_VIDE);
    }

    //prix et nombre de nuit pour le van 
    $Prix_jour_van = 0;
    $nombre_de_nuit_van = 0;
    if ($vanNuit1 == true) {
        $Prix_jour_van = 5 + $Prix_jour_van;
        $nombre_de_nuit_van = 1 + $nombre_de_nuit_van;
    }
    if ($vanNuit2 == true) {
        $Prix_jour_van = 5 + $Prix_jour_van;
        $nombre_de_nuit_van = 1 + $nombre_de_nuit_van;
    }
    if ($vanNuit3 == true) {
        $Prix_jour_van = 5 + $Prix_jour_van;
        $nombre_de_nuit_van = 1 + $nombre_de_nuit_van;
    }

    if ($vanNuit1 == true &&  $vanNuit2 == true && $vanNuit3 == true) {
        $van3Nuit = true;
        $vanNuit1 = false;
        $vanNuit2 = false;
        $vanNuit3 = false;
        $Prix_jour_van = 12;
    } else {
        header('location: ../index.php?erreur=' . ERREUR_CHAMP_VIDE);
    }


    if ($enfantsOui === true) {
        $nombreCasquesEnfants = (int) htmlspecialchars(strip_tags($_POST['nombreCasquesEnfants']));
    } else {
        $nombreCasquesEnfants = 0;
    }

    htmlspecialchars(strip_tags($_POST['nombrePlaces']));
    if (!empty($_POST['nombrePlaces']) && isset($_POST['nombrePlaces'])) {

        $nombrePlaces = (int) $_POST['nombrePlaces'];
        $NombreLugesEte = (int) $_POST['NombreLugesEte'];




        if (htmlspecialchars(strip_tags($_POST['tarifReduit'])) === false) {
            $tarif = $nombrePlaces * ($NombreLugesEte + $nombreCasquesEnfants + $Prix_jour_van);
        } else {
            $tarif_reduit = $nombrePlaces * ($NombreLugesEte + $nombreCasquesEnfants + $Prix_jour_van);
            $Tableau_recapitulatif_option_choisi = [];
        }
    } else {
        header('location: /../index.php?message=' . ERREUR_CHAMP_VIDE);
    }
} else {
    header('location: /../index.php?erreur=' . ERREUR_CHAMP_VIDE);
}
