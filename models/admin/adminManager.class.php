
<?php
require "./models/admin/user.class.php";
require "./models/admin/formulaire.class.php";
require "./models/admin/voeux.class.php";
require "./models/admin/actualites.class.php";
require "./models/admin/etablissement.class.php";


class AdminManager extends Manager{

    public function creation_actualites($titre, $description, $date_debut, $date_fin){
        $param = [$titre, $description, $date_debut, $date_fin];
        $sql = "INSERT INTO actualites (titre_actu, desc_actu, date_debut, date_fin) VALUES(?,?,?,?)";
        $res=$this->getDb()->prepare($sql);
        $res->execute($param);

        if ($res->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function modification_info_user($champs, $value, $id_utilisateur){
        $sql="UPDATE utilisateur SET " . $champs ." = ? WHERE id_utilisateur = ?";
        $param=[$value, $id_utilisateur];
        $res = $this->getDb()->prepare($sql);
        $result = $res->execute($param);

        return $result;
    }

    
    public function modification_infoMutation($champs, $valeur, $id_mutation){
         $sql="UPDATE  demande_mutation  SET " . $champs ." = ? WHERE id_mutation = ? ";
         $param=[$valeur, $id_mutation];
         $res = $this->getDb()->prepare($sql);
         $result = $res->execute($param);
     // $result = array_filter($resulta);
         return $result;
     }

    public function verif_codif($statut){
         $sql="UPDATE   demande_mutation d, voeux_user v  SET d.statut_demande = ? WHERE v.id_mutation = d.id_mutation";
         $param = [$statut];
         $res = $this->getDb()->prepare($sql);
         $result = $res->execute($param);
     // $result = array_filter($resulta);
         return $result;
     }

     public function codif(){

        $result = [];
        $sql= "SELECT codification  FROM voeux_user v JOIN demande_mutation d  WHERE codification is not null && v.id_mutation = d.id_mutation ;
        ";
       $res = $this->getDb()->prepare($sql);
       $res->execute();
       $result= $res->fetchAll(PDO::FETCH_ASSOC);
       
      
       
       return $result;

    }
    


    public function getPasswordadmin($identifiant)
    {
        // Recherche le mdp de la BDD en fonction de l'email
        $sql = "SELECT mdp_admin FROM admin WHERE identifiant_admin=?";
        $param = [$identifiant];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
        $result = $res->fetch();
        return $result["mdp_admin"];
    }

    public function verificationMdp($identifiant, $password)
    {
        // Utiliser getPasswordUser pour aller chercher le mdp crypté en fonction de l'email
        // Utilisation de passwordverify pour vérifier les mdp
        $mdp = $this->getPasswordadmin($identifiant);
        return password_verify($password, $mdp);
    }

    public function get_etbsmt(){
        $all_etbsmt = [];
        $sql = "SELECT * FROM etablissement";
        $res = $this->getDb()->prepare($sql);
        $res->execute();
        while($result = $res->fetch(PDO::FETCH_ASSOC)){
            $etbsmt = new Etablissemen();
            $etbsmt->setId_etbsmt($result["id_etbsmt"]);
            $etbsmt->setRne_etbsmt($result["rne_etbsmt"]);
            $etbsmt->setAcademie_etbsmt($result["academie_etbsmt"]);
            $etbsmt->setNom_etbsmt_principal($result["nom_etbsmt_principal"]);
            $etbsmt->setAdresse_etbsmt($result["adresse_etbsmt"]);
            $etbsmt->setCp_etbsmt($result["cp_etbsmt"]);
            $etbsmt->setVille_etbsmt($result["ville_etbsmt"]);
            $etbsmt->setDepartement_etbsmt($result["departement_etbsmt"]);
            $etbsmt->setNum_etbsmt($result["num_etbsmt"]);
            $etbsmt->setFax_etbsmt($result["fax_etbsmt"]);
            $etbsmt->setEmail_etbsmt($result["email_etbsmt"]);
            $etbsmt->setType_etbsmt($result["type_etbsmt"]);
            $etbsmt->setNom_chef_etbsmt($result["nom_chef_etbsmt"]);
            $etbsmt->setPrenom_chef_etbsmt($result["prenom_chef_etbsmt"]);
            $etbsmt->setEmail_chef_etbsmt($result["email_chef_etbsmt"]);

            array_push($all_etbsmt, $etbsmt);
        }
        return $all_etbsmt;
        $res->closeCursor();
    }

    public function get_all_data_user(){
        $data = [];
        $data_clean = [];
        $sql = "SELECT  * FROM utilisateur u JOIN demande_mutation d WHERE u.id_utilisateur = d.id_utilisateur";
        $res = $this->getDb()->prepare($sql);
        $res->execute();
        while($result = $res->fetch(PDO::FETCH_ASSOC)){
            $user=new User();
            $user->setId_utilisateur($result["id_utilisateur"]);
            $user->setIdentifiant_utilisateur($result["identifiant_utilisateur"]);
            $user->setAcademie_origine($result["academie_origine"]);
            $user->setNumen($result["numen"]);
            $user->setDiscipline_contrat($result["discipline_contrat"]);
            $user->setNom_spe($result["nom_spe"]);
            $user->setSpe_clg($result["spe_college"]);
            $user->setSpe_lycee_pro($result["spe_lycee_pro"]);
            $user->setSpe_lycee_tech($result["spe_lycee_tech"]);
            $user->setSpe_lycee_gen($result["spe_lycee_gen"]);
            $user->setSpe_post_bac($result["spe_post_bac"]);
            $user->setCivilite_utilisateur($result["civilite_utilisateur"]);
            $user->setSituation_maritale($result["situation_maritale"]);
            $user->setNom_utilisateur($result["nom_utilisateur"]);
            $user->setPrenom_utilisateur($result["prenom_utilisateur"]);
            $user->setNom_naissance_utilisateur($result["nom_naissance_utilisateur"]);
            $user->setDate_naissance_utilisateur($result["date_naissance_utilisateur"]);
            $user->setAdresse_utilisateur($result["adresse_utilisateur"]);
            $user->setCp_utilisateur($result["cp_utilisateur"]);
            $user->setVille_utilisateur($result["ville_utilisateur"]);
            $user->setNum_domicile_utilisateur($result["num_domicile_utilisateur"]);
            $user->setNum_portable_utilisateur($result["num_portable_utilisateur"]);
            $user->setEmail_utilisateur($result["email_utilisateur"]);
            $user->setId_etbsmt_principal($result["id_etbsmt"]);
            $user->setStatut_etbsmt($result["etbsmt_laic"]);
            $user->setNb_heures_travaille($result["nb_heures_travaille"]);

            array_push($data, $user);
            $data_clean["user"] = $data; 
        }

        foreach($data_clean["user"] as $e){
            $result[$e->getId_utilisateur()]= $this->getDemande_user($e->getId_utilisateur());
            $data_clean["mutation"] = $result;
        }

        $search = $this->getInfosUser();
        $data_clean["recherche"] = $search;

        return $data_clean;
    }

    public function getDemande_user($id_utilisateur){
        $demandes = [];
        $demandes_clean = [];
        $sql = "SELECT * FROM demande_mutation WHERE id_utilisateur = ? ORDER BY id_mutation";
        $param = [$id_utilisateur];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
        while($result=$res->fetch(PDO::FETCH_ASSOC)){
            $demande= new Formulaire;
            $demande->setId_mutation($result["id_mutation"]);
            $demande->setType_mutation($result["type_mutation"]);
            $demande->setDate_demande($result["date_demande"]);
            $demande->setSituation($result["situation"]);
            $demande->setType_contrat($result["type_contrat"]);
            $demande->setDate_contrat($result["date_contrat"]);
            $demande->setContrat($result["contrat"]);
            $demande->setStatut_situation($result["statut_situation"]);
            $demande->setDisponibilite($result["disponibilite"]);
            $demande->setAutre_disponibilite($result["autre_disponibilite"]);
            $demande->setDate_debut_disponibilite($result["date_debut_disponibilite"]);
            $demande->setRemuneration_classe($result["remuneration_classe"]);
            $demande->setEchelle_remuneration($result["echelle_remuneration"]);
            $demande->setEchelon($result["echelon"]);
            $demande->setAnciennete_service($result["anciennete_service"]);
            $demande->setStatut_demande($result["statut_demande"]);
            $demande->setId_utilisateur($result["id_utilisateur"]);

            array_push($demandes, $demande);
            $demandes_clean[$demande->getId_utilisateur()] = $demande;
        }


        // $demandes[] = $res->fetch(PDO::FETCH_ASSOC);

        foreach($demandes_clean as $e){
            $demandes_clean[$e->getType_mutation()] = $this->getVoeux_user($e->getId_mutation());
            // var_dump($result);
        }
       

        return $demandes_clean;

        $res->closeCursor();
    }

    public function getVoeux_user($id_mutation){
        $param=[$id_mutation];
        $voeux=[];

        $sql="SELECT v.id_voeux, v.academie_souhaite, v.choix1, v.choix2, v.choix3, v.choix4, v.choix5, v.choix6, choix7, v.choix8, v.type_contrat_souhaite, v.nb_heures_souhaite, v.motif_demande, v.autre_motif, v.justificatif_motif, v.pre_codification, v.codification, v.id_mutation FROM voeux_user v JOIN demande_mutation d ON v.id_mutation = d.id_mutation WHERE d.id_mutation=?";
        $res=$this->getDb()->prepare($sql);
        $res->execute($param);

        while ($result=$res->fetch(PDO::FETCH_ASSOC)){
            $voeux[$result["id_voeux"]] = $result;
        };
        // var_dump($voeux);

        return $voeux;
    }


    public function getInfosUser()
    {
        if (isset($_POST["recherche"]) and !empty($_POST["recherche"])) {
            $recherche = $_POST["recherche"];
            $result_recherche = [];
            $result_recherche_clean = [];
            $res = [];

            $sql1 = 'SELECT * FROM utilisateur u JOIN demande_mutation d ON u.id_utilisateur = d.id_utilisateur RIGHT JOIN voeux_user v ON v.id_mutation = d.id_mutation WHERE u.nom_utilisateur LIKE "%' . $recherche . '%"';
            $res["sql1"]=$this->getDB()->prepare($sql1);
            $res["sql1"]->execute();
            $result_recherche["sql1"]=$res["sql1"]->fetchAll(PDO::FETCH_ASSOC);

            $sql2 = 'SELECT * FROM utilisateur u JOIN demande_mutation d ON u.id_utilisateur = d.id_utilisateur RIGHT JOIN voeux_user v ON v.id_mutation = d.id_mutation WHERE d.type_mutation LIKE "%' . $recherche . '%"';
            $res["sql2"]=$this->getDB()->prepare($sql2);
            $res["sql2"]->execute();
            $result_recherche["sql2"]=$res["sql2"]->fetchAll(PDO::FETCH_ASSOC);

            $sql3 = 'SELECT * FROM utilisateur u JOIN demande_mutation d ON u.id_utilisateur = d.id_utilisateur RIGHT JOIN voeux_user v ON v.id_mutation = d.id_mutation WHERE d.statut_demande LIKE "%' . $recherche . '%"';
            $res["sql3"]=$this->getDB()->prepare($sql3);
            $res["sql3"]->execute();
            $result_recherche["sql3"]=$res["sql3"]->fetchAll(PDO::FETCH_ASSOC);

            $sql4 = 'SELECT * FROM utilisateur u JOIN demande_mutation d ON u.id_utilisateur = d.id_utilisateur RIGHT JOIN voeux_user v ON v.id_mutation = d.id_mutation WHERE u.academie_origine LIKE "%' . $recherche . '%"';
            $res["sql4"]=$this->getDB()->prepare($sql4);
            $res["sql4"]->execute();
            $result_recherche["sql4"]=$res["sql4"]->fetchAll(PDO::FETCH_ASSOC);

            $sql5 = 'SELECT * FROM utilisateur u JOIN demande_mutation d ON u.id_utilisateur = d.id_utilisateur RIGHT JOIN voeux_user v ON v.id_mutation = d.id_mutation WHERE v.academie_souhaite LIKE "%' . $recherche . '%"';
            $res["sql5"]=$this->getDB()->prepare($sql5);
            $res["sql5"]->execute();
            $result_recherche["sql5"]=$res["sql5"]->fetchAll(PDO::FETCH_ASSOC);


            $result_recherche_clean = array_filter($result_recherche);
            return @$result_recherche_clean;
        }
    } 

    public function affichage_Admin(){
        
        $result = [];
       
        

        $sql1= "SELECT *  FROM etablissement e  JOIN utilisateur u WHERE u.id_etbsmt = e.id_etbsmt;";
        $res = $this->getDb()->prepare($sql1);
        $res->execute();
        $result= $res->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $result;
        


    }

    public function affichage_Etbsmt(){
        
        $result = [];
         $sql= "SELECT  nom_etbsmt_principal, e.id_etbsmt  FROM etablissement e  JOIN utilisateur u WHERE u.id_etbsmt = e.id_etbsmt;";
        $res = $this->getDb()->prepare($sql);
        $res->execute();
        $result= $res->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($result as $resul){
            $result_clean[] = $resul;

        }
        
        return $result_clean;

    }

    public function affichage_demandeUser(){
        
        $result = [];
         $sql= "SELECT *  FROM voeux_user v JOIN demande_mutation d  WHERE v.id_mutation = d.id_mutation;";
        $res = $this->getDb()->prepare($sql);
        $res->execute();
        $result= $res->fetchAll(PDO::FETCH_ASSOC);
        
       
        
        return $result;

    }

    public function affichage_mutation(){
        
        $result = [];
         $sql= "SELECT distinct id_utilisateur, d.id_mutation,type_mutation, date_demande, situation, type_contrat, date_contrat, contrat, statut_situation, disponibilite, autre_disponibilite, date_debut_disponibilite, echelle_remuneration, autre_remuneration, remuneration_classe, echelon,echelon_autre, anciennete_service, statut_demande   from voeux_user v JOIN demande_mutation d  WHERE v.id_mutation = d.id_mutation;
         ";
        $res = $this->getDb()->prepare($sql);
        $res->execute();
        $result= $res->fetchAll(PDO::FETCH_ASSOC);
        
       
        
        return $result;

    }

    public function get_actualites(){
        $actualites = [];
        $sql = "SELECT * FROM actualites";
        $res = $this->getDb()->prepare($sql);
        $res->execute();
        while($result=$res->fetch(PDO::FETCH_ASSOC)){
            $actu= new Actualites;
            $actu->set_id($result["id_actu"]);
            $actu->set_titre($result["titre_actu"]);
            $actu->set_description($result["desc_actu"]);
            $actu->set_date_debut($result["date_debut"]);
            $actu->set_date_fin($result["date_fin"]);
            $actu->set_img($result["img_actu"]);

            array_push($actualites, $actu);
        }
        return $actualites;
    }

    public function suppresssionActualite($id_actualite){
        $sql = "DELETE FROM actualites WHERE id_actu = ?";
        $param = [$id_actualite];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
        $res->closeCursor();
    }


   


    public function suppresssionDemande($id_voeux){
        $sql ="DELETE  from voeux_user where id_mutation=?;";
       
        $param = [$id_voeux];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
        $res->closeCursor();

        
    }
    public function filtre_information($id_mutation){
        $sql ="DELETE  from demande_mutation where id_mutation=?;";
       
        $param = [$id_mutation];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
        $res->closeCursor();
    }

    public function codification(){
        if(isset($_POST['html']) && isset($_POST['id'])&& $_POST['id']>0
        ){
        $html= $_POST['html'];
        $id= $_POST['id']; 

        // $sql= "UPDATE voeux_user  SET codification = '$html' WHERE id_voeux = '$id'";
        $sql= "UPDATE voeux_user  SET codification = '$html' WHERE id_voeux = '$id';";
        $res = $this->getDb()->prepare($sql);
        $res->execute();
        $result= $res->fetch(PDO::FETCH_ASSOC);
        
    }
        
    echo 'codification mis à jour';

    }

  
    
}