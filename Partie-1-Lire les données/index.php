<?php
//Récupération des instances et méthodes correspondantes
require 'Controllers/indexController.php';

//Exercice 1: Afficher tous les clients.
foreach ($resultClients as $key => $value) {
?>
    <p><?= $value['id'] . ' Nom: ' . $value['lastName'] . ', Prénom: ' . $value['firstName'] . ', Date de naissance: ' . $value['birthDate'] . ', Carte: ' . $value['card'] . ', Numéro de carte ' . $value['cardNumber'] ?></p>
<?php
}

//Exercice 2: Afficher tous les types de spectacles possibles.
foreach ($resultShowTypes as $key => $value) {
?>
    <p><?= $value['id'] . ' Type de spectacle ' . $value['type'] ?></p>
<?php
}

//Exercice 3: Afficher les 20 premiers clients.
foreach ($resultFistClients as $key => $value) {
?>
    <p><?= $value['id'] . ' Nom: ' . $value['lastName'] . ', Prénom: ' . $value['firstName'] . ', Date de naissance: ' . $value['birthDate'] . ', Carte: ' . $value['card'] . ', Numéro de carte ' . $value['cardNumber'] ?></p>
<?php
}

//Exercice 4: N'afficher que les clients possédant une carte de fidélité.
foreach ($resultClientsFidelity as $key => $value) {
?>
    <p><?= $value['id'] . ' Nom: ' . $value['lastName'] . ', Prénom: ' . $value['firstName'] ?></p>
<?php
}

//Exercice 5: Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M". Les afficher comme ceci :

// Nom : Nom du client

// Prénom : Prénom du client

// Trier les noms par ordre alphabétique.
foreach ($resultCientsContentM as $key => $value) {
?>
    <p>id: <?= $value['id'] ?></p>
    <p>Nom: <?= $value['lastName'] ?></p>
    <p>Prénom: <?= $value['firstName'] ?></p>
<?php
}

//Exercice 6: Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.
foreach ($resultShows as $key => $value) {
?>
    <p><?= $value['id'] . ' Nom du spectacle: ' . $value['title'] . ', Interprète: ' . $value['performer'] . ', Date: ' . $value['date'] . ', L\'heure: ' . $value['startTime'] ?></p>
<?php
}

//Exercice 7: Afficher tous les clients comme ceci :

// Nom : Nom de famille du client

// Prénom : Prénom du client

// Date de naissance : Date de naissance du client

// Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas)

// Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.
foreach ($resultClients as $key => $value) {
?>
    <p>id: <?= $value['id'] ?></p>
    <p>Nom: <?= $value['lastName'] ?></p>
    <p>Prénom: <?= $value['firstName'] ?></p>
    <p>Date de naissance: <?= $value['birthDate'] ?></p>
    <p>Carte: <?= $value['card'] ? 'OUI' : 'NON' ?></p>
    <p>Numéro de carte: <?= $value['cardNumber'] ?? $value['cardNumber'] ?></p>
<?php
}
