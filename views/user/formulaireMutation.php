<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../public/css/form.mutation.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script>
        window.myUrl = "<?= URL ?>"
        console.log(window);
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../../public/js/formulaire.mutation.js" defer></script>



    <title>Test Formulaire</title>
</head>

<body>
    <header>
        <!-- nav bar -->
        <nav id="nav-top" class="navbar navbar-expand-md navbar-dark fixed">

            <img src="../../public/img/logo/logo_Versailles.jpg" class="" alt="logo-CAE">
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
                                <div id="deco" class="ml-auto p-2 bd-highlight"><a class="btn" href="<?= URL ?>compte/deconnexion">Se d??connecter</a></div>
                            </div>
                        <?php endif; ?>
                    </ul>

                </div>
        </nav>
        <!-- <div class="head">
            <h2> C'est facile !</h2>
            <p>Remplissez le formulaire de mutation en vous aidant Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci ipsam a ullam numquam dolore consequuntur, tempora rerum, temporibus quis.</p>

            <h3>Pour commencer, entr?? le RNE de votre ??tablissement principal</h3>
            <a href="#rne-etbsmt">RNE</a> -->
        <!-- <img src="../../public/img/femme.jpg" alt="Femme Tableau"> -->
        <!-- </div> -->
    </header>

    <div class="contenu">
        <div class="jumbotron">
            <h1 class="display-4">DEMANDE DE MUTATION DE <?= $tableau->getCivilite_utilisateur(), " ", $tableau->getNom_utilisateur() ?></h1>
            <p class="lead">COMMISSION ACAD??MIQUE DE L'EMPLOI DE VERSAILLES</p>
            <hr class="my-4">
            <p>Secr??taire acad??mique : (ADRESSE EMAIL A METTRE) 01 30 83 05 03</p>
            <p>15 rue du Mar??chal Joffre 78000 VERSAILLES</p>
        </div>

        <form action="<?= URL ?>compte/mutation/<?= $tableau->getId_utilisateur() ?>" method="POST" enctype="multipart/form-data">

            <div class="page" id="page1">
                <div class="info-user">
                    <!-- <form action="" method="post"> -->
                    <h2>I. IDENTIT?? DU DEMANDEUR</h2>
                    <p>(Il s'agit de vos donn??es personnelles. Celles-ci seront uniquement utilis??es dans le cadre du mouvement des ma??tres)</p>

                    <div class="row">
                        <div class="col">
                            <label for="academie_origine">Acad??mie d'origine :</label>
                            <input type="text" class="form-control" placeholder="<?= $tableau->getAcademie_origine() ?>" disabled>
                        </div>
                        <div class="col">
                            <label for="numen">NUMEN :</label>
                            <input type="text" class="form-control" required pattern="[0-9]{10}[A-Z]{3}" name="numen" id="numen" placeholder="<?= $tableau->getNumen() ?>" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="civilite_utilisateur">Civilit??</label>
                            <input class="form-control" required="required" type="text" name="civilite_utilisateur" id="monsieur" value="monsieur" placeholder="<?= $tableau->getCivilite_utilisateur() ?>" disabled>
                        </div>
                        <div class="col">
                            <label for="date_naissance_utilisateur">Date de naissance :</label>
                            <input type="text" class="form-control" required="required" name="date_naissance_utilisateur" id="date_naissance_utilisateur" placeholder="<?= $tableau->getDate_naissance_utilisateur() ?>" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="nom_utilisateur">Nom :</label>
                            <input type="text" class="form-control" required pattern="[A-Za-z????-????????????' -]{2,35}" name="nom_utilisateur" id="nom_utilisateur" placeholder="<?= $tableau->getNom_utilisateur() ?>" disabled>
                        </div>

                        <?php
                        if ($tableau->getCivilite_utilisateur() === "Madame") {
                            $html = "<div class='col'>
                           <label for='nom_jeunefille'>Nom naissance :</label>
                           <input type='text' class='form-control' placeholder='" . $tableau->getNom_naissance_utilisateur() . "' disabled>
                       </div>";
                            echo $html;
                        }
                        ?>
                        <div class="col">
                            <label for="prenom_utilisateur">Pr??nom :</label>
                            <input type="text" class="form-control" required pattern="[A-Za-z????-????????????' -]{2,35}" name="prenom_utilisateur" id="prenom_utilisateur" placeholder="<?= $tableau->getPrenom_utilisateur() ?>" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="adresse_utilisateur">Adresse :</label>
                            <input type="text" class="form-control" required pattern="[0-9 A-Za-z????-????????????' -]{5,35}" name="adresse_utilisateur" id="adresse_utilisateur" placeholder="<?= $tableau->getAdresse_utilisateur() ?>" disabled>
                        </div>
                        <div class="col">
                            <label for="cp_utilisateur">Code postal :</label>
                            <input type="text" class="form-control" required pattern="[0-9]{5}" name="cp_utilisateur" id="cp_utilisateur" placeholder="<?= $tableau->getCp_utilisateur() ?>" disabled>
                        </div>
                        <br>
                        <div class="col">
                            <label for="ville_utilisateur">Ville :</label>
                            <input type="text" class="form-control" required pattern="[A-Za-z????-????????????.' -]{3,35}" name="ville_utilisateur" id="ville_utilisateur" placeholder="<?= $tableau->getVille_utilisateur() ?>" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="email_utilisateur">Adresse email :</label>
                            <input type="text" class="form-control" required pattern="^[0-9A-Za-z]+@{1}[0-9A-Za-z]+\.{1}[0-9A-Za-z]{2,}$" name="email_utilisateur" id="email_utilisateur" placeholder="<?= $tableau->getEmail_utilisateur() ?>" disabled>
                        </div>
                        <div class="col">
                            <label for="num_portable_utilisateur">Portable :</label>
                            <input type="text" class="form-control" required pattern="[0-9  ]{10}" name="num_portable_utilisateur" id="num_portable_utilisateur" placeholder="<?= $tableau->getNum_portable_utilisateur() ?>" disabled>
                        </div>
                        <br>
                        <div class="col">
                            <label for="num_domicile_utilisateur">Domicile :</label>
                            <input type="tel" class="form-control" required pattern="[0-9]{10}" name="num_domicile_utilisateur" id="num_domicile_utilisateur" placeholder="<?= $tableau->getNum_domicile_utilisateur() ?>" disabled>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
                <!-- <php var_dump($etablissement[5]["rne_etbsmt"]) ?> -->

                <br>

                <div class="etbsmt">
                    <h2>II. Entrez votre ??tablissement principal</h2>
                    <p>(Il s'agit de l'??tablissement dans lequel vous avez le plus d'heures d'enseignement)</p>


                    <div class="form-group">
                        <label for="rne-etbsmt">Indiquez le RNE de votre ??tablissement principal :</label>
                        <!-- Buouton en savoir plus -->
                        <button type="button" data-toggle="modal" data-target="#Modal2">
                            ?
                        </button>

                        <!-- boite texte -->
                        <div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Chaque ??tablissement scolaire reconnu par l"??ducation nationale (??cole, coll??ge, lyc??e...) poss??de un code unique inscrit dans le r??pertoire national des ??tablissements (RNE). On appelle ce code unique UAI pour Unit?? Administrative Immatricul??e : il se compose de 7 chiffres et d"une lettre (exemple : 0950009E). Si vous ne le connaissez pas, vous pouvez demander ce code au secr??tariat administratif de votre ??tablissement ou consulter l'annuaire de l'??ducation national ?? l'aide du lien ci-dessous. <a href="https://data.education.gouv.fr/explore/dataset/fr-en-annuaire-education/table/?disjunctive.nom_etablissement&disjunctive.type_etablissement&disjunctive.type_contrat_prive&disjunctive.code_type_contrat_prive&disjunctive.pial&disjunctive.appartenance_education_prioritaire" target="_blank">Annuaire de l'??ducation national</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p id="info-supp-etbsmt" class="lead" style="display: none; color: orange">Pour effacer la selection DOUBLE CLIQU?? sur le champ ci dessous !</p>
                        <input type="text" class="form-control" name="rne_etbsmt" id="rne-etbsmt" placeholder="Ex. 0950809F" required pattern="[0-9]{7}[A-Z]{1}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="academie-etbsmt">Acad??mie de l'??tablissement :</label>
                        <input type="text" class="form-control" name="academie_etbsmt" id="academie-etbsmt" placeholder="Ex. Notre Dame" required pattern="[A-Za-z????-????????????' -]{2,35}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="nom-etbsmt-principal">Nom de l'??tablissement principal :</label>
                        <input type="text" class="form-control" name="nom_etbsmt_principal" id="nom-etbsmt-principal" placeholder="Ex. Notre Dame" required pattern="[A-Za-z????-????????????' -]{2,35}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="adresse-etbsmt">Adresse de votre ??tablissement principal :</label>
                        <input type="text" class="form-control" name="adresse_etbsmt" id="adresse-etbsmt" placeholder="Ex. 15 rue du mar??chal Joffre 78000 Versailles" required pattern="[0-9 A-Za-z????-????????????' -]{5,35}">
                    </div>

                    <br>
                    <div class="row">
                        <div class="col form-group">
                            <label for="cp-etbsmt">Code postal ??tablissement principal :</label>
                            <input type="text" class="form-control" name="cp_etbsmt" id="cp-etbsmt" placeholder="Ex. 15 rue du mar??chal Joffre 78000 Versailles" required pattern="[0-9]{5}">
                        </div>
                        <br>
                        <div class="col form-group">
                            <label for="ville-etbsmt">Ville ??tablissment principal</label>
                            <input type="text" class="form-control" name="ville_etbsmt" id="ville-etbsmt" placeholder="Ex. 15 rue du mar??chal Joffre 78000 Versailles" required pattern="[A-Za-z????-????????????.' -]{3,35}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col form-group">
                            <label for="num-etbsmt">Num??ro ??tablissment principal</label>
                            <input type="text" class="form-control" name="num_etbsmt" id="num-etbsmt" placeholder="Num??ro ??tablissement">
                        </div>
                        <br>
                        <div class="col form-group">
                            <label for="email-etbsmt">Email ??tablissment principal</label>
                            <input type="text" class="form-control" name="email_etbsmt" id="email-etbsmt" placeholder="Adresse mail ??tablissement" required pattern="^[0-9A-Za-z-.]+@{1}[0-9A-Za-z-.]+\.{1}[0-9A-Za-z]{2,}$">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="statut-etbsmt">Vous ??tes dans un ??tablissement relevant d"une autre confession ou la??c en contrat d"association avec l"Etat :</label>
                        <div class="row w-25 ml-2">
                            <div class="col form-check">
                                <input class="form-check-input" type="radio" name="statut_etbsmt" id="statut-etbsmt" value="??tablissement la??c" >
                                <label class="form-check-label" for="statut-etbsmt">
                                    Oui
                                </label>
                            </div>
                            <div class="col form-check">
                                <input class="form-check-input" type="radio" name="statut_etbsmt" id="exampleRadios2" value="??tablissement non la??c">
                                <label class="form-check-label" for="statut-etbsmt">
                                    Non
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="nb-heures-etbsmt-utilisateur">Nombre d'heures en ??tablissement principal :</label>
                        <input type="text" class="form-control" name="nb_heures_etbsmt_utilisateur" placeholder="EXEMPLE : 20:30" required pattern="[0-9 : 0-9]{1,}">
                    </div>
                    <br>
                </div>
            </div>
            <br>

            <!-- FORMULAIRE SITUATION PROFESSIONNELLE -->
            <div class="page" id="page2">

                <h2>III. VOTRE SITUATION PROFESSIONNELLE ACTUELLE</h2>
                <br>
                <div class="form-group">
                    <label for="situation">Vous ??tes :</label>
                    <select class="custom-select" name="situation">
                        <option selected required="required">Selectionner votre r??ponse</option>
                        <option value="Maitre titulaire du 2nd degr??">Maitre titulaire du 2nd degr??</option>
                        <option value="Stagiaire CAER">Stagiaire CAER</option>
                        <option value="Stagiaire CAFEP">Stagiaire CAFEP</option>
                        <option value="Nomm?? du public">Nomm?? du public</option>
                        <option value="Enseignant 1er degr??">Enseignant 1er degr??</option>
                        <option value="Agr??g??">Agr??g??</option>
                    </select>
                </div>
                <!-- <br> -->
                
                <div class="row">
                    <div class="col form-group">
                        <label for="type-contrat" >Type de Contrat :</label>
                        <div class="row w-75 ml-2">
                            <div class="col form-check">
                                <input class="form-check-input" type="radio" name="type_contrat" value="Contrat d??finitif" required>
                                <label class="form-check-label" for="type_contrat">
                                    Contrat d??finitif
                                </label>
                            </div>
                            <div class="col form-check">
                                <input class="form-check-input" type="radio" name="type_contrat" value="Contrat provisoire">
                                <label class="form-check-label" for="type_contrat">
                                    Contrat provisoire
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- <br> -->
                    <div class="col form-group">
                        <label for="date_contrat">Indiquer la date de votre contrat :</label>
                        <input type="date" class="form-control" name="date_contrat" id="date_contrat" required>
                    </div>
                </div>
                <!-- <br> -->
                <div class="form-group">
                    <label for="contrat">Contrat :</label><br>
                    <input name="contrat" type="file" class="form-control" accept="application/pdf, application/docx, application/doc, application/odt, application/PNG, application/JPEG" title="Taille maximale autoris??e: 2Mo" id="contrat">

                    <!-- <input type="file" name="contrat" id="contrat" accept="application/pdf, application/docx, application/doc, application/odt" title="Taille maximale autoris??e: 2Mo"> -->
                    <!-- S??CURIT?? ANTI BOT -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                </div>
                <br>
                <div class="form-group">
                    <label for="statut-situation">Etes-vous en position d'activit?? :</label>
                    <div class="row w-25 ml-2">
                        <div class="col form-check">
                            <input class="form-check-input" type="radio" name="statut_situation" value="Oui" required>
                            <label class="form-check-label" for="statut-situation">
                                Oui
                            </label>
                        </div>
                        <div class="col form-check">
                            <input class="form-check-input" type="radio" name="statut_situation" value="Non">
                            <label class="form-check-label" for="statut-situation">
                                Non
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col form-group">
                        <label for="dispo">Etes-vous actuellement en :</label>
                        <div class="row w-75 ml-2">
                            <div class="col form-check">
                                <input class="form-check-input" onclick="masquer()" type="radio" name="disponibilite" id="dispo" value="Disponibilit??" required>
                                <label class="form-check-label" for="dispo">
                                    Disponibilit??
                                </label>
                            </div>
                            <div class="col form-check">
                                <input class="form-check-input" onclick="masquer()" type="radio" name="disponibilite" id="conge" value="Cong??">
                                <label class="form-check-label" for="conge">
                                    Cong??
                                </label>
                            </div>
                            <div class="col form-check">
                                <input class="form-check-input" onclick="afficher()" type="radio" name="disponibilite" id="autre" value="Autre">
                                <label class="form-check-label" for="autre">
                                    Autre
                                </label>
                            </div>

                            <div style="display: none;" id="info-autre">
                            

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col form-group">
                        <label for="date_debut_disponibilite">Indiquer la date de d??but de disponibilit?? ou de cong?? :</label>
                        <input type="date" class="form-control" name="date_debut_disponibilite" required>
                    </div>
                </div>
            </div>
            <br>
            <!-- FORMULAIRE SITUATION ADMINISTRATIVE -->
            <div class="page" id="page3">
                <h2>IV. VOTRE SITUATION ADMINISTRATIVE</h2>
                <div class="row">
                    <div class="col form-group">
                        <label for="echelle-remuneration">Echelle de r??mun??ration :</label>
                        <select class="custom-select" onchange="autreRemuneration()" id="echelle-remuneration" name="echelle_remuneration" required >
                            <option value="" selected >Selectionner votre r??ponse</option>
                            <option value="Certifi??">Certifi??</option>
                            <option value="Agr??g??">Agr??g??</option>
                            <option value="PLP">PLP</option>
                            <option value="Autre">Autre</option>
                        </select>
                        <div style="display: none;" id="autre-remuneration">
                            <label >Si "Autre", vous avez la possibilit?? de donner votre echelon de r??mun??ration  :</label>
                            <input type="texte"  class="form-control" id="autre-remuneration" name="autre_remuneration">

                        </div>
                    </div>

                   
                    <br>
                    <div class="col form-group">
                        <label for="remuneration-classe">R??mun??ration classe :</label>
                        <select class="custom-select" name="remuneration_classe" required>
                            <option value="" selected required="required">Selectionner votre r??ponse</option>
                            <option value="Classe normale">Classe normale</option>
                            <option value="Hors classe">Hors classe</option>
                            <option value="Classe exceptionnelle">Classe exceptionnelle</option>
                        </select>
                    </div>
                    <br>
                    <div class="col form-group">
                        <label for="echelon">Echelon:</label>
                        <select class="custom-select" onchange="autreEchelon()" id="echelon" name="echelon" required>
                            <option value="" selected>Selectionner votre echelon</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="Autre">Autre</option>
                        </select>
                        <div style="display: none;" id="echelon-autre">
                            <label >Si "Autre", vous avez la possibilit?? de donner votre echelon  :</label>
                            <input type="number" size="1" class="form-control" id="echelon-autre" name="echelon_autre">
                        </div>
                    </div>
                 
                </div>
                <br>
                <div class="form-group">
                    <p>Anciennet?? de service d"enseignement, de direction ou de formation dans l"enseignement priv?? sous contrat et dans l"enseignement public</p>
                    <label for="anciennete-service">Vous ??tes dans l'enseignement depuis :</label>
                    <input type="date" class="form-control" name="anciennete_service" id="anciennete-service" required>
                </div>
                <br>
            </div>
            <br>

            <div class="page" id="page4">
                <h2>V. MOTIF DE LA DEMANDE DE MUTATION</h2>
                <p>(Vous pouvez joindre ?? votre votre demande les justificatifs que vous jugez n??cessaires. Ces justificatifs sont obligatoires pour les imp??ratifs familiaux et raisons m??dicales)</p>
                <br>
                <div class="form-group">
                    <label for="type-mutation">Type de mutation :</label>
                    <select onchange="mutation()" class="custom-select" id="type-mutation" name="type_mutation" required >
                        <option value="" >Selectionner votre r??ponse</option>
                        <option value="Mutation inter VERSAILLES">Je suis hors l'academie de Versailles, je souhaite muter vers l'acad??mie de Versailles (Mutation inter Versailles)</option>
                        <option id="mutation-ext" value="Mutation inter hors VERSAILLES">Je suis dans l'academie de Versailles, je souhaite muter hors l'acad??mie de Versailles (Mutation inter hors Versailles)</option>
                        <option value="Mutation intra VERSAILLES">Je reste dans l'acad??mie de Versailles (Mutation intra Versailles)</option>
                    </select>
                </div>
                <fieldset>
                    <div class="liste-academie-souhaite" id="liste-academie-souhaite">
                        <button type='button' id="btn-close" class="close">
                            <span aria-hidden='true'>&times;</span>
                        </button>
                        <div id="souhait">
                            <div class="form-group">
                                <label for="academie-souhaite">Acad??mie souhait?? :</label>
                                <select class="custom-select" id="academie-souhaite" name="academie_souhaite" >
                                    <option value="" >Selectionner votre r??ponse</option>
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
                                    <!-- <option value="VERSAILLES">VERSAILLES</option> -->
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
                        </div>

                        <div style="display: none;"  id="display-academie-souhaite" class="form-group">

                        </div>

                        <div class="inputDept" id="div-departement">
                          
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="type-contrat-souhaite">Temps de service souhait?? :</label>
                                <select class="custom-select" id="type-contrat-souhaite" name="type_contrat_souhaite" required >
                                    <option value="" >Selectionner votre r??ponse</option>
                                    <option value="Temps complet">Temps complet</option>
                                    <option value="Temps partiel">Temps partiel</option>
                                    <option value="Temps partiel et temps partiel">Temps complet et/ou temps partiel</option>
                                </select>
                            </div>
                            <br>
                            <div class="col form-group">
                                <label for="nb-heures-souhaite">Nombre d'heures souhait?? :</label>
                                <input type="text" class="form-control" id="nb-heures-souhaite" name="nb_heures_souhaite" placeholder="Saisir votre nombre d'heures souhait??" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="motif-demande">Motif de la demande :</label>
                                <select onchange="Autre()" class="custom-select" id="motif-demande" name="motif_demande" required>
                                    <option value="" >Selectionner votre r??ponse</option>
                                    <option value="Imp??ratifs familiaux">Imp??ratifs familiaux</option>
                                    <option value="Raisons m??dicales">Raisons m??dicales</option>
                                    <option value="Vie religieuse">Vie religieuse</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>

                            
                            <div class="col form-group">
                                <label for="justificatif-motif">Justificatif :</label><br>
                                <input  name="justificatif_motif" type="file" class="form-control" id="justificatif-motif" accept="application/pdf, application/docx, application/doc, application/odt" title="Taille maximale autoris??e: 2Mo">
                                <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                            </div>
                        </div>
                        <div style="display: none;" class="form-group" id="display-autre-motif">
                            <label for="autre_motif">Si "Autre", vous avez la possibilit?? d'expliquer le motif :</label>
                            <input type="text" class="form-control" id="autre-motif" name="autre_motif">
                        </div>

                    </div>
                </fieldset>
                <div id="btn-duplication">
                    <button type="button" id="ajout-academie" onclick="duplicate()">Ajouter une academie</button>
                </div>
            </div>
            <br>
            <div class="button container">
                <button type="submit" class="btn btn-sinscrire">Valider</button>
            </div>
            <br>
        </form>
    </div>
    <br>
</body>

</html>