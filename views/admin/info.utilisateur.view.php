<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        foreach($demandes as $demande)
        ?>

        <h2> Informations <?=$infos->getPrenom_utilisateur().$infos->getNom_utilisateur()?></h2>
        <div class="tab-content" id="myTabContent">
        
        <div class="tab-pane fade show active" id="contenu-info-perso" role="tabpanel" aria-labelledby="info-perso">
            <div class="info-perso">
                <div class="info-utilisateur">
                    <?php 
                        if(!empty($demande["voeux"])){ 
                            foreach($demande["voeux"]["dept_souhaite"] as $dept=>$value){ ;
                            echo  '<p>Type voeux  :'.@$dept.'</p>';
                            }  
                        }
                    ?>
                    <p>Type de demande : <?=@$demande["type_mutation"]?></p>
                    <p>Date de la demande  : <?=@$demande["date_demande"]?></p>
                    <p>Numéro de demande mutation : <?=@$demande["id_mutation"]?></p>
                    <p>Utilisateur N°<?=$infos->getid_utilisateur()?></p>
                    <p>Adresse mail : <?=$infos->getEmail_utilisateur()?></p>
                </div>
            </div>
        </div>
    </body>
</html>



