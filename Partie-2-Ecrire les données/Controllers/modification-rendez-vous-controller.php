<?php
session_start();
require '../Models/Database.php';
require '../Models/Rendez-vous.php';
require '../Models/Patients.php';

$appointment = new Appointments();
$patients = new Patients();

if (isset($_POST['modifyAppointmentId']) && !empty($_POST['modifyAppointmentId'])) {

    $id = htmlspecialchars($_POST['modifyAppointmentId']);

    $regexId = '/^[0-9]+$/';

    if (preg_match($regexId, $id)) {

        $verifiedId = (int)$id;
        $appointmentInformations =  $appointment->getOneAppointmentById($verifiedId);
        $explodedDate = explode(' ', $appointmentInformations['dateHour']);
        $allPatients = $patients->getPatientsInformationsLight();
    } else {
        $errorMessage = 'Arrête de jouer avec mes $_POST!';
    }
}

if (isset($_POST['updateAppointment']) && !empty($_POST['updateAppointment'])) {
    var_dump($_POST);
    // Utilisation de regex pour la validations des champs de formulaire.
    $regexDate = '/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/';
    $regexHour = '/^[0-9]{2}\:[0-9]{2}\:[0-9]{2}$/';
    $regexNewHour = '/^[0-9]{2}\:[0-9]{2}$/';
    $regexId = '/^[0-9]+$/';

    $arrayErrors = [];

    // Utilisation de htmlspecialchars pour l'encodage des données transmit.
    $date = isset($_POST['date']) ? htmlspecialchars($_POST['date']) : '';
    $hour = isset($_POST['hour']) ? htmlspecialchars($_POST['hour']) : '';
    $idPatient = isset($_POST['patientId']) ? htmlspecialchars($_POST['patientId']) : '';
    var_dump($hour);
    if (preg_match($regexDate, $date)) {
        $checkDate = $date;
    } else {
        var_dump($arrayErrors['date']);
        $arrayErrors['date'] = 'Veuillez renseigner une date correcte pour le rendez-vous.';
    }

    if (preg_match($regexHour, $hour)) {
        $checkHour = $hour;
    } else {

        if (preg_match($regexHour, $hour)) {
            $checkHour = $hour;
        } else {
            var_dump($arrayErrors['hour']);
            $arrayErrors['hour'] = 'Veuillez renseigner une heure correcte pour le rendez-vous.';
        }
    }

    if (preg_match($regexId, $idPatient)) {
        $checkIdPatient = (int)$idPatient;
    } else {
        var_dump($arrayErrors['idPatient']);
        $arrayErrors['idPatient'] = 'Veuillez choisir une valeur.';
    }

    if (preg_match($regexId, $_POST['updateAppointment'])) {
        $checkIdAppointment = (int)htmlspecialchars($_POST['updateAppointment']);
    } else {
        var_dump($arrayErrors['idAppointment']);
        $arrayErrors['idAppointment'] = 'Veuillez arrêter de toucher à mes boutons submit.';
    }

    if (empty($arrayErrors)) {

        $dateHour = $checkDate . ' ' . $checkHour;

        $arrayParameters = [
            'dateHour' => $dateHour,
            'idPatient' => $checkIdPatient,
            'idAppointment' => $checkIdAppointment
        ];

        if ($appointment->updateAppointment($arrayParameters)) {
            $_SESSION['message'] = "Le rendez-vous a bien été modifié";
            header('Location: rendez-vous.php?idAppointment=' . $checkIdAppointment);
            var_dump($appointment->updateAppointment($arrayParameters['dateHour']));
        } else {
            $errorMessage = 'Il y a eu un problème lors de la modification du rendez-vous.';
        }
    }
}
