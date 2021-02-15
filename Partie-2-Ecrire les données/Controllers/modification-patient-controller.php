<?php
session_start();

require '../Models/Database.php';
require '../Models/Patients.php';

$patient = new Patients();

if (isset($_POST['modifyPatientId']) && !empty($_POST['modifyPatientId'])) {

    $id = htmlspecialchars($_POST['modifyPatientId']);

    $regexId = '/^[0-9]+$/';

    if (preg_match($regexId, $id)) {
        $verifiedId = (int)$id;
        $patientInformations =  $patient->getOnePatientInformation($verifiedId);
    } else {
        $errorMessage = 'Arrête de jouer avec mes $_POST!';
    }
}

if (isset($_POST['submitUpdatePatient'])) {

    // Utilisation de regex pour la validations des champs de formulaire.
    $regexText = '/^[a-zA-Zéèàôêçâîù -]+$/';
    $regexPhone = '/^[0-9]{10}$/';
    $regexDate = '/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/';
    $regexId = '/^[0-9]+$/';

    $arrayErrors = [];

    // Utilisation de htmlspecialchars pour l'encodage des données transmit.
    $lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'])  : '';
    $firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'])  : '';
    $birthdate = isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate'])  : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone'])  : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'])  : '';
    $id = isset($_POST['submitUpdatePatient']) ? htmlspecialchars($_POST['submitUpdatePatient'])  : '';

    // Utilisation de preg_match pour vérifier si les données sont conforment à ce qui est accordées par la regex.
    if (preg_match($regexText, $lastname)) {
        $checkLastname = $lastname;
    } else {
        $arrayErrors['lastname'] = 'Veuillez indiquer une donnée correcte';
    }

    if (preg_match($regexText, $firstname)) {
        $checkFirstname = $firstname;
    } else {
        $arrayErrors['firstname'] = 'Veuillez indiquer une donnée correcte';
    }

    if (preg_match($regexDate, $birthdate)) {
        $checkBirthdate = $birthdate;
    } else {
        $arrayErrors['birthdate'] = 'Veuillez indiquer une donnée correcte';
    }

    if (preg_match($regexPhone, $phone)) {
        $checkPhone = $phone;
    } else {
        $arrayErrors['phone'] = 'Veuillez indiquer une donnée correcte';
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $checkEmail = $email;
    } else {
        $arrayErrors['email'] = 'Veuillez indiquer une donnée correcte';
    }

    if (preg_match($regexId, $id)) {
        $verifiedId = (int)$id;
    } else {
        $arrayErrors = 'Arrête de toucher à mes POST';
    }

    // Si aucun messages d'erreurs n'a étés trouvés, on execute la condition.
    if (empty($arrayErrors)) {

        // Contruction d'un tableau de paramètres permettant la simplification lors de la contruction de la requête et à envoyer à la méthode de modification.
        $arrayParameters = [
            'id' => $verifiedId,
            'lastname' => $checkLastname,
            'firstname' => $checkFirstname,
            'birthdate' => $checkBirthdate,
            'phone' => $checkPhone,
            'mail' => $checkEmail
        ];

        // Utilisation d'une méthode pour l'excution de la requête
        if ($patient->updatePatient($arrayParameters)) {
            $_SESSION['successMessage'] = 'Le patient a été modifié';
            header('Location: profil-patient.php?idPatient=' . $verifiedId);
        } else {
            $message = 'Il y a eu une erreur lors de la modification du patient';
        }
    }
}
