<?php

class ShowTypes extends DataBase
{
    //Propriétés
    private $id;
    private $type;

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

    //type
    public function getType()
    {
        return $this->type;
    }

    public function seTtype($type)
    {
        $this->type = $type;
        return $this->type;
    }
    
    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }

     //Méthode contenant une requête permettant de récupérer toutes les données des types de spectacles de la table showTypes.
    public function getAllShowTypes(){
        $query = "SELECT * FROM `showTypes`";
        $queryGetAllShowTypes = parent::getDataBase()->prepare($query);
        $queryGetAllShowTypes->execute();
        $resultQuery = $queryGetAllShowTypes->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($resultQuery)){
            return $resultQuery;
        }else{
            return false;
        }
    }
}
