<?php
require 'config.php';

if (!empty($_POST['nom']) && isset($_POST['nom']) && !empty($_POST['prenom']) && isset($_POST['prenom']) && !empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['telephone']) && isset($_POST['telephone']) && !empty($_POST['adressePostale']) && isset($_POST['adressePostale'])) {

    $nom = htmlspecialchars(strip_tags($_POST['nom']));
    $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
    $adressePostale = htmlspecialchars(strip_tags($_POST['adressePostale']));
    $telephone = htmlspecialchars(strip_tags($_POST['telephone']));


    if (is_numeric($telephone)) {
        $telephone = $telephone;
    } else {
        header('localisation : /../index.php?erreur=' . ERREUR_TELEPHONE);
        exit;
    }

    // email verificiation et nettoyage des caractère spéciaux
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlentities($_POST['email']);
    } else {
        header('location: ../index.php?email=' . ERREUR_EMAIL);
        exit;
    }

    //prix et nombre de nuit pour la tente 
    if (isset($_POST['tenteNuit1']) && isset($_POST['tenteNuit2']) && isset($_POST['tenteNuit3'])) {
        $vanNuit1 = htmlspecialchars(strip_tags((bool)$_POST['vanNuit1']));
        $vanNuit2 = htmlspecialchars(strip_tags((bool)$_POST['vanNuit2']));
        $vanNuit3 = htmlspecialchars(strip_tags((bool)$_POST['vanNuit3']));
        $van3Nuit = htmlspecialchars(strip_tags((bool)$_POST['van3Nuit']));
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
            $Prix_jour_tente = 12;
        } else {
            header('location: ../index.php?erreur=' . ERREUR_CHAMP_VIDE);
        }
    }
    $Prix_jour_van = 0;
    //prix et nombre de nuit pour le van 
    if (isset($_POST['vanNuit1']) && isset($_POST['vanNuit2']) && isset($_POST['vanNuit3']) && isset($_POST['van3Nuit'])) {
        $vanNuit1 = htmlspecialchars(strip_tags((bool)$_POST['vanNuit1']));
        $vanNuit2 = htmlspecialchars(strip_tags((bool)$_POST['vanNuit2']));
        $vanNuit3 = htmlspecialchars(strip_tags((bool)$_POST['vanNuit3']));
        $van3Nuit = htmlspecialchars(strip_tags((bool)$_POST['van3Nuit']));
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
    }
    $nombreCasquesEnfants = 0;
    #ckeck si la cose enfant est coché 
    if (isset($_POST['enfantsOui']) && !empty($_POST['enfantsOui'])) {
        $enfantsOui = (bool) $_POST['enfantsOui'];
        if ($enfantsOui === true) {
            $nombreCasquesEnfants = (int) htmlspecialchars(strip_tags($_POST['nombreCasquesEnfants']));
        } else {
            $nombreCasquesEnfants = 0;
        }
    }

    if (!empty($_POST['nombrePlaces']) && isset($_POST['nombrePlaces'])) {
        htmlspecialchars(strip_tags($_POST['nombrePlaces']));
        $nombrePlaces = (int) $_POST['nombrePlaces'];
        $NombreLugesEte = (int) $_POST['NombreLugesEte'];
        $ckecktarif = (bool) isset($_POST['tarifReduit']);
        if ($ckecktarif == false) {
            $tarif = (int) $nombrePlaces * (($NombreLugesEte * 5) + ($nombreCasquesEnfants * 2) + $Prix_jour_van + $Prix_jour_tente);
        } else {
            $tarif_reduit = (int) $nombrePlaces * (($NombreLugesEte * 5) + ($nombreCasquesEnfants * 2) + $Prix_jour_van + $Prix_jour_tente);
        }
    } else {
        header('location: /../index.php?message=' . ERREUR_CHAMP_VIDE);
    }
} else {
    header('location: /../index.php?erreur=' . ERREUR_CHAMP_VIDE);
}
