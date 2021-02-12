<?php
require '../Controllers/modification-patient-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du patient</title>
</head>

<body>

    <form action="modification-patient.php" method="post">
        <div>
            <label for="lastname">Nom : </label>
            <input type="text" name="lastname" id="lastname" value="<?= isset($patientInformations['lastname']) ? $patientInformations['lastname'] : ''  ?>" required>
        </div>
        <div>
            <label for="firstname">Prénom : </label>
            <input type="text" name="firstname" id="firstname" value="<?= isset($patientInformations['firstname']) ? $patientInformations['firstname'] : ''  ?>" required>
        </div>
        <div>
            <label for="birthdate">Date de naissance : </label>
            <input type="date" name="birthdate" id="birthdate" value="<?= isset($patientInformations['birthdate']) ? $patientInformations['birthdate'] : ''  ?>" required>
        </div>
        <div>
            <label for="phone">Numéro de téléphone : </label>
            <input type="tel" name="phone" id="phone" value="<?= isset($patientInformations['phone']) ? $patientInformations['phone'] : ''  ?>" required>
        </div>
        <div>
            <label for="email">Adresse émail : </label>
            <input type="email" name="email" id="email" value="<?= isset($patientInformations['mail']) ? $patientInformations['mail'] : ''  ?>" required>
        </div>
        <button type="submit" name="submitUpdatePatient" value="<?= isset($verifiedId) ? $verifiedId : '' ?>" >Modifier un patient</button>
    </form>

</body>

</html>