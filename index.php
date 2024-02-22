<?php
session_start();
$Messages_Erreurs = [];
if (isset($_GET['erreur'])) {
    $Messages_Erreurs = (int) $_GET['erreur'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <script type="module" src="./assets/script.js" defer></script>
    <title>Formulaire de réservation Music Vercos Festival</title>
</head>

<body>


    <?php readfile('./assets/header_user.php'); ?>
    <div id="main">
        <?php readfile('./assets/navigation_user.php'); ?>
        <form action="./src/traitement_Reservation.php" id="inscription" method="POST">
            <fieldset id="reservation">
                <legend>Réservation</legend>
                <?php if ($Messages_Erreurs === 2) { ?>
                    <div class="message echec">Veuillez remplir tous les champs.</div>
                <?php } ?>
                <h3>Nombre de réservation(s) :</h3>
                <input type="number" name="nombrePlaces" id="NombrePlaces" value="" required>
                <button class="btn decrease">-</button><button class="btn increase">+</button>
                <h3>Réservation(s) en tarif réduit</h3>
                <input type="checkbox" name="tarifReduit" id="tarifReduit">
                <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

                <h3>Choisissez votre formule :</h3>
                <input type="checkbox" name="pass1jour" id="pass1jour">
                <label for="pass1jour">Pass 1 jour : 40€</label>

                <!-- Si case cochée, afficher le choix du jour -->
                <section id="pass1jourDate" class="blocPassInvisible">
                    <input type="checkbox" name="choixJour1" id="choixJour1" class="choixPass1Jour">
                    <label for="choixJour1">Pass pour la journée du 01/07</label>
                    <input type="checkbox" name="choixJour2" id="choixJour2" class="choixPass1Jour">
                    <label for="choixJour2">Pass pour la journée du 02/07</label>
                    <input type="checkbox" name="choixJour3" id="choixJour3" class="choixPass1Jour">
                    <label for="choixJour3">Pass pour la journée du 03/07</label>
                </section>

                <input type="checkbox" name="pass2jours" id="pass2jours">
                <label for="pass2jours">Pass 2 jours : 70€</label>

                <!-- Si case cochée, afficher le choix des jours -->
                <section id="pass2joursDate" class="blocPassInvisible">
                    <input type="checkbox" name="choixPass2" id="choixJour12" class="choixPass2Jours">
                    <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
                    <input type="checkbox" name="choixPass2" id="choixJour23" class="choixPass2Jours">
                    <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
                </section>

                <input type="checkbox" name="pass3jours" id="pass3jours">
                <label for="pass3jours">Pass 3 jours : 100€</label>


                <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
                <input type="checkbox" name="pass1jourReduction" id="pass1jourReduction" hidden>
                <label for="pass1jourReduction" hidden>Pass 1 jour : 25€</label>
                <input type="checkbox" name="pass2joursReduction" id="pass2joursReduction" hidden>
                <label for="pass2joursReduction" hidden>Pass 2 jours : 50€</label>
                <input type="checkbox" name="pass3joursReduction" id="pass3joursReduction" hidden>
                <label for="pass3joursReduction" hidden>Pass 3 jours : 65€</label>

                <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

                <p class="bouton" onclick="suivant('option')">Suivant</p>
            </fieldset>
            <fieldset id="options">
                <legend>Options</legend>
                <h3>Réserver un emplacement de tente : </h3>
                <input type="checkbox" id="tenteNuit1" name="tenteNuit1">
                <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label><br>
                <input type="checkbox" id="tenteNuit2" name="tenteNuit2">
                <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label><br>
                <input type="checkbox" id="tenteNuit3" name="tenteNuit3">
                <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label><br>
                <input type="checkbox" id="tente3Nuits" name="tente3Nuits">
                <label for="tente3Nuits">Pour les 3 nuits (12€)</label>
                <?php if ($Messages_Erreurs === 2) { ?>
                    <div class="message echec">Veuillez remplir le champ.</div>
                <?php } ?>

                <h3>Réserver un emplacement de camion aménagé : </h3>
                <input type="checkbox" class="van" id="vanNuit1" name="vanNuit1">
                <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label><br>
                <input type="checkbox" class="van" id="vanNuit2" name="vanNuit2">
                <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label><br>
                <input type="checkbox" class="van" id="vanNuit3" name="vanNuit3">
                <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label><br>
                <input type="checkbox" class="van" id="van3Nuits" name="van3Nuits">
                <label for="van3Nuits">Pour les 3 nuits (12€)</label>
                <?php if ($Messages_Erreurs === 2) { ?>
                    <div class="message echec">Veuillez remplir le champ.</div>
                <?php } ?>

                <h3>Venez-vous avec des enfants ?</h3>
                <input type="checkbox" name="enfantsOui" id="enfantsOui"><label for="enfantsOui">Oui</label>
                <input type="checkbox" name="enfantsNon" id="enfantsNon"><label for="enfantsNon">Non</label>

                <!-- Si oui, afficher : -->
                <section>
                    <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
                    <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
                    <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants">
                    <?php if ($Messages_Erreurs === 2) { ?>
                        <div class="message echec">Veuillez remplir le champ.</div>
                    <?php } ?>
                    <p>*Dans la limite des stocks disponibles.</p>
                </section>

                <h3>Profitez de descentes en luge d'été à tarifs avantageux ! (5€ / descente)</h3>
                <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>
                <input type="number" name="NombreLugesEte" id="NombreLugesEte" min="0">
                <?php if ($Messages_Erreurs === 2) { ?>
                    <div class="message echec">Veuillez remplir le champ.</div>
                <?php } ?>
                <div class="flex">
                    <p class="bouton" onclick="suivant('reservation')">Précédent</p>
                    <p class="bouton" onclick="suivant('coordonnees')">Suivant</p>
                </div>
            </fieldset>
            <fieldset id="coordonnees">
                <legend>Coordonnées</legend>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" required><br>
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" required><br>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required><br>
                <?php if ($Messages_Erreurs === 1) { ?>
                    <div class="message echec">Votre email doit être au format email.</div>
                <?php } ?>
                <label for="telephone">Téléphone :</label>
                <input type="text" name="telephone" id="telephone" required><br>
                <?php if ($Messages_Erreurs === 8) { ?>
                    <div class="message echec">Veuillez remplir un numéro de téléphone valide.</div>
                <?php } ?>
                <label for="adressePostale">Adresse Postale :</label>
                <input type="text" name="adressePostale" id="adressePostale" required><br>

                <input type="submit" name="soumission" class="bouton" value="Réserver">
            </fieldset>
        </form>
    </div>


</body>

</html>