<?php


class Admin{

    private $id_admin;
    private $mdp_admin;
    private $email_admin;

    public function getId_admin(){
        return $this->id_admin;
    }
    public function setId_admin($id_admin){
       $this->id_admin=$id_admin;
    }

    public function getMdp_admin(){
        return $this->mdp_admin;
    }
    public function setMdp_admin($mdp_admin){
       $this->mdp_admin=$mdp_admin;
    }

    public function getEmail_admin(){
        return $this->email_admin;
    }
    public function setEmail_admin($email_admin){
       $this->email_admin=$email_admin;
    }
}