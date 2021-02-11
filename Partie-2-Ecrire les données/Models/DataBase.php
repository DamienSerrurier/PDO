<?php

//Création de la class DataBase pour effectuer la connexion à la base de donnée.
class Database
{
    //Propriété
    private $database;

    //Méthode Getter et Setter
    public function getDatabase()
    {
        return $this->database;
    }

    public function setDatabase($database)
    {
        $this->database = $database;
        return $this->database;
    }

    //Constructeur
    public function __construct()
    {
        $this->setDatabase(new PDO("mysql:dbname=hospitale2n;host=localhost;charset=utf8;", "root", "", [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]));
    }
}