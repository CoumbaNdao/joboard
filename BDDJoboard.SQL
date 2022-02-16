drop database if exists testjoboard;

create database  testjoboard;
use testjoboard;


create table typecompetence
 (
   IDTypeCompetence int(5) NOT NULL  auto_increment,
      libelleTypeCompetence varchar (50) not null,
    primary key (IDTypeCompetence)
 )engine=innodb;


create table competence
 (
   IDCompetence int(5) NOT NULL  auto_increment,
      libelleCompetence varchar (50) not null,
    primary key (idCompetence) 
 )engine=innodb;


create table concerner
(
	IDTypeCompetence int(5) not null,
	IDCompetence int(5) not null,
	primary key (IDTypeCompetence,IDCompetence),
	foreign key(IDTypeCompetence) references typecompetence(IDTypeCompetence),
	foreign key(IDCompetence) references competence(IDCompetence)
 	ON DELETE CASCADE 
    ON UPDATE CASCADE

)engine=innodb;



create table region
 (
   codePostalRegion int(5) NOT NULL  auto_increment,
      nomRegion varchar (50) not null,
    primary key (codePostalRegion) 
 )engine=innodb;




create table typeOffre
 (
   IDTypeOffre int(5) NOT NULL  auto_increment,
   libelleTypeOffre varchar (50) not null,
    primary key (IDTypeOffre) 
 )engine=innodb;



create table entreprise (
	numeroSiret int(5) not null auto_increment, 
	raisonSociale varchar (100) not null, 
	descEntreprise varchar (250) not null,
	adresseEntreprise varchar(120) not null,
	cpEntreprise char (5),
	villeEntreprise varchar (50) not null,
    telEntreprise char (10) not null,
    emailEntreprise varchar (50) not null,
    loginEntreprise varchar (50) not null,
    mdpEntreprise varchar (10) not null,
    urlEntreprise varchar (50) not null,
    codePostalRegion int(5),
	primary key(numeroSiret),
	foreign key(codePostalRegion) references region(codePostalRegion)
 	ON DELETE CASCADE 
    ON UPDATE CASCADE

)engine=innodb;


 create table niveauetude
 (
   IDNiveauEtude int(5) NOT NULL  auto_increment,
   libelleNiveauEtude varchar (50) not null,
      diplomeObtenu varchar (50) not null,
    PRIMARY KEY (IDNiveauEtude) 
 )engine=innodb;
  

create table offre (
	IDOffre int(5) not null auto_increment, 
	titreOffre varchar (100) not null, 
	descOffre varchar (250) not null,
	datePubOffre date not null,
	remuneration float (10.2),
	dateDebutContrat date not null,
    dureeContrat varchar (20) not null,
    statutOffre enum('publiee','expiree', 'en attente de publication') not null,
    IDTypeOffre int(5),
    numeroSiret int(5),
    IDNiveauEtude int(5),
	primary key(IDOffre),
	foreign key(numeroSiret) references entreprise(numeroSiret),
	foreign key(IDTypeOffre) references typeoffre(IDTypeOffre),
    foreign key(IDNiveauEtude) references niveauetude(IDNiveauEtude)
 	ON DELETE CASCADE 
    ON UPDATE CASCADE

)engine=innodb;





create table candidat (
	IDCandidat int(5) not null auto_increment, 
	nomCandidat varchar (100) not null, 
	prenomCandidat varchar (250) not null,
	adresseCandidat varchar(120) not null,
	cpCandidat char (5),
	villeCandidat varchar (50) not null,
    loginCandidat varchar (50) not null,
    mdpCandidat varchar (10) not null,
    codePostalRegion int(5) not null,
    IDNiveauEtude int(5) not null,
	primary key(IDCandidat),
	foreign key(codePostalRegion) references region(codePostalRegion),
    foreign key(IDNiveauEtude) references niveauetude(IDNiveauEtude)
 	ON DELETE CASCADE 
    ON UPDATE CASCADE

)engine=innodb;


