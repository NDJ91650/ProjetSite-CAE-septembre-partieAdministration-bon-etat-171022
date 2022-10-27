<?php
// require "./models/dbConnect.class.php";
// require "./models/user/user.class.php";
// require "./models/user/userManager.class.php";
//  require "./models/admin/adminManager.class.php";
// require "./models/user/etablissement.class.php";
require "./models/admin/adminManager.class.php";
require "./models/admin/admin.class.php";


class AdminController extends AbstractController{

    // private $user;
    private $base;
    // private $utilisateur;
    // private $etbsmt;
    private $admin;
    private $adminModel;
    // private $securityController;

    public function __construct()
    {
        $this->base = new Dbconnect();
        // $this->user = new UserManager($this->base);
        // $this->utilisateur = new User();
        // $this->etbsmt = new Etablissement();
        $this->admin = new Admin();
        $this->adminModel = new AdminManager($this->base);
        // $this->securityController = new SecurityController;        
    }

    public function home(){
        $actualites = $this->adminModel->get_actualites();
        $data=[
            'titre' => "Accueil", 
            'actualites' => $actualites,    
            'view' => "views/visitor/accueil.php",
        ];
        $this->genererPage($data);
    }


    public function validation(){
        $data = SecurityController::checkData();
        // var_dump($data);
        $id = $data["identifiant_utilisateur"];
        $mdp = $data["mdp_utilisateur"];
        
        $connexionadmin = $this->adminModel->verificationMdp($id, $mdp);

        if($connexionadmin){
            $this->admin->getId_admin();
                    $_SESSION["admin"] = [
                        "identifiant_admin" => $id,                
                    ];        
                    header("location: " . URL . "compte/admin");

                    return $connexionadmin;
        }
    }

    public function profile(){
        $data = $this->adminModel->get_all_data_user();
        $actualites = $this->adminModel->get_actualites();
        $etbsmt = $this->adminModel->get_etbsmt();
        $view_admin = $this->adminModel->affichage_Admin();
        $demande_users = $this->adminModel->affichage_demandeUser();
        $mutations = $this->adminModel->affichage_mutation(); 
        // $demande_modals= $this->adminModel->getDemande_user2($user_modals->getId_utilisateur());
        // $demandeMut = $this->adminModel->getDemande_user($_SESSION["utilisateur"]["identifiant_utilisateur"]);
        // $mutation = $this->adminModel->getInfo_mutation($_SESSION["utilisateur"]["identifiant_utilisateur"]);
        
       // // $etbsmt_principal = $this->user->getEtbsmt_principal($donnee->getId_utilisateur());
       // // $departement = $this->user->getDepartement2();
       
 
     
        $data = [
            'titre' => "Espace Administration",
            'etbsmt' => $etbsmt,
            'data' => $data,
            'view_admin'=> $view_admin,
            'demande_users'=> $demande_users,
            'mutations' => $mutations,
            'actualites'=> $actualites,
            // 'demandes' => $demandeMut,
            'view' => "views/admin/admin.view.php"
       ];
       $this->genererPage($data);  
    //    echo "<pre>";
    //    var_dump($view_admin);
    //    echo "</pre>";
    }

    

    public function creer_actualites(){
        $data = SecurityController::checkData();
        // var_dump($data);

        $titre = $data["titre_actu"];
        $description = $data["desc_actu"];
        $date_debut = $data["date_debut_actu"];
        $date_fin = $data["date_fin_actu"];
        $img = $_FILES["img_actu"]["name"];

        if (!empty($_FILES["img_actu"])) {
            $fichiertmp = $_FILES["img_actu"]["tmp_name"];
            $stockage_doc = "public/img/fichier-admin/img-actu/";
            move_uploaded_file($fichiertmp, $stockage_doc . $img);
        }

        $result = $this->adminModel->creation_actualites($titre, $description, $date_debut, $date_fin);

        if($result){
            self::MessageAlerte("Vous avez créé une actualités", self::VERT);
            header("location: " . URL . "compte/admin");
        } else{
            self::MessageAlerte("Erreur", self::ROUGE);
            header("location: " . URL . "compte/admin");
        }

    }

    public function modifier_info_user($id_utilisateur){
        $data = SecurityController::checkData();
        $data_clean = array_filter($data);
        // var_dump($data);

        foreach($data_clean as $champs=>$value){
            $this->adminModel->modification_info_user($champs, $value, $id_utilisateur);
        }
        self::MessageAlerte("Les informations du candidat ont été modifier !", self::VERT);
        header("location: ".URL."compte/admin");
    }

    public function modification_info_mutation($id_mutation){
        $data = SecurityController::checkData();
        $data_clean = array_filter($data);
        // var_dump($data);

        foreach($data_clean as $champs=>$value){
            $this->adminModel->modification_infoMutation($champs, $value, $id_mutation);
        }
        if (isset($_FILES["justificatif_motif"]["name"]) && !empty($_FILES["justificatif_motif"]["name"])) {
            $champs = "justificatif_motif";
            $justificatif_motif = $_FILES["justificatif_motif"]["name"];
            $fichiertmp = $_FILES["justificatif_motif"]["tmp_name"];
            $stockage_doc = "public/img/fichier-utilisateurs/";
            move_uploaded_file($fichiertmp, $stockage_doc . $justificatif_motif);

            $this->adminModel->modification_infoMutation($champs, $justificatif_motif, $id_mutation);
        } 

        if (isset($_FILES["contrat"]["name"]) && !empty($_FILES["contrat"]["name"])) {
            $champs = "contrat";
            $contrat = $_FILES["contrat"]["name"];
            $fichiertmp = $_FILES["contrat"]["tmp_name"];
            $stockage_doc = "public/img/fichier-utilisateurs/";
            move_uploaded_file($fichiertmp, $stockage_doc . $contrat);

            $this->adminModel->modification_infoMutation($champs, $contrat, $id_mutation);
        }

        self::MessageAlerte("Les informations du candidat ont été modifier !", self::VERT);
        header("location: ".URL."compte/admin");
    }

    public function supprimerDemande($id_mutation){
        $this->adminModel->suppresssionDemande($id_mutation);

        self::MessageAlerte("La demande à été supprimé !", self::VERT);
        header("location: ".URL."compte/admin");
    }


    public function supprimerActualite($id_actualite){
        $this->adminModel->suppresssionActualite($id_actualite);

        self::MessageAlerte("L'actualité à été supprimé !", self::VERT);
        header("location: ".URL."compte/admin");
    }

   public function deconnexion(){
        unset($_SESSION["admin"]["identifiant_admin"]);
        self::MessageAlerte("Vous avez été déconnecté", self::VERT);
        header("location: " . URL . "accueil");
    }


    public function affichage_codif(){
        $this->adminModel->codification();
       $verification= $this->adminModel->codif();

       $statut = "Terminé";
        
        if($verification){

            $this->adminModel->verif_codif($statut);

        }
    }
}

