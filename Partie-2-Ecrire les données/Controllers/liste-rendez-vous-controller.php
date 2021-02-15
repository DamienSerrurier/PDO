<?php
setlocale(LC_ALL, 'fr_FR.utf8');

require '../Models/Database.php';
require '../Models/Patients.php';

$patients = new Patients;
$allAppointments = $patients->getAllAppointmentsWhisAllPatientsInformations();
