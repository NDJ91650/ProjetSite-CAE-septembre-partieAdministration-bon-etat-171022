<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/user.view.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script>
        window.myUrl = "<?= URL ?>"
        console.log(window);
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../public/js/user.view.js" defer></script>
    <title><?= $titre ?></title>
</head>

<body>
    <header>
        <!-- nav bar -->
        <nav id="nav-top" class="navbar navbar-expand-md navbar-dark fixed">

            <img id="logo" src="../public/img/logo/logo_Versailles.jpg" class="" alt="logo-CAE">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">


                </ul>

                <div class="d-flex bd-highlight mb-3" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <?php
                        if (empty($_SESSION['utilisateur'])) :
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="">S'inscrire</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL ?>login">Connexion</a>
                            </li>


                        <?php else : ?>
                            <div class="d-flex bd-highlight mb-3">
                                <div id="compte" class="ml-auto p-2 bd-highlight"><a class="btn" href="<?= URL ?>compte/profile">Mon compte</a></div>
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


    <div class="contenu">
        
        <!-- Head -->
        <div id="head">
            <div class="info-utilisateur">
                <hr>
                <h3>Mouvement des maîtres du 2nd degré</h3>
                <hr>
                <div class="icone">
                    <img src="../public/img/utilisateur/icone-utilisateur.png" class="" alt="Icone">
                    <div class="info-utilisateur">
                        <p><?= $tableau->getCivilite_utilisateur() ?> <?php if ($tableau->getCivilite_utilisateur() === "Madame") {
                                                                            echo $tableau->getNom_naissance_utilisateur();
                                                                        } ?> <?= $tableau->getNom_utilisateur() ?> <?= $tableau->getPrenom_utilisateur() ?></p>
                        <p>Née le : <?= $tableau->getDate_naissance_utilisateur() ?></p>
                    </div>

                </div>
            </div>

            <div id="actu-utilisateur">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Titre actualité</h5>
                        <p class="card-text">Description acutalité : Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nostrum architecto deleniti ipsam molestias animi saepe atque reprehenderit debitis maxime.</p>
                        <a href="#" class="btn btn-option">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="contenu-espacePerso">

            <div class="slide1">
                <!-- <a id="btn-espacePerso" href="#">Espace personnel</a> -->
                <div id="btn-faireDemande">
                    <a href="<?= URL ?>compte/demandeMutation/<?= $tableau->getId_utilisateur() ?>">Faire une demande de mutation</a>
                </div>
            </div>
            <hr>


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="info-perso" data-toggle="tab" href="#contenu-info-perso" role="tab" aria-controls="home" aria-selected="true">Info personnel</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="adresse" data-toggle="tab" href="#contenu-adresse" role="tab" aria-controls="profile" aria-selected="false">Adresse</a>
                </li>
                <?php
                if (!empty($etbsmt_principal)) {
                ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="etbsmt-principal" data-toggle="tab" href="#contenu-etbsmt-principal" role="tab" aria-controls="profile" aria-selected="false">Établissement principal</a>
                    </li>
                <?php
                }
                ?>
                <?php
                if (!empty($demandes)) {
                ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="voeux-user" data-toggle="tab" href="#contenu-voeux-user" role="tab" aria-controls="profile" aria-selected="false">Souhait mutation</a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="contenu-info-perso" role="tabpanel" aria-labelledby="info-perso">
                    <div class="info-perso">
                        <div class="info-utilisateur">
                            <p>Académie d'origine : <?= $tableau->getAcademie_origine() ?></p>
                            <p>Numen : <?= $tableau->getNumen() ?></p>
                            <p>Adresse email : <?= $tableau->getEmail_utilisateur() ?></p>
                            <p>Numéro de téléphone portable : <?= $tableau->getNum_portable_utilisateur() ?></p>
                            <p>Numéro de téléphone domicile : <?= $tableau->getNum_domicile_utilisateur() ?></p>
                            <button type="button" class="btn btn-jaune" data-toggle="modal" data-target="#modal-modification-info-perso">Modifier mes informations personnel</button>
                        </div>
                        <!-- Button trigger modal -->
                                    <!-- Modal -->
                        <div class="modal fade" id="modal-modification-info-perso" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modification info personnel</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="<?= URL ?>compte/modificationInfoPerso/<?= $tableau->getId_utilisateur()?>" method="POST" enctype="multipart/form-data">
                                            <div class="col">
                                                <label for="academie_origine">Académie d"origine :</label>
                                                <select class="custom-select" name="academie_origine">
                                                    <option value="">Selectionner une reponse</option>
                                                    <option value="AIX-MARSEILLE">AIX-MARSEILLE</option>
                                                    <option value="AMIENS">AMIENS</option>
                                                    <option value="BESANCON">BESANCON</option>
                                                    <option value="BORDEAUX">BORDEAUX</option>
                                                    <option value="CAEN">CAEN</option>
                                                    <option value="CLERMONT-FERRAND">CLERMONT-FERRAND</option>
                                                    <option value="CORSE">CORSE</option>
                                                    <option value="DIJON">DIJON</option>
                                                    <option value="GRENOBLE">GRENOBLE</option>
                                                    <option value="CRETEIL">CRETEIL</option>
                                                    <option value="PARIS">PARIS</option>
                                                    <option value="LILLE">LILLE</option>
                                                    <option value="LIMOGES">LIMOGES</option>
                                                    <option value="LYON">LYON</option>
                                                    <option value="MONTPELLIER">MONTPELLIER</option>
                                                    <option value="NANCY-METZ">NANCY-METZ</option>
                                                    <option value="NANTES">NANTES</option>
                                                    <option value="NICE">NICE</option>
                                                    <option value="ORLEANS-TOURS">ORLEANS-TOURS</option>
                                                    <option value="POITIERS">POITIERS</option>
                                                    <option value="REIMS">REIMS</option>
                                                    <option value="RENNES">RENNES</option>
                                                    <option value="ROUEN">ROUEN</option>
                                                    <option value="STRASBOURG">STRASBOURG</option>
                                                    <option value="TOULOUSE">TOULOUSE</option>
                                                    <option value="VERSAILLES">VERSAILLES</option>
                                                    <option value="GUYANE">GUYANE</option>
                                                    <option value="GUADELOUPE">GUADELOUPE</option>
                                                    <option value="MARTINIQUE">MARTINIQUE</option>
                                                    <option value="REUNION">REUNION</option>
                                                    <option value="ST PIERRE ET MIQUELON">ST PIERRE ET MIQUELON</option>
                                                    <option value="NOUVELLE CALEDONIE">NOUVELLE CALEDONIE</option>
                                                    <option value="POLYNESIE FRANCAISE">POLYNESIE FRANCAISE</option>
                                                    <option value="WALLIS ET FUTUNA">WALLIS ET FUTUNA</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="numen">NUMEN :</label>
                                        <!-- Buouton en savoir plus -->
                                                <button type="button" data-toggle="modal" data-target="#Modal1">
                                                    ?
                                                </button>
                                        <!-- boite texte -->
                                                <div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-target="#Modal1">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Il s"agit de votre Numéro d"identification de l"Éducation Nationale (Il se trouve dans votre dossier administratif. Si vous ne le connaissez pas, vous pouvez le demander auprès du secrétariat administratif de votre établissement. Il se compose de 13 caractères, toujours en majuscules)
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control"  name="numen" placeholder="Exemple (inventé): 46G9987654XYZ">
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email_utilisateur">Adresse électronique :</label>
                                                <input type="email" class="form-control"  name="email_utilisateur" id="email-utilisateur" placeholder="Saisir votre adresse email">
                                            </div>
                                            </div>
                                            <div class="col">
                                                <label for="num_portable_utilisateur">Numéro de portable :</label>
                                                <input type="tel" class="form-control"  name="num_portable_utilisateur" id="num-portable-utilisateur" placeholder="Saisir votre numéro de portable">
                                            </div>
                                            <div class="col">
                                                <label for="num_domicile_utilisateur">Numéro de domicile :</label>
                                                <input type="tel" class="form-control"  name="num_domicile_utilisateur" id="num-domicile-utilisateur" placeholder="Saisir votre numéro de domicile">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contenu-adresse" role="tabpanel" aria-labelledby="adresse">
                    <div class="info-perso">
                        <div class="info-utilisateur">
                            <p>Adresse : <?= $tableau->getAdresse_utilisateur() ?></p>
                            <p>Code postale : <?= $tableau->getCp_utilisateur() ?></p>

                            <div class="desktop-p">
                                <p>Ville : <?= $tableau->getVille_utilisateur() ?></p>
                            </div>
                            <div class="mobile-p">
                                <p>Ville : <?= $tableau->getVille_utilisateur() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contenu-etbsmt-principal" role="tabpanel" aria-labelledby="etbsmt-principal">
                    <div class="info-perso">
                        <div class="info-utilisateur">
                            <p>RNE de l'établissement : <?= $etbsmt_principal["rne_etbsmt"] ?></p>
                            <p>Academie de l'établissement: <?= $etbsmt_principal["academie_etbsmt"] ?></p>
                            <p>Nom de l'établissement : <?= $etbsmt_principal["nom_etbsmt_principal"] ?></p>
                            <p>Adresse de l'établissement : <?= $etbsmt_principal["adresse_etbsmt"] ?></p>
                            <p>Code postal de l'établissement : <?= $etbsmt_principal["cp_etbsmt"] ?></p>
                            <p>Ville de l'établissement : <?= $etbsmt_principal["ville_etbsmt"] ?></p>
                            <p>Numéro de l'établissement : <?= $etbsmt_principal["num_etbsmt"] ?></p>
                            <p>Email de l'établissement : <?= $etbsmt_principal["email_etbsmt"] ?></p> 
                            <button type="button" class="btn btn-jaune" data-toggle="modal" data-target="#modal-modification-etbsmt">Modifier informations établissement</button>                               
                        </div>




                        <!-- Modal -->
                        <div class="modal fade" id="modal-modification-etbsmt" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modification Etablissement</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="<?= URL ?>compte/modificationInfoPerso/<?= $tableau->getId_utilisateur()?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="rne-etbsmt">Modifier le RNE de votre établissement principal :</label>
                                                <input type="text" class="form-control" name="rne_etbsmt" id="rne-etbsmt" placeholder="Ex. 0950809F">
                                            </div>
                                            <div class="form-group">
                                                <label for="academie-etbsmt">Académie de l"établissement :</label>
                                                <input type="text" class="form-control" name="academie_etbsmt" id="academie-etbsmt" placeholder="Ex. Notre Dame" >
                                            </div>
                                            <div class="form-group">
                                                <label for="nom-etbsmt-principal">Nom de l"établissement principal :</label>
                                                <input type="text" class="form-control" name="nom_etbsmt_principal" id="nom-etbsmt-principal" placeholder="Ex. Notre Dame">
                                            </div>
                                            <div class="form-group">
                                                <label for="adresse-etbsmt">Adresse de votre établissement principal :</label>
                                                <input type="text" class="form-control" name="adresse_etbsmt" id="adresse-etbsmt" placeholder="Ex. 15 rue du maréchal Joffre 78000 Versailles">
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="cp-etbsmt">Code postal établissement principal :</label>
                                                    <input type="text" class="form-control" name="cp_etbsmt" id="cp-etbsmt" placeholder="Ex. 15 rue du maréchal Joffre 78000 Versailles">
                                                </div>
                                                <div class="col form-group">
                                                    <label for="ville-etbsmt">Ville établissment principal</label>
                                                    <input type="text" class="form-control" name="ville_etbsmt" id="ville-etbsmt" placeholder="Ex. 15 rue du maréchal Joffre 78000 Versailles">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="num-etbsmt">Numéro établissment principal</label>
                                                    <input type="text" class="form-control" name="num_etbsmt" id="num-etbsmt" placeholder="Numéro établissement">
                                                </div>
                                                <div class="col form-group">
                                                    <label for="email-etbsmt">Email établissment principal</label>
                                                    <input type="text" class="form-control" name="email_etbsmt" id="email-etbsmt" placeholder="Adresse mail établissement">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>













                    </div>
                </div>
                <div class="tab-pane fade" id="contenu-voeux-user" role="tabpanel" aria-labelledby="voeux-user">

                    <?php
                    $i = 1;
                    $html = "<div class='info-utilisateur'>";

                    foreach ($demandes as $demande) {

                        if(!empty($demande["voeux"])){
                            foreach ($demande["voeux"]["info_souhait"] as $voeux) {
                                
                                // $i[]=array_count_values($demande["voeux"]);
                                // var_dump($i);

    
                                $html .= "
                                        <fieldset class='info-voeux'>
                                            <div class='info-utilisateur'>
                                                <h4>Souhait numéro " . $i . " | Fait le " . $demande["date_demande"] . " Demande N°".$demande['id_mutation']."</h4>
                                                <hr>
                                                <button type='button' class='btn btn-jaune' data-toggle='modal' data-target='#modal-modification-" . $voeux["id_voeux"] . $i ."'>Modifier mon souhait</button>

                                                <!-- Modal -->
                                                <div class='modal fade' id='modal-modification-" . $voeux["id_voeux"] . $i . "' tabindex='0' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='exampleModalLabel'>Modifier souhait pour l'académie de : " . $voeux["academie_souhaite"]  . "</h5>
                                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                    <span aria-hidden='true'>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class='modal-body'>
                                                            <!-- Formulaire de modification -->
                                                                <form id='form' action='" . URL . "compte/modifierSouhait/" . $voeux["id_voeux"] . "' method='POST' enctype='multipart/form-data'>

                                                                    <div class='form-group'>
                                                                        <label for='academie-souhaite'>Académie souhaité :</label>
                                                                        <select class='custom-select' id='academie-souhaite".$i."'  name='academie_souhaite' onclick='initAcademie(".$i.")'>
                                                                            <option selected required='required' value=''>Selectionner une académie</option>
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

                                                                    <div id='departement".$i."' class='row'>  

                                                                        
                                                                    </div>

                                                                    <div class='row'>
                                                                        <div class='col form-group'>
                                                                            <label for='type-contrat-souhaite'>Type de contrat souhaité :</label>
                                                                            <select class='custom-select' id='type-contrat-souhaite' name='type_contrat_souhaite'>
                                                                                <option selected required='required' value=''>Selectionner votre réponse</option>
                                                                                <option value='Temps complet'>Temps complet</option>
                                                                                <option value='Temps partiel'>Temps partiel</option>
                                                                                <option value='Temps partiel et temps partiel'>Temps partiel et temps partiel</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class='col form-group'>
                                                                            <label for='nb-heures-souhaite'>Nombre d'heures souhaité :</label>
                                                                            <input type='text' class='form-control' id='nb-heures-souhaite' name='nb_heures_souhaite' placeholder='".$voeux["nb_heures_souhaite"]."'>
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
                                                                            <label for='autre_motif'>Si 'Autre', vous avez la possibilité d'expliquer le motif :</label>
                                                                            <input type='text' class='form-control' id='autre-motif' name='autre_motif' placeholder='".$voeux["autre_motif"]."'>
                                                                        </div>
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                        <h4>Téléchargé vos documents :</h4>
                                                                        <div class='form-group'>
                                                                            <label for='justificatif-motif'>Joindre votre justificatif de motif :</label><br>
                                                                            <input type='file' class='form-control' id='justificatif-motif' name='justificatif_motif'>
                                                                            <!-- <input type='file' name='justificatif_motif' id='justificatif-motif' accept='application/pdf, application/docx, application/doc, application/odt' title='Taille maximale autorisée: 2Mo'> -->
                                                                            <!-- SÉCURITÉ ANTI BOT -->
                                                                            <!-- <input type='hidden' name='MAX_FILE_SIZE' value='2097152'> -->
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label for='contrat'>Joindre votre contrat :</label><br>
                                                                            <input type='file' class='form-control' id='contrat' name='contrat'>
                                                                            <!-- <input type='file' name='justificatif_motif' id='justificatif-motif' accept='application/pdf, application/docx, application/doc, application/odt' title='Taille maximale autorisée: 2Mo'> -->
                                                                            <!-- SÉCURITÉ ANTI BOT -->
                                                                            <!-- <input type='hidden' name='MAX_FILE_SIZE' value='2097152'> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>
                                                                        <button type='submit' class='btn btn-sinscrire'>Modifier</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type='button' class='btn btn-sinscrire' data-toggle='modal' data-target='#modal-suppression-" . $voeux["id_voeux"] . "'>Supprimer mon souhait</button>

                                                <!-- Modal -->
                                                <div class='modal fade' id='modal-suppression-" . $voeux["id_voeux"] . "' tabindex='0' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='exampleModalLabel'>Supprimer mon souhait</h5>
                                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                    <span aria-hidden='true'>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <form id='form' action='" . URL . "compte/supprimerSouhait/" . $voeux["id_voeux"] . "'>
                                                                    <p>Etes-vous sur de vouloir supprimer votre voeux pour l'academie de : " . $voeux["academie_souhaite"]  . " ?</p>
                                                                    <div class='modal-footer'>
                                                                        <button type='button' class='btn btn-option' data-dismiss='modal'>Fermer</button>
                                                                        <button type='submit' class='btn btn-sinscrire'>Supprimer</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>";

                                                if(empty($voeux["justificatif_motif"])){
                                                $html .="<h4>Il vous manque un justificatif pour la raison : " . $voeux['motif_demande'] ."</h4>";
                                                }
                                                if(empty($demande["contrat"])){
                                                $html .="<h4>Vous n'avez pas fournit votre contrat comme pièce justificatif</h4>";
                                                }

                                $html .="       
                                                <p>Type de contrat souhaité: " . $voeux["type_contrat_souhaite"] . "</p>
                                                <p>Nombre d'heures souhaité : " . $voeux["nb_heures_souhaite"] . "</p>
                                                <p>Motif de la demande : " . $voeux["motif_demande"] . "</p>
                                                <p>Autre motif de la demande : " . $voeux["autre_motif"] . "</p>
                                                <p>Justificatif du motif de la demande : " . $voeux["justificatif_motif"]  . "</p>   
                                                <p>Academie souhaité : " . $voeux["academie_souhaite"]  . "</p>                                       
                                            </div>";
                            
                            
                                foreach($demande["voeux"]["dept_souhaite"] as $dept=>$value){

                                    if($dept === $voeux["academie_souhaite"]){

                                        $html .="
                                                    <div id='geo'>
                                                        <h4>Departement souhaité :</h4>";

                                            if(!empty($value["sql1"])){
                                                $html .="
                                                        <p>1er département souhaité : " . $value["sql1"]["nom_departement"] . " " . $value["sql1"]["code_iso"] . "</p>
                                                ";
                                            }

                                            if(!empty($value["sql2"])){
                                                $html .="
                                                        <p>2eme département souhaité : " . $value["sql2"]["nom_departement"] . " " . $value["sql2"]["code_iso"] . "</p>
                                                ";
                                            }

                                            if(!empty($value["sql3"])){
                                                $html .="
                                                        <p>3eme département souhaité : " . $value["sql3"]["nom_departement"] . " " . $value["sql3"]["code_iso"] . "</p>
                                                ";
                                            }

                                            if(!empty($value["sql4"])){
                                                $html .="
                                                        <p>4eme département souhaité : " . $value["sql4"]["nom_departement"] . " " . $value["sql4"]["code_iso"] . "</p>
                                                ";
                                            }

                                            if(!empty($value["sql5"])){
                                                $html .="
                                                        <p>5eme département souhaité : " . $value["sql5"]["nom_departement"] . " " . $value["sql5"]["code_iso"] . "</p>
                                                ";
                                            }

                                            if(!empty($value["sql6"])){
                                                $html .="
                                                        <p>6eme département souhaité : " . $value["sql6"]["nom_departement"] . " " . $value["sql6"]["code_iso"] . "</p>
                                                ";
                                            }

                                            if(!empty($value["sql7"])){
                                                $html .="
                                                        <p>7eme département souhaité : " . $value["sql7"]["nom_departement"] . " " . $value["sql7"]["code_iso"] . "</p>
                                                ";
                                            }

                                            if(!empty($value["sql8"])){
                                                $html .="
                                                        <p>8eme département souhaité : " . $value["sql8"]["nom_departement"] . " " . $value["sql8"]["code_iso"] . "</p>
                                                ";
                                            }
                                    }
                                                
                                }

                                $html .="
                                            </div>
                                        </fieldset>";
                                $i++;
                            }
                        }
                    }
                    $html .= "</div>";
                    echo $html;
                    ?>

                </div>
            </div>

        </div>

        <!-- Archive utilisateur -->
        <!-- <div class="slide">
            <a id="btn-archive" href="#">Demande en cours</a>
        </div> -->
        <?php
        if (!empty($demandes)) {
            // var_dump($info);
            $html = "<table class='table table-striped table-hover table-dark'>
                        <thead>
                            <tr>
                                <th id='table_date'>Numero demande</th>
                                <th id='table_date'>Date demande</th>
                                <th id='table_date2'> <img src='../public/img/calender.svg' alt='calendrier'></th>
                                <th>Type demande</th>
                                <th>Academie souhaitée</th>
                                <th class='document'>Document demande</th>
                            </tr>
                        </thead>
                        <tbody>
                        ";
            foreach ($demandes as $demande) {
                if (!empty($demande["voeux"])) {


                    foreach ($demande["voeux"]["info_souhait"] as $voeux) {


                        $html .= "<tr>
                    <td>" . $demande["id_mutation"] . "</td>
                    <td>" . $demande["date_demande"] . "</td>
                    <td>" . $demande["type_mutation"] . "</td>
                    <td>" . $voeux["academie_souhaite"] . "</td>

                    </tr> ";
                    }
                }else{
                    $supprim=$this->supprimerDemande($demande['id_mutation']);
                }
            }
            $html .= "</tbody>
                    </table>";
            echo $html;
        }
        ?>
    </div>


    <!-- footer -->
    <div>
        <footer id="footer">
            <ul>
                <img src="../public/img/logo/logo_Versailles.jpg" alt="Logo Académie Versailles">
            </ul>
            <ul>
                <li>Nos engagements</li>
                <li>CGV</li>
                <li>Mentions légales</li>
                <li>Sitemap</li>
            </ul>
            <ul>
                <li>Qui sommes-nous ?</li>
                <li>S'inscrire</li>
                <li>Nos partenaires</li>
                <li>F.A.Q</li>
            </ul>
            <ul>
                <li>Contacts</li>
                <div>
                    15 rue du Maréchal Joffre
                    78000 VERSAILLES

                    Adresse mail : academie.versailles@gmail.com
                    Téléphone : 01-69-18-82-82
                </div>
            </ul>
        </footer>
    </div>



    <!-- FOOTER -->
    <footer id="footer2">
        <p class="float-right"><a href="#">Haut de page</a></p>
        <p>&copy; 2017-2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>


</body>

</html>