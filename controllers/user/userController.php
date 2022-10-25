<?php
require "./models/dbConnect.class.php";
require "./models/user/userManager.class.php";
require "./models/user/etablissement.class.php";

class UserController extends AbstractController
{

    private $user;
    private $base;
    private $utilisateur;
    private $etbsmt;
    private $admin;
    private $adminModel;
    // private $securityController;

    public function __construct()
    {
        $this->base = new Dbconnect();
        $this->user = new UserManager($this->base);
        $this->utilisateur = new User();
        $this->etbsmt = new Etablissement();
        // $this->securityController = new SecurityController;

        // $this->formulaire=new Formulaire;
    }

    public function validation()
    {
        $data = SecurityController::checkData();
        // var_dump($data);
        $id = $data["identifiant_utilisateur"];
        $mdp = $data["mdp_utilisateur"];

        // var_dump($data);
        // $id_admin = $data["identifiant_utilisateur"];
        // $mdp_admin = $data["mdp_utilisateur"];
        
        // $connexionadmin = $this->adminModel->verificationMdp($id, $mdp);

        // var_dump($this->admin->getIdentifiant_utilisateur());
        // var_dump($this->admin->getMdp_utilisateur());
        // var_dump($this->utilisateur->getIdentifiant_utilisateur());
        // var_dump($this->utilisateur->getMdp_utilisateur());

    //    var_dump($connexionadmin);


        // echo password_hash("Admin", PASSWORD_DEFAULT);
        
        $connexion = $this->user->verificationMdp($id, $mdp);
        // var_dump($connexion);
        
        // if(isset($id_utilisateur) && !empty($mdp_utilisateur)){


        if ($connexion) {
                // $this->utilisateur->getIdentifiant_utilisateur();
                $_SESSION["utilisateur"] = [
                    "identifiant_utilisateur" => $id,
                ];   
                self::MessageAlerte("Bonjour ".$id, self::VERT); 
                header("location: " . URL . "compte/profile");

                return $connexion;
            } 
                
    }


    public function profile(){
        $donnee = $this->user->getInfosUser($_SESSION["utilisateur"]["identifiant_utilisateur"]);
        $demandes = $this->user->getDemande_user2($donnee->getId_utilisateur());
        $etbsmt_principal = $this->user->getEtbsmt_principal($donnee->getId_utilisateur());
        $data = [
            'titre' => "Mon profile",
            'tableau' => $donnee,
            'etbsmt_principal' => $etbsmt_principal,
            'demandes' => $demandes,
            'view' => "views/user/user.view.php"
        ];
        $this->genererPage($data);
    }

    public function formulaireMutation(){
        $donnee = $this->user->getInfosUser($_SESSION["utilisateur"]["identifiant_utilisateur"]);
        $data = [
            'titre' => "Demande de mutation",
            'tableau' => $donnee,
            'view' => "views/user/formulaireMutation.php"
        ];
        $this->genererPage($data);
    }

    public function deconnexion()
    {
        unset($_SESSION["utilisateur"]);
        self::MessageAlerte("Vous avez été déconnecté", self::VERT);
        header("location: " . URL . "accueil");
    }

    public function demandeMutation($id_utilisateur)
    {
        $data = SecurityController::checkData();
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        // die();
        
        $rne_etbsmt = $data["rne_etbsmt"];
        $academie_etbsmt = $data["academie_etbsmt"];
        $nom_etbsmt_principal = $data["nom_etbsmt_principal"];
        $adresse_etbsmt = $data["adresse_etbsmt"];
        $cp_etbsmt = $data["cp_etbsmt"];
        $ville_etbsmt = $data["ville_etbsmt"];
        $num_etbsmt = $data["num_etbsmt"];
        $email_etbsmt = $data["email_etbsmt"];
        $etbsmt_laic = $data["statut_etbsmt"];
        $nb_heures_travaille = $data["nb_heures_etbsmt_utilisateur"];
        $id_etbsmt = $this->user->getId_etbsmt($rne_etbsmt);

        if (!empty($id_etbsmt)) {
            $this->user->ajout_info_etbsmt_utilisateur($id_etbsmt["id_etbsmt"], $etbsmt_laic, $nb_heures_travaille, $id_utilisateur);
        } else {
            $this->user->ajout_etbsmt($rne_etbsmt, $academie_etbsmt, $nom_etbsmt_principal, $adresse_etbsmt, $cp_etbsmt, $ville_etbsmt, $num_etbsmt, $email_etbsmt);
            // var_dump($ajout);
            $id_etbsmt = $this->user->getId_etbsmt($rne_etbsmt);

            $this->user->ajout_info_etbsmt_utilisateur($id_etbsmt["id_etbsmt"], $etbsmt_laic, $nb_heures_travaille, $id_utilisateur);
        };


        // if(isset($data["contrat"]) && !empty($data["contrat"])){
        //     $_FILES["contrat"]["name"] = $data["contrat"];
        // }

        $type_mutation = $data["type_mutation"];
        $date_demande = date("Y-m-d");
        $situation = $data["situation"];
        $type_contrat = $data["type_contrat"];
        $date_contrat = $data["date_contrat"];
        $contrat = $_FILES["contrat"]["name"];
        $statut_situation = $data["statut_situation"];
        $disponibilite = $data["disponibilite"];
        @$autre_disponibilite = $data["autre_disponibilite"];
        $date_debut_disponibilite = $data["date_debut_disponibilite"];
        $echelle_remuneration = $data["echelle_remuneration"];
        @$autre_remuneration = $data["autre_remuneration"];
        $remuneration_classe = $data["remuneration_classe"];
        $echelon = $data["echelon"];
        @$echelon_autre = $data["echelon_autre"];
        $anciennete_service = $data["anciennete_service"];
        $statut = "En cours";

        $this->user->mutation_utilisateur(
            $type_mutation,
            $date_demande,
            $situation,
            $type_contrat,
            $date_contrat,
            $contrat,
            $statut_situation,
            $disponibilite,
            $autre_disponibilite,
            $date_debut_disponibilite,
            $echelle_remuneration,
            $autre_remuneration,
            $remuneration_classe,
            $echelon,
            $echelon_autre,
            $anciennete_service,
            $statut,
            $id_utilisateur
        );
        

        if (!empty($_FILES["contrat"])) {

        // $fichier = $_FILES["contrat"]["name"];
        $fichiertmp = $_FILES["contrat"]["tmp_name"];
        $stockage_doc = "public/img/fichier-utilisateurs/";

        move_uploaded_file($fichiertmp, $stockage_doc . $contrat);
        }
        // var_dump($_FILES);
        // var_dump(move_uploaded_file($fichiertmp, $stockage_img . $contrat));



        // if (isset($_FILES["contrat"])) {

        //     $fichier = $_FILES["contrat"]["name"];
        //     $fichertmp = $_FILES["contrat"]["tmp_name"] = $data["contrat"];
        //     $stockage_img = "public/img/fichier-utilisateurs/";

        //     move_uploaded_file($fichertmp, $stockage_img . $fichier);
        // }

        if (isset($data["academie_souhaite"]) && !empty($data["academie_souhaite"])) {

            $academie_souhaite = $data["academie_souhaite"];
            // $tous_dept = $data["tous_dept"];
            @$dept1 = $data["choix1"];
            @$dept2 = $data["choix2"];
            @$dept3 = $data["choix3"];
            @$dept4 = $data["choix4"];
            @$dept5 = $data["choix5"];
            @$dept6 = $data["choix6"];
            @$dept7 = $data["choix7"];
            @$dept8 = $data["choix8"];
            $type_contrat_souhaite = $data["type_contrat_souhaite"];
            $nb_heures_souhaite = $data["nb_heures_souhaite"];
            $motif_demande = $data["motif_demande"];
            $autre_motif = $data["autre_motif"];
            $justificatif_motif = $_FILES["justificatif_motif"]["name"];
            @$pre_codification1 = "B3";
            @$pre_codification2 = "B1";
            @$pre_codification3 = "B4";

           if($motif_demande ==="Impératifs familiaux" or $motif_demande ==="Vie religieuse"){

               $id_mutation = $this->user->getId_mutation($id_utilisateur)["id_mutation"];
    
               $this->user->voeux_utilisateur($academie_souhaite, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat_souhaite, $nb_heures_souhaite, $motif_demande, $autre_motif, $justificatif_motif, $pre_codification1, $id_mutation);
            }
            if($motif_demande ==="Raisons médicales"){
               $id_mutation = $this->user->getId_mutation($id_utilisateur)["id_mutation"];
    
               $this->user->voeux_utilisateur($academie_souhaite, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat_souhaite, $nb_heures_souhaite, $motif_demande, $autre_motif, $justificatif_motif, $pre_codification2, $id_mutation);

           }
            if($motif_demande ==="Autre"){
               $id_mutation = $this->user->getId_mutation($id_utilisateur)["id_mutation"];
    
               $this->user->voeux_utilisateur($academie_souhaite, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat_souhaite, $nb_heures_souhaite, $motif_demande, $autre_motif, $justificatif_motif, $pre_codification3, $id_mutation);

           }
            

            // $mutations = $this->user->getId_mutation($id_utilisateur);
            // $mutation = end($mutations);
        }
        if (!empty($_FILES["justificatif_motif"])){

            $fichiertmp = $_FILES["justificatif_motif"]["tmp_name"];
            move_uploaded_file($fichiertmp, $stockage_doc . $justificatif_motif);
        }


        // if (isset($_FILES["justificatif_motif"])) {

        //     $fichier = $_FILES["justificatif_motif"]["name"];
        //     $fichiertmp = $_FILES["justificatif_motif"]["tmp_name"];
        //     $stockage_img = "public/img/fichier-utilisateurs/";
        //     var_dump($_FILES);

        //     move_uploaded_file($fichiertmp, "public/img/fichier-utilisateurs/" );
        // }

            $i = 1;

        if (isset($data["academie_souhaite" .$i]) && !empty($data["academie_souhaite" .$i])) {
            while(isset($data["academie_souhaite" .$i])){
                $academie_souhaite1 = $data["academie_souhaite".$i];
                // $tous_dept1 = $data["tous_dept1"];
                @$dept1 = $data["choix1_".$i];
                @$dept2 = $data["choix2_".$i];
                @$dept3 = $data["choix3_".$i];
                @$dept4 = $data["choix4_".$i];
                @$dept5 = $data["choix5_".$i];
                @$dept6 = $data["choix6_".$i];
                @$dept7 = $data["choix7_".$i];
                @$dept8 = $data["choix8_".$i];
                $type_contrat_souhaite = $data["type_contrat_souhaite".$i];
                $nb_heures_souhaite = $data["nb_heures_souhaite".$i];
                $motif_demande = $data["motif_demande".$i];
                $autre_motif = $data["autre_motif".$i];
                $justificatif_motif = $_FILES["justificatif_motif".$i]["name"];
                
                @$pre_codification1 = "B3";
                @$pre_codification2 = "B1";
                @$pre_codification3 = "B4";
    
               if($motif_demande ==="Impératifs familiaux" or $motif_demande ==="Vie religieuse"){
    
                   $id_mutation = $this->user->getId_mutation($id_utilisateur)["id_mutation"];
        
                   $this->user->voeux_utilisateur($academie_souhaite1, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat_souhaite, $nb_heures_souhaite, $motif_demande, $autre_motif, $justificatif_motif, $pre_codification1, $id_mutation);
                }
                if($motif_demande ==="Raisons médicales"){
                   $id_mutation = $this->user->getId_mutation($id_utilisateur)["id_mutation"];
        
                   $this->user->voeux_utilisateur($academie_souhaite1, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat_souhaite, $nb_heures_souhaite, $motif_demande, $autre_motif, $justificatif_motif, $pre_codification2, $id_mutation);
    
               }
                if($motif_demande ==="Autre"){
                   $id_mutation = $this->user->getId_mutation($id_utilisateur)["id_mutation"];
        
                   $this->user->voeux_utilisateur($academie_souhaite1, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat_souhaite, $nb_heures_souhaite, $motif_demande, $autre_motif, $justificatif_motif, $pre_codification3, $id_mutation);
    
               }


                if (!empty($_FILES["justificatif_motif" .$i])) {

                    $fichiertmp = $_FILES["justificatif_motif".$i]["tmp_name"];
                    move_uploaded_file($fichiertmp, $stockage_doc . $justificatif_motif);
                }

                $i++;
            }
        }


        self::MessageAlerte("Votre demande de mutation a été effectué avec succès !", self::VERT);
        header("location: ".URL."compte/profile");
    }

    public function modifierSouhait($id_voeux){
        $data = SecurityController::checkData();
        $data_clean = array_filter($data);

        if(!empty($data_clean["academie_souhaite"])){
            $this->user->suppr_choix_voeux($id_voeux);
        }

        foreach($data_clean as $champs=>$value){
            $result = $this->user->modificationSouhait($champs, $value, $id_voeux);
            
            // var_dump($result);
            // var_dump($key);
            // var_dump($value);
        }

        if (isset($_FILES["justificatif_motif"]["name"]) && !empty($_FILES["justificatif_motif"]["name"])) {
            $champs = "justificatif_motif";
            $justificatif_motif = $_FILES["justificatif_motif"]["name"];
            $fichiertmp = $_FILES["justificatif_motif"]["tmp_name"];
            $stockage_doc = "public/img/fichier-utilisateurs/";
            move_uploaded_file($fichiertmp, $stockage_doc . $justificatif_motif);

            $this->user->modificationSouhait($champs, $justificatif_motif, $id_voeux);
        } 

        if (isset($_FILES["contrat"]["name"]) && !empty($_FILES["contrat"]["name"])) {
            $champs = "contrat";
            $contrat = $_FILES["contrat"]["name"];
            $fichiertmp = $_FILES["contrat"]["tmp_name"];
            $stockage_doc = "public/img/fichier-utilisateurs/";
            move_uploaded_file($fichiertmp, $stockage_doc . $contrat);

            $this->user->modificationSouhait($champs, $contrat, $id_voeux);
        }

        self::MessageAlerte("Le voeux à été modifié avec succès !", self::VERT);
        header("location: ".URL."compte/profile");

        // var_dump($data_clean);           
    }

    public function modificationInfoPerso($id_utilisateur){
        $data = SecurityController::checkData();
        //  var_dump($data);

        $data_clean = array_filter($data);
        foreach($data_clean as $champs=>$value){
            $result = $this->user->modificationInfoPerso($champs, $value, $id_utilisateur);
            // var_dump($key);
            // var_dump($value);
        }
        self::MessageAlerte("Les informations personnel ont été modifié avec succès !", self::VERT);
        header("location: ".URL."compte/profile");
        // var_dump($data_clean);
    }

    public function supprimerSouhait($id_voeux){
        if(!empty($id_voeux)){
            $this->user->suppresssionSouhait($id_voeux);
            self::MessageAlerte("Le voeux à bien été supprimé !", self::VERT);
            header("location: ".URL."compte/profile");
        }
    }

    public function supprimerDemande($id_mutation){
        $this->user->suppresssionDemande($id_mutation);

        self::MessageAlerte("La demande à été supprimé !", self::VERT);
        header("location: ".URL."compte/profile");
    }

    public function afficherEtbsmt()
    {
        // function qui permet de remplir automatiquement les champs de l"etablissement
        $this->user->selectionEtbsmt($this->etbsmt->getRne_etbsmt());
    }

    public function afficherDepartement(){
       $this->user->getDepartement();

    //    var_dump($this->user->affichageDepartement());
    }
}
