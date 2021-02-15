<?php
session_start();

require '../Models/Database.php';
require '../Models/Patients.php';

$patient = new Patients();

if ((isset($_GET['idPatient'])) && !empty($_GET['idPatient'])) {

    $id = htmlspecialchars($_GET['idPatient']);

    $regexId = '/^[0-9]+$/';

    if (preg_match($regexId, $id)) {
        $verifiedId = (int)$id;
        $patientInformations =  $patient->getOnePatientInformation($verifiedId);
    } else {
        $errorMessage = 'Arrête de jouer avec mon URL!';
    }
}
