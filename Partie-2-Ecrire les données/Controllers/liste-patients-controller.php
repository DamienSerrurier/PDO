<?php
require '../Models/Database.php';
require '../Models/Patients.php';

$patients = new Patients();

$patientsInformations = $patients->addPatientsInformations();

if (!$patientsInformations) {
    $errorMessage = 'Il y a eu un problème lors de la récupération des données sur les patients.';
}
