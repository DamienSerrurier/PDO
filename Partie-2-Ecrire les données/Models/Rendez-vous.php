<?php

//Création de la class Patients.
class Appointments extends Database
{
    //Propriétés
    private $id;
    private $dateHour;
    private $idPatients;

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

    public function getDateHour()
    {
        return $this->dateHour;
    }

    public function setDateHour($dateHour)
    {
        $this->dateHour = $dateHour;
        return $this->dateHour;
    }

    public function getIdPatients()
    {
        return $this->idPatients;
    }

    public function setIdPatients($idPatients)
    {
        $this->idPatients = $idPatients;
        return $this->idPatients;
    }

    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Méthode permettant l'ajout d'un rendez-vous en base de données
     * 
     * @param array
     * @param boolean
     */
    public function addAppointment(array $arrayParameters)
    {
        $query = "INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatient);";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->bindValue('dateHour', $arrayParameters['dateHour'], PDO::PARAM_STR);
        $buildQuery->bindValue('idPatient', $arrayParameters['idPatient'], PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    /**
     * Méthode qui permet de récupérer toutes les informations d'un rendez-vous par son id
     * 
     * @param int
     * @return array|boolean
     */
    public function getOneAppointmentById(int $id)
    {
        $query = "SELECT `id`, `dateHour`, `idPatients`
            FROM `appointments`
            WHERE `id` = :id;";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->bindValue('id', $id, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    /**
     * Méthode qui permet la modification d'un rendez-vous
     * 
     * @param array
     * @return boolean
     */
    public function updateAppointment($arrayParameters)
    {
        $query = "UPDATE `appointments` 
            SET `dateHour` = :dateHour, `idPatients` = :idPatient 
            WHERE `id` = :idAppointment;";
        $buildQuery = parent::getDatabase()->prepare($query);
        $buildQuery->bindValue('dateHour', $arrayParameters['dateHour'], PDO::PARAM_STR);
        $buildQuery->bindValue('idPatient', $arrayParameters['idPatient'], PDO::PARAM_INT);
        $buildQuery->bindValue('idAppointment', $arrayParameters['idAppointment'], PDO::PARAM_INT);
        return $buildQuery->execute();
    }
}
