<?php
session_start();
setlocale(LC_ALL, 'fr_FR.utf8');

require '../Models/Database.php';
require '../Models/Patients.php';

$patient = new Patients();

if (isset($_GET['idAppointment']) && !empty($_GET['idAppointment'])) {

    $id = htmlspecialchars($_GET['idAppointment']);

    $regexId = '/^[0-9]+$/';

    if (preg_match($regexId, $id)) {
        $verifiedId = (int)$id;
        $appointmentInformations =  $patient->getOneAppointmentWithPatientInformationns($verifiedId);
        $dateHourExplode = explode(' ', $appointmentInformations['dateHour']);
        $formatedDate = strftime('%A %d %B %Y', strtotime($dateHourExplode[0]));
    } else {
        $errorMessage = 'Arrête de jouer avec mon URL!';
    }
}
