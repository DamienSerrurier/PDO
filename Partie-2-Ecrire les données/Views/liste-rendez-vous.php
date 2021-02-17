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
        $formatedDate = strftime('%A %d %B %Y', strtotime($dateHourExplode[0]));
    ?>
        <div>
            <p><?= 'Rendez-vous N° ' . $value['id'] . ' ' . 'du patient ' . strtoupper($value['lastname'])  . ' ' . $value['firstname'] . ' le ' . $formatedDate . ' à ' . $dateHourExplode[1] ?></p>
            <a href="rendez-vous.php?idAppointment=<?= $value['id'] ?>">Voir le rendez-vous du patient</a>
            <button class="buttonTriggerAlert" style="background-color: red; color: white" data-target="<?= $value['id'] ?>">Supprimer ce rendez-vous</button>
        </div>
    <?php
    }
    ?>
    
    <div>
        <a href="ajout-rendez-vous.php">Ajouter un rendez-vous</a>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        let allButtonsTriggerAlert = document.getElementsByClassName('buttonTriggerAlert');
        let arrayAllButtonsTriggerAlert = [...allButtonsTriggerAlert];

        arrayAllButtonsTriggerAlert.forEach(element => {
            element.addEventListener('click', function() {
                Swal.fire({
                    title: 'Voulez-vous vraiment supprimer ce rendez-vous ?',
                    showConfirmButton: false,
                    html: `<form action="liste-rendez-vous.php" method="post">
                    <button type="submit" name="deleteAppointment" value="${element.dataset.target}">Oui</button>
                    </form>`
                })
            })
        })
    </script>
</body>

</html>