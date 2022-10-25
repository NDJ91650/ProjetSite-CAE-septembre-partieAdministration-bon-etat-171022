<?php 
require "./models/visitor/visitorManager.class.php";
require './controllers/abstractController.php';

class VisitorController extends AbstractController{
    private $base;
    private $visitorManager;
    //  private $securityController;

    public function __construct(){
        $this->base=new Dbconnect();
        $this->visitorManager= new VisitorManager($this->base);
        //  $this->securityController = new SecurityController;
    }

    public function inscription(){

        $data = SecurityController::checkData();
        // var_dump($data);
        // $isValid=1;
        
        // Setter class User
        // $this->utilisateur->setIsValid($isValid);
        $identifiant=$data["identifiant_utilisateur"];
        $mdp=password_hash($data["mdp_utilisateur"], PASSWORD_DEFAULT);
        $academie=$data["academie_origine"];
        $numen=$data["numen"];
        $discipline_contrat=$data["discipline_contrat"];
        $nom_spe=$data["nom_spe"];
        @$spe_college=$data["spe_college"];
        @$spe_lycee_pro=$data ["spe_lycee_pro"];
        @$spe_lycee_tech=$data["spe_lycee_tech"];
        @$spe_lycee_gen=$data["spe_lycee_gen"];
        @$spe_post_bac=$data["spe_post_bac"];
        $civilite=$data["civilite_utilisateur"];
        $situation_maritale=$data["situation_maritale"];
        $nom=$data["nom_utilisateur"];
        $prenom=$data["prenom_utilisateur"];
        $nom_naissance=$data["nom_naissance_utilisateur"];
        $date_naissance=$data["date_naissance_utilisateur"];
        $adresse=$data["adresse_utilisateur"];
        $cp=$data["cp_utilisateur"];
        $ville=$data["ville_utilisateur"];
        $domicile=$data["num_domicile_utilisateur"];
        $portable=$data["num_portable_utilisateur"];
        $email=$data["email_utilisateur"];

        $info=$this->visitorManager->verif($data["email_utilisateur"]);
        $info2=$this->visitorManager->verif2($data["numen"]);
        var_dump($info);
        // echo password_hash("admin", PASSWORD_DEFAULT);
        // var_dump($this->utilisateur);
        


        if($info or $info2){
            self::MessageAlerte("Erreur : information déjà existante", self::ROUGE);
            header("location: ".URL."accueil");
        } else{
           
            // function qui inscrit l'utilisateur sur la base de donnée
            $recup=$this->visitorManager->AjoutUtilisateur(
                // Setter class User
                $identifiant, $mdp, $academie, $numen, $discipline_contrat, $nom_spe, $spe_college, $spe_lycee_pro, $spe_lycee_tech, $spe_lycee_gen, $spe_post_bac, $civilite, $situation_maritale, $nom, $prenom, $nom_naissance, $date_naissance, $adresse, $cp, $ville, $domicile, $portable, $email     
            );
            self::MessageAlerte("Inscription réussi, vous pouvez maintenant candidater au mouvements des maîtres du 2nd degré !", self::VERT);
            header("location: ".URL."accueil");
        }
    }

    
}


