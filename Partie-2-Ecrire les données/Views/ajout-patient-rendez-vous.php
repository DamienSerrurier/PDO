<?php
require '../Controllers/ajout-patient-rendez-vous-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un patient et d'un rendez-vous</title>
</head>

<body>

    <form action="ajout-patient-rendez-vous.php" method="post">
        <!-- Partie de formulaire pour le patient -->
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

        <!-- Partie du formulaire pour les rendez-vous -->
        <div>
            <label for="date">Date du rendez-vous</label>
            <input type="date" name="date" id="date" required>
            <?= isset($arrayErrors['date']) ? '<p style="color:red;> ' . $arrayErrors['date'] . '</p>' : '' ?>
        </div>
        <div>
            <label for="hour">Heure du rendez-vous</label>
            <input type="time" name="hour" id="hour" required>
            <?= isset($arrayErrors['hour']) ? '<p style="color:red;> ' . $arrayErrors['hour'] . '</p>' : '' ?>
        </div>
        <button type="submit">Ajouter le patient et son rendez-vous</button>
    </form>

</body>

</html>