
CREATE TABLE sidiec.utilisateur ( id_utilisateur INT(255) PRIMARY KEY AUTO_INCREMENT ,
 identifiant_utilisateur VARCHAR(255)  NULL ,
 mdp_utilisateur VARCHAR(255)  NULL ,
 academie_origine VARCHAR(255) NOT NULL ,
  numen VARCHAR(255) NOT NULL ,
 civilite_utilisateur VARCHAR(255)  NOT NULL , 
 nom_utilisateur VARCHAR(255) NOT NULL,
 prenom_utilisateur VARCHAR(255) NOT NULL ,
 date_naissance_utilisateur DATE NOT NULL, 
 adresse_utilisateur VARCHAR(255) NOT NULL,
 cp_utilisateur int(255) not null,
  ville_utilisateur VARCHAR(255) NOT NULL,
  num_portable_utilisateur varchar(15) not null,
  num_domicile_utilisateur varchar(15) not null,
    email_utilisateur varchar(255) not null,
    discipline_contrat varchar(255) not null,
    nom_etbsmt_principal varchar(255) not null,
    rne_etbsmt VARCHAR(255) not null,
    adresse_etbsmt varchar(255) not null,
    cp_etbsmt int(100) not null,
    ville_etbsmt VARCHAR(255) not null,
    num_etbsmt int(15) not null,
    academie_etbsmt varchar(255) not null
    
  
 
 
 );
 