<?php
require '../Controllers/rendez-vous-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous d'un patient</title>
</head>

<body>
    <ul>
        <?php
        if (isset($appointmentInformations)) {
        ?>
            <li>Le <?= $formatedDate ?> à <?= $dateHourExplode[1] ?></li>
            <li>Nom du patient : <?= strtoupper($appointmentInformations['lastname']) ?></li>
            <li>Prénom du patient : <?= $appointmentInformations['firstname'] ?></li>
            <li>Date de naissance du patinet : <?= strftime('%d/ %m/ %Y', strtotime($appointmentInformations['birthdate'])) ?></li>
            <li>Numéro de téléphone du patient : <?= $appointmentInformations['phone'] ?></li>
            <li>Adresse émail du patient : <?= $appointmentInformations['mail'] ?></li>
        <?php
        } else {
        ?>
            <p style="color: red;"><?= $errorMessage ?></p>
        <?php
        }
        ?>

    </ul>
</body>

</html>