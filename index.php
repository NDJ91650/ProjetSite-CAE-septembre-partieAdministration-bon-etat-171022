<?php
session_start();

?>

<?php
// Defintion d'une constante URL Constante qui redefini un lien absolu depuis http ou https
// str_replace sert juste à supprimer
// index.php de la redefintion de URL.

define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


// index.php est le routeur de l'application 
//Inclusion des fichiers CONTROLLER
require_once "controllers/visitor/visitorController.php";
// require_once "Controllers/ArticleController.php";
require_once "controllers/user/userController.php";
require_once "Controllers/securityController.php";
require_once "Controllers/admin/adminController.php";

//Instanciation des class CONTROLLER
// $article= new ArticleController();
$visitor = new VisitorController();
$user = new UserController();
$security = new SecurityController();
$admin = new AdminController();

// Si $_GET["page"] est vide
try {
    if (empty($_GET['page'])) {
        $admin->home();
    } else {
        $url = explode('/', filter_var($_GET["page"], FILTER_SANITIZE_URL));

        switch ($url[0]) {
            case "accueil":
                $admin->home();
                break;
            case "inscription":
                $visitor->inscription();
                break;
            case "validation":
                $user_val = $user->validation();
                $admin_val = $admin->validation();
                
                if($user_val){
                    $user->validation();
                } else if($admin_val){
                    $admin->validation();
                } else{
                    AbstractController::MessageAlerte("Identifiant ou mot de passe incorrecte !", AbstractController::ROUGE);
                    header("location: " . URL . "accueil");
                }
                break;
            case "compte":
                if ($security->isLog_user()) {
                    switch ($url[1]) {
                        case "profile":
                            $user->profile();
                            break;
                        case "deconnexion":
                            $user->deconnexion();
                            break;
                        case "demandeMutation":
                            $user->formulaireMutation();
                            break;
                        case "afficherEtbsmt";
                            $user->afficherEtbsmt();
                            break;
                        case "afficherDepartement";
                            $user->afficherDepartement();
                            break;
                        case "mutation":
                            $user->demandeMutation($url[2]);
                            break;
                        case "modificationInfoPerso":
                            $user->modificationInfoPerso($url[2]);
                            break;
                        case "modifierSouhait":
                            $user->modifierSouhait($url[2]);
                            break;
                        case "supprimerSouhait":
                            $user->supprimerSouhait($url[2]);
                            break;
                        case "supprimerDemande":
                            $user->supprimerDemande($url[2]);
                            break; 
                            default:
                            throw new Exception("La page n'existe pas !");
                    }
                }else if ($security->isLog_admin()){
                    switch($url[1]){ 
                        case "accueil":
                            $admin->home();
                            break;    
                        case "admin":
                            $admin->profile();
                            break;                           
                        case "modifierInfoUser":
                            $admin->modifier_info_user($url[2]);
                            break;
                        case "modifierInfoMutation":
                            $admin->modification_info_mutation($url[2]);
                            break;
                            case "affichage-codif":
                                $admin->affichage_codif();
                                break;
                        case "deconnexion":
                            $admin->deconnexion();
                            break; 
                        case "creeractualites";
                            $admin->creer_actualites();
                            break;
                        case "supprimerActualite":
                            $admin->supprimerActualite($url[2]);
                            break;
                        // case "info-utilisateur":
                        //         $admin->infoUtilisateur($url[2]);
                        //         break;   
                                                     
                        default:
                            throw new Exception("La page n'existe pas !!!!!!");
                    }
                } else {
                    AbstractController::MessageAlerte("Vous devez vous connecter !", AbstractController::ROUGE);
                    header("location: " . URL . "accueil");
                }
                break;
            default:
                throw new Exception("Aucune page trouvé");
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    header("/views/error.view.php");
    require "views/error.view.php";
}
