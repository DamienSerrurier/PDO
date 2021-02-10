<?php

class DataBase
{
    //Propriétés
    private $dataBase;

    //Méthodes
    public function getDataBase()
    {
        return $this->dataBase;
    }

    public function setDataBase($dataBase)
    {
        $this->dataBase = $dataBase;
        return $this->dataBase;
    }

    //Constructeur
    public function __construct()
    {
        $this->setDataBase(new PDO('mysql:dbname=colyseum;host=localhost;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]));
    }
}
