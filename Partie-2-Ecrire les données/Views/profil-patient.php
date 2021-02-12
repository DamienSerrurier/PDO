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

    <?php
    if (isset($_SESSION['successMessage']) && $_SESSION['successMessage'] != NULL) {
    ?>
        <div>
            <p style="background-color: green;"><?= $_SESSION['successMessage'] ?></p>
        </div>
    <?php
        $_SESSION['successMessage'] = NULL;
    }
    ?>

    <ul>
        <li>N° du patient : <?= isset($patientInformations['id']) ? $patientInformations['id'] : $errorMessage ?></li>
        <li>Nom de famille du patient : <?= isset($patientInformations['lastname']) ? strtoupper($patientInformations['lastname']) : $errorMessage ?></li>
        <li>Prénom du patient : <?= isset($patientInformations['lastname']) ? $patientInformations['firstname'] : $errorMessage ?></li>
        <li>Date de naissance du patient : <?= isset($patientInformations['lastname']) ? strftime('%d, %m, %Y', strtotime($patientInformations['birthdate'])) : $errorMessage ?></li>
        <li>N° de téléphone du patient : <?= isset($patientInformations['lastname']) ? $patientInformations['phone'] : $errorMessage ?></li>
        <li>Adresse émail du patient : <?= isset($patientInformations['lastname']) ? $patientInformations['mail'] : $errorMessage ?></li>
    </ul>
    <div>
        <a href="liste-patients.php">Retour</a>
    </div>
    <div>
        <form action="modification-patient.php" method="post">
            <button type="submit" name="modifyPatientId" value="<?= isset($patientInformations['id']) ? $patientInformations['id'] : '' ?>">Modifier un patient</button>
        </form>
    </div>
</body>

</html>