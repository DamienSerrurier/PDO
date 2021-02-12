<?php
require '../Controllers/liste-patients-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations des patients</title>
</head>

<body>
    <?php
    foreach ($patientsInformations as $key => $value) {
    ?>
        <div>
            <p>N°<?= $value['id'] ?> : Nom : <?= strtoupper($value['lastname']) ?>, Prénom : <?= $value['firstname'] ?></p>
            <a href="profil-patient.php?idPatient=<?= $value['id'] ?>">Voir le profil du patient</a>
        </div>
    <?php
    }
    ?>

    <div>
        <a href="ajout-patient.php">Ajouter un patient</a>
    </div>
</body>

</html>