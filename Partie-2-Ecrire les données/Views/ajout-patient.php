<?php
// Récupération du fichier controller correspondant à cette page.
require '../Controllers/ajout-patient-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouts de patients</title>
</head>

<body>
    <div>
        <!--Affiche le message de réussite de l'enregistrement.-->
        <p><?= isset($message) ? $message : '' ?></p>
    </div>
    <!-- Formulaire d'enregistrement -->
    <form action="ajout-patient.php" method="post">
        <div>
            <label for="lastname">Nom : </label>
            <input type="text" name="lastname" id="lastname" required>
        </div>
        <div>
            <label for="firstname">Prénom : </label>
            <input type="text" name="firstname" id="firstname" required>
        </div>
        <div>
            <label for="birthdate">Date de naissance : </label>
            <input type="date" name="birthdate" id="birthdate" required>
        </div>
        <div>
            <label for="phone">Numéro de téléphone : </label>
            <input type="tel" name="phone" id="phone" required>
        </div>
        <div>
            <label for="email">Adresse émail : </label>
            <input type="email" name="email" id="email" required>
        </div>
        <button type="submit" name="submitAddPatient" id="">Enregister le patient</button>
    </form>
    <div>
    <a href="liste-patients.php">Voire la liste des patients enregistrés</a>
    </div>
</body>

</html>