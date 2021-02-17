<?php
setlocale(LC_ALL, 'fr_FR.utf8');
session_start();

require '../Models/Database.php';
require '../Models/Patients.php';
require '../Models/Rendez-vous.php';

$patient = new Patients();
$appointments = new Appointments();

if ((isset($_GET['idPatient'])) && !empty($_GET['idPatient'])) {

    $id = htmlspecialchars($_GET['idPatient']);

    $regexId = '/^[0-9]+$/';

    if (preg_match($regexId, $id)) {
        
        $verifiedId = (int)$id;
        $patientInformations =  $patient->getOnePatientInformation($verifiedId);
        $patienttAppointmentsInformations = $appointments->getAllAppointmentsByPatientId($verifiedId);
    } else {
        $errorMessage = 'Arrête de jouer avec mon URL!';
    }
}
