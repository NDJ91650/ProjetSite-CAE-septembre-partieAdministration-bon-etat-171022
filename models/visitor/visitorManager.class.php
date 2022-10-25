<?php
require "./models/manager.class.php";

class VisitorManager extends Manager{

    public function AjoutUtilisateur(
        $identifiant, $mdp, $academie, $numen, $discipline_contrat, $nom_spe, $spe_college, $spe_lycee_pro, $spe_lycee_tech, $spe_lycee_gen, $spe_post_bac, $civilite, $situation_maritale, $nom, $prenom, $nom_naissance, $date_naissance, $adresse, $cp, $ville, $domicile, $portable, $email
        ){

        $sql=$this->getDb()->prepare("INSERT INTO utilisateur 
        (identifiant_utilisateur, mdp_utilisateur, academie_origine, numen, discipline_contrat, nom_spe, spe_college, spe_lycee_pro, spe_lycee_tech, spe_lycee_gen, spe_post_bac, civilite_utilisateur, situation_maritale, nom_utilisateur, prenom_utilisateur, nom_naissance_utilisateur, date_naissance_utilisateur, adresse_utilisateur, cp_utilisateur, ville_utilisateur, num_domicile_utilisateur, num_portable_utilisateur, email_utilisateur) 
        VALUES (upper(?),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $param=[
            $identifiant, $mdp, $academie, $numen, $discipline_contrat, $nom_spe, $spe_college, $spe_lycee_pro, $spe_lycee_tech, $spe_lycee_gen, $spe_post_bac, $civilite, $situation_maritale, $nom, $prenom, $nom_naissance, $date_naissance, $adresse, $cp, $ville, $domicile, $portable, $email
        ];

        $sql->execute($param);
        if($sql->rowCount()>0){
            return true;
        }else{
            return false;
        }  
    }

    public function verif($email){
        $sql=$this->getDb()->prepare("SELECT email_utilisateur FROM utilisateur WHERE email_utilisateur=?");  
        $param=[$email];
        $sql->execute($param);
        $info=$sql->rowCount();
       
        if($info>0){
            return true;
        }else{
            return false;
        }
    }

    public function verif2($numen){
        $sql=$this->getDb()->prepare("SELECT numen FROM utilisateur WHERE numen=?");
        $param=[$numen];
        $sql->execute($param);
        $info=$sql->rowCount();
        if($info>0){
            return true;
        }else{
            return false;
        }
    }
}