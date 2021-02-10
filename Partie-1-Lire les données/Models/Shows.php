<?php

class Shows extends DataBase
{
    //Propriétés
    private $id;
    private $title;
    private $performer;
    private $date;
    private $showTypesId;
    private $firstGenresId;
    private $secondGenreId;
    private $duration;
    private $startTime;

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

    //title
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this->title;
    }

    //performer
    public function getPerformer()
    {
        return $this->performer;
    }

    public function setPerformer($performer)
    {
        $this->performer = $performer;
        return $this->performer;
    }

    //date
    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this->date;
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

    //firstGenresId
    public function getFirstGenresId()
    {
        return $this->firstGenresId;
    }

    public function setFirstGenresId($firstGenresId)
    {
        $this->firstGenresId = $firstGenresId;
        return $this->firstGenresId;
    }

    //secondGenreId
    public function getSecondGenreId()
    {
        return $this->secondGenreId;
    }

    public function setSecondGenreId($secondGenreId)
    {
        $this->secondGenreId = $secondGenreId;
        return $this->secondGenreId;
    }

    //duration
    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this->duration;
    }

    //startTime
    public function getStartTime()
    {
        return $this->startTime;
    }

    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
        return $this->startTime;
    }

    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }

    //Méthode contenant une requête permettant de récupérer des données par ordre de colonnes données et par ordre alphabétique de la table shows.
    public function getShowsAlphabeticalOrder()
    {
        $query = "SELECT `shows`.`id`, `shows`.`title`, `shows`.`performer`, `shows`.`date`, `shows`.`startTime` FROM `shows` ORDER BY `shows`.`title`";
        $queryGetShows = $this->getDataBase()->prepare($query);
        $queryGetShows->execute();
        $resultQuery = $queryGetShows->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }
}
