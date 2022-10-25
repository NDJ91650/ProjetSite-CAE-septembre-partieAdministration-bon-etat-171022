<?php

class Etablissemen{
    private $id_etbsmt;
    private $rne_etbsmt;
    private $academie_etbsmt;
    private $nom_etbsmt_principal;
    private $adresse_etbsmt;
    private $cp_etbsmt;
    private $ville_etbsmt;
    private $departement_etbsmt;
    private $num_etbsmt;
    private $fax_etbsmt;
    private $email_etbsmt;
    private $type_etbsmt;
    private $nom_chef_etbsmt;
    private $prenom_chef_etbsmt;
    private $email_chef_etbsmt;

    public function getId_etbsmt(){
        return $this->id_etbsmt;
    }
    public function setId_etbsmt($id_etbsmt){
        $this->id_etbsmt=$id_etbsmt;
    }
    
    public function getRne_etbsmt()
    {
        return $this->rne_etbsmt;
    }
    public function setRne_etbsmt($rne_etbsmt)
    {
        $this->rne_etbsmt= $rne_etbsmt;
    }

    public function getAcademie_etbsmt(){
        return $this->academie_etbsmt;
    }
    public function setAcademie_etbsmt($academie_etbsmt){
        $this->academie_etbsmt=$academie_etbsmt;
    }

    public function getNom_etbsmt_principal(){
        return $this->nom_etbsmt_principal;
    }
    public function setNom_etbsmt_principal($nom_etbsmt_principal){
        $this->nom_etbsmt_principal=$nom_etbsmt_principal;
    }

    public function getAdresse_etbsmt(){
        return $this->adresse_etbsmt;
    }
    public function setAdresse_etbsmt($adresse_etbsmt){
        $this->adresse_etbsmt=$adresse_etbsmt;
    }

    public function getCp_etbsmt(){
        return $this->cp_etbsmt;
    }
    public function setCp_etbsmt($cp_etbsmt){
        $this->cp_etbsmt=$cp_etbsmt;
    }

    public function getVille_etbsmt(){
        return $this->ville_etbsmt;
    }
    public function setVille_etbsmt($ville_etbsmt){
        $this->ville_etbsmt=$ville_etbsmt;
    }

    public function getDepartement_etbsmt(){
        return $this->departement_etbsmt;
    }
    public function setDepartement_etbsmt($departement_etbsmt){
        $this->departement_etbsmt=$departement_etbsmt;
    }

    public function getNum_etbsmt(){
        return $this->num_etbsmt;
    }
    public function setNum_etbsmt($num_etbsmt){
        $this->num_etbsmt=$num_etbsmt;
    }

    public function getFax_etbsmt(){
        return $this->fax_etbsmt;
    }
    public function setFax_etbsmt($fax_etbsmt){
        $this->fax_etbsmt=$fax_etbsmt;
    }

    public function getEmail_etbsmt(){
        return $this->email_etbsmt;
    }
    public function setEmail_etbsmt($email_etbsmt){
        $this->email_etbsmt=$email_etbsmt;
    }

    public function getType_etbsmt(){
        return $this->type_etbsmt;
    }
    public function setType_etbsmt($type_etbsmt){
        $this->type_etbsmt=$type_etbsmt;
    }

    public function getNom_chef_etbsmt(){
        return $this->nom_chef_etbsmt;
    }
    public function setNom_chef_etbsmt($nom_chef_etbsmt){
        $this->nom_chef_etbsmt=$nom_chef_etbsmt;
    }

    public function getPrenom_chef_etbsmt(){
        return $this->prenom_chef_etbsmt;
    }
    public function setPrenom_chef_etbsmt($prenom_chef_etbsmt){
        $this->prenom_chef_etbsmt=$prenom_chef_etbsmt;
    }

    public function getEmail_chef_etbsmt(){
        return $this->email_chef_etbsmt;
    }
    public function setEmail_chef_etbsmt($email_chef_etbsmt){
        $this->email_chef_etbsmt=$email_chef_etbsmt;
    }
}