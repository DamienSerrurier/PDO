<?php
require '../Models/Database.php';
require '../Models/Patients.php';

$patients = new Patients();

if (isset($_POST['deletePatient']) && !empty($_POST['deletePatient'])) {

    $id = htmlspecialchars($_POST['deletePatient']);
    $regexId = '/^[0-9]+$/';

    if (preg_match($regexId, $id)) {

        $verifiedId = (int)$id;
        $resultDeleteAppointment =  $patients->deletePatientById($verifiedId);
    } else {
        $errorMessage = 'Arrête de jouer avec mes $_POST!';
    }
}

$countPatients = $patients->countPatients();

if (isset($_POST['searchPatient'])) {

    $search = htmlspecialchars($_POST['search']);
    $querySearch = '%' . $search . '%';
    $patientsInformations = $patients->searchPatient($querySearch);
} else {

    if (!isset($_GET['page'])) {

        header('Location: liste-patients.php?page=1');
    } else {
        $regexPage = '/^[0-9]+$/';
        $actualPage = htmlspecialchars($_GET['page']);

        if (preg_match($regexPage, $actualPage)) {

            $almostTotalPages = (int)$countPatients['countPatients'] / 10; // Calcul du nombre de pages
            $totalPages = ceil($almostTotalPages); // Arrondir à l'entier supérieur
            $startValue = ($actualPage - 1) * 10; // Déterminer la valeur de départ
            $patientsInformations = $patients->getPatientsPaginate($startValue);
        }
    }
}

if (!empty($patientsInformations)) {
    $errorMessage = 'Il y a eu un problème lors de la récupération des données sur les patients.';
}
