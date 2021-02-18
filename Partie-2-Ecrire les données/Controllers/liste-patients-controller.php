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

$patientsInformations = $patients->getPatientsInformations();

if (!$patientsInformations) {
    $errorMessage = 'Il y a eu un problème lors de la récupération des données sur les patients.';
}
