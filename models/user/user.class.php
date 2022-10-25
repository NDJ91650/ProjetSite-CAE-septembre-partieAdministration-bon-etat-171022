<?php 

// Class qui représente la table user --> ENTITE (ENTITY)

class User{
    // Declaration des attributs 
    private $id_utilisateur;
    private $identifiant_utilisateur;
    private $mdp_utilisateur;
    // private $isValid;
    private $academie_origine;
    private $numen;
    private $discipline_contrat;
    private $nom_spe;
    private $spe_clg;
    private $spe_lycee_pro;
    private $spe_lycee_tech;
    private $spe_lycee_gen;
    private $spe_post_bac;
    private $civilite_utilisateur;
    private $situation_maritale;
    private $nom_utilisateur;
    private $prenom_utilisateur;
    private $nom_naissance_utilisateur;
    private $date_naissance_utilisateur;
    private $adresse_utilisateur;
    private $cp_utilisateur;
    private $ville_utilisateur;
    private $num_domicile_utilisateur;
    private $num_portable_utilisateur;
    private $email_utilisateur;
    private $id_etbsmt_principal;
    private $statut_etbsmt;
    private $nb_heures_travaille;


    // qui dit attributs privée dit acesseur et getters 
    public function getId_utilisateur(){
        return $this->id_utilisateur;
    }
    public function setId_utilisateur($id_utilisateur){
       $this->id_utilisateur=$id_utilisateur;
    }

    public function getIdentifiant_utilisateur(){
        return $this->identifiant_utilisateur;
    }
    public function setIdentifiant_utilisateur($identifiant_utilisateur){
       $this->identifiant_utilisateur=$identifiant_utilisateur;
    }

    public function getMdp_utilisateur(){
        return $this->mdp_utilisateur;
    }
    public function setMdp_utilisateur($mdp_utilisateur){
       $this->mdp_utilisateur=$mdp_utilisateur;
    }

    // public function getIsValid(){
    //     return $this->isValid;
    // }
    // public function setIsValid($isValid){
    //    $this->isValid=$isValid;
    // }

    public function getAcademie_origine(){
        return $this->academie_origine;
    }
    public function setAcademie_origine($academie_origine){
       $this->academie_origine=$academie_origine;
    }

    public function getNumen(){
        return $this->numen;
    }
    public function setNumen($numen){
       $this->numen=$numen;
    }

    public function getDiscipline_contrat(){
        return $this->discipline_contrat;
    }
    public function setDiscipline_contrat($discipline_contrat){
       $this->discipline_contrat=$discipline_contrat;
    }

    public function getNom_spe(){
        return $this->nom_spe;
    }
    public function setNom_spe($nom_spe){
       $this->nom_spe=$nom_spe;
    }

    public function getSpe_clg(){
        return $this->spe_clg;
    }
    public function setSpe_clg($spe_clg){
       $this->spe_clg=$spe_clg;
    }

    public function getSpe_lycee_pro(){
        return $this->spe_lycee_pro;
    }
    public function setSpe_lycee_pro($spe_lycee_pro){
       $this->spe_lycee_pro=$spe_lycee_pro;
    }

    public function getSpe_lycee_tech(){
        return $this->spe_lycee_tech;
    }
    public function setSpe_lycee_tech($spe_lycee_tech){
       $this->spe_lycee_tech=$spe_lycee_tech;
    }

    public function getSpe_lycee_gen(){
        return $this->spe_lycee_gen;
    }
    public function setSpe_lycee_gen($spe_lycee_gen){
       $this->spe_lycee_gen=$spe_lycee_gen;
    }

    public function getSpe_post_bac(){
        return $this->spe_post_bac;
    }
    public function setSpe_post_bac($spe_post_bac){
       $this->spe_post_bac=$spe_post_bac;
    }

    public function getCivilite_utilisateur(){
        return $this->civilite_utilisateur;
    }
    public function setCivilite_utilisateur($civilite_utilisateur){
       $this->civilite_utilisateur=$civilite_utilisateur;
    }

    public function getSituation_maritale(){
        return $this->situation_maritale;
    }
    public function setSituation_maritale($situation_maritale){
       $this->situation_maritale=$situation_maritale;
    }

    public function getNom_utilisateur(){
        return $this->nom_utilisateur;
    }
    public function setNom_utilisateur($nom_utilisateur){
       $this->nom_utilisateur=$nom_utilisateur;
    }
    
    public function getPrenom_utilisateur(){
        return $this->prenom_utilisateur;
    }
    public function setPrenom_utilisateur($prenom_utilisateur){
       $this->prenom_utilisateur=$prenom_utilisateur;
    }

    public function getNom_naissance_utilisateur(){
        return $this->nom_naissance_utilisateur;
    }
    public function setNom_naissance_utilisateur($nom_naissance_utilisateur){
       $this->nom_naissance_utilisateur=$nom_naissance_utilisateur;
    }

    public function getDate_naissance_utilisateur(){
        return $this->date_naissance_utilisateur;
    }
    public function setDate_naissance_utilisateur($date_naissance_utilisateur){
       $this->date_naissance_utilisateur=$date_naissance_utilisateur;
    }

    public function getAdresse_utilisateur(){
        return $this->adresse_utilisateur;
    }
    public function setAdresse_utilisateur($adresse_utilisateur){
       $this->adresse_utilisateur=$adresse_utilisateur;
    }
    
    public function getCp_utilisateur(){
        return $this->cp_utilisateur;
    }
    public function setCp_utilisateur($cp_utilisateur){
       $this->cp_utilisateur=$cp_utilisateur;
    }

    public function getVille_utilisateur(){
        return $this->ville_utilisateur;
    }
    public function setVille_utilisateur($ville_utilisateur){
       $this->ville_utilisateur=$ville_utilisateur;
    }

    public function getNum_domicile_utilisateur(){
        return $this->num_domicile_utilisateur;
    }
    public function setNum_domicile_utilisateur($num_domicile_utilisateur){
       $this->num_domicile_utilisateur=$num_domicile_utilisateur;
    }

    public function getNum_portable_utilisateur(){
        return $this->num_portable_utilisateur;
    }
    public function setNum_portable_utilisateur($num_portable_utilisateur){
       $this->num_portable_utilisateur=$num_portable_utilisateur;
    }

    public function getEmail_utilisateur(){
        return $this->email_utilisateur;
    }
    public function setEmail_utilisateur($email_utilisateur){
       $this->email_utilisateur=$email_utilisateur;
    }

    public function getId_etbsmt_principal(){
        return $this->id_etbsmt_principal;
    }
    public function setId_etbsmt_principal($id_etbsmt_principal){
       $this->id_etbsmt_principal=$id_etbsmt_principal;
    }

    public function getStatut_etbsmt(){
        return $this->statut_etbsmt;
    }
    public function setStatut_etbsmt($statut_etbsmt){
       $this->statut_etbsmt=$statut_etbsmt;
    }

    public function getNb_heures_travaille(){
        return $this->nb_heures_travaille;
    }
    public function setNb_heures_travaille($nb_heures_travaille){
       $this->nb_heures_travaille=$nb_heures_travaille;
    }
}