<?php

class Clients extends DataBase
{
    //Propriétés
    private $id;
    private $lastName;
    private $firstName;
    private $birthDate;
    private $card;
    private $cardNumber;

    //Méthodes
    //id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this->id;
    }

    //lastname
    public function getLastname()
    {
        return $this->lastName;
    }

    public function setLastname($lastName)
    {
        $this->lastName = $lastName;
        return $this->lastName;
    }

    //firstname
    public function getFirstname()
    {
        return $this->firstName;
    }

    public function setFirstname($firstName)
    {
        $this->firstName = $firstName;
        return $this->firstName;
    }

    //birthtDate
    public function getBirthtDate()
    {
        return $this->birthDate;
    }

    public function setBirthtDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this->birthDate;
    }

    //card
    public function getCard()
    {
        return $this->card;
    }

    public function setCard($card)
    {
        $this->card = $card;
        return $this->card;
    }

    //cardNumber
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this->cardNumber;
    }

    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }

    //Méthode contenant une requête permettant de récupérer toutes les données de la table clients.
    public function getAllClients()
    {
        $query = "SELECT * FROM `clients`";
        $queryGetAllClients = parent::getDataBase()->prepare($query);
        $queryGetAllClients->execute();
        $resultsQuery = $queryGetAllClients->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultsQuery)) {
            return $resultsQuery;
        } else {
            return false;
        }
    }

    //Méthode contenant une requête permettant de récupérer les données des 20 premiers clients de la table clients.
    public function getFirstClients()
    {
        $query = "SELECT * FROM clients LIMIT 0,20";
        $queryGetFirstClients = $this->getDataBase()->prepare($query);
        $queryGetFirstClients->execute();
        $resultsQuery = $queryGetFirstClients->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultsQuery) > 0) {
            return $resultsQuery;
        } else {
            return false;
        }
    }

    //Méthode contenant une requête permettant de récupérer les données des clients possèdant une carte de fidélité de la table clients.
    public function getClientsWithFidelityCard()
    {
        $query = "SELECT `clients`.`id`, `clients`.`lastName`, `clients`.`firstName` FROM `clients` INNER JOIN `cards` ON `clients`.`cardNumber` = `cards`.`cardNumber` INNER JOIN `cardTypes` ON `cards`.`cardTypesID` = `cardTypes`.`id` WHERE `type` = 'Fidélité'";
        $queryGetClientsWithFidelityCard = $this->getDataBase()->prepare($query);
        $queryGetClientsWithFidelityCard->execute();
        $resultQuery = $queryGetClientsWithFidelityCard->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    //Méthode contenant une requête permettant de récupérer le nom et prénon des clients qui ont le nom commençant par la lettre M de la table clients.
    public function getClientsContent_M()
    {
        $query = "SELECT `clients`.`id`, `clients`.`lastName`, `clients`.`firstName` FROM clients WHERE `lastName` LIKE 'M%' ORDER BY `lastName`";
        $queryGetClientsContent_M = $this->getDataBase()->prepare($query);
        $queryGetClientsContent_M->execute();
        $resultsQuery = $queryGetClientsContent_M->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultsQuery)) {
            return $resultsQuery;
        } else {
            return false;
        }
    }
}
