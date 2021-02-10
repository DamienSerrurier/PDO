<?php

class Cards extends DataBase
{
    //Propriétés
    private $id;
    private $cardNumber;
    private $cardTypesId;


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

    //cardTypesId
    public function getCardTypesId()
    {
        return $this->cardTypesId;
    }

    public function setCardTypesId($cardTypesId)
    {
        $this->cardTypesId = $cardTypesId;
        return $this->cardTypesId;
    }

    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }
}
