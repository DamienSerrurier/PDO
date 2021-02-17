<?php
setlocale(LC_ALL, 'fr_FR.utf8');

require '../Models/Database.php';
require '../Models/Patients.php';


if (isset($_POST['deleteAppointment']) && !empty($_POST['deleteAppointment'])) {

    require '../Models/Rendez-vous.php';

    $appointment = new Appointments();

    $id = htmlspecialchars($_POST['deleteAppointment']);

    $regexId = '/^[0-9]+$/';

    if (preg_match($regexId, $id)) {
        
        $verifiedId = (int)$id;
        $resultDeleteAppointment =  $appointment->deleteAppointmentById($verifiedId);
    } else {
        $errorMessage = 'Arrête de jouer avec mes $_POST!';
    }
}

$patients = new Patients;
$allAppointments = $patients->getAllAppointmentsWhisAllPatientsInformations();
