<?php

class Tickets extends DataBase
{
    //Propriétés
    private $id;
    private $price;
    private $bookingsId;


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

    //price
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this->price;
    }

    //bookingsId
    public function getBookingsId()
    {
        return $this->bookingsId;
    }

    public function setBookingsId($bookingsId)
    {
        $this->bookingsId = $bookingsId;
        return $this->bookingsId;
    }

    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }
}
