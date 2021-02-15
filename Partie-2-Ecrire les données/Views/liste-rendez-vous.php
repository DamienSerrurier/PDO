<?php
require '../Controllers/liste-rendez-vous-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des rendez-vous</title>
</head>

<body>
    <?php
    foreach ($allAppointments as $key => $value) {
        $dateHourExplode = explode(' ', $value['dateHour']);
        $formatDate = strftime('%A %d %B %Y', strtotime($dateHourExplode[0]));
    ?>
        <p><?= 'Rendez-vous N° ' . $value['id'] . ' ' . 'du patient ' . strtoupper($value['lastname'])  . ' ' . $value['firstname'] . ' le ' . $formatDate . ' à ' . $dateHourExplode[1] ?></p>
    <?php
    }
    ?>
    <div>
        <a href="ajout-rendez-vous.php">Ajouter un rendez-vous</a>
    </div>
</body>

</html>