<?php


abstract class AbstractController
{

    const ROUGE = 'danger';
    const ORANGE = 'warning';
    const VERT = 'success';

    // public function checkImage(){
    //     if ($_FILES['photo']['error']) {
    //         switch ($_FILES['photo']['error']) {

    //             case 1: //UPLOAD_ERR_OK
    //                 throw new Exception("Valeur : 0. Aucune erreur, le téléchargement est correct.");
    //                 break;
    //             case 2: //UPLOAD_ERR_INI_SIZE
    //                 throw new Exception("Valeur : 1. La taille du fichier téléchargé excède la valeur de upload_max_filesize, configurée dans le php.ini.");
    //                 break;
    //             case 3: //UPLOAD_ERR_FORM_SIZE
    //                 throw new Exception("Valeur : 2. La taille du fichier téléchargé excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML.");
    //                 break;
    //             case 4: // UPLOAD_ERR_PARTIAL
    //                 throw new Exception("Valeur : 3. Le fichier n'a été que partiellement téléchargé.");
    //                 break;
    //             case 5: // UPLOAD_ERR_NO_FILE
    //                 throw new Exception("Valeur : 4. Aucun fichier n'a été téléchargé.");
    //                 break;
    //             case 6: // UPLOAD_ERR_NO_TMP_DIR
    //                 throw new Exception("Valeur : 6. Un dossier temporaire est manquant.");
    //                 break;
    //             case 7: // UPLOAD_ERR_CANT_WRITE
    //                 throw new Exception("Valeur : 7. Échec de l'écriture du fichier sur le disque.");
    //                 break;
    //             case 8: // UPLOAD_ERR_EXTENSION
    //                 throw new Exception("Valeur : 8. Une extension PHP a arrêté l'envoi de fichier. PHP ne propose aucun moyen de déterminer quelle extension est en cause. L'examen du phpinfo() peut aider.");
    //         }
    //     } else{
    //         // $_FILES['photo']['error'] vaut 0 : c'est que ERR = 0
    //         if ((isset($_FILES['photo']['name'])) && ($_FILES['photo']['error'] == UPLOAD_ERR_OK)) { // ou == 0
    //             $chemin = "{$_SERVER['DOCUMENT_ROOT']}Progressus-MVC-gestion-users/Public/assets/photos/";
    //             // Déplacement du fichier du répertoire temporaire vers le répertoire de destination avec la fonction
    //             move_uploaded_file($_FILES['photo']['tmp_name'], $chemin . $_FILES['photo']['name']);
    //             return true;
    //         } else {
    //             throw new Exception("le fichier n'a pas pu être copié dans votre dossier");
    //         }
    //     }
    // }

    // public function checkData(){
    //     foreach ($_POST as $key => $value) {
    //         $valid = (isset($value) && !empty($value)) ? htmlspecialchars($value) : null;
    //         if ($value == null) {
    //             throw  new Exception("Données erreur");
    //         }
    //         $tab[$key] = $valid;
    //     }
    //     return $tab;
    // }

    public static function MessageAlerte($msg, $couleur){
        $_SESSION['alert'] = [
            'type' => $couleur,
            'msg' => $msg,
        ];
    }

    public function genererPage($data){
        ob_start();
        extract($data);
        require_once $view;

        // $content= ob_get_clean();

        // require_once "views/template.php";

    }
}
