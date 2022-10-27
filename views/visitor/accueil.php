<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="public/css/accueil.css">

  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="public/js/accueil.js" defer></script>
  <title><?= $titre ?></title>
</head>


<body>

  <!-- nav bar -->
  <header>


    <!-- nav bar -->
    <nav id="nav-top" class="navbar navbar-expand-md navbar-dark fixed">

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
                <button type="button" class="btn btn-sinscrire" data-toggle="modal" data-target="#modal_inscription">Je candidate</button>

                <!-- Modal -->
                <div class="modal fade" id="modal_inscription" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Je candidate au mouvement des maîtres</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- Formulaire d'inscription -->
                        <form id="form" action="<?= URL ?>inscription" method="POST" enctype="multipart/form-data">

                          <div class="row ">
                            <div class="col form-group input">
                              <label for="identifiant-utilisateur">Identifiant :</label>
                              <input type="text" name="identifiant_utilisateur" class="form-control" id="identifiant-utilisateur" required pattern="[A-Z a-z]{5,15}[0-9]{0,9}">
                            </div>
                            <div class="col form-group input">
                              <label for="mdp-utilisateur">Mot de passe :</label>
                              <input type="password" name="mdp_utilisateur" class="form-control" id="mdp-utilisateur" required pattern="[A-Z a-Z]{5,15}[0-9]{0,9}">
                            </div>
                            <!-- <div class="inputsubmit" onclick="document.fo.submit()"> Authentification

                            </div> -->
                          </div>

                          <div class="row">
                            <div class="col">
                              <label for="academie_origine">Académie d'origine :</label>

                              <select class="custom-select" name="academie_origine">

                                <option selected required="required">Selectionner votre réponse</option>
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
                                        Il s'agit de votre Numéro d'identification de l"Éducation Nationale (Il se trouve dans votre dossier administratif. Si vous ne le connaissez pas, vous pouvez le demander auprès du secrétariat administratif de votre établissement. Il se compose de 13 caractères, toujours en majuscules)
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <input type="text" class="form-control" required pattern="[0-9]{10}[A-Z]{3}" name="numen" placeholder="Exemple (inventé): 46G9987654XYZ">
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="discipline_contrat">Discipline de Contrat :</label>
                                <select class="custom-select" name="discipline_contrat">
                                  <option selected>Selectionner votre discipline</option>
                                  <option value="ALLEMAND">ALLEMAND</option>
                                  <option value="ANGLAIS">ANGLAIS</option>
                                  <option value="ARTS APPLIQUES OPTION METIERS D'ARTS">ARTS APPLIQUES OPTION METIERS D'ARTS</option>
                                  <option value="ARTS PLASTIQUES">ARTS PLASTIQUES</option>
                                  <option value="AUTRE">AUTRE</option>
                                  <option value="BIOCHIMIE-GENIE BIOLOGIQUE">BIOCHIMIE-GENIE BIOLOGIQUE</option>
                                  <option value="BIOTECHNOLOGIES SANTE-ENVIRONNEMENT">BIOTECHNOLOGIES SANTE-ENVIRONNEMENT</option>
                                  <option value="BIOTECHNOLOGIES SANTE-ENVIRONNEMENT(E F)">BIOTECHNOLOGIES SANTE-ENVIRONNEMENT(E F)</option>
                                  <option value="CHEF DE TRAVAUX SC ET TECH.INDUSTRIELLES">CHEF DE TRAVAUX SC ET TECH.INDUSTRIELLES</option>
                                  <option value="CHEF DE TRAVAUX TERTIAIRES">CHEF DE TRAVAUX TERTIAIRES</option>
                                  <option value="CHINOIS">CHINOIS</option>
                                  <option value="COMPOSITION EN FORME IMPRIMANTE">COMPOSITION EN FORME IMPRIMANTE</option>
                                  <option value="CONSTRUCTION ET REPARATION CARROSSERIE">CONSTRUCTION ET REPARATION CARROSSERIE</option>
                                  <option value="CUISINE">CUISINE</option>
                                  <option value="CYCLES ET MOTOCYCLES">CYCLES ET MOTOCYCLES</option>
                                  <option value="DESSIN D'ART APPLIQUE AUX METIERS">DESSIN D'ART APPLIQUE AUX METIERS</option>
                                  <option value="DOCUMENTATION">DOCUMENTATION</option>
                                  <option value="EBENISTERIE">EBENISTERIE</option>
                                  <option value="ECO ET GEST.OPTION COMM, ORG, GRH">ECO ET GEST.OPTION COMM, ORG, GRH</option>
                                  <option value="ECO-GEST OPTION COMMERCE ET VENTE">ECO-GEST OPTION COMMERCE ET VENTE</option>
                                  <option value="ECO-GEST OPTION GESTION-ADMINISTRATION">ECO-GEST OPTION GESTION-ADMINISTRATION</option>
                                  <option value="ECO-GEST.OPTION COMPTABILITE ET FINANCE">ECO-GEST.OPTION COMPTABILITE ET FINANCE</option>
                                  <option value="ESPAGNOL">ESPAGNOL</option>
                                  <option value="GENIE ELECTRIQUE OPTION ELECTROTECHNIQUE">GENIE ELECTRIQUE OPTION ELECTROTECHNIQUE</option>
                                  <option value="GENIE ELECTRIQUE: ELECTRONIQUE">GENIE ELECTRIQUE: ELECTRONIQUE</option>
                                  <option value="GENIE INDUSTRIEL BOIS">GENIE INDUSTRIEL BOIS</option>
                                  <option value="GENIE MECANIQUE CONSTRUCTION">GENIE MECANIQUE CONSTRUCTION</option>
                                  <option value="GENIE MECANIQUE MAINTENANCE">GENIE MECANIQUE MAINTENANCE</option>
                                  <option value="GENIE MECANIQUE PRODUCTIQUE">GENIE MECANIQUE PRODUCTIQUE</option>
                                  <option value="GENIE MECANIQUE-MAINTENANCE VEHICULES">GENIE MECANIQUE-MAINTENANCE VEHICULES</option>
                                  <option value="GESTION ET INFORMATIQUE">GESTION ET INFORMATIQUE</option>
                                  <option value="HEBREU">HEBREU</option>
                                  <option value="HISTOIRE GEOGRAPHIE">HISTOIRE GEOGRAPHIE</option>
                                  <option value="HORTICULTURE">HORTICULTURE</option>
                                  <option value="HOTELLERIE OPT SERVICE ET COMMERCIALISAT">HOTELLERIE OPT SERVICE ET COMMERCIALISAT</option>
                                  <option value="HOTELLERIE OPT TECHNIQUES CULINAIRES">HOTELLERIE OPT TECHNIQUES CULINAIRES</option>
                                  <option value="HOTEL-REST OPTION SERV ET ACCUEIL">HOTEL-REST OPTION SERV ET ACCUEIL</option>
                                  <option value="IMPRESSION (LIVRE ET IMAGE)">IMPRESSION (LIVRE ET IMAGE)</option>
                                  <option value="INFORMATIQUE&TELEMATIQUE">INFORMATIQUE&TELEMATIQUE</option>
                                  <option value="ITALIEN">ITALIEN</option>
                                  <option value="JAPONAIS">JAPONAIS</option>
                                  <option value="LETTRES ANGLAIS">LETTRES ANGLAIS</option>
                                  <option value="LETTRES CLASSIQUES">LETTRES CLASSIQUES</option>
                                  <option value="LETTRES ESPAGNOL">LETTRES ESPAGNOL</option>
                                  <option value="LETTRES HISTOIRE GEOGRAPHIE">LETTRES HISTOIRE GEOGRAPHIE</option>
                                  <option value="LETTRES MODERNES">LETTRES MODERNES</option>
                                  <option value="MATH.SCIENCES PHYSIQUES">MATH.SCIENCES PHYSIQUES</option>
                                  <option value="MATHEMATIQUES">MATHEMATIQUES</option>
                                  <option value="OPTIQUE (LUNETTERIE,PRECISION,COMPOSANTS">OPTIQUE (LUNETTERIE,PRECISION,COMPOSANTS</option>
                                  <option value="PHILOSOPHIE">PHILOSOPHIE</option>
                                  <option value="PORTUGAIS">PORTUGAIS</option>
                                  <option value="PREVENTION ET SECURITE">PREVENTION ET SECURITE</option>
                                  <option value="RUSSE">RUSSE</option>
                                  <option value="SCIENCES DE LA VIE ET DE LA TERRE">SCIENCES DE LA VIE ET DE LA TERRE</option>
                                  <option value="SCIENCES ECONOMIQUES ET SOCIALES">SCIENCES ECONOMIQUES ET SOCIALES</option>
                                  <option value="SCIENCES ET TECHNIQUES MEDICO-SOCIALES">SCIENCES ET TECHNIQUES MEDICO-SOCIALES</option>
                                  <option value="SCIENCES PHYSIQUES ET CHIMIQUES">SCIENCES PHYSIQUES ET CHIMIQUES</option>
                                  <option value="SII OPT INGENIERIE ELECTRIQUE">SII OPT INGENIERIE ELECTRIQUE</option>
                                  <option value="SII OPT INGENIERIE INFORMATIQUE">SII OPT INGENIERIE INFORMATIQUE</option>
                                  <option value="SII OPTION INGENIERIE MECANIQUE">SII OPTION INGENIERIE MECANIQUE</option>
                                  <option value="TECHNOLOGIE">TECHNOLOGIE</option>
                                  <option value="ULIS">ULIS</option>
                                  <option value="JAPONAIS">JAPONAIS</option>
                                </select>
                              </div>
                            </div>
                            <div class="col">
                              <label for="nom_spe">Spécialité enseigné :</label>
                              <input type="text" class="form-control" name="nom_spe" id="nom_spe" placeholder="Saisir votre spécialité enseigné">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <label for="option discipline">Secteur activité :</label>
                              <!-- <div class="row"> -->
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="spe_college" value="Collège">
                                <label class="form-check-label">
                                  Collège
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="spe_lycee_pro" id="" value="Lycée professionnel">
                                <label class="form-check-label">
                                  Lycée professionnel
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="spe_lycee_gen" id="" value="Lycée général">
                                <label class="form-check-label">
                                  Lycée général
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="spe_lycee_tech" id="" value="Lycée technique">
                                <label class="form-check-label">
                                  Lycée technique
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="spe_post_bac" id="" value="POST BAC">
                                <label class="form-check-label">
                                  POST BAC
                                </label>
                              </div>
                              <!-- </div> -->
                            </div>
                            <div class="col">
                              <label for="civilite-utilisateur">Civilité :</label>
                              <div class="row w-75 ml-2">
                                <div class="form-check">
                                  <input class="form-check-input" required="required" type="radio" name="civilite_utilisateur" id="monsieur" value="Monsieur">
                                  <label class="form-check-label" for="civilite-utilisateur">
                                    Monsieur
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="civilite_utilisateur" id="madame" value="Madame">
                                  <label class="form-check-label" for="civilite-utilisateur">
                                    Madame
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">
                              <label for="situation-maritale">Situation maritale :</label>

                              <select class="custom-select" id="situation-maritale" name="situation_maritale">

                                <option selected required="required">Selectionner votre réponse</option>
                                <option value="Célibataire">Célibataire</option>
                                <option value="Marié">Marié</option>
                                <option value="Pacsé">Pacsé</option>
                              </select>
                            </div>
                            <div class="col">
                              <label for="date-naissance-utilisateur">Date de naissance :</label>
                              <input type="date" class="form-control" required="required" min="1917-01-01" max="2080-04-30" name="date_naissance_utilisateur" id="date-naissance-utilisateur">
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">
                              <label for="nom-utilisateur">Nom d'usage:</label>
                              <input type="text" class="form-control" required pattern="[A-Za-zéè-ëüêùâç' -]{2,35}" name="nom_utilisateur" id="nom-utilisateur" placeholder="Saisir votre nom">
                            </div>
                            <!-- <br> -->
                            <div class="col">
                              <label for="prenom-utilisateur">Prénom :</label>
                              <input type="text" class="form-control" required pattern="[A-Za-zéè-ëüêùâç' -]{2,35}" name="prenom_utilisateur" id="prenom-utilisateur" placeholder="Saisir votre prénom">
                            </div>
                          </div>
                          <br>
                          <div id="nom-naissance" class="form-group">
                            <label for="input-nom-naissance">Nom de naissance :</label>
                            <input type="text" class="form-control" id="input-nom-naissance" name="nom_naissance_utilisateur" placeholder="Saisir votre nom de naissance">
                          </div>
                          <div class="form-group">
                            <label for="adresse-utilisateur">Adresse :</label>
                            <input type="text" class="form-control" required pattern="[0-9 A-Za-zéè-ëüêâùç' -]{5,35}" name="adresse_utilisateur" id="adresse-utilisateur" placeholder="Ex: 2 rue du palais">
                          </div>
                          <div class="row">
                            <div class="col">
                              <label for="cp-utilisateur">Code postal :</label>
                              <input type="text" class="form-control" required pattern="[0-9]{5}" name="cp_utilisateur" id="cp-utilisateur" placeholder="Ex: 75000">
                            </div>
                            <br>
                            <div class="col">
                              <label for="ville-utilisateur">Ville :</label>
                              <input type="text" class="form-control" required pattern="[A-Za-zéè-ëüêâùç.' -]{3,35}" name="ville_utilisateur" id="ville-utilisateur" placeholder="Ex: PARIS">
                            </div>
                          </div>
                          <br>
                          <p>Coordonnées :</p>
                          <p> (Il est impératif de pouvoir vous joindre par téléphone lors des opérations du mouvement des maîtres)</p>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="email_utilisateur">Adresse électronique :</label>
                                <input type="email" class="form-control" required pattern="^[0-9A-Za-z]+@{1}[0-9A-Za-z]+\.{1}[0-9A-Za-z]{2,}$" name="email_utilisateur" id="email-utilisateur" placeholder="Saisir votre adresse email">
                              </div>
                            </div>
                            <div class="col">
                              <label for="num_portable_utilisateur">Numéro de portable :</label>
                              <input type="tel" class="form-control" required pattern="[0-9]{10}" name="num_portable_utilisateur" id="num-portable-utilisateur" placeholder="Saisir votre numéro de portable">
                            </div>
                            <div class="col">
                              <label for="num_domicile_utilisateur">Numéro de domicile :</label>
                              <input type="tel" class="form-control" pattern="[0-9]{10}" name="num_domicile_utilisateur" id="num-domicile-utilisateur" placeholder="Saisir votre numéro de domicile">
                            </div>
                          </div>
                          <br>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-option" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-sinscrire">Inscrivez-vous</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="" data-toggle="modal" data-target="#modal_connexion"><span class="iconify" data-icon="clarity:avatar-solid">Connexion</span></a>

                <!-- Modal -->
                <div class="modal fade" id="modal_connexion" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="<?= URL ?>validation" method="POST" enctype='multipart/form-data'>
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="identifiant_utilisateur">Identifiant :</label>
                            <input type="text" name="identifiant_utilisateur" class="form-control " id="identifiant_utilisateur">
                          </div>
                          <div class="form-group" id="show-mdp">
                            <label for="mdp_utilisateur">Mot de passe :</label>
                            <input type="password" name="mdp_utilisateur" class="form-control " placeholder="mot de passe" id="mdp_utilisateur">
                            <img  src="./public/img/hide.png" id="eyes" alt=""  onclick="changer()"/>
                          

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-option" data-dismiss="modal">Fermer</button>
                          <button type="submit" class="btn btn-sinscrire">Se connecter</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </li>
            <?php else : ?>
              <div class="d-flex bd-highlight mb-3">
                <div class="ml-auto p-2 bd-highlight"><a class="btn" href="<?= URL ?>compte/profile">Mon compte</a></div>
            <?php endif; ?>
            <?php
            if (!empty($_SESSION['admin']) || !empty($_SESSION["utilisateur"])) :
            ?>
                <div class="ml-auto p-2 bd-highlight"><a class="btn" href="<?= URL ?>compte/deconnexion">Se déconnecter</a></div>
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

  <div class="row" id="head">
    <!-- Logo -->
    <div class=" col-12 col-md-6  ">
      <!-- <figure> -->
      <img id="logo" src="./public/img/logo/logo_CAEVersailles.jpg" alt="Logo Académie Versailles">
      <!-- </figure> -->
    </div>

    <!-- Carroussel -->
    <div class="col-12 col-md-6 auto">
      <div id="caroussel" class="carousel slide" data-ride="carousel">
        <?php 
          $i = 0;
          $html = "<ol class='carousel-indicators'>";
          $clone_actualites = $actualites;
          if(!empty($actualites)){
            foreach($actualites as $actualite){
            $html .="
                <li data-target='#caroussel' data-slide-to='" . $i . "' class='active'></li>
              ";
              $i++;
            }
            $html .="
              </ol>
              <div class='carousel-inner'>
            ";
                  foreach($actualites as $actualite){
                    $html .="
                      <div class='carousel-item active'>
                        <img src='./public/img/carroussel/Webp.net-resizeimage (1).jpg' alt='...'>
                        <div class='carousel-caption d-none d-md-block'>
                          <h5 class='card-title'>" . $actualite->get_titre() . "</h5>
                          <p>" . $actualite->get_description() . "</p>
                          <p>Du " . $actualite->get_date_debut() . " au " . $actualite->get_date_fin() . "</p>
                        </div>
                      </div>
                    ";
                    break;
                    // var_dump($actualite);
                  }
                  if(isset($actualites[0]) && !empty($actualites[0])){
                    unset($clone_actualites[0]);
                    foreach($clone_actualites as $actualite){
                      $html .="
                        <div class='carousel-item'>
                          <img src='./public/img/carroussel/Webp.net-resizeimage (1).jpg' alt='...'>
                          <div class='carousel-caption d-none d-md-block'>
                            <h5 class='card-title'>" . $actualite->get_titre() . "</h5>
                            <p>" . $actualite->get_description() . "</p>
                            <p>Du " . $actualite->get_date_debut() . " au " . $actualite->get_date_fin() . "</p>
                          </div>
                        </div>
                      ";
                      // var_dump($actualite);
                    }
                  }
            $html .="
              </div>
              <button class='carousel-control-prev' type='button' data-target='#caroussel' data-slide='prev'>
                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                <span class='sr-only'>Previous</span>
              </button>
              <button class='carousel-control-next' type='button' data-target='#caroussel' data-slide='next'>
                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                <span class='sr-only'>Next</span>
              </button>
            ";
            echo $html;
            // var_dump($i);
          }
        ?>     
      </div>  
    </div>
  </div>


  <!-- Contenu page -->

  <div id="contenu">

    <div class="mvt-maitres col-12 col-md-9">
      <br>
      <div id="quisommesnous">
        <hr>
        <h3>Mouvement des maîtres du 2nd degré</h3>
        <hr>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, assumenda. Temporibus dolor, fuga voluptatibus dicta ipsa tempore ullam maxime et, impedit praesentium, unde molestiae? Pariatur quae fugit rerum minima dicta. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet perspiciatis vel, molestias provident mollitia nemo deserunt repudiandae autem quos impedit, maiores cum libero officia expedita dolor in vero eligendi? Culpa? Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quis fugit voluptatem provident cumque cupiditate eos unde natus, assumenda quaerat ex quia! Quo recusandae explicabo commodi repudiandae nostrum! Ipsum, veniam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit beatae ratione harum nisi, molestiae nihil, veniam enim ea ullam sequi recusandae amet aliquid voluptas dignissimos. Natus quis tempora esse sed? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui consectetur accusantium, voluptatum impedit neque quibusdam facilis nihil voluptate optio iste dolores, exercitationem quis ipsa explicabo provident! Voluptatem libero optio soluta.</p>
      </div>
      <br>
      <br>



      <!-- Accordeon -->
      <div class="accordion" id="accordeon">

        <!-- Rubrique S'informer -->
        <div class="card" id="card-sinformer">
          <div id="sinformer" class="card-header" id="headingOne">
            <h2 class="col-xxl-12">
              <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <p class="titre-menu">S'informer</p>
              </button>
            </h2>
          </div>

          <!-- Contenu "S'informer" : Texte réglementaire -->
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordeon">
            <div class="card-body">

              <div class="btn-group-vertical" role="group" aria-label="Button group with nested dropdown">

                <div class="btn-group" role="group" id="opt-txt-reglementaire">
                  <button type="button" class="btn btn-outline-info dropdown-toggle" id="style-btn-sinformer" data-toggle="dropdown" aria-expanded="false">
                    Texte réglementaire
                  </button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="./public/doc-rubrique/rubrique-texte-reglementaire/texte-reglementaires/2016_modalites_applications_cne2.pdf" target="_blank">Modalités 2016</a>
                    <a class="dropdown-item" href="./public/doc-rubrique/rubrique-texte-reglementaire/texte-reglementaires/accordEmploi2nd.pdf" target="_blank">Accord emploi</a>
                    <a class="dropdown-item" href="./public/doc-rubrique/rubrique-texte-reglementaire/texte-reglementaires/circulaire 2005.pdf" target="_blank">Circulaire 2005</a>
                    <a class="dropdown-item" href="./public/doc-rubrique/rubrique-texte-reglementaire/texte-reglementaires/Circulaire 2007-078 Mvt des maîtres.pdf" target="_blank">Circulaire 2007 mouvement des maîtres</a>
                  </div>
                </div>
                <br>

                <button type="button" class="btn btn-outline-info" id="style-btn-sinformer">Accord Collégial</button>
                <br>
                <button type="button" class="btn btn-outline-info" id="style-btn-sinformer">Calendrier du mouvement des maîtres</button>
                <br>
                <button type="button" class="btn btn-outline-info" id="style-btn-sinformer">Liste des établissements de l'académie</button>
                <br>
                <button type="button" class="btn btn-outline-info" id="style-btn-sinformer">Liste des académie</button>
                <br>
                <button type="button" class="btn btn-outline-info" id="style-btn-sinformer">Membre de la CAE</button>
                <br>

              </div>


            </div>
          </div>
        </div>

        <!-- Rubrique S'inscrire -->
        <div class="card" id="card-sinscrire">
          <div id="je-candidate" class="card-header" id="headingTwo">
            <h2 class="col-xxl-12">
              <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <p class="titre-menu">Je candidate au mouvement</p>
              </button>
            </h2>
          </div>


          <!-- Contenu rubrique "S'inscrire" -->
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordeon">
            <div class="card-body" id="card">
              <div id="info-inscription" class="container">
                <p class="texte-shadow">Texte explicatif d'incription : Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt rem voluptas, veniam quas repellendus optio enim a voluptates? Veniam vel quod alias minima consectetur tenetur eos esse dolorum dolor eius.
                </p>
                <button type="button" class="btn btn-sinscrire" data-toggle="modal" data-target="#modal_inscription">Je candidate</button>


              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="actu container">
      <h1>Actualités</h1>

      <?php
      if (!empty($actualites)) {
        foreach ($actualites as $actualite) {
          // var_dump($actualite);
          $html = "
            <div class='card mb-2'>
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

  </div>


  <!-- Nos Partenaires -->
  <!-- <div class="partenaire text-center">
    <figure m-5>
      <figcaption>Nos partenaires</figcaption>
      <img src="./public/img/logo-partenaires/logocompany.jpg" alt="Logo Company">
      <img src="./public/img/logo-partenaires/logocompany.jpg" alt="Logo Company">
      <img src="./public/img/logo-partenaires/logocompany.jpg" alt="Logo Company">
      <img src="./public/img/logo-partenaires/logocompany.jpg" alt="Logo Company">
      <img src="./public/img/logo-partenaires/logocompany.jpg" alt="Logo Company">
    </figure>
  </div> -->

  <!-- footer -->
  <div>
    <footer id="footer">
      <ul>
        <img src="./public/img/logo/logo_Versailles.jpg" alt="Logo Académie Versailles">
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
        <li>Contact</li>
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


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>