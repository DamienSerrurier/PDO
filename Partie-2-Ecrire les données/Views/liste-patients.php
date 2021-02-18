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
    <form action="liste-patients.php" method="post">
        <label for="search">Rechercher un patient : </label>
        <input type="text" name="search" id="search">
        <button type="submit" name="searchPatient">Rechercher</button>
    </form>
    <a href="liste-patients.php">
        <button type="button">Réinitialiser la recherche</button>
    </a>
    <?php
    if (!empty($patientsInformations)) {

        foreach ($patientsInformations as $key => $value) {
    ?>
            <div>
                <p>N°<?= $value['id'] ?> : Nom : <?= strtoupper($value['lastname']) ?>, Prénom : <?= $value['firstname'] ?></p>
                <a href="profil-patient.php?idPatient=<?= $value['id'] ?>">Voir le profil du patient</a>
                <button class="buttonTriggerAlert" style="background-color: red; color: white" data-target="<?= $value['id'] ?>">Supprimer ce patient</button>
            </div>

        <?php
        }
        ?>
    <?php
    } else {
    ?>
        <div>
            <p style="background-color: salmon;">Il n'y a aucun résulta de recherche</p>
        </div>
    <?php
    }
    ?>

    <div>
        <a href="ajout-patient.php">Ajouter un patient</a>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        let allButtonsTriggerAlert = document.getElementsByClassName('buttonTriggerAlert');
        let arrayAllButtonsTriggerAlert = [...allButtonsTriggerAlert];

        arrayAllButtonsTriggerAlert.forEach(element => {
            element.addEventListener('click', function() {
                Swal.fire({
                    title: 'Voulez-vous vraiment supprimer ce patient ?',
                    showConfirmButton: false,
                    html: `<form action="liste-patients.php" method="post">
                    <button type="submit" name="deletePatient" value="${element.dataset.target}">Oui</button>
                    </form>`
                })
            })
        })
    </script>
</body>

</html>