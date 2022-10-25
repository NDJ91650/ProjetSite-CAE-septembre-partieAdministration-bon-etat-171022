<?php

class Manager{
    private $base; // ca va etre notre connexion à la base de donnée 

    public function __construct($base){
        $this->setdb($base);  
    }

    public function getDb(){
        return $this->base;
    }

    public function setDb(PDO $base){
        $this->base=$base;
    }
}