<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/admin.view.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="../public/js/admin.view.js" defer></script>
    <title><?= $titre ?></title>
</head>

<body>
    <header>
        <!-- nav bar -->
        <nav id="nav-top" class="navbar navbar-expand-md navbar-dark fixed">

            <img src="../public/img/logo/logo_Versailles.jpg" class="" alt="logo-CAE">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">


                </ul>

                <div class="d-flex bd-highlight mb-3" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <?php
                        if (!empty($_SESSION['admin'])) :
                        ?>
                            <div class="d-flex bd-highlight mb-3">
                                <div id="deco" class="ml-auto p-2 bd-highlight"><a class="btn" href="<?= URL ?>compte/deconnexion">Se déconnecter</a></div>
                            </div>
                        <?php endif; ?>
                    </ul>
                </div>
        </nav>
    </header>
    <?php
    if (isset($_SESSION["alert"])) :
    ?>

        <div class="alert alert-<?= $_SESSION["alert"]["type"] ?>" role="alert">
            <?= $_SESSION["alert"]["msg"] ?>
        </div>

    <?php
    endif;
    unset($_SESSION["alert"]);
    ?>

    <nav class="slide-menu row">
        <div id="btn-tableau-bord" class="col">
            <p>Tableau de bord</p>
        </div>
        <div id="btn-menu-slide" class="col">
            <div class="btn-group mr-5" role="group">
                <button type="button" class="btn-slide dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Membres</button>
                <div class="dropdown-menu">
                    <button id="btn-creer-membres" class="dropdown-item">Créer membres</button>
                    <a id="btn-liste-membres" class="dropdown-item">Liste des membres</a>
                </div>
            </div>
            <button class="btn-slide" id="btn-actualites">Actualités</button>
        </div>
    </nav>


    <div id="contenu">
        <div id="tableau-bord" class="m-5">
            <form method='POST' enctype='multipart/form-data'>
                <input type='search' name='recherche' id='recherche' placeholder='affiner recherche'>
                <button type='submit'>envoi</button>
                <button type='submit'>Reinitialiser rechercher</button>
            </form>
            <br>
            <?php
            // var_dump($data["recherche"]);

            if (!empty($data["recherche"])) {
                $html = "
                <table class='table table-striped table-hover table-dark'>
                    <thead>
                        <tr>
                            <th id='academie-origine'>Academie d'origine</th>
                            <th id='nom-utilisateur'>Nom</th>
                            <th>Prénom</th>
                            <th>Établissement principal</th>
                            <th id='img-date-demande'>Date demande</th>
                            <th>Type mutation</th>
                            <th>Statut</th>
                            <th class='document'>Document demande</th>
                        </tr>
                    </thead>
                    <tbody>
                ";




                foreach ($data["recherche"] as $key => $search) {
                    // var_dump($key);
                    if (isset($key)) {
                        foreach ($search as $recherche) {
                            // var_dump($search);
                            $html .= "<tr>
                                        <td>" . $recherche["academie_origine"] . "</td>
                                       <td> <button type='button' class='btn btn-jaune' data-toggle='modal' data-target='#modal-user-" . $recherche["id_utilisateur"] . "'>" . $recherche["nom_utilisateur"] . "</button></td>
                                        <td>" . $recherche["prenom_utilisateur"] . "</td>
                            ";
                            foreach ($etbsmt as $etbsmt_principal) {
                                // var_dump($etbsmt_principal);
                                if ($recherche["id_etbsmt"] === $etbsmt_principal->getId_etbsmt()) {
                                    $html .= "
                                    <td>" . $etbsmt_principal->getNom_etbsmt_principal() . "</td>";
                                }
                            }
                            $html .= "
                                        <td>" . @$recherche["date_demande"] . "</td> 
                                        <td>" . @$recherche["type_mutation"] . "</td>
                                        <td>" . @$recherche["statut_demande"] . "</td>  
                                    </tr>          
                                    ";
                        }
                    }
                }

                $html .= "</tbody>
                </table>";
                echo $html;
                unset($data["recherche"]);
            }
            // else if (!empty($data["user"]) && !empty($data["mutation"])) {

            $html = "
                <table class='table table-striped table-hover table-dark'>
                    <thead>
                        <tr>
                            <th id='academie-origine'>Academie d'origine</th>
                            <th id='nom-utilisateur'>Nom</th>
                            <th>Prénom</th>
                            <th>Établissement principal</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                ";

            // var_dump($data["mutation"]);
            // foreach ($data["user"] as $user) {


            foreach ($view_admin as $admin) {


                // echo "<pre>";
                // var_dump($admin["academie_origine"]);
                // echo "<pre>";



                $html .= "<tr>
                        <td>" . @$admin["academie_origine"] . "</td>
                        <td>
                            <button type='button' class='btn btn-jaune' data-toggle='modal' data-target='#modal-user-" . $admin["id_utilisateur"] . "'>" . $admin["nom_utilisateur"] . "</button>


                        <div class='modal-AllInfoUserPageAdmin fade' id='modal-user-" . $admin["id_utilisateur"] . "' tabindex='0' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content-AllInfoUserPageAdmin'>
                                    <div class='modal-header'>
                                        <div id='head-modal-info-user'>
                                            <div>
                                                <div>
                                                    <p>" . $admin["civilite_utilisateur"] . " " . $admin["nom_utilisateur"] . " " . $admin["prenom_utilisateur"] . "</p>
                                                    <p>Né(e) le : " . $admin["date_naissance_utilisateur"] . "</p>

                                                    <p> Adresse : " . $admin["adresse_utilisateur"] . "</p>
                                                    <p> Code postal : " . $admin["cp_utilisateur"] . "</p>
                                                    <p> Ville : " . $admin["ville_utilisateur"] . "</p>
                                                    <p> Numéro domicile : " . $admin["num_domicile_utilisateur"] . "</p>
                                                    <p> Numéro portable : " . $admin["num_portable_utilisateur"] . "</p>
                                                    <p> Email : " . $admin["email_utilisateur"] . "</p>
                                                    <p> Académie d'origine : " . $admin["academie_origine"] . "</p>
                                                    <p> Identifiant numen : " . $admin["numen"] . "</p>
                                                    <p> Discipline contrat : " . $admin["discipline_contrat"] . "</p>
                                                    <p> Spécialité enseigné : " . $admin["nom_spe"] . "</p>
                                                </div>
                                                <div>
                                                    <button id='btn-modifier-info-user' type='button' onclick='display_form_info_user(" . $admin["id_utilisateur"] . ")' class='btn btn-jaune'>Modifier</button>
                                                    <button id='btn-close-form-info-user-out" . $admin["id_utilisateur"] . "' style='display: none;' onclick='close_form_info_user(" . $admin["id_utilisateur"] . ")' type='button' class='btn btn-sinscrire'>Annuler</button>                                       
                                                </div>
                                            </div>
                                            <div id='form-modif-info-user" .   $admin["id_utilisateur"]  . "' style='display: none;' class='test row'>
                                                <form id='form' action='" . URL . "compte/modifierInfoUser/" . $admin["id_utilisateur"] . "' method='POST' enctype='multipart/form-data'>
                                                    <div class='info-1 col'>
                                                        <div class='row'>
                                                            <div class='col form-group'>
                                                                <label for='academie_origine'>Académie d'origine :</label>
                                                                <select class='custom-select' name='academie_origine'>
                                                                    <option selected value=''>Selectionner une académie</option>
                                                                    <option value='AIX-MARSEILLE'>AIX-MARSEILLE</option>
                                                                    <option value='AMIENS'>AMIENS</option>
                                                                    <option value='BESANCON'>BESANCON</option>
                                                                    <option value='BORDEAUX'>BORDEAUX</option>
                                                                    <option value='CAEN'>CAEN</option>
                                                                    <option value='CLERMONT-FERRAND'>CLERMONT-FERRAND</option>
                                                                    <option value='CORSE'>CORSE</option>
                                                                    <option value='DIJON'>DIJON</option>
                                                                    <option value='GRENOBLE'>GRENOBLE</option>
                                                                    <option value='CRETEIL'>CRETEIL</option>
                                                                    <option value='PARIS'>PARIS</option>
                                                                    <option value='LILLE'>LILLE</option>
                                                                    <option value='LIMOGES'>LIMOGES</option>
                                                                    <option value='LYON'>LYON</option>
                                                                    <option value='MONTPELLIER'>MONTPELLIER</option>
                                                                    <option value='NANCY-METZ'>NANCY-METZ</option>
                                                                    <option value='NANTES'>NANTES</option>
                                                                    <option value='NICE'>NICE</option>
                                                                    <option value='ORLEANS-TOURS'>ORLEANS-TOURS</option>
                                                                    <option value='POITIERS'>POITIERS</option>
                                                                    <option value='REIMS'>REIMS</option>
                                                                    <option value='RENNES'>RENNES</option>
                                                                    <option value='ROUEN'>ROUEN</option>
                                                                    <option value='STRASBOURG'>STRASBOURG</option>
                                                                    <option value='TOULOUSE'>TOULOUSE</option>
                                                                    <option value='VERSAILLES'>VERSAILLES</option>
                                                                    <option value='GUYANE'>GUYANE</option>
                                                                    <option value='GUADELOUPE'>GUADELOUPE</option>
                                                                    <option value='MARTINIQUE'>MARTINIQUE</option>
                                                                    <option value='REUNION'>REUNION</option>
                                                                    <option value='ST PIERRE ET MIQUELON'>ST PIERRE ET MIQUELON</option>
                                                                    <option value='NOUVELLE CALEDONIE'>NOUVELLE CALEDONIE</option>
                                                                    <option value='POLYNESIE FRANCAISE'>POLYNESIE FRANCAISE</option>
                                                                    <option value='WALLIS ET FUTUNA'>WALLIS ET FUTUNA</option>
                                                                </select>
                                                            </div>
                                                            <div class='col form-group'>
                                                                <label for='numen'>NUMEN :</label>
                                                                <input type='text' class='form-control' pattern='[0-9]{10}[A-Z]{3}' name='numen' placeholder='Exemple (inventé): 46G9987654XYZ'>
                                                            </div>
                                                            <div class='col form-group'>
                                                                <label for='nom_spe'>Spécialité enseigné :</label>
                                                                <input type='text' class='form-control' name='nom_spe' id='nom_spe' placeholder='Saisir spécialité enseigné'>
                                                            </div>
                                                        </div>
                                                        <div class='row'>
                                                            <div class='col form-group'>
                                                                <label for='discipline_contrat'>Discipline de Contrat :</label>
                                                                <select class='custom-select' name='discipline_contrat'>
                                                                    <option selected value=''>Choisissez une discipline</option>
                                                                    <option value='ALLEMAND'>ALLEMAND</option>
                                                                    <option value='ANGLAIS'>ANGLAIS</option>
                                                                    <option value='ARTS APPLIQUES OPTION METIERS D'ARTS'>ARTS APPLIQUES OPTION METIERS D'ARTS</option>
                                                                    <option value='ARTS PLASTIQUES'>ARTS PLASTIQUES</option>
                                                                    <option value='AUTRE'>AUTRE</option>
                                                                    <option value='BIOCHIMIE-GENIE BIOLOGIQUE'>BIOCHIMIE-GENIE BIOLOGIQUE</option>
                                                                    <option value='BIOTECHNOLOGIES SANTE-ENVIRONNEMENT'>BIOTECHNOLOGIES SANTE-ENVIRONNEMENT</option>
                                                                    <option value='BIOTECHNOLOGIES SANTE-ENVIRONNEMENT(E F)'>BIOTECHNOLOGIES SANTE-ENVIRONNEMENT(E F)</option>
                                                                    <option value='CHEF DE TRAVAUX SC ET TECH.INDUSTRIELLES'>CHEF DE TRAVAUX SC ET TECH.INDUSTRIELLES</option>
                                                                    <option value='CHEF DE TRAVAUX TERTIAIRES'>CHEF DE TRAVAUX TERTIAIRES</option>
                                                                    <option value='CHINOIS'>CHINOIS</option>
                                                                    <option value='COMPOSITION EN FORME IMPRIMANTE'>COMPOSITION EN FORME IMPRIMANTE</option>
                                                                    <option value='CONSTRUCTION ET REPARATION CARROSSERIE'>CONSTRUCTION ET REPARATION CARROSSERIE</option>
                                                                    <option value='CUISINE'>CUISINE</option>
                                                                    <option value='CYCLES ET MOTOCYCLES'>CYCLES ET MOTOCYCLES</option>
                                                                    <option value='DESSIN D'ART APPLIQUE AUX METIERS'>DESSIN D'ART APPLIQUE AUX METIERS</option>
                                                                    <option value='DOCUMENTATION'>DOCUMENTATION</option>
                                                                    <option value='EBENISTERIE'>EBENISTERIE</option>
                                                                    <option value='ECO ET GEST.OPTION COMM, ORG, GRH'>ECO ET GEST.OPTION COMM, ORG, GRH</option>
                                                                    <option value='ECO-GEST OPTION COMMERCE ET VENTE'>ECO-GEST OPTION COMMERCE ET VENTE</option>
                                                                    <option value='ECO-GEST OPTION GESTION-ADMINISTRATION'>ECO-GEST OPTION GESTION-ADMINISTRATION</option>
                                                                    <option value='ECO-GEST.OPTION COMPTABILITE ET FINANCE'>ECO-GEST.OPTION COMPTABILITE ET FINANCE</option>
                                                                    <option value='ESPAGNOL'>ESPAGNOL</option>
                                                                    <option value='GENIE ELECTRIQUE OPTION ELECTROTECHNIQUE'>GENIE ELECTRIQUE OPTION ELECTROTECHNIQUE</option>
                                                                    <option value='GENIE ELECTRIQUE: ELECTRONIQUE'>GENIE ELECTRIQUE: ELECTRONIQUE</option>
                                                                    <option value='GENIE INDUSTRIEL BOIS'>GENIE INDUSTRIEL BOIS</option>
                                                                    <option value='GENIE MECANIQUE CONSTRUCTION'>GENIE MECANIQUE CONSTRUCTION</option>
                                                                    <option value='GENIE MECANIQUE MAINTENANCE'>GENIE MECANIQUE MAINTENANCE</option>
                                                                    <option value='GENIE MECANIQUE PRODUCTIQUE'>GENIE MECANIQUE PRODUCTIQUE</option>
                                                                    <option value='GENIE MECANIQUE-MAINTENANCE VEHICULES'>GENIE MECANIQUE-MAINTENANCE VEHICULES</option>
                                                                    <option value='GESTION ET INFORMATIQUE'>GESTION ET INFORMATIQUE</option>
                                                                    <option value='HEBREU'>HEBREU</option>
                                                                    <option value='HISTOIRE GEOGRAPHIE'>HISTOIRE GEOGRAPHIE</option>
                                                                    <option value='HORTICULTURE'>HORTICULTURE</option>
                                                                    <option value='HOTELLERIE OPT SERVICE ET COMMERCIALISAT'>HOTELLERIE OPT SERVICE ET COMMERCIALISAT</option>
                                                                    <option value='HOTELLERIE OPT TECHNIQUES CULINAIRES'>HOTELLERIE OPT TECHNIQUES CULINAIRES</option>
                                                                    <option value='HOTEL-REST OPTION SERV ET ACCUEIL'>HOTEL-REST OPTION SERV ET ACCUEIL</option>
                                                                    <option value='IMPRESSION (LIVRE ET IMAGE)'>IMPRESSION (LIVRE ET IMAGE)</option>
                                                                    <option value='INFORMATIQUE&TELEMATIQUE'>INFORMATIQUE&TELEMATIQUE</option>
                                                                    <option value='ITALIEN'>ITALIEN</option>
                                                                    <option value='JAPONAIS'>JAPONAIS</option>
                                                                    <option value='LETTRES ANGLAIS'>LETTRES ANGLAIS</option>
                                                                    <option value='LETTRES CLASSIQUES'>LETTRES CLASSIQUES</option>
                                                                    <option value='LETTRES ESPAGNOL'>LETTRES ESPAGNOL</option>
                                                                    <option value='LETTRES HISTOIRE GEOGRAPHIE'>LETTRES HISTOIRE GEOGRAPHIE</option>
                                                                    <option value='LETTRES MODERNES'>LETTRES MODERNES</option>
                                                                    <option value='MATH.SCIENCES PHYSIQUES'>MATH.SCIENCES PHYSIQUES</option>
                                                                    <option value='MATHEMATIQUES'>MATHEMATIQUES</option>
                                                                    <option value='OPTIQUE (LUNETTERIE,PRECISION,COMPOSANTS'>OPTIQUE (LUNETTERIE,PRECISION,COMPOSANTS</option>
                                                                    <option value='PHILOSOPHIE'>PHILOSOPHIE</option>
                                                                    <option value='PORTUGAIS'>PORTUGAIS</option>
                                                                    <option value='PREVENTION ET SECURITE'>PREVENTION ET SECURITE</option>
                                                                    <option value='RUSSE'>RUSSE</option>
                                                                    <option value='SCIENCES DE LA VIE ET DE LA TERRE'>SCIENCES DE LA VIE ET DE LA TERRE</option>
                                                                    <option value='SCIENCES ECONOMIQUES ET SOCIALES'>SCIENCES ECONOMIQUES ET SOCIALES</option>
                                                                    <option value='SCIENCES ET TECHNIQUES MEDICO-SOCIALES'>SCIENCES ET TECHNIQUES MEDICO-SOCIALES</option>
                                                                    <option value='SCIENCES PHYSIQUES ET CHIMIQUES'>SCIENCES PHYSIQUES ET CHIMIQUES</option>
                                                                    <option value='SII OPT INGENIERIE ELECTRIQUE'>SII OPT INGENIERIE ELECTRIQUE</option>
                                                                    <option value='SII OPT INGENIERIE INFORMATIQUE'>SII OPT INGENIERIE INFORMATIQUE</option>
                                                                    <option value='SII OPTION INGENIERIE MECANIQUE'>SII OPTION INGENIERIE MECANIQUE</option>
                                                                    <option value='TECHNOLOGIE'>TECHNOLOGIE</option>
                                                                    <option value='ULIS'>ULIS</option>
                                                                    <option value='JAPONAIS'>JAPONAIS</option>
                                                                </select>
                                                            </div>
                                                            <div class='col'>
                                                            </div>
                                                            <div class='col form-group'>
                                                                <label for='option discipline'>Secteur activité :</label>
                                                                <div class='form-check'>
                                                                    <input class='form-check-input' type='checkbox' name='spe_college' value='Collège'>
                                                                    <label class='form-check-label'>
                                                                        Collège
                                                                    </label>
                                                                </div>
                                                                <div class='form-check'>
                                                                    <input class='form-check-input' type='checkbox' name='spe_lycee_pro' id='' value='Lycée professionnel'>
                                                                    <label class='form-check-label'>
                                                                        Lycée professionnel
                                                                    </label>
                                                                </div>
                                                                <div class='form-check'>
                                                                    <input class='form-check-input' type='checkbox' name='spe_lycee_gen' id='' value='Lycée général'>
                                                                    <label class='form-check-label'>
                                                                        Lycée général
                                                                    </label>
                                                                </div>
                                                                <div class='form-check'>
                                                                    <input class='form-check-input' type='checkbox' name='spe_lycee_tech' id='' value='Lycée technique'>
                                                                    <label class='form-check-label'>
                                                                        Lycée technique
                                                                    </label>
                                                                </div>
                                                                <div class='form-check'>
                                                                    <input class='form-check-input' type='checkbox' name='spe_post_bac' id='' value='POST BAC'>
                                                                    <label class='form-check-label'>
                                                                        POST BAC
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='row'>
                                                            <div class='col form-group'>
                                                                <label for='civilite-utilisateur'>Civilité :</label>
                                                                <div class='row w-75 ml-2'>
                                                                    <div class='form-check'>
                                                                        <input class='form-check-input' type='radio' name='civilite_utilisateur' id='monsieur' value='Monsieur'>
                                                                        <label class='form-check-label' for='civilite-utilisateur'>
                                                                            Monsieur
                                                                        </label>
                                                                    </div>
                                                                    <div class='form-check'>
                                                                        <input class='form-check-input' type='radio' name='civilite_utilisateur' id='madame' value='Madame'>
                                                                        <label class='form-check-label' for='civilite-utilisateur'>
                                                                            Madame
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class='col form-group'>
                                                                <label for='situation-maritale'>Situation maritale :</label>
                                                                <select class='custom-select' id='situation-maritale' name='situation_maritale'>
                                                                    <option selected value=''>Sélectionné une réponse</option>
                                                                    <option value='Célibataire'>Célibataire</option>
                                                                    <option value='Marié'>Marié</option>
                                                                    <option value='Pacsé'>Pacsé</option>
                                                                </select>
                                                            </div>
                                                            <div class='col form-group'>
                                                                <label for='date-naissance-utilisateur'>Date de naissance :</label>
                                                                <input type='date' class='form-control' name='date_naissance_utilisateur' id='date-naissance-utilisateur'>
                                                            </div>
                                                        </div>
                                                        <div class='row'>
                                                            <div class='col form-group'>
                                                                <label for='nom-utilisateur'>Nom :</label>
                                                                <input type='text' class='form-control' pattern='[A-Za-zéè-ëüêùâç' -]{2,35}' name='nom_utilisateur' id='nom-utilisateur' placeholder='Saisir nom'>
                                                            </div>
                                                                ";
                if ($admin["civilite_utilisateur"] === "Madame") {
                    $html .= "
                                                                                                        <div id='nom-naissance' class='col form-group'>
                                                                                                            <label for='input-nom-naissance'>Nom de naissance :</label>
                                                                                                            <input type='text' class='form-control' id='input-nom-naissance' name='nom_naissance_utilisateur' placeholder='Saisir nom de naissance'>
                                                                                                        </div>
                                                                    ";
                }
                $html .= "
                                                            <div class='col form-group'>
                                                                <label for='prenom-utilisateur'>Prénom :</label>
                                                                <input type='text' class='form-control' pattern='[A-Za-zéè-ëüêùâç' -]{2,35}' name='prenom_utilisateur' id='prenom-utilisateur' placeholder='Saisir prénom'>
                                                            </div>
                                                        </div>
                                                        <div class='row'>
                                                            <div class='col form-group'>
                                                                <label for='adresse-utilisateur'>Adresse :</label>
                                                                <input type='text' class='form-control' pattern='[0-9 A-Za-zéè-ëüêâùç' -]{5,35}' name='adresse_utilisateur' id='adresse-utilisateur' placeholder='Ex: 2 rue du palais'>
                                                            </div>
                                                            <div class='col form-group'>
                                                                <label for='cp-utilisateur'>Code postal :</label>
                                                                <input type='text' class='form-control' pattern='[0-9]{5}' name='cp_utilisateur' id='cp-utilisateur' placeholder='Ex: 75000'>
                                                            </div>
                                                            <div class='col form-group'>
                                                                <label for='ville-utilisateur'>Ville :</label>
                                                                <input type='text' class='form-control' pattern='[A-Za-zéè-ëüêâùç.' -]{3,35}' name='ville_utilisateur' id='ville-utilisateur' placeholder='Ex: PARIS'>
                                                            </div>
                                                        </div>
                                                        <div class='row'>
                                                            <div class='col form-group'>
                                                                <label for='num_portable_utilisateur'>Portable :</label>
                                                                <input type='tel' class='form-control' pattern='[0-9]{10}' name='num_portable_utilisateur' id='num-portable-utilisateur' placeholder='Saisir numéro de portable'>
                                                            </div>
                                                            <div class='col form-group'>
                                                                <label for='num_domicile_utilisateur'>Domicile :</label>
                                                                <input type='tel' class='form-control' pattern='[0-9]{10}' name='num_domicile_utilisateur' id='num-domicile-utilisateur' placeholder='Saisir numéro de domicile'>
                                                            </div>
                                                            <div class='col form-group'>
                                                                <label for='email_utilisateur'>Adresse électronique :</label>
                                                                <input type='email' class='form-control' pattern='^[0-9A-Za-z]+@{1}[0-9A-Za-z]+\.{1}[0-9A-Za-z]{2,}$' name='email_utilisateur' id='email-utilisateur' placeholder='Saisir adresse email'>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <button id='btn-close-form-info-user' onclick='close_form_info_user(" . $admin["id_utilisateur"] . ")' type='button' class='btn btn-sinscrire'>Annuler</button>
                                                    <button type='submit' class='btn btn-option'>Modifier</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class='modal-body'>
                                        <div id='body-modal-info-etbsmt'>
                                            <h4>Établissement principal de " . $admin["civilite_utilisateur"] . " " . $admin["nom_utilisateur"] . " " . $admin["prenom_utilisateur"] . " </h4>
                                            <br>
                                            <div class='row'>
                                                <div class='col'>
                    ";

                // var_dump($admin["id_utilisateur"]);
                // var_dump($admin);
                if (isset($admin["id_utilisateur"]) && isset($admin["id_etbsmt"])) {

                    // foreach($ebsmt_modal as $etbs){


                    // var_dump($admin);
                    $html .= "
                                                    <p>" . $admin["nom_etbsmt_principal"] . "</p>
                                                    <p>Académie : " . $admin["academie_etbsmt"] . "</p>
                                                    <p>RNE de l'établissement : " . $admin["rne_etbsmt"] . "</p>
                                                    <p>Type d'établissement : " . $admin["type_etbsmt"] . "</p>
                                                    <p>Chef d'établissement : " . $admin["nom_chef_etbsmt"] . " " . $admin["prenom_chef_etbsmt"] . "</p>
                                                    <p> Email chef établissement : " . $admin["email_chef_etbsmt"] . "</p>
                            ";
                }
                // break;

                $html .= "                                
                                                
                                                </div>
                                                <div class='col'>
                            ";
                // foreach ($etbsmt as $etbsmt_principal) {

                if (isset($admin["id_utilisateur"]) && isset($admin["id_etbsmt"])) {
                    $html .= "
                                                            <p>Adresse : " . $admin["adresse_etbsmt"] . "</p>
                                                            <p>Code postal : " . $admin["cp_etbsmt"] . "</p>
                                                            <p>Ville : " . $admin["ville_etbsmt"] . "</p>
                                                            <p>Département : " . $admin["departement_etbsmt"] . "</p>
                                                            <p>Numéro : " . $admin["num_etbsmt"] . "</p>
                                                            <p>Fax : " . $admin["fax_etbsmt"] . "</p>
                                                            <p>Email : " . $admin["email_etbsmt"] . "</p>
                                    ";
                    // }
                    // break;
                }



                $html .= "     <div class='js-page'>
                
                <main class='js-document'>
                <button type='button' class='btn btn-sinscrire' data-toggle='modal' data-target='#modal-mutation-" . $admin["id_utilisateur"] . "' aria-haspopup='dialog' aria-controls='dialog'>Modifier Etablissement</button>

                </main>
                <div id='modal-mutation-" . $admin["id_utilisateur"] . "' role='dialog' aria-labelledby='dialog-title' aria-describedby='dialog-desc' aria-modal='true' aria-hidden='true' tabindex='-1' class='c-dialog'>
                  <div role='document' class='c-dialog__box'>                   
                    <div class'row'>
                    <h4>Établissement principal de " . $admin["civilite_utilisateur"] . " " . $admin["nom_utilisateur"] . " " . $admin["prenom_utilisateur"] . " </h4>
                    <button id='btn-modifier-etbsmt-user' type='button' onclick='display_form_etbsmt_user(" . $admin["id_utilisateur"] . ")' class='btn btn-jaune'>Modifier</button>
                </div>
                <div id='div-form-modif-etbsmt-principal'>
                    


                    <form id='form' action='" . URL . "compte/modificationEtbsmtUser/" . $admin["id_utilisateur"] . "' method='POST' enctype='multipart/form-data'>
                        <div class='form-group'>
                            <label for='rne-etbsmt'>RNE de l'établissement :</label>
                            <p id='info-suppr-etbsmt" . $admin["id_utilisateur"] . "' class='lead' style='display: none; color: orange'>Pour effacer la selection DOUBLE CLIQUÉ sur le champ ci dessous !</p>
                            <input type='text' class='form-control' onclick='autocompl(" . $admin["id_utilisateur"] . ")' name='rne_etbsmt' id='rne-etbsmt" . $admin["id_utilisateur"] . "' placeholder='Ex. 0950809F'>
                        </div>
                        <div class='form-group'>
                            <label for='academie-etbsmt'>Académie de l'établissement :</label>
                            <input type='text' class='form-control' name='academie_etbsmt' id='academie-etbsmt" . $admin["id_utilisateur"] . "' placeholder='Ex. Notre Dame' >
                        </div>
                        <div class='form-group'>
                            <label for='nom-etbsmt-principal'>Nom de l'établissement :</label>
                            <input type='text' class='form-control' name='nom_etbsmt_principal' id='nom-etbsmt-principal" . $admin["id_utilisateur"] . "' placeholder='Ex. Notre Dame'>
                        </div>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>
                        <button type='submit' class='btn btn-primary'>Modifier</button>
                    </form>

                    </div>
                    
                  </div>
                </div>
              </div>
              
                
                                        </div>
                                            </div>
                                            <div id='form-modif-etbsmt-principal'>
                                        
                                            </div>
                                        </div>
                                        <div id='body-modal-info-demande-user'>
                                            <div class='col'>
                            ";
                $i = 0;

                // var_dump($demande_user["academie_souhaite"]);
                foreach ($mutations as $mutation) {



                    if ($mutation["id_utilisateur"] === $admin["id_utilisateur"]) {




                        $html .= "


                                                                    <div class='card border border-dark' style='width: 32rem;'>
                                                                        <div class='card-body'>
                                                                          <h5 class='card-title'> Type : <span>"  . $mutation["type_mutation"] . " demande N°" . $mutation["id_mutation"] . " </span></h5>
                                                                          <h6 class='card-subtitle mb-2 text-muted'> <span>  Statut de la demande : " . $mutation["statut_demande"] . "</span></h6>
                                                                          <p class='card-text'> Date demande : <span>" . $mutation["date_demande"] . "</span></p>
                                                                          <p>Situation candidat : " . $mutation["situation"] . "</p>
                                                                                        <p>Type de contrat : " . $mutation["type_contrat"] . "</p>
                                                                                        <p>Début de contrat : " . $mutation["date_contrat"] . "</p>
                                                                                        <p>En activité : " . $mutation["statut_situation"] . "</p>
                                                                                        <p>Disponibilité : " . $mutation["disponibilite"] . " </p>
                                                                                        <p> plus d 'information : " . $mutation["autre_disponibilite"] . "</p>
                                                                                        <p>Début disponibilité : " . $mutation["date_debut_disponibilite"] . "</p>
                                                                                        <p>Ancienneté de service : " . $mutation["anciennete_service"] . "</p>
                                                                                        <p>Échelle de rémunération : " . $mutation["echelle_remuneration"] . "</p>
                                                                                        <p>Autre rémunération : " . $mutation["autre_remuneration"] . "</p>
                                                                                        <p>Rémunération Classe : " . $mutation["remuneration_classe"] . "</p>
                                                                                        <p>Échelon : " . $mutation["echelon"] . "</p>  
                                                                                        <p>autre echelon : " . $mutation["echelon_autre"] . "</p>  

                                                                                     Contrat de l'utilisateur : <p><a href='../public/img/fichier-utilisateurs/" . $mutation["contrat"] . "' target='_blank''>" . $mutation["contrat"] . "</a></p>

                                                                                <div class='js-page'>
                                                                                    <main class='js-document'>
                                                                                       <button type='button' class='btn btn-sinscrire' data-toggle='modal' data-target='#modal-mutation-" . $mutation["id_mutation"] . "' aria-haspopup='dialog' aria-controls='dialog'>Modifier Demande "  . $mutation["type_mutation"] . "</button>
                                                                            

                                                                                    </main>
                                                                                            <br>
                                                                                        <div id='modal-mutation-" . $mutation["id_mutation"] . "' role='dialog' aria-labelledby='dialog-title' aria-describedby='dialog-desc' aria-modal='true' aria-hidden='true' tabindex='-1' class='c-dialog'>
                                                                                        <div role='document' class='c-dialog__box'>
                                                                                                 <button type='button' aria-label='Fermer' title='Fermer cette fenêtre modale' data-dismiss='dialog'>X</button>
                                                                                         
                                                                                        <form id='form' action='" . URL . "compte/modifierInfoMutation/" . $mutation["id_mutation"] . "' method='POST' enctype='multipart/form-data'>
                                                                                           <p>

                                                                                          demande N° " . $mutation["id_mutation"] . "
                                                                                           <div class='form-group'>
                                                                                                <label for='situation'>Modifier situation candidat</label>
                                                                                                <select class='custom-select' name='situation'>
                                                                                                    <option selected required='required' value=''>Selectionner votre réponse</option>
                                                                                                    <option value='Maitre titulaire du 2nd degré'>Maitre titulaire du 2nd degré</option>
                                                                                                    <option value='Stagiaire CAER'>Stagiaire CAER</option>
                                                                                                    <option value='Stagiaire CAFEP'>Stagiaire CAFEP</option>
                                                                                                    <option value='Nommé du public'>Nommé du public</option>
                                                                                                    <option value='Enseignant 1er degré'>Enseignant 1er degré</option>
                                                                                                    <option value='Agrégé'>Agrégé</option>
                                                                                                </select>
                                                                                            </div>

                                                                                       
                                                                                            
                                                                                            <div class='col form-group'>
                                                                                                <label for='type-contrat' >Modifier type de Contrat :</label>
                                                                                                <div class='row w-75 ml-2'>
                                                                                                    <div class='col form-check'>
                                                                                                        <input class='form-check-input' type='radio' name='type_contrat' value='Contrat définitif' >
                                                                                                        <label class='form-check-label' for='type_contrat'>
                                                                                                            Contrat définitif
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class='col form-check'>
                                                                                                        <input class='form-check-input' type='radio' name='type_contrat' value='Contrat provisoire'>
                                                                                                        <label class='form-check-label' for='type_contrat'>
                                                                                                            Contrat provisoire
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                </div>  
                                                                                        
                                                                                            <div class='col form-group'>
                                                                                                <label for='date_contrat'>Modifier date de contrat :</label>
                                                                                                <input type='date' class='form-control' name='date_contrat' id='date_contrat' >
                                                                                            </div>
                                                                                        
                                                                                            <div class='form-group'>
                                                                                                    <label for='contrat'>Modifier contrat :</label><br>
                                                                                                    <input name='contrat' type='file' class='form-control' accept='application/pdf, application/docx, application/doc, application/odt, application/PNG, application/JPEG' title='Taille maximale autorisée: 2Mo' id='contrat'>
                                                                                
                                                                                                    <input type='hidden' name='MAX_FILE_SIZE' value='2097152'>
                                                                                            </div>

                                                                                            <div class='form-group'>
                                                                                                <label for='statut-situation'>Modifier situation d'activité :</label>
                                                                                                <div class='row w-25 ml-2'>
                                                                                                    <div class='col form-check'>
                                                                                                        <input class='form-check-input' type='radio' name='statut_situation' value='Oui'>
                                                                                                        <label class='form-check-label' for='statut-situation'>
                                                                                                            Oui
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class='col form-check'>
                                                                                                        <input class='form-check-input' type='radio' name='statut_situation' value='Non'>
                                                                                                        <label class='form-check-label' for='statut-situation'>
                                                                                                            Non
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class='row'>
                                                                                                    <div class='col form-group'>
                                                                                                        <label for='dispo'>Modifier disponibilite :</label>
                                                                                                        <div class='row w-75 ml-2'>
                                                                                                            <div class='col form-check'>
                                                                                                                <input class='form-check-input' onclick='masquer(" . $mutation["id_mutation"] . ")' type='radio' name='disponibilite' id='dispo' value='Disponibilité' >
                                                                                                                <label class='form-check-label' for='dispo'>
                                                                                                                    Disponibilité
                                                                                                                </label>
                                                                                                            </div>
                                                                                                            <div class='col form-check'>
                                                                                                                <input class='form-check-input' onclick='masquer(" . $mutation["id_mutation"] . ")' type='radio' name='disponibilite' id='conge' value='Congé'>
                                                                                                                <label class='form-check-label' for='conge'>
                                                                                                                    Congé
                                                                                                                </label>
                                                                                                            </div>
                                                                                                            <div class='col form-check'>
                                                                                                                <input class='form-check-input' onclick='afficher(" . $mutation["id_mutation"] . ")' type='radio' name='disponibilite' id='autre' value='Autre'>
                                                                                                                <label class='form-check-label' for='autre'>
                                                                                                                    Autre
                                                                                                                </label>
                                                                                                            </div>

                                                                                                            <div style='display: none;' id='info-autre" . $mutation["id_mutation"] . "'>
                                                                                                            

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <br>
                                                                                                    <div class='col form-group'>
                                                                                                        <label for='date_debut_disponibilite'>Indiquer la date de début de disponibilité ou de congé :</label>
                                                                                                        <input type='date' class='form-control' name='date_debut_disponibilite' >
                                                                                                    </div>
                                                                                                </div>

                                                                                            <div class='page' id='page3'>
                                                                                                
                                                                                                <div class='row'>
                                                                                                <div class='col form-group'>
                                                                                                <label for='chelle-remuneration'>Echelle de rémunération :</label>
                                                                                                <select class='custom-select' onchange='autreRemuneration(" . $mutation["id_mutation"] . ")' id='echelle-remuneration" . $mutation["id_mutation"] . "' name='echelle_remuneration' required >
                                                                                                    <option value='' selected >Selectionner votre réponse</option>
                                                                                                    <option value='Certifié'>Certifié</option>
                                                                                                    <option value='Agrégé'>Agrégé</option>
                                                                                                    <option value='PLP'>PLP</option>
                                                                                                    <option value='Autre'>Autre</option>
                                                                                                </select>
                                                                                                <div style='display: none;' id='autre-remuneration" . $mutation["id_mutation"] . "'>
                                                                                                    <label >Si 'Autre', vous avez la possibilité de donner votre echelon de rémunération  :</label>
                                                                                                    <input type='texte'  class='form-control' id='autre-remuneration' name='autre_remuneration'>
                                                                        
                                                                                                </div>
                                                                                            </div>
                                                                                                    <br>
                                                                                                    <div class='col form-group'>
                                                                                                        <label for='remuneration-classe'> Modifier rémunération classe :</label>
                                                                                                        <select class='custom-select' name='remuneration_classe'>
                                                                                                            <option selected required='required' value=''>Selectionner votre réponse</option>
                                                                                                            <option value='Classe normale'>Classe normale</option>
                                                                                                            <option value='Hors classe'>Hors classe</option>
                                                                                                            <option value='Classe exceptionnelle'>Classe exceptionnelle</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <br>
                                                                                                    <div class='col form-group'>
                                                                                                            <label for='echelon'>Echelon:</label>
                                                                                                            <select class='custom-select' onchange='autreEchelon(" . $mutation["id_mutation"] . ")' id='echelon" . $mutation["id_mutation"] . "' name='echelon' >
                                                                                                                <option  selected value=''>Selectionner votre echelon</option>
                                                                                                                <option value='1'>1</option>
                                                                                                                <option value='2'>2</option>
                                                                                                                <option value='3'>3</option>
                                                                                                                <option value='4'>4</option>
                                                                                                                <option value='5'>5</option>
                                                                                                                <option value='6'>6</option>
                                                                                                                <option value='7'>7</option>
                                                                                                                <option value='8'>8</option>
                                                                                                                <option value='9'>9</option>
                                                                                                                <option value='10'>10</option>
                                                                                                                <option value='11'>11</option>
                                                                                                                <option value='Autre'>Autre</option>
                                                                                                            </select>
                                                                                                            <div style='display: none;' id='echelon-autre" . $mutation["id_mutation"] . "'>
                                                                                                            <label >Si 'Autre', vous avez la possibilité de donner votre echelon  :</label>
                                                                                                            <input type='number' size='1' class='form-control' id='echelon-autre' name='echelon_autre'>
                                                                                
                                                                                                    </div>
                                                                                                </div>

                                                                                             
                                                                                                </div>
                                                                                                <br>
                                                                                                <div class='form-group'>
                                                                                                    <label for='anciennete-service'>Modifier dans l'enseignement depuis :</label>
                                                                                                    <input type='date' class='form-control' name='anciennete_service' id='anciennete-service'>
                                                                                                </div>
                                                                                                <br>
                                                                                            </div>
                                                                                            <div class='form-group'>
                                                                                                <label for='type-mutation'>Modifier type de mutation :</label>
                                                                                                <select onchange='mutation() class='custom-select' id='type-mutation' name='type_mutation'>
                                                                                                    <option selected required='required' value=''>Selectionner votre réponse</option>
                                                                                                    <option value='Mutation inter VERSAILLES'>Je suis hors l'academie de Versailles, je souhaite muter vers l'académie de Versailles (Mutation inter Versailles)</option>
                                                                                                    <option id='mutation-ext' value='Mutation inter hors VERSAILLES'>Je suis dans l'academie de Versailles, je souhaite muter hors l'académie de Versailles (Mutation inter hors Versailles)</option>
                                                                                                    <option value='Mutation intra VERSAILLES'>Je reste dans l'académie de Versailles (Mutation intra Versailles)</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            
                                                                                            <fieldset>
                                                                                                <div class='liste-academie-souhaite' id='liste-academie-souhaite'>
                                                                                                    <button type='button' id='btn-close' class='close'>
                                                                                                        <span aria-hidden='true'>&times;</span>
                                                                                                    </button>
                                                                                                    <div id='souhait'>
                                                                                                        <div class='form-group'>
                                                                                                            <label for='academie-souhaite'>Académie souhaité :</label>
                                                                                                            <select class='custom-select' id='academie-souhaite' name='academie_souhaite'>
                                                                                                                <option selected required='required' value=''>Selectionner votre réponse</option>
                                                                                                                <option value='AIX-MARSEILLE'>AIX-MARSEILLE</option>
                                                                                                                <option value='AMIENS'>AMIENS</option>
                                                                                                                <option value='BESANCON'>BESANCON</option>
                                                                                                                <option value='BORDEAUX'>BORDEAUX</option>
                                                                                                                <option value='CAEN'>CAEN</option>
                                                                                                                <option value='CLERMONT-FERRAND'>CLERMONT-FERRAND</option>
                                                                                                                <option value='CORSE'>CORSE</option>
                                                                                                                <option value='DIJON'>DIJON</option>
                                                                                                                <option value='GRENOBLE'>GRENOBLE</option>
                                                                                                                <option value='CRETEIL'>CRETEIL</option>
                                                                                                                <option value='PARIS'>PARIS</option>
                                                                                                                <option value='LILLE'>LILLE</option>
                                                                                                                <option value='LIMOGES'>LIMOGES</option>
                                                                                                                <option value='LYON'>LYON</option>
                                                                                                                <option value='MONTPELLIER'>MONTPELLIER</option>
                                                                                                                <option value='NANCY-METZ'>NANCY-METZ</option>
                                                                                                                <option value='NANTES'>NANTES</option>
                                                                                                                <option value='NICE'>NICE</option>
                                                                                                                <option value='ORLEANS-TOURS'>ORLEANS-TOURS</option>
                                                                                                                <option value='POITIERS'>POITIERS</option>
                                                                                                                <option value='REIMS'>REIMS</option>
                                                                                                                <option value='RENNES'>RENNES</option>
                                                                                                                <option value='ROUEN'>ROUEN</option>
                                                                                                                <option value='STRASBOURG'>STRASBOURG</option>
                                                                                                                <option value='TOULOUSE'>TOULOUSE</option>
                                                                                                                <!-- <option value='VERSAILLES'>VERSAILLES</option> -->
                                                                                                                <option value='GUYANE'>GUYANE</option>
                                                                                                                <option value='GUADELOUPE'>GUADELOUPE</option>
                                                                                                                <option value='MARTINIQUE'>MARTINIQUE</option>
                                                                                                                <option value='REUNION'>REUNION</option>
                                                                                                                <option value='ST PIERRE ET MIQUELON'>ST PIERRE ET MIQUELON</option>
                                                                                                                <option value='NOUVELLE CALEDONIE'>NOUVELLE CALEDONIE</option>
                                                                                                                <option value='POLYNESIE FRANCAISE'>POLYNESIE FRANCAISE</option>
                                                                                                                <option value='WALLIS ET FUTUNA'>WALLIS ET FUTUNA</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div style='display: none;'  id='display-academie-souhaite' class='form-group'>

                                                                                                    </div>

                                                                                                    <div class='inputDept' id='div-departement'>
                                                                                                        
                                                                                                    </div>

                                                                                                    <div class='row'>
                                                                                                        <div class='col form-group'>
                                                                                                            <label for='type-contrat-souhaite'>Temps de service souhaité :</label>
                                                                                                            <select class='custom-select' id='type-contrat-souhaite' name='type_contrat_souhaite'>
                                                                                                                <option selected required='required' value=''>Selectionner votre réponse</option>
                                                                                                                <option value='Temps complet'>Temps complet</option>
                                                                                                                <option value='Temps partiel'>Temps partiel</option>
                                                                                                                <option value='Temps partiel et temps partiel'>Temps complet et/ou temps partiel</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <br>
                                                                                                        <div class='col form-group'>
                                                                                                            <label for='nb-heures-souhaite'>Nombre d'heures souhaité :</label>
                                                                                                            <input type='text' class='form-control' id='nb-heures-souhaite' name='nb_heures_souhaite' placeholder='Saisir votre nombre d'heures souhaité'>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class='row'>
                                                                                                        <div class='col form-group'>
                                                                                                            <label for='motif-demande'>Motif de la demande :</label>
                                                                                                            <select class='custom-select' id='motif-demande' name='motif_demande'>
                                                                                                                <option selected required='required' value=''>Selectionner votre réponse</option>
                                                                                                                <option value='Impératifs familiaux'>Impératifs familiaux</option>
                                                                                                                <option value='Raisons médicales'>Raisons médicales</option>
                                                                                                                <option value='Vie religieuse'>Vie religieuse</option>
                                                                                                                <option value='Autre'>Autre</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class='col form-group'>
                                                                                                            <label for='justificatif-motif'>Justificatif :</label><br>
                                                                                                            <input name='justificatif_motif' type='file' class='form-control' id='justificatif-motif' accept='application/pdf, application/docx, application/doc, application/odt' title='Taille maximale autorisée: 2Mo'>
                                                                                                          
                                                                                                            <input type='hidden' name='MAX_FILE_SIZE' value='2097152'>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class='form-group' id='display-autre-motif'>
                                                                                                        <label for='autre_motif'>Si 'Autre', vous avez la possibilité d'expliquer le motif :</label>
                                                                                                        <input type='text' class='form-control' id='autre-motif' name='autre_motif'>
                                                                                                    </div>

                                                                                                   
                                                                                                </div>
                                                                                            </fieldset>

                                                                                           
                                                                                           <p>
                                                                                             <button type='submit'>Valider</button>
                                                                                           </p>
                                                                                        </form>
                                                                                       </div>
                                                                                     </div>
                                                                                </div>
                                                                             
                                                                        
                                                                                              
                                                                          <button type='button' class='btn btn-sinscrire' data-toggle='modal' data-target='#modal-suppression-" . $mutation["id_mutation"] . "'>Supprimer ma demande</button>

                                                                          <!-- Modal -->
                                                                          <div class='modal fade' id='modal-suppression-" .   $mutation["id_mutation"] . "' tabindex='0' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                                              <div class='modal-dialog'>
                                                                                  <div class='modal-content'>
                                                                                      <div class='modal-header'>
                                                                                          <h5 class='modal-title' id='exampleModalLabel'>Supprimer mon souhait</h5>
                                                                                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                                              <span aria-hidden='true'>&times;</span>
                                                                                          </button>
                                                                                      </div>
                                                                                      <div class='modal-body'>
                                                                                          <form id='form' action='" . URL . "compte/supprimerDemande/" . $mutation["id_mutation"] . "' method='POST' enctype='multipart/form-data'>
                                                                                              <p>Etes-vous sur de vouloir supprimer definitivement  la demande de  " . $admin["prenom_utilisateur"]  . "  " . $admin["nom_utilisateur"]  . " ?</p>
                                                                                              <div class='modal-footer'>
                                                                                                  <button type='button' class='btn btn-option' data-dismiss='modal'>Fermer</button>
                                                                                                  <button type='submit' class='btn btn-sinscrire'>Supprimer</button>
                                                                                              </div>
                                                                                          </form>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                         
                                                                        </div>
                                                                    </div>
                                  
                                                                                        
                                                                      
                                                                      ";

                        if (empty($demande_user["contrat"])) {
                            $html .= "<h4 class='manquant'>contrat manquant comme pièce justificative</h4>";
                        }
                    }
                }






                $html .= "
                                            </div>
                                            <div class='col'>
                            ";

                $html .= "
                                                
                                            </div>
                                            <div class='col'>
                            ";

                $html .= "
                                            
                                            </div>
                                            <div class='col'>
                            ";

                $html .= "
                                            
                                            </div>                
                                        </div>
                                    </div>
                                    <div class='modal-footer-AllInfoUserPageAdmin'>
                                        <table class='table table-striped table-dark'>
                                            <thead>
                                                <tr>
                                                    <th>Académie souhaité</th>
                                                    <th>Type de contrat souhaité</th>
                                                    <th>Nombre d'heures souhaité</th>
                                                    <th>Motif de la demande</th>
                                                    <th>Autre-motif</th>
                                                    <th>Pré-codification</th>
                                                    <th>Codification</th>
                                                    <th>Justificatif</th>
                                                    <th>Numéro de la Mutation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            ";

                foreach ($demande_users as $demande_user) {

                    if ($demande_user["id_utilisateur"] === $admin["id_utilisateur"]) {
                        $html .= "
                                                                            <tr>
                                                                            <td>" . $demande_user["academie_souhaite"] . "</td>
                                                                            <td>" . $demande_user["type_contrat_souhaite"] . "</td>
                                                                            <td>" . $demande_user["nb_heures_souhaite"] . "</td>
                                                                            <td>" . $demande_user["motif_demande"] . "</td>
                                                                            <td>" . $demande_user["autre_motif"] . "</td>
                                                                            <td>" . $demande_user["pre_codification"] . "</td>
                                                                            <td contenteditable='true'>" . $demande_user["codification"] . "</td>
                                                                            <td><a href='../public/img/fichier-utilisateurs/" . $demande_user["justificatif_motif"] . "' target='_blank''>" . $demande_user["justificatif_motif"] . "</a></td>
                                                                            <td>" . $demande_user["id_mutation"] . "</td>
                                                                            </tr>
                                                                            ";
                        if (empty($demande_user["justificatif_motif"])) {
                            $html .= "<h4 class='manquant'> justificatif manquant pour la raison : " . $demande_user['motif_demande'] . "</h4><br>";
                        }
                    }
                }


                $html .=
                    "              </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </td>
                                                    <td>" . $admin["prenom_utilisateur"] . "</td>            
                            ";



                if (isset($admin["id_utilisateur"]) && isset($admin["id_etbsmt"])) {
                    $html .= "
                                                            <td>" . $admin["nom_etbsmt_principal"] . "</td>";
                }

                $html .= "
                                
                                     </tr>          
                             ";



                // break;


                // }

            }

            $html .= "</tbody>
                </table>";

            echo $html;

            ?>
        </div>

        <div id="creer-membres" class="m-5" style="display: none;">
            <div id="btn-duplication">
                <button type="button" id="ajout-membre" onclick="duplicate()">Ajouter un membre</button>
            </div>
            <fieldset>

                <form action="<?= URL ?>compte/admin/creermembres" method="POST" enctype="multipart/form-data">
                    <div id="formulaire-membres">
                        <div class="col form-group">
                            <label for="identifiant-membre">Identifiant membre :</label>
                            <input type="text" name="identifiant_membre" class="form-control" id="identifiant-membre" required pattern="[A-Z a-z]{5,15}[0-9]{0,9}">
                        </div>
                        <div class="col form-group">
                            <label for="mdp-membre">Mot de passe membre :</label>
                            <input type="password" name="mdp_membre" class="form-control" id="mdp-membre" required pattern="[A-Z a-Z]{5,15}[0-9]{0,9}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sinscrire">Envoyer</button>
                </form>
            </fieldset>
        </div>

        <div id="liste-membres" class="m-5">

        </div>

        <div id="div-actualites">
            <div class="row">
                <div id="actualites-actif">
                    <div>
                        <h4>Les actualitées en cours</h4>
                    </div>
                    <?php
                    if (!empty($actualites)) {
                        foreach ($actualites as $actualite) {
                            // var_dump($actualite);
                            $html = "
                                <div id='card-actu'>
                                    <button type='button' data-toggle='modal' data-target='#modal-suppression-" . $actualite->get_id() . "' style='color: red;' class='close mr-3 mt-3'>
                                        Supprimer
                                    </button>

                                    <div class='modal fade' id='modal-suppression-" . $actualite->get_id() . "' tabindex='0' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalLabel'>Supprimer actualité " . $actualite->get_titre()  . "</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                    <form id='form' action='" . URL . "compte/supprimerActualite/" . $actualite->get_id() . "'>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-option' data-dismiss='modal'>Fermer</button>
                                                            <button type='submit' class='btn btn-sinscrire'>Supprimer</button>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>






                                    <div class='card-body'>
                                        <h5 class='card-title'>" . $actualite->get_titre() . "</h5>
                                        <p class='card-text'>Description : " . $actualite->get_description() . "</p>
                                        <p>Date de début : " . $actualite->get_date_debut() . "</p>
                                        <p>Date de fin : " . $actualite->get_date_fin() . "</p>
                                    </div>
                                </div>
                            ";
                            echo $html;
                        }
                    }
                    ?>
                </div>
                <div id="creer-actualites">
                    <div>
                        <h4>Ajouter une actualitées</h4>
                    </div>
                    <form action="<?= URL ?>compte/creeractualites" method="POST" enctype="multipart/form-data">
                        <fieldset class="col">
                            <div id="formulaire-actualites">
                                <div class="form-group">
                                    <label for="titre-actu">Titre de l'actualité :</label>
                                    <input type="text" class="form-control" name="titre_actu" id="titre-actu" required pattern="[A-Za-zéè-ëüêùâç' -]{2,50}">
                                </div>
                                <div class="form-group">
                                    <label for="desc-actu">Description de l'actualité :</label>
                                    <input type="text" class="form-control" name="desc_actu" id="desc-actu" required pattern="[A-Za-zéè-ëüêùâç' -]{2,300}">
                                </div>
                                <div class="form-group">
                                    <label for="date-debut-actu">Date de début de l'actualité :</label>
                                    <input type="date" class="form-control" name="date_debut_actu">
                                </div>
                                <div class="form-group">
                                    <label for="date-fin-actu">Date de fin de l'actualité :</label>
                                    <input type="date" class="form-control" name="date_fin_actu">
                                </div>
                                <div class="form-group">
                                    <label for="img-actu">Image de l'actualité :</label><br>
                                    <input name="img_actu" type="file" class="form-control" id="img-actu" accept="application/pdf, application/docx, application/doc, application/odt" title="Taille maximale autorisée: 2Mo">
                                    <!-- SÉCURITÉ ANTI BOT -->
                                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-sinscrire mx-auto">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>