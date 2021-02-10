<?php

class CardTypes extends DataBase
{
    //Propriétés
    private $id;
    private $type;
    private $discount;


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

    public function setType($type)
    {
        $this->type = $type;
        return $this->type;
    }

    //cardTypesId
    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this->discount;
    }

    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }
}
