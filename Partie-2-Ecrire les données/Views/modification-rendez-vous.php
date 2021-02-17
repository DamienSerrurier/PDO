<?php
require '../Controllers/modification-rendez-vous-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du rendez-vous</title>
</head>

<body>

    <form action="modification-rendez-vous.php" method="post">
        <div>
            <label for="date">Date du rendez-vous</label>
            <input type="date" name="date" id="date" value="<?= isset($explodedDate) ? $explodedDate[0] : $errorMessage ?>" required>
            <?= isset($arrayErrors['date']) ? '<p style="color:red;> ' . $arrayErrors['date'] . '</p>' : '' ?>
        </div>

        <div>
            <label for="hour">Heure du rendez-vous</label>
            <input type="time" name="hour" id="hour" value="<?= isset($explodedDate) ? $explodedDate[1] : $errorMessage ?>" required>
            <?= isset($arrayErrors['hour']) ? '<p style="color:red;> ' . $arrayErrors['hour'] . '</p>' : '' ?>
        </div>

        <div>
            <label for="patientId">Patient concerné : </label>
            <select name="patientId" id="patientId" required>
                <option value="" selected disabled>Choisir un patient</option>

                <?php
                foreach ($allPatients as $key => $value) {
                ?>
                    <option value="<?= $value['id'] ?>" <?= $value['id'] == $appointmentInformations['idPatients'] ? "selected" : '' ?>><?= strtoupper($value['lastname'])  . ' ' . $value['firstname'] ?></option>
                <?php
                }
                ?>

            </select>
            <?= isset($arrayErrors['idPatient']) ? '<p style="color:red;> ' . $arrayErrors['idPatient'] . '</p>' : '' ?>

        </div>
        <button type="submit" name="updateAppointment" value="<?= $verifiedId ?>">Modifier rendez-vous</button>
    </form>
    <div>
        <a href="liste-rendez-vous.php">Lien vers la list de rendez-vous</a>
    </div>
</body>

</html>