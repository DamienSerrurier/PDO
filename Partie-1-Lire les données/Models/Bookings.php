<?php

class Bookings extends DataBase
{
    //Propriétés
    private $id;
    private $clientId;

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

    //clientId
    public function getClientId()
    {
        return $this->clientId;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this->clientId;
    }

    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }
}
