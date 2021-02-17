<?php
require '../Models/Database.php';
require '../Models/Patients.php';
require '../Models/Rendez-vous.php';

$patients = new Patients();
$allPatientsLight = $patients->getPatientsInformationsLight();

if (!empty($_POST)) {
    var_dump($_POST);
    $regexDate = '/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/';
    $regexHour = '/^[0-9]{2}\:[0-9]{2}$/';
    $regecId =  '/^[0-9]+$/';

    $arrayErrors = [];

    $date = isset($_POST['date']) ? htmlspecialchars($_POST['date']) : '';
    $hour = isset($_POST['hour']) ? htmlspecialchars($_POST['hour']) : '';
    $idPatients = isset($_POST['patientId']) ? htmlspecialchars($_POST['patientId']) : '';

    if (preg_match($regexDate, $date)) {
        $checkDate = $date;
    } else {
        $arrayErrors['date'] = 'Veuillez renseigner une valeur correcte pour le rendez-vous.';
    }

    if (preg_match($regexHour, $hour)) {
        $checkHour = $hour;
    } else {
        $arrayErrors['hour'] = 'Veuillez renseigner une valeur correcte pour le rendez-vous.';
    }

    if (preg_match($regecId, $idPatients)) {
        $checkIdPatients = (int)$idPatients;
    } else {
        $arrayErrors['idPatients'] = 'Veuillez choisir une valeur.';
    }

    if (empty($arrayErrors)) {

        $dateHour = $checkDate . ' ' . $checkHour;

        $arrayParameters = [
            'dateHour' => $dateHour,
            'idPatient' => $checkIdPatients
        ];

        $appointment = new Appointments();

        if ($appointment->addAppointment($arrayParameters)) {
            header('Location: liste-rendez-vous.php');
        } else {
            $errorMessage = 'Il y a eu un problème lors du rendez-vous.';
        }
    }
}
