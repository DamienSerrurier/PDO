<?php
//Récupérations des Class
require 'Models/DataBase.php';
require 'Models/Cients.php';
require 'Models/ShowTypes.php';
require 'Models/Shows.php';

//Instance de l'objet Clients
$clients = new Clients();

//Méthodes de l'objet Clients
$resultClients = $clients->getAllClients();
$resultFistClients = $clients->getFirstClients();
$resultClientsFidelity = $clients->getClientsWithFidelityCard();
$resultCientsContentM = $clients->getClientsContent_M();

//Instance de l'objet ShowTypes
$showTypes = new ShowTypes();

//Méthode de l'objet ShowTypes
$resultShowTypes = $showTypes->getAllShowTypes();

//Instance de l'objet Shows
$shows = new Shows();

//Méthode de l'objet Shows
$resultShows = $shows->getShowsAlphabeticalOrder();

