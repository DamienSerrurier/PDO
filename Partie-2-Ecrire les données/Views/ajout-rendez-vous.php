<?php
require '../Controllers/ajout-rendez-vous-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout rendez-vous</title>
</head>

<body>
    <div>
        <p><?= isset($errorMessage) ? $errorMessage : '' ?></p>
    </div>
    <form action="ajout-rendez-vous.php" method="post">
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

        <div>
            <label for="patientId">Patient concerné</label>
            <select name="patientId" id="patientId" required>
            <option value="" selected disabled>Choisir un patient</option>

                <?php
                foreach ($allPatientsLight as $key => $value) {
                ?>
                    <option value="<?= $value['id'] ?>"><?= $value['lastname'] . ' ' . $value['firstname'] ?></option>
                <?php
                }
                ?>

            </select>
            <?= isset($arrayErrors['id']) ? '<p style="color:red;> ' . $arrayErrors['id'] . '</p>' : '' ?>

        </div>
        <button type="submit" name="submitAppointment">Prendre rendez-vous</button>
    </form>
    <div>
        <a href="liste-rendez-vous.php">Lien vers la list de rendez-vous</a>
    </div>


</body>

</html>