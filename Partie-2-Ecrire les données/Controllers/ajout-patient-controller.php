<?php
require '../Models/DataBase.php';
require '../Models/Patients.php';

if (!empty($_POST)) {

    $regexText = '/^[a-zA-Zéèàôêçâîù -]+$/';
    $regexPhone = '/^[0-9]{10}$/';
    $regexDate = '/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/';

    $arrayErrors = [];

    $lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'])  : '';
    $firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'])  : '';
    $birthdate = isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate'])  : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone'])  : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'])  : '';

    if (preg_match($regexText, $lastname)) {
        $checkLastname = $lastname;
        var_dump($checkLastname);
    } else {
        $arrayErrors['lastname'] = 'Veuillez indiquer une donnée correcte';
    }

    if (preg_match($regexText, $firstname)) {
        $checkFirstname = $firstname;
        var_dump($checkFirstname);
    } else {
        $arrayErrors['firstname'] = 'Veuillez indiquer une donnée correcte';
    }

    if (preg_match($regexDate, $birthdate)) {
        $checkBirthdate = $birthdate;
        var_dump($checkBirthdate);
    } else {
        $arrayErrors['birthdate'] = 'Veuillez indiquer une donnée correcte';
    }

    if (preg_match($regexPhone, $phone)) {
        $checkPhone = $phone;
        var_dump($checkPhone);
    } else {
        $arrayErrors['phone'] = 'Veuillez indiquer une donnée correcte';
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $checkEmail = $email;
        var_dump($checkEmail);
    } else {
        $arrayErrors['email'] = 'Veuillez indiquer une donnée correcte';
    }

    if (empty($arrayErrors)) {
      
        $arrayParameters = [
            'lastname' => $checkLastname,
            'firstname' => $checkFirstname,
            'birthdate' => $checkBirthdate,
            'phone' => $checkPhone,
            'mail' => $checkEmail
        ];
        
        $patients = new Patients();

        if ($patients->addPatient($arrayParameters)) {
            $message = 'Le patient a été enregistrer';
        } else {
            $message = 'Il y a eu une erreur lors de l\'ajout du patient';
        }
    }
}
