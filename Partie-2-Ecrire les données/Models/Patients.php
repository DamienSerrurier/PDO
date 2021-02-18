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

    /**
     * Méthode qui permet d'ajouter un patient en base de données
     * 
     * @param array
     * @param boolean
     */
    public function addPatient(array $arrayParameters)
    {
        $query = "INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) 
            VALUES (:lastname, :firstname, :birthdate, :phone, :mail);";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->bindValue('lastname', $arrayParameters['lastname'], PDO::PARAM_STR);
        $buildQuery->bindValue('firstname', $arrayParameters['firstname'], PDO::PARAM_STR);
        $buildQuery->bindValue('birthdate', $arrayParameters['birthdate'], PDO::PARAM_STR);
        $buildQuery->bindValue('phone', $arrayParameters['phone'], PDO::PARAM_STR);
        $buildQuery->bindValue('mail', $arrayParameters['mail'], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    /**
     * Méthode qui permet de récupérer les informations de tous les patients
     * 
     * @return array|boolean
     */
    public function getPatientsInformations()
    {
        $query = "SELECT * 
            FROM `patients`;";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Méthode permettant de récupérer uniquement l'id, le nom et le prénom de tous les patients en base.
     * Le but de cette méthode est d'optimiser le temps de réponse de la page web en ne prenant que les données nécessaires en base de données.
     * 
     * @return array|boolean
     */
    public function getPatientsInformationsLight()
    {
        $query = "SELECT `id`, `lastname`, `firstname` 
            FROM `patients`;";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Méthode qui permet de récupérer les informations d'un patient en particulier
     * 
     * @return array|boolean
     */
    public function getOnePatientInformation(int $id)
    {
        $query = "SELECT * FROM `patients` 
            WHERE `id` = :id;";
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

    /**
     * Méthode qui permet de modifier un patient existant
     * 
     * @param array
     * @return boolean
     */
    public function updatePatient(array $arrayParameters)
    {
        $query = "UPDATE `patients` 
            SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail 
            WHERE `id` = :id;";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->bindValue('id', $arrayParameters['id'], PDO::PARAM_INT);
        $buildQuery->bindValue('lastname', $arrayParameters['lastname'], PDO::PARAM_STR);
        $buildQuery->bindValue('firstname', $arrayParameters['firstname'], PDO::PARAM_STR);
        $buildQuery->bindValue('birthdate', $arrayParameters['birthdate'], PDO::PARAM_STR);
        $buildQuery->bindValue('phone', $arrayParameters['phone'], PDO::PARAM_STR);
        $buildQuery->bindValue('mail', $arrayParameters['mail'], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    /**
     * Méthode permettant de récupérer tous les RDV de la base associés aux noms et prénoms des patients concernés
     * 
     * @return array|boolean
     */
    public function getAllAppointmentsWhisAllPatientsInformations()
    {
        $query = "SELECT `appointments`.`id`, `patients`.`lastname`, `patients`.`firstname`, `appointments`.`dateHour`
            FROM `patients`
            INNER JOIN `appointments`
            ON `patients`.`id` = `appointments`.`idPatients`;";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if ($resultQuery) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Méthode permettant de récupérer toutes les informations d'un rendez-vous en particulier (informations sur le RDV + informations sur le patient concerné)
     * 
     * @param int
     * @return array|boolean
     */
    public function getOneAppointmentWithPatientInformationns(int $id)
    {
        $query = "SELECT `appointments`.`id` AS `appointmentId`, `appointments`.`dateHour`, `patients`.`id` AS `patientId`, `patients`.`lastname`, `patients`.`firstname`, `patients`.`birthdate`, `patients`.`phone`, `patients`.`mail`
            FROM `patients`
            INNER JOIN `appointments`
            ON `patients`.`id` = `appointments`.`idPatients` 
            WHERE `appointments`.`id` = :id;";
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

    /**
     * Méthode qui permet de supprimer à la fois un patient et ses rendez-vous via son Id
     * 
     * @param int
     * @return boolean
     */
    public function deletePatientById(int $id)
    {
        $query = "DELETE FROM `patients` 
            WHERE `id` = :id;";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->bindValue('id', $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }
}
