drop database sidiec;
create database sidiec;
USE sidiec;


insert into utilisateur values(2,'test','$2y$10$Lbkx2Qk1YROla7B2Fr5ZtOXmj634d527cgQslSWCfOoGt/pwq97.O 
',0,'BRETAGNE','DFREJD84R','MADAME','TEST6','TEST6','coucouc','1982-03-03','RUE DE LA FORCE',91091,'MARSEILLE','0765432567','0123412435',
'test2@hotmail.Fr','franglais','notre','09329843N','RUE DE LA PLAGE',91910,'reference','0123450978','ICIOULA');

insert into utilisateur (id_utilisateur, identifiant_utilisateur, mdp_utilisateur, isValid, academie_origine, numen, civilite_utilisateur, nom_utilisateur, prenom_utilisateur, nom_jeunefille_utilisateur, date_naissance_utilisateur, adresse_utilisateur, cp_utilisateur, ville_utilisateur, num_portable_utilisateur, num_domicile_utilisateur, email_utilisateur)
 values (5,'user1','$2y$10$OsstoLJ7vM/zTbi/DiNZ0OsPlrR88/baHI3oOi.eQb5qPXe0vJl8u',1,upper('versailles'),upper('097463278FRE'),upper('monsieur'),upper('pierrot'),upper('clement'),'','1979-04-21',upper('rue de la source'),91290,upper('evry'),('0664182222'),('0117886464'),upper('privé@hotmail.fr'));
 
 drop table etablissement;
 
 CREATE TABLE etablissement(
	id_etbsmt int (255)  auto_increment  PRIMARY KEY,
	rne_etbsmt VARCHAR(50)not null,
	nom_etbsmt_principal VARCHAR(50) not null,
    adresse_etbsmt VARCHAR(50)not null,
	cp_etbsmt VARCHAR(50)not null,
    ville_etbsmt VARCHAR(50)not null,
	num_etbsmt VARCHAR(50)not null,
    email_etbsmt VARCHAR(255) NOT NULL
);
 
 CREATE DATABASE IF NOT EXISTS sidiec;
use sidiec;

SELECT academie_origine as modifier FROM utilisateur;


SELECT * FROM voeux_user;

SELECT v.academie_souhaite as "voeux", d.id_utilisateur, u.nom_utilisateur, d.situation, d.type_contrat, d.id_mutation 
FROM demande_mutation d 
JOIN utilisateur u 
on d.id_utilisateur = u.id_utilisateur
JOIN voeux_user v
on v.id_mutation = d.id_mutation;

SELECT * FROM demande_mutation d JOIN utilisateur u on d.id_utilisateur = u.id_utilisateur WHERE u.id_utilisateur=2;

select t.fname, c.title
from courses c join teachers t on c.id_teach = t.id_teach;


drop database sidiec;

create database sidiec;
use sidiec;

CREATE TABLE membre_cae(
   id_membre INT AUTO_INCREMENT,
   identifiant_membre VARCHAR(255) NOT NULL,
   mdp_membre VARCHAR(255) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE actualites(
   id_actu INT AUTO_INCREMENT,
   titre_actu VARCHAR(255) NOT NULL,
   desc_actu VARCHAR(255),
   date_debut DATE,
   date_fin DATE,
   img_actu VARCHAR(255),
   PRIMARY KEY(id_actu)
);

CREATE TABLE admin(
   id_admin INT AUTO_INCREMENT,
   identifiant_admin VARCHAR(255) NOT NULL,
   mdp_admin VARCHAR(255) NOT NULL,
   email_admin VARCHAR(255) NOT NULL,
   PRIMARY KEY(id_admin),
   UNIQUE(identifiant_admin),
   UNIQUE(email_admin)
);

CREATE TABLE etablissement(
   id_etbsmt INT AUTO_INCREMENT,
   rne_etbsmt VARCHAR(255),
   academie_etbsmt VARCHAR(255),
   nom_etbsmt_principal VARCHAR(255),
   adresse_etbsmt VARCHAR(255),
   cp_etbsmt VARCHAR(255),
   ville_etbsmt VARCHAR(255),
   departement_etbsmt VARCHAR(255),
   num_etbsmt VARCHAR(255),
   fax_etbsmt VARCHAR(255),
   email_etbsmt VARCHAR(255),
   type_etbsmt VARCHAR(255),
   nom_chef_etbsmt VARCHAR(255),
   prenom_chef_etbsmt VARCHAR(255),
   email_chef_etbsmt VARCHAR(255),
   PRIMARY KEY(id_etbsmt)
);

CREATE TABLE utilisateur(
   id_utilisateur INT AUTO_INCREMENT,
   identifiant_utilisateur VARCHAR(255) NOT NULL,
   mdp_utilisateur VARCHAR(255) NOT NULL,
   -- isValid INT,
   academie_origine VARCHAR(255) NOT NULL,
   numen VARCHAR(255) NOT NULL,
   discipline_contrat VARCHAR(255) NOT NULL,
   nom_spe VARCHAR(255) NOT NULL,
   spe_college VARCHAR(255),
   spe_lycee_pro VARCHAR(255),
   spe_lycee_tech VARCHAR(255),
   spe_lycee_gen VARCHAR(255),
   spe_post_bac VARCHAR(255),
   civilite_utilisateur VARCHAR(255) NOT NULL,
   situation_maritale VARCHAR(255) NOT NULL,
   nom_utilisateur VARCHAR(255) NOT NULL,
   prenom_utilisateur VARCHAR(255) NOT NULL,
   nom_naissance_utilisateur VARCHAR(255),
   date_naissance_utilisateur DATE NOT NULL,
   adresse_utilisateur VARCHAR(255) NOT NULL,
   cp_utilisateur VARCHAR(255) NOT NULL,
   ville_utilisateur VARCHAR(255) NOT NULL,
   num_domicile_utilisateur VARCHAR(255),
   num_portable_utilisateur VARCHAR(255) NOT NULL,
   email_utilisateur VARCHAR(255) NOT NULL,
   id_etbsmt INT,
   etbsmt_laic VARCHAR(255),
   nb_heures_travaille VARCHAR(255),
   PRIMARY KEY(id_utilisateur),
   UNIQUE(num_portable_utilisateur),
   UNIQUE(email_utilisateur),
   FOREIGN KEY(id_etbsmt) REFERENCES etablissement(id_etbsmt)
);

CREATE TABLE demande_mutation(
   id_mutation INT AUTO_INCREMENT,
   type_mutation VARCHAR(255) NOT NULL,
   date_demande DATE NOT NULL,
   situation VARCHAR(255) NOT NULL,
   type_contrat VARCHAR(255) NOT NULL,
   date_contrat DATE NOT NULL,
   contrat VARCHAR(255),
   statut_situation VARCHAR(255),
   disponibilite VARCHAR(255),
   date_debut_disponibilite DATE,
   echelle_remuneration VARCHAR(255) NOT NULL,
   remuneration_classe VARCHAR(255) NOT NULL,
   echelon VARCHAR(255),
   anciennete_service DATE,
   -- nb_heures_etbsmt_utilisateur VARCHAR(50),
   statut_demande VARCHAR(255),
   id_utilisateur INT NOT NULL,
   PRIMARY KEY(id_mutation),
   FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur)
);

CREATE TABLE voeux_user(
   id_voeux INT AUTO_INCREMENT,
   academie_souhaite VARCHAR(255) NOT NULL,
   choix1 VARCHAR(255),
   choix2 VARCHAR(255),
   choix3 VARCHAR(255),
   choix4 VARCHAR(255),
   choix5 VARCHAR(255),
   choix6 VARCHAR(255),
   choix7 VARCHAR(255),
   choix8 VARCHAR(255),
   type_contrat_souhaite VARCHAR(255) NOT NULL,
   nb_heures_souhaite INT NOT NULL,
   motif_demande VARCHAR(255) NOT NULL,
   autre_motif VARCHAR(255),
   justificatif_motif VARCHAR(255),
   pre_codification VARCHAR(255),
   codification VARCHAR(255),
   id_mutation INT NOT NULL,
   PRIMARY KEY(id_voeux),
   FOREIGN KEY(id_mutation) REFERENCES demande_mutation(id_mutation)
   -- FOREIGN KEY(id_academie) REFERENCES academie(id_academie)

);

CREATE TABLE publie(
   id_actu INT,
   id_admin INT,
   PRIMARY KEY(id_actu, id_admin),
   FOREIGN KEY(id_actu) REFERENCES actualites(id_actu),
   FOREIGN KEY(id_admin) REFERENCES admin(id_admin)
);

CREATE TABLE traite(
   id_mutation INT,
   id_membre INT,
   id_admin INT,
   PRIMARY KEY(id_mutation, id_membre, id_admin),
   FOREIGN KEY(id_mutation) REFERENCES demande_mutation(id_mutation),
   FOREIGN KEY(id_membre) REFERENCES membre_cae(id_membre),
   FOREIGN KEY(id_admin) REFERENCES admin(id_admin)
);

CREATE TABLE academie(
   id_academie INT auto_increment,
   nom_academie VARCHAR(255) NOT NULL,
   PRIMARY KEY(id_academie)
);


CREATE TABLE departement(
   id_departement INT auto_increment,
   nom_departement VARCHAR(255) NOT NULL,
   code_iso varchar(50),
   choix varchar(50),
   id_academie INT NOT NULL,
   PRIMARY KEY(id_departement),
   FOREIGN KEY(id_academie) REFERENCES academie(id_academie)
); 

select * from academie;
select code_iso, nom_departement from departement where id_academie=1;

INSERT INTO `sidiec`.`utilisateur` (`id_utilisateur`, `identifiant_utilisateur`, `mdp_utilisateur`, `academie_origine`, `numen`, `discipline_contrat`, `nom_spe`, `spe_college`, `civilite_utilisateur`, `situation_maritale`, `nom_utilisateur`, `prenom_utilisateur`, `date_naissance_utilisateur`, `adresse_utilisateur`, `cp_utilisateur`, `ville_utilisateur`, `num_domicile_utilisateur`, `num_portable_utilisateur`, `email_utilisateur`) VALUES ('1', 'test', '$2y$10$LLqpdFosjo3aDIIpmA4z7eQ9w5LMb23QpQc392ACj/KHupDHV3deq', 'VERSAILLES', '0123456789ABC', 'Français', 'histoire', '', 'Monsieur', 'Marié', 'Georges', 'Kalou', '1998-06-18', 'rue de la place', '75000', 'Paris', '0122334455', '0722334455', 'georges@gmail.com');

INSERT INTO demande_mutation (type_mutation, date_demande, situation, type_contrat, date_contrat, contrat, statut_situation, disponibilite, date_debut_disponibilite, echelle_remuneration, remuneration_classe, echelon, anciennete_service, nb_heures_etbsmt_utilisateur, id_utilisateur)
VALUES ("Inter ext", "2022-06-13", "Agrégé", "Temps partiel", "2021-04-16", "contrat", "satatut situation", "disponibilite", "2020-03-09", "echelle", "remuneration", "22", "1998-05-17", "60", 1);



drop table actualitees;
SELECT d.date_demande, d.type_mutation, v.academie_souhaite FROM demande_mutation d JOIN utilisateur u ON d.id_utilisateur = u.id_utilisateur JOIN voeux_user v ON d.id_mutation = v.id_mutation WHERE u.id_utilisateur=1;


SELECT v.id_voeux, v.academie_souhaite, v.choix1, v.choix2, v.choix3, v.choix4, v.choix5, v.choix6, choix7, v.choix8, v.type_contrat_souhaite, v.nb_heures_souhaite, v.motif_demande, v.autre_motif, v.justificatif_motif, v.pre_codification, v.codification, v.id_mutation FROM voeux_user v JOIN demande_mutation d ON v.id_mutation = d.id_mutation WHERE d.id_mutation=1;


SELECT * FROM demande_mutation d LEFT JOIN voeux_user v ON d.id_mutation = v.id_mutation WHERE d.id_utilisateur = 1 ORDER BY d.id_mutation asc;

SELECT id_mutation FROM demande_mutation WHERE id_utilisateur=2 ORDER BY id_mutation;

SELECT d.nom_departement, d.code_iso FROM departement d JOIN academie a ON d.id_academie = a.id_academie WHERE a.nom_academie="LIMOGES";

select id_mutation from demande_mutation where id_utilisateur=2 ORDER BY id_mutation DESC;
UPDATE utilisateur SET etbsmt_laic = "laic" WHERE id_utilisateur = 1;

USE sidiec;
SELECT v.id_voeux, v.academie_souhaite, v.choix1, v.choix2, v.choix3, v.choix4, v.choix5, v.choix6, v.choix7, v.choix8, v.type_contrat_souhaite, v.nb_heures_souhaite, v.motif_demande, v.autre_motif, v.justificatif_motif, v.id_mutation FROM utilisateur u JOIN demande_mutation d ON u.id_utilisateur = d.id_utilisateur RIGHT JOIN voeux_user v ON v.id_mutation = d.id_mutation;

SELECT * FROM demande_mutation;
SELECT * FROM utilisateur u JOIN demande_mutation d ON u.id_utilisateur = d.id_utilisateur WHERE u.id_utilisateur = 1;
SELECT * FROM voeux_user;
UPDATE voeux_user SET academie_souhaite ="", choix1="", choix2="", choix3="", choix4="", choix5="", choix6="", choix7="", choix8="" WHERE id_voeux = 1;

SELECT * FROM demande_mutation d LEFT JOIN voeux_user v ON d.id_mutation = v.id_mutation WHERE d.id_utilisateur = 8 ORDER BY d.id_mutation;

SELECT * FROM voeux_user;
SELECT * FROM voeux_user v JOIN demande_mutation d on v.id_mutation = d.id_mutation WHERE d.id_mutation=6;
ALTER TABLE voeux_user DROP COLUMN academie_souhaite, choix1, choix2, choix3, choix4, choix5, choix6, choix7, choix8 WHERE id_voeux = 1;
DELETE FROM voeux_user WHERE academie_souhaite, choix1, choix2, choix3, choix4, choix5, choix6, choix7, choix8 AND id_voeux = 1;

delete from voeux_user
where id_voeux = 1; -- Mode safe

SELECT v.academie_souhaite, v.choix1, v.choix2, v.choix3, v.choix4, v.choix5, v.choix6, v.choix7, v.choix8 FROM voeux_user v JOIN demande_mutation d on v.id_mutation = d.id_mutation WHERE d.id_mutation=1;

SELECT a.id_academie, a.nom_academie FROM academie a JOIN voeux_user v ON a.nom_academie = v.academie_souhaite WHERE v.academie_souhaite = "TOULOUSE";

SELECT d.nom_departement, d.code_iso FROM departement d JOIN academie a ON d.id_academie = a.id_academie WHERE d.id_academie =25;

SELECT d.code_iso, d.nom_departement FROM departement d JOIN voeux_user v ON v.choix1 = d.nom_departement AND v.choix2 = d.nom_departement WHERE v.id_voeux = 2;


SELECT v.id_voeux, v.academie_souhaite, v.choix1, v.choix2, v.choix3, v.choix4, v.choix5, v.choix6, v.choix7, v.choix8, v.type_contrat_souhaite, v.nb_heures_souhaite, v.motif_demande, v.autre_motif, v.justificatif_motif, v.id_mutation FROM voeux_user v JOIN demande_mutation d on v.id_mutation = d.id_mutation WHERE d.id_mutation=1;

SELECT d.nom_departement, d.code_iso FROM departement d JOIN voeux_user v WHERE v.choix1 = d.nom_departement AND v.choix2 = d.nom_departement AND v.choix3 = d.nom_departement AND v.choix4 = d.nom_departement AND v.choix5 = d.nom_departement AND v.choix6 = d.nom_departement AND v.choix7 = d.nom_departement AND v.choix8 = d.nom_departement;


UPDATE voeux_user SET academie_souhaite = "Academie", tous_dept = "je souhaite", dept_souhaite1 = "809", dept_souhaite2 = "809", dept_souhaite3 = "809", dept_souhaite4 = "809", dept_souhaite5 = "809", type_contrat_souhaite = "travail", nb_heures_souhaite = "7845", motif_demande = "jai une", autre_motif = "lasse" WHERE id_voeux = 1;
UPDATE utilisateur SET id_etbsmt = 6, etbsmt_laic = "laic", nb_heures_travaille = "90" WHERE id_utilisateur = 2;


SELECT e.rne_etbsmt, e.academie_etbsmt, e.nom_etbsmt_principal, e.adresse_etbsmt, e.cp_etbsmt, e.ville_etbsmt, e.num_etbsmt, e.email_etbsmt FROM etablissement e JOIN utilisateur u ON e.id_etbsmt = u.id_etbsmt WHERE id_utilisateur = 2; 

SELECT * FROM voeux_user v JOIN demande_mutation d ON v.id_mutation = d.id_mutation WHERE d.id_utilisateur = 6;
