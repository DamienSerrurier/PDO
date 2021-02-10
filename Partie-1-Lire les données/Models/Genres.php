<?php

class Genres extends DataBase
{
    //Propriétés
    private $id;
    private $genre;
    private $showTypesId;


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

    //genre
    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this->genre;
    }

    //showTypesId
    public function getShowTypesId()
    {
        return $this->showTypesId;
    }

    public function setShowTypesId($showTypesId)
    {
        $this->showTypesId = $showTypesId;
        return $this->showTypesId;
    }

    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }
}
