<?php

class Dbconnect extends PDO {
    private $dsn;
    private $username;
    private $password;
    private $options;

    public function __construct(){
        $dsn='mysql:host=localhost;dbname=sidiec;port=3306';
        $username= "root";
        $password="root";
        $options=[];
        parent::__construct($dsn,$username,$password,$options);
    }   
}