create table postuler
(
	IDOffre int(5) not null,
	IDCandidat int(5) not null,
	primary key (IDOffre,IDCandidat),
	foreign key(IDOffre) references offre(IDOffre),
	foreign key(IDCandidat) references candidat(IDCandidat)
 	ON DELETE CASCADE 
    ON UPDATE CASCADE

)engine=innodb;


create table disposer
(
	IDCandidat int(5) not null,
	IDCompetence int(5) not null,
	primary key (IDCandidat,IDCompetence),
	foreign key(IDCandidat) references candidat(IDCandidat),
	foreign key(IDCompetence) references competence(IDCompetence)
 	ON DELETE CASCADE 
    ON UPDATE CASCADE

)engine=innodb;


create table requerir
(
	IDOffre int(5) not null,
	IDCompetence int(5) not null,
	primary key (IDOffre,IDCompetence),
	foreign key(IDOffre) references offre(IDOffre),
	foreign key(IDCompetence) references competence(IDCompetence)
 	ON DELETE CASCADE 
    ON UPDATE CASCADE

)engine=innodb;



insert into region (codePostalRegion, nomRegion) values
(null, 'ile de france'),
(null, 'ains'),
(null, 'haut de france'),
(null, 'Guyane'),
(null, 'Martinique');



insert into typeoffre (`IDTypeOffre`, `libelleTypeOffre`) values
(null, 'stage'),
(null, 'alternance'),
(null, 'CDI'),
(null, 'CDD'),
(null, 'interim');


insert into entreprise (`numeroSiret`, `raisonSociale`, `descEntreprise`, `adresseEntreprise`, `cpEntreprise`,`villeEntreprise`,`telEntreprise`, `emailEntreprise`, `loginEntreprise`, `mdpEntreprise`,urlEntreprise, `codePostalRegion` )
 values
(1234, 'Orange', 'vente de téléphone', '2 avenue de segur', '75007', 'Paris', '0123456789', 'orange@orange.com', 'orange@orange.com', 'orange', 'www.orange.com', 6),
(2234, 'ODIGO', 'Editeur de logiciel', '40 rue camille desmoulins', '92130', 'Issy-les-moulineaux', '0123456790', 'odigo@odigo.com', 'odigo@odigo.com', 'odigo', 'www.odigo.com', 7),
(3234, 'Accenture', 'Entreprise de logiciel', '6 rue de segura', '20000', 'Sainte Anne', '0123456779', 'accenture@accenture.com', 'accenture@accenture.com', 'accenture', 'www.accenture.net', 10),
(4234, 'PrefNord', 'Service  public', '5 boulevar victor', '59000', 'Lille', '0152456789', 'pref@pref.com', 'pref@pref.com', 'pref', 'www.pref.com', 8),
(5234, 'Arrow', 'Pharmacologie', '5 avenue de la marne', '69007', 'Lyon', '0156456789', 'arrow@arrow.com', 'arrow@arrow.com', 'arrow', 'www.arrow.net', 9);


insert into niveauetude (`IDNiveauEtude`, `libelleNiveauEtude`, `diplomeObtenu`) values
(null, 'Bac+1', 'bac'),
(null, 'Bac+2', 'BTS'),
(null, 'Bac+3', 'Licence'),
(null, 'Bac+4', 'M1'),
(null, 'Bac+5', 'M2');


insert into offre (`IDOffre`, `titreOffre`, `descOffre`, `datePubOffre`, `remuneration`,`dateDebutContrat`,`dureeContrat`, `statutOffre`, `IDTypeOffre`, `numeroSiret`,`IDNiveauEtude`)
 values
(null, 'Stage developpeur', 'Offre de stage developpeur ', '2022/02/01', '600.59', '2022/03/01', '6 mois', 'en attente de publication', 6, 1234, 9),
(null, 'Support systeme en alternance', 'Recherche profil support systeme ', '2021/02/01', '1200.0','2021/03/05', '1 ans', 'expiree', 7, 2234, 10),
(null , 'Administrateur de base de donnees', 'Recherche DBA confirme', '2022/02/01', '3200','2022/04/05', '1 ans', 'publiee', 10, 3234, 8),
(null ,  'Devops junior', 'Devenez Devops junior', '2020/02/01', '3000','2021/02/05', '6 mois', 'expiree', 8, 4234, 7),
(null , 'Ingenieur Securite', 'Offre ingenieur sécurite', '2021/02/01', '5000','2021/03/05', 'null', 'expiree', 9, 5234, 6);



insert into candidat (`IDCandidat`, `nomCandidat`, `prenomCandidat`, `adresseCandidat`, `cpCandidat`, `villeCandidat`, `loginCandidat`, `mdpCandidat`, codePostalRegion, `IDNiveauEtude`)
values (null, 'DIAZ', 'Paco ', '12 rue de la belle feuille', '69500', 'Lyon', 'paco@paco.com', 'paco', 6,10),
(null, 'TOTO', 'Coumba ', '5 avenue de la marne', '59800', 'Lille', 'coumba@coumba.com', 'coumba', 7, 9),
(null, 'BEN', 'Ahmed ', '68 rue glaciale', '92130', 'Issy-les-moulineaux', 'ahmed@ahmed.com', 'ahmed', 8, 8),
(null, 'CHOUAKY', 'Abder ', '12 rue de la belle feuille', '69500', 'Lyon', 'abder@abder.com', 'abder', 9, 7),
(null, 'TCHEN', 'Anne', '28 boulevard victor', '92600', 'Asnieres', 'anne@anne.com', 'anne', 10, 6);


insert into postuler
values (27, 11) ,
        (28, 12),
        (29, 13),
        (30, 14),
        (26, 15);


insert into competence
values (null, 'Programmation'),
(null, 'Support informatique'),
(null, 'Gestion de donnees'),
(null, 'Gestion de projet'),
(null, 'Administration systeme');


insert into typecompetence
values (null, 'Technique'),
(null, 'Fonctionnel'),
(null, 'Technico_fonctonnel'),
(null, 'Suivi KPI'),
(null, 'Solution reseaux');



insert into disposer
values (12, 6) ,
        (13, 7),
        (14, 8),
        (15, 9),
        (11, 10);


insert into requerir
values (27, 6) ,
        (28, 7),
        (29, 8),
        (30, 9),
        (26, 10);


insert into disposer
values (12, 10) ,
        (13, 9),
        (14, 7),
        (15, 8),
        (11, 6);


        


create table avis (
	IDavis int(5) not null auto_increment, 
   nomUser varchar(50) not null,
   prenomUser varchar(50) not null,
	descAvis varchar (250) not null, 
   imageAvis varchar(250),
	primary key(IDAvis)
)engine=innodb;


insert into avis 
values (null,'Paco', 'Jo', 'jai trouver facilement un emploi', 'C:\Users\MameCoumbaNDAO\Desktop\jobsearch\jobboard\public\images\man3'),
values (null, 'Thenang','Anne','Contente de mon experience sur jobage', 'C:\Users\MameCoumbaNDAO\Desktop\jobsearch\jobboard\public\images\woman2'),
values (null, 'Chiche', 'Mehdi', 'Je recommande', 'C:\Users\MameCoumbaNDAO\Desktop\jobsearch\jobboard\public\images\man2'),
values (null,'YU', 'Kelly', 'Bravo Jobage', 'C:\Users\MameCoumbaNDAO\Desktop\jobsearch\jobboard\public\images\woman3')
values (null,'Bregger', 'Amandine', 'Belle experience', 'C:\Users\MameCoumbaNDAO\Desktop\jobsearch\jobboard\public\images\woman1');



ALTER TABLE candidat
ADD telephoneCandidat CHAR(10);


ALTER TABLE candidat
ADD emailCandidat varchar(50);




ALTER TABLE niveauetude
ADD dateObtentionDiplome date;


ALTER TABLE candidat
ADD CVCandidat varchar(250);