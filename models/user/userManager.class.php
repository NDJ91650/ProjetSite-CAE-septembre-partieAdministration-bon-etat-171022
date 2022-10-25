<?php

class UserManager extends Manager
{

    public function modificationInfoPerso($champs, $valeur, $id_utilisateur){
        $sql="UPDATE utilisateur SET " . $champs ." = ? WHERE id_utilisateur = ?";
        $param=[$valeur, $id_utilisateur];
        $res = $this->getDb()->prepare($sql);
        $result = $res->execute($param);
        return $result;
    }

    public function modificationSouhait($champs, $valeur, $id_voeux){
        $sql="UPDATE voeux_user, demande_mutation SET " . $champs ." = ? WHERE id_voeux = ? AND voeux_user.id_mutation = demande_mutation.id_mutation";
        $param=[$valeur, $id_voeux];
        $res = $this->getDb()->prepare($sql);
        $result = $res->execute($param);

        return $result;
    }

    // public function modificationSouhait($academie, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat, $nb_heures, $motif, $autre_motif, $justificatif_motif, $id_voeux){
    //     $sql="UPDATE voeux_user SET academie_souhaite = ?, choix1 = ?, choix2 = ?, choix3 = ?, choix4 = ?, choix5 = ?, choix6 = ?, choix7 = ?, choix8 = ?, type_contrat_souhaite = ?, nb_heures_souhaite = ?, motif_demande = ?, autre_motif = ?, justificatif_motif = ? WHERE id_voeux = ?";
    //     $param = [$academie, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat, $nb_heures, $motif, $autre_motif, $justificatif_motif, $id_voeux];
    //     $res = $this->getDb()->prepare($sql);
    //     $res->execute($param);
    // }

    public function ajout_info_etbsmt_utilisateur($id_etbsmt, $etbsmt_laic, $nb_heures_travaille, $id_utilisateur){
        $sql = "UPDATE utilisateur SET id_etbsmt= ?, etbsmt_laic= ?, nb_heures_travaille= ? WHERE id_utilisateur= ?";
        $param = [$id_etbsmt, $etbsmt_laic, $nb_heures_travaille, $id_utilisateur];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);  
    }

    public function ajout_etbsmt(
        $rne_etbsmt, $academie_etbsmt, $nom_etbsmt_principal, $adresse_etbsmt, $cp_etbsmt, $ville_etbsmt, $num_etbsmt, $email_etbsmt
        ){
        $sql = "INSERT INTO etablissement (rne_etbsmt, academie_etbsmt, nom_etbsmt_principal, adresse_etbsmt, cp_etbsmt, ville_etbsmt, num_etbsmt, email_etbsmt)
        VALUES(?,?,?,?,?,?,?,?)";

        $param = [$rne_etbsmt, $academie_etbsmt, $nom_etbsmt_principal, $adresse_etbsmt, $cp_etbsmt, $ville_etbsmt, $num_etbsmt, $email_etbsmt];

        $res=$this->getDb()->prepare($sql);
        $res->execute($param);

        if ($res->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function mutation_utilisateur(
        $type_mutation, $date_demande, $situation, $type_contrat, $date_contrat, $contrat, $statut_situation, $disponibilite, $autre_disponibilite, $date_debut_disponibilite, $echelle_remuneration,$autre_remuneration, $remuneration_classe, $echelon, $echelon_autre, $anciennete_service, $statut, $id_utilisateur
    ) {
        $sql = $this->getDb()->prepare("INSERT INTO demande_mutation(type_mutation, date_demande, situation, type_contrat, date_contrat, contrat, statut_situation, disponibilite, autre_disponibilite, date_debut_disponibilite, echelle_remuneration, autre_remuneration, remuneration_classe, echelon,echelon_autre, anciennete_service, statut_demande, id_utilisateur)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $param = [
            $type_mutation, $date_demande, $situation, $type_contrat, $date_contrat, $contrat, $statut_situation, $disponibilite, $autre_disponibilite, $date_debut_disponibilite, $echelle_remuneration, $autre_remuneration, $remuneration_classe, $echelon, $echelon_autre, $anciennete_service, $statut, $id_utilisateur
        ];
        $sql->execute($param);
        $sql->closeCursor();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function voeux_utilisateur($academie_souhaite, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat_souhaite, $nb_heures_souhaite, $motif_demande, $autre_motif, $justificatif_motif, $pre_codification,  $id_mutation){
        $sql = $this->getDb()->prepare("INSERT INTO voeux_user(academie_souhaite, choix1, choix2, choix3, choix4, choix5, choix6, choix7, choix8, type_contrat_souhaite, nb_heures_souhaite, motif_demande, autre_motif, justificatif_motif, pre_codification, id_mutation)
         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $param = [$academie_souhaite, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat_souhaite, $nb_heures_souhaite, $motif_demande, $autre_motif, $justificatif_motif, $pre_codification, $id_mutation];
        $sql->execute($param);
        $sql->closeCursor();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        } 
    }

    public function getId_mutation($id_utilisateur){
        $sql="SELECT id_mutation FROM demande_mutation WHERE id_utilisateur=? ORDER BY id_mutation DESC";
        $param=[$id_utilisateur];
        $res=$this->getDb()->prepare($sql);
        $res->execute($param);
        $result=$res->fetch();
        return $result;
    }

    public function getPasswordUser($identifiant){
        // Recherche le mdp de la BDD en fonction de l'email
        $sql = "SELECT mdp_utilisateur FROM utilisateur WHERE identifiant_utilisateur=?";
        $param = [$identifiant];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
        $result = $res->fetch();
        return $result["mdp_utilisateur"];
    }

    public function verificationMdp($identifiant, $password){
        // Utiliser getPasswordUser pour aller chercher le mdp crypté en fonction de l'email
        // Utilisation de passwordverify pour vérifier les mdp
        $mdp = $this->getPasswordUser($identifiant);
        return password_verify($password, $mdp);
    }

    // public function validationCompte($identifiant){
    //     $sql = "SELECT isValid FROM utilisateur WHERE identifiant_utilisateur=?";
    //     $param = [$identifiant];
    //     $res = $this->getDb()->prepare($sql);
    //     $res->execute($param);
    //     $result = $res->fetch();
    //     return ($result["isValid"] == "0") ? false : true;
    // }


    public function getInfosUser($identifiant){
        $sql = "SELECT * FROM utilisateur WHERE identifiant_utilisateur=?";
        $param = [$identifiant];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
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
        }
        $res->closeCursor();
        return $user;
    }

    // public function getDemande_user($id_utilisateur){
    //     $sql="SELECT * FROM demande_mutation d LEFT JOIN voeux_user v ON d.id_mutation = v.id_mutation WHERE d.id_utilisateur = ? ORDER BY d.id_mutation;
    //     ";
    //         $param=[$id_utilisateur];
    //         $res=$this->getDb()->prepare($sql);
    //         $res->execute($param);
    //         $demandes=[];
    //         while($result=$res->fetch(PDO::FETCH_ASSOC)){
    //         $demande_mutation= new Formulaire;
    //         $demande_mutation->setId_mutation($result["id_mutation"]);
    //         $demande_mutation->setId_utilisateur($result["id_utilisateur"]);
    //         $demande_mutation->setType_mutation($result["type_mutation"]);
    //         $demande_mutation->setDate_demande($result["date_demande"]);
    //         $demande_mutation->setSituation($result["situation"]);
    //         $demande_mutation->setType_contrat($result["type_contrat"]);
    //         $demande_mutation->setDate_contrat($result["date_contrat"]);
    //         $demande_mutation->setContrat($result["contrat"]);
    //         $demande_mutation->setStatut_situation($result["statut_situation"]);
    //         $demande_mutation->setDisponibilite($result["disponibilite"]);
    //         $demande_mutation->setDate_debut_disponibilite($result["date_debut_disponibilite"]);
    //         $demande_mutation->setEchelle_remuneration($result["echelle_remuneration"]);
    //         $demande_mutation->setRemuneration_classe($result["remuneration_classe"]);
    //         $demande_mutation->setEchelon($result["echelon"]);
    //         $demande_mutation->setAnciennete_service($result["anciennete_service"]);
    //         $demande_mutation->setStatut_demande($result["statut_demande"]);
    //         $demande_mutation->setId_voeux($result["id_voeux"]);
    //         $demande_mutation->setAcademie_souhaite($result["academie_souhaite"]);
    //         $demande_mutation->setTous_dept($result["tous_dept"]);
    //         $demande_mutation->setDept_souhaite1($result["dept_souhaite1"]);
    //         $demande_mutation->setDept_souhaite2($result["dept_souhaite2"]);
    //         $demande_mutation->setDept_souhaite3($result["dept_souhaite3"]);
    //         $demande_mutation->setDept_souhaite4($result["dept_souhaite4"]);
    //         $demande_mutation->setDept_souhaite5($result["dept_souhaite5"]);
    //         $demande_mutation->setType_contrat_souhaite($result["type_contrat_souhaite"]);
    //         $demande_mutation->setNb_heures_souhaite($result["nb_heures_souhaite"]);
    //         $demande_mutation->setMotif_demande($result["motif_demande"]);
    //         $demande_mutation->setAutre_motif($result["autre_motif"]);

    //         $demandes[] = $demande_mutation;

    //         // foreach($demandes as $key=>$demande){
    //         //     var_dump($demande);
    //         //     var_dump($this->getVoeux_user($demande->getId_mutation()));

    //         //     $demandes[$key]["voeux"]=$this->getVoeux_user($result["id_mutation"]);
    //         // }
    //         }

    //         return $demandes;   
    //         $res->closeCursor();
    // }


    public function getDemande_user2($id_utilisateur)
    {
        $demandes = [];
        $sql = "SELECT * FROM demande_mutation  WHERE id_utilisateur = ? ORDER BY id_mutation;
        ";
        $param = [$id_utilisateur];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);

        while ($result = $res->fetch(PDO::FETCH_ASSOC)) {
            $demandes[] = $result;
            
        }
        foreach($demandes as $key=>$demande){

            // var_dump($demande);
            // var_dump($this->getVoeux_user($demande["id_mutation"]));

            $demandes[$key]["voeux"]=$this->getVoeux_user($demande["id_mutation"]);  
            
            // var_dump($demandes[$key]["voeux"]);
        }
        return $demandes;
        $res->closeCursor();
    }

    public function getVoeux_user($id_mutation){
        $param=[$id_mutation];
        $voeux=[];

        $sql="SELECT v.id_voeux, v.academie_souhaite, v.type_contrat_souhaite, v.nb_heures_souhaite, v.motif_demande, v.autre_motif, v.justificatif_motif, v.id_mutation FROM voeux_user v JOIN demande_mutation d on v.id_mutation = d.id_mutation WHERE d.id_mutation=?";
        $res=$this->getDb()->prepare($sql);
        $res->execute($param);

        while ($result=$res->fetch(PDO::FETCH_ASSOC)){
            $voeux["info_souhait"][$result["academie_souhaite"]] = $result;
            $iso_dept=$this->get_iso_dept($result["id_voeux"]);
            $iso_dept_clean=array_filter($iso_dept);

            $voeux["dept_souhaite"][$result["academie_souhaite"]] = $iso_dept_clean;

        };

        return $voeux;
    }

    public function getVoeux_user_modif_souhait($id_voeux){
        $param=[$id_voeux];
        $voeux=[];

        $sql="SELECT * FROM voeux_user WHERE id_voeux = ?";
        $res=$this->getDb()->prepare($sql);
        $res->execute($param);
        while($result=$res->fetch(PDO::FETCH_ASSOC)){
            $voeux=$result;
        }
        return $voeux;
    }

    public function get_iso_dept($id_voeux){
        $param=[$id_voeux];
        $result=[];
        $res=[];

        $sql1="SELECT d.code_iso, d.nom_departement FROM departement d JOIN voeux_user v ON v.choix1 = d.nom_departement WHERE v.id_voeux = ?";
        $res["sql1"]=$this->getDB()->prepare($sql1);
        $res["sql1"]->execute($param);
        $result["sql1"]=$res["sql1"]->fetch(PDO::FETCH_ASSOC);

        $sql2="SELECT d.code_iso, d.nom_departement FROM departement d JOIN voeux_user v ON v.choix2 = d.nom_departement WHERE v.id_voeux = ?";
        $res["sql2"]=$this->getDB()->prepare($sql2);
        $res["sql2"]->execute($param);
        $result["sql2"]=$res["sql2"]->fetch(PDO::FETCH_ASSOC);

        $sql3="SELECT d.code_iso, d.nom_departement FROM departement d JOIN voeux_user v ON v.choix3 = d.nom_departement WHERE v.id_voeux = ?";
        $res["sql3"]=$this->getDB()->prepare($sql3);
        $res["sql3"]->execute($param);
        $result["sql3"]=$res["sql3"]->fetch(PDO::FETCH_ASSOC);

        $sql4="SELECT d.code_iso, d.nom_departement FROM departement d JOIN voeux_user v ON v.choix4 = d.nom_departement WHERE v.id_voeux = ?";
        $res["sql4"]=$this->getDB()->prepare($sql4);
        $res["sql4"]->execute($param);
        $result["sql4"]=$res["sql4"]->fetch(PDO::FETCH_ASSOC);

        $sql5="SELECT d.code_iso, d.nom_departement FROM departement d JOIN voeux_user v ON v.choix5 = d.nom_departement WHERE v.id_voeux = ?";
        $res["sql5"]=$this->getDB()->prepare($sql5);
        $res["sql5"]->execute($param);
        $result["sql5"]=$res["sql5"]->fetch(PDO::FETCH_ASSOC);

        $sql6="SELECT d.code_iso, d.nom_departement FROM departement d JOIN voeux_user v ON v.choix6 = d.nom_departement WHERE v.id_voeux = ?";
        $res["sql6"]=$this->getDB()->prepare($sql6);
        $res["sql5"]->execute($param);
        $result["sql6"]=$res["sql6"]->fetch(PDO::FETCH_ASSOC);

        $sql7="SELECT d.code_iso, d.nom_departement FROM departement d JOIN voeux_user v ON v.choix7 = d.nom_departement WHERE v.id_voeux = ?";
        $res["sql7"]=$this->getDB()->prepare($sql7);
        $res["sql7"]->execute($param);
        $result["sql7"]=$res["sql7"]->fetch(PDO::FETCH_ASSOC);

        $sql8="SELECT d.code_iso, d.nom_departement FROM departement d JOIN voeux_user v ON v.choix8 = d.nom_departement WHERE v.id_voeux = ?";
        $res["sql8"]=$this->getDB()->prepare($sql8);
        $res["sql8"]->execute($param);
        $result["sql8"]=$res["sql8"]->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    // public function getInfoDemande($id_utilisateur){
    //     $tab=[];
    //     $sql="SELECT d.id_mutation, d.date_demande, d.type_mutation, v.academie_souhaite FROM demande_mutation d JOIN utilisateur u ON d.id_utilisateur = u.id_utilisateur JOIN voeux_user v ON d.id_mutation = v.id_mutation WHERE u.id_utilisateur=?";
    //     $param=[$id_utilisateur];
    //     $res=$this->getDb()->prepare($sql);
    //     $res->execute($param);
    //     $tab=$res->fetchAll();
        
    //     return $tab;
    // }

    public function getId_etbsmt($rne_etbsmt){
        $sql = "SELECT id_etbsmt FROM etablissement WHERE rne_etbsmt = ?";
        $param=[$rne_etbsmt];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
        $result = $res->fetch();

        return $result;
    }

    public function getEtbsmt_principal($id_utilisateur){
        $sql = "SELECT e.rne_etbsmt, e.academie_etbsmt, e.nom_etbsmt_principal, e.adresse_etbsmt, e.cp_etbsmt, e.ville_etbsmt, e.num_etbsmt, e.email_etbsmt FROM etablissement e JOIN utilisateur u ON e.id_etbsmt = u.id_etbsmt WHERE id_utilisateur = ?";
        $param=[$id_utilisateur];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
        $result = $res->fetch();
        return $result;
        $res->closeCursor();
    }

    public function selectionEtbsmt($etab){
        if (isset($_POST["term"])) {
            $term = $_POST["term"];
            $requete = $this->getDb()->prepare("SELECT rne_etbsmt as value, academie_etbsmt, nom_etbsmt_principal, adresse_etbsmt, cp_etbsmt, ville_etbsmt, num_etbsmt, email_etbsmt FROM etablissement WHERE rne_etbsmt LIKE ? LIMIT 5");
            $requete->execute(array($term . "%"));
            $tab1 = [];
            while ($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données de notre requete
            {
                // on lui specifie dans la premiere colonne qu"on veut recuperer les valeurs des colonnes ci-dessous
                $tab1[] = $donnee;
                $colonne["value"] = $donnee["value"];
                $colonne["academie_etbsmt"] = $donnee["academie_etbsmt"];
                $colonne["nom_etbsmt_principal"] = $donnee["nom_etbsmt_principal"];
                $colonne["adresse_etbsmt"] = $donnee["adresse_etbsmt"];
                $colonne["cp_etbsmt"] = $donnee["cp_etbsmt"];
                $colonne["ville_etbsmt"] = $donnee["ville_etbsmt"];
                $colonne["num_etbsmt"] = $donnee["num_etbsmt"];
                $colonne["email_etbsmt"] = $donnee["email_etbsmt"];
            }
            echo json_encode($tab1);
        }
    }

    public function suppresssionSouhait($id_voeux){
        $sql = "DELETE FROM voeux_user WHERE id_voeux = ?";
        $param = [$id_voeux];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
        $res->closeCursor();
    }

    public function getDepartement(){
        // $aca = $_POST["academie"]; 
        $departs = [];
        $sql = "SELECT d.nom_departement, d.code_iso, d.choix FROM departement d JOIN academie a ON d.id_academie = a.id_academie WHERE a.nom_academie=?";
        $res = $this->getDb()->prepare($sql);
        $res->execute(array($_POST["academie"]));
        foreach($res as $row){
            $departs[] = $row;
        }
        // echo $aca;
        print(json_encode($departs));
        
        // $ach= json_encode($departs, JSON_PRETTY_PRINT);
        // print($ach); 
    }

    public function suppr_choix_voeux($id_voeux){
        $param = [$id_voeux];
        $res = $this->getDb()->prepare("UPDATE voeux_user SET academie_souhaite ='', choix1='', choix2='', choix3='', choix4='', choix5='', choix6='', choix7='', choix8='' WHERE id_voeux = ?");
        $res->execute($param);
        $res->closeCursor();
    }
    
    public function suppresssionDemande($id_mutation){
        $sql = "DELETE FROM demande_mutation WHERE id_mutation = ?";
        $param = [$id_mutation];
        $res = $this->getDb()->prepare($sql);
        $res->execute($param);
        $res->closeCursor();
    }
}
