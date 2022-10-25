<?php

class Formulaire{
    private $id_mutation;
    private $type_mutation;
    private $date_demande;
    private $situation;
    private $type_contrat;
    private $date_contrat;
    private $contrat;
    private $statut_situation;
    private $disponibilite;
    private $autre_disponibilite;
    private $date_debut_disponibilite;
    private $echelle_remuneration;
    private $remuneration_classe;
    private $echelon;
    private $anciennete_service;
    private $statut_demande;
    private $id_utilisateur;


    public function getId_mutation(){
        return $this->id_mutation;
    }
    public function setId_mutation($id_mutation){
        $this->id_mutation = $id_mutation;
    }

    public function getType_mutation(){
        return $this->type_mutation;
    }
    public function setType_mutation($type_mutation){
        $this->type_mutation = $type_mutation;
    }

    public function getDate_demande(){
        return $this->date_demande;
    }
    public function setDate_demande($date_demande){
        $this->date_demande = $date_demande;
    }

    public function getSituation(){
        return $this->situation;
    }
    public function setSituation($situation){
        $this->situation = $situation;
    }

    public function getType_contrat(){
        return $this->type_contrat;
    }
    public function setType_contrat($type_contrat){
        $this->type_contrat = $type_contrat;
    }

    public function getDate_contrat(){
        return $this->date_contrat;
    }
    public function setDate_contrat($date_contrat){
        $this->date_contrat = $date_contrat;
    }

    public function getContrat(){
        return $this->contrat;
    }
    public function setContrat($contrat){
        $this->contrat = $contrat;
    }

    public function getStatut_situation(){
        return $this->statut_situation;
    }
    public function setStatut_situation($statut_situation){
        $this->statut_situation = $statut_situation;
    }

    public function getDisponibilite(){
        return $this->disponibilite;
    }
    public function setDisponibilite($disponibilite){
        $this->disponibilite = $disponibilite;
    }
    public function getAutre_disponibilite(){
        return $this->autre_disponibilite;
    }
    public function setAutre_disponibilite($autre_disponibilite){
        $this->autre_disponibilite = $autre_disponibilite;
    }

    public function getDate_debut_disponibilite(){
        return $this->date_debut_disponibilite;
    }
    public function setDate_debut_disponibilite($date_debut_disponibilite){
        $this->date_debut_disponibilite = $date_debut_disponibilite;
    }

    public function getEchelle_remuneration(){
        return $this->echelle_remuneration;
    }
    public function setEchelle_remuneration($echelle_remuneration){
        $this->echelle_remuneration = $echelle_remuneration;
    }

    public function getRemuneration_classe(){
        return $this->remuneration_classe;
    }
    public function setRemuneration_classe($remuneration_classe){
        $this->remuneration_classe = $remuneration_classe;
    }

    public function getEchelon(){
        return $this->echelon;
    }
    public function setEchelon($echelon){
        $this->echelon = $echelon;
    }

    public function getAnciennete_service(){
        return $this->anciennete_service;
    }
    public function setAnciennete_service($anciennete_service){
        $this->anciennete_service = $anciennete_service;
    }

    public function getStatut_demande(){
        return $this->statut_demande;
    }
    public function setStatut_demande($statut_demande){
        $this->statut_demande = $statut_demande;
    }

    public function getId_utilisateur(){
        return $this->id_utilisateur;
    }
    public function setId_utilisateur($id_utilisateur){
        $this->id_utilisateur = $id_utilisateur;
    }
}
