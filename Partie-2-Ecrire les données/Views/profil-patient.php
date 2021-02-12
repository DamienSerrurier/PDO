<?php
require '../Controllers/profil-patient-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil du patient</title>
</head>

<body>
    <ul>
        <li>N° du patient : <?= isset($patientInformation['id']) ? $patientInformation['id'] : $errorMessage ?></li>
        <li>Nom de famille du patient : <?= isset($patientInformation['lastname']) ? strtoupper($patientInformation['lastname']) : $errorMessage ?></li>
        <li>Prénom du patient : <?= isset($patientInformation['lastname']) ? $patientInformation['firstname'] : $errorMessage ?></li>
        <li>Date de naissance du patient : <?= isset($patientInformation['lastname']) ? strftime('%d, %m, %Y', strtotime($patientInformation['birthdate'])) : $errorMessage ?></li>
        <li>N° de téléphone du patient : <?= isset($patientInformation['lastname']) ? $patientInformation['phone'] : $errorMessage ?></li>
        <li>Adresse émail du patient : <?= isset($patientInformation['lastname']) ? $patientInformation['mail'] : $errorMessage ?></li>
    </ul>
    <div>
        <a href="liste-patients.php">Retour</a>
    </div>
    <div>
        <form action="modification-patient.php" method="post">
            <button type="submit" name="updatePatient" value="<?= isset($patientInformation['id']) ? $patientInformation['id'] : '' ?>">Modifier un patient</button>
        </form>
    </div>
</body>

</html>