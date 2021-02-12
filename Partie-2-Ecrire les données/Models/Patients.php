<?php

//Création de la class Patients.
class Patients extends Database
{
    //Propriétés
    private $id;
    private $lastname;
    private $firstname;
    private $birthdate;
    private $phone;
    private $mail;

    //Méthodes Getter et Setter
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this->id;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this->lastname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this->firstname;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this->birthdate;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this->phone;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this->mail;
    }

    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }

    //Méthode permettant de créer un patient.
    public function addPatient($arrayParameters)
    {
        $query = "INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->bindValue('lastname', $arrayParameters['lastname'], PDO::PARAM_STR);
        $buildQuery->bindValue('firstname', $arrayParameters['firstname'], PDO::PARAM_STR);
        $buildQuery->bindValue('birthdate', $arrayParameters['birthdate'], PDO::PARAM_STR);
        $buildQuery->bindValue('phone', $arrayParameters['phone'], PDO::PARAM_STR);
        $buildQuery->bindValue('mail', $arrayParameters['mail'], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    public function addPatientsInformations()
    {
        $query = "SELECT * FROM `patients`";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function addOnePatientInformation($id)
    {
        $query = "SELECT * FROM `patients` WHERE `id` = :id";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->bindValue('id', $id, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch();
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function updatePatient($arrayParameters)
    {
        $query = "UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail WHERE `id` = :id";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->bindValue('id', $arrayParameters['id'], PDO::PARAM_INT);
        $buildQuery->bindValue('lastname', $arrayParameters['lastname'], PDO::PARAM_STR);
        $buildQuery->bindValue('firstname', $arrayParameters['firstname'], PDO::PARAM_STR);
        $buildQuery->bindValue('birthdate', $arrayParameters['birthdate'], PDO::PARAM_STR);
        $buildQuery->bindValue('phone', $arrayParameters['phone'], PDO::PARAM_STR);
        $buildQuery->bindValue('mail', $arrayParameters['mail'], PDO::PARAM_STR);
        return $buildQuery->execute();
    }
}
