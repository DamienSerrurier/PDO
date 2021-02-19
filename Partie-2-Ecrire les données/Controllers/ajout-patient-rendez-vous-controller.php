<?php
require '../Models/Database.php';
require '../Models/Patients.php';
require '../Models/Rendez-vous.php';

// Vérification si la variable super global $_POST n'est pas vide.
if (!empty($_POST)) {

    // Utilisation de regex pour la validations des champs de formulaire.
    $regexText = '/^[a-zA-Zéèàôêçâîù -]+$/';
    $regexPhone = '/^[0-9]{10}$/';
    $regexDate = '/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/';

    $arrayErrors = [];

    // Utilisation de htmlspecialchars pour l'encodage des données transmit.
    $lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'])  : '';
    $firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'])  : '';
    $birthdate = isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate'])  : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone'])  : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'])  : '';

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

    // Si aucun messages d'erreurs n'a étés trouvés, on execute la condition.
    if (empty($arrayErrors)) {

        // Contruction d'un tableau de paramètres permettant la simplification lors de la contruction de la requête.
        $arrayParameters = [
            'lastname' => $checkLastname,
            'firstname' => $checkFirstname,
            'birthdate' => $checkBirthdate,
            'phone' => $checkPhone,
            'mail' => $checkEmail
        ];

        // Création d'une instance d'un objet.
        $patient = new Patients();

        // Utilisation d'une méthode pour l'excution de la requête
        if ($patient->addPatient($arrayParameters)) {

            $lastIdPatient = $patient->getDatabase()->lastInsertId();

            $regexDate = '/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/';
            $regexHour = '/^[0-9]{2}\:[0-9]{2}$/';

            $arrayErrors = [];

            $date = isset($_POST['date']) ? htmlspecialchars($_POST['date']) : '';
            $hour = isset($_POST['hour']) ? htmlspecialchars($_POST['hour']) : '';

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

            if (empty($arrayErrors)) {

                $dateHour = $checkDate . ' ' . $checkHour;

                $arrayParameters = [
                    'dateHour' => $dateHour,
                    'idPatient' => $lastIdPatient
                ];

                $appointment = new Appointments();

                if ($appointment->addAppointment($arrayParameters)) {
                    header('Location: liste-rendez-vous.php');
                } else {
                    $errorMessage = 'Il y a eu un problème lors du rendez-vous.';
                }
            }
        } else {
            $message = 'Il y a eu une erreur lors de l\'ajout du patient';
        }
    }
}
