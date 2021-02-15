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
     * Méthode permettant l'ajout d'un RDV en base de données
     * 
     * @param array
     * @param boolean
     */
    public function addAppointment($arrayParameters)
    {
        $query = "INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatients)";
        $buildQuery = parent::getDataBase()->prepare($query);
        $buildQuery->bindValue('dateHour', $arrayParameters['dateHour'], PDO::PARAM_STR);
        $buildQuery->bindValue('idPatients', $arrayParameters['idPatients'], PDO::PARAM_INT);
        return $buildQuery->execute();
    }
}
