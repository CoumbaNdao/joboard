drop database if exists jobage;
create database  jobage;
use jobage;

// ===================================TABLE COMPETENCE======================================
create table typecompetence
 (
   IDTypeCompetence int(5) NOT NULL  auto_increment,
      libelleTypeCompetence varchar (50) not null,
    primary key (IDTypeCompetence)
 )engine=innodb;
alter table `typecompetence` add column `updated_at` Datetime;
alter table `typecompetence` add column `created_at` Datetime;

// ===================================TABLE COMPETENCE======================================
create table competence
 (
   IDCompetence int(5) NOT NULL  auto_increment,
      libelleCompetence varchar (50) not null,
    primary key (idCompetence)
 )engine=innodb;

alter table `competence` add column `updated_at` Datetime;
alter table `competence` add column `created_at` Datetime;




// ===================================TABLE CONCERNER======================================
create table concerner
(
	IDTypeCompetence int(5) not null,
	IDCompetence int(5) not null,
	primary key (IDTypeCompetence,IDCompetence),
	foreign key(IDTypeCompetence) references typecompetence(IDTypeCompetence)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	foreign key(IDCompetence) references competence(IDCompetence)
 	ON DELETE CASCADE
    ON UPDATE CASCADE
)engine=innodb;

alter table `concerner` add column `updated_at` Datetime;
alter table `concerner` add column `created_at` Datetime;
// ===================================TABLE REGION======================================
create table region
 (
   codePostalRegion int(5) NOT NULL  auto_increment,
      nomRegion varchar (50) not null,
    primary key (codePostalRegion)
 )engine=innodb;

alter table `region` add column `updated_at` Datetime;
alter table `region` add column `created_at` Datetime;

// ===================================TABLE TYPEOFFRE======================================
create table typeOffre
 (
   IDTypeOffre int(5) NOT NULL  auto_increment,
   libelleTypeOffre varchar (50) not null,
    primary key (IDTypeOffre)
 )engine=innodb;
alter table `typeOffre` add column `updated_at` Datetime;
alter table `typeOffre` add column `created_at` Datetime;
// ===================================TABLE ENTREPRISE======================================
create table entreprise (
	numeroSiret int(14) not null unique,
	raisonSociale varchar (100) not null,
	descEntreprise varchar (2500) not null,
	adresseEntreprise varchar(120) not null,
	cpEntreprise char (5),
	villeEntreprise varchar (50) not null,
    telEntreprise char (10) not null unique,
    emailEntreprise varchar (50) not null unique,
    loginEntreprise varchar (50) not null unique,
    mdpEntreprise varchar (255) not null,
    urlEntreprise varchar (2000) not null,
    codePostalRegion int(5),
	primary key(numeroSiret),
	foreign key(codePostalRegion) references region(codePostalRegion)
 	ON DELETE CASCADE
    ON UPDATE CASCADE
)engine=innodb;

alter table `entreprise` add column `updated_at` Datetime;
alter table `entreprise` add column `created_at` Datetime;
alter table `entreprise` add column `logoEntreprise` varchar (500);


// ===================================TABLE NIVEAUETUDE======================================
 create table niveauetude
 (
   IDNiveauEtude int(5) NOT NULL  auto_increment,
   libelleNiveauEtude varchar (50) not null,
      diplomeObtenu varchar (50) not null,
      dateObtentionDiplome date,
    PRIMARY KEY (IDNiveauEtude)
 )engine=innodb;
alter table `niveauetude` add column `updated_at` Datetime;
alter table `niveauetude` add column `created_at` Datetime;

// ===================================TABLE OFFRE======================================

create table offre (
	IDOffre int(5) not null auto_increment,
	titreOffre varchar (100) not null,
	descOffre varchar (2500) not null,
	datePubOffre date not null,
	remuneration float (10.2),
	dateDebutContrat date not null,
    dureeContrat varchar (20) not null,
    statutOffre enum('publiee','expiree', 'en attente de publication') not null,
    IDTypeOffre int(5),
    numeroSiret int(14),
    IDNiveauEtude int(5),
	primary key(IDOffre),
	foreign key(numeroSiret) references entreprise(numeroSiret) 	ON DELETE CASCADE
                                                                 ON UPDATE CASCADE,
	foreign key(IDTypeOffre) references typeoffre(IDTypeOffre) 	ON DELETE CASCADE
                                                                   ON UPDATE CASCADE,
    foreign key(IDNiveauEtude) references niveauetude(IDNiveauEtude)
 	ON DELETE CASCADE
    ON UPDATE CASCADE

)engine=innodb;
alter table `offre` add column `updated_at` Datetime;
alter table `offre` add column `created_at` Datetime;

// ===================================TABLE CANDIDAT======================================

create table candidat (
	IDCandidat int(5) not null auto_increment,
	nomCandidat varchar (100) not null,
	prenomCandidat varchar (250) not null,
	emailCandidat varchar (50) not null unique,
	telephoneCandidat char (10)  unique,
	adresseCandidat varchar(120) not null,
	cpCandidat char (5),
	villeCandidat varchar (50) not null,
    loginCandidat varchar (50) not null unique,
    mdpCandidat varchar (255) not null,
    codePostalRegion int(5) not null,
    IDNiveauEtude int(5) not null,
	primary key(IDCandidat),
	foreign key(codePostalRegion) references region(codePostalRegion) 	ON DELETE CASCADE
	ON UPDATE CASCADE,
    foreign key(IDNiveauEtude) references niveauetude(IDNiveauEtude)
 	ON DELETE CASCADE
    ON UPDATE CASCADE

)engine=innodb;

alter table `candidat` add column `updated_at` Datetime;
alter table `candidat` add column `created_at` Datetime;


// ===================================TABLE CV======================================

CREATE TABLE cvcandidat
(
    IDCv int(5) NOT NULL AUTO_INCREMENT,
    nomCv varchar(50) NOT NULL,
    pathCv varchar(255) NOT NULL,
    primary key (IDCv),
    updated_at datetime DEFAULT NOW(),
    created_at datetime DEFAULT NOW()
) ENGINE=InnoDB;


// ===================================TABLE POSTULER======================================

create table postuler
(
	IDOffre int(5) not null,
	IDCandidat int(5) not null,
	IDCv int(5) not null,
	primary key (IDOffre,IDCandidat,IDCv),
	foreign key(IDOffre) references offre(IDOffre) 	ON DELETE CASCADE ON UPDATE CASCADE,
	foreign key(IDCandidat) references candidat(IDCandidat)
 	ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(IDCv) references cvcandidat(IDCv) ON DELETE CASCADE ON UPDATE CASCADE
)engine=innodb;

alter table `postuler` add column `updated_at` Datetime;
alter table `postuler` add column `created_at` Datetime;

alter table `postuler` add column `statutPostuler` int(1) default 2;



// ===================================TABLE DISPOSER======================================
create table disposer
(
	IDCandidat int(5) not null,
	IDCompetence int(5) not null,
	primary key (IDCandidat,IDCompetence),
	foreign key(IDCandidat) references candidat(IDCandidat) 	ON DELETE CASCADE
                                                                ON UPDATE CASCADE,
	foreign key(IDCompetence) references competence(IDCompetence)
 	ON DELETE CASCADE
    ON UPDATE CASCADE

)engine=innodb;

alter table `disposer` add column `updated_at` Datetime;
alter table `disposer` add column `created_at` Datetime;

// ===================================TABLE REQUERIR======================================
create table requerir
(
	IDOffre int(5) not null,
	IDCompetence int(5) not null,
	primary key (IDOffre,IDCompetence),
	foreign key(IDOffre) references offre(IDOffre) 	ON DELETE CASCADE
                                                       ON UPDATE CASCADE,
	foreign key(IDCompetence) references competence(IDCompetence)
 	ON DELETE CASCADE
    ON UPDATE CASCADE

)engine=innodb;

alter table `requerir` add column `updated_at` Datetime;
alter table `requerir` add column `created_at` Datetime;





// ===================================INSERTION======================================

insert into region (codePostalRegion, nomRegion) values
(null, 'ile de france');

(null, 'ains'),
(null, 'haut de france'),
(null, 'Guyane')
(null, 'Martinique');

insert into typeoffre (`IDTypeOffre`, `libelleTypeOffre`) values
(null, 'stage');

(null, 'alternance'),
(null, 'CDI'),
(null, 'CDD')
(null, 'interim');


insert into entreprise (`numeroSiret`, `raisonSociale`, `descEntreprise`, `adresseEntreprise`, `cpEntreprise`,`villeEntreprise`,`telEntreprise`, `emailEntreprise`, `loginEntreprise`, `mdpEntreprise`,`urlEntreprise`, `codePostalRegion` )
 values
(12345, 'Orange', 'vente de téléphone', '2 avenue de segur', '75007', 'Paris', '0123456789', 'orange@orange.com', 'orange@orange.com', 'orange', 'www.orange.com', 9),
(22345, 'ODIGO', 'Editeur de logiciel', '40 rue camille desmoulins', '92130', 'Issy-les-moulineaux', '0123456790', 'odigo@odigo.com', 'odigo@odigo.com', 'odigo', 'www.odigo.com', 8),
(32345, 'Accenture', 'Entreprise de logiciel', '6 rue de segura', '20000', 'Sainte Anne', '0123456779', 'accenture@accenture.com', 'accenture@accenture.com', 'accenture', 'www.accenture.net', 11),
(42345, 'PrefNord', 'Service  public', '5 boulevar victor', '59000', 'Lille', '0152456789', 'pref@pref.com', 'pref@pref.com', 'pref', 'www.pref.com', 8)
(52345, 'Arrow', 'Pharmacologie', '5 avenue de la marne', '69007', 'Lyon', '0156456789', 'arrow@arrow.com', 'arrow@arrow.com', 'arrow', 'www.arrow.net', 2);


insert into niveauetude (`IDNiveauEtude`, `libelleNiveauEtude`, `diplomeObtenu`) values
(null, 'Bac+1', 'BAC'),
(null, 'Bac+2', 'BTS'),
(null, 'Bac+3', 'Licence'),
(null, 'Bac+4', 'M1')
(null, 'Bac+5', 'M2');


insert into offre (`IDOffre`, `titreOffre`, `descOffre`, `datePubOffre`, `remuneration`,`dateDebutContrat`,`dureeContrat`, `statutOffre`, `IDTypeOffre`, `numeroSiret`,`IDNiveauEtude`)
 values
(null, 'Stage developpeur', 'Offre de stage developpeur ', '2022/02/01', '600.59', '2022/03/01', '6 mois', 'en attente de publication', 1, 1234, 1);

(null, 'Support systeme en alternance', 'Recherche profil support systeme ', '2021/02/01', '1200.0','2021/03/05', '1 ans', 'expiree', null, 2234, null),
(null , 'Administrateur de base de donnees', 'Recherche DBA confirme', '2022/02/01', '3200','2022/04/05', '1 ans', 'publiee', null, 3234, null),
(null ,  'Devops junior', 'Devenez Devops junior', '2020/02/01', '3000','2021/02/05', '6 mois', 'expiree', null, 4234, null)
(null , 'Ingenieur Securite', 'Offre ingenieur sécurite', '2021/02/01', '5000','2021/03/05', 'null', 'expiree', null, 5234, null);



insert into candidat (`IDCandidat`, `nomCandidat`, `prenomCandidat`, `adresseCandidat`, `cpCandidat`, `villeCandidat`, `loginCandidat`, `mdpCandidat`, `codePostalRegion`,`IDNiveauEtude`, `telephoneCandidat`,`emailCandidat`)
values (null, 'DIAZ', 'Paco ', '12 rue de la belle feuille', '69500', 'Lyon', 'paco@paco.com', 'paco', 1, 1 , '0650084988', 'paco@gmail.com'),
       (null, 'TOTO', 'Coumba ', '5 avenue de la marne', '59800', 'Lille', 'coumba@coumba.com', 'coumba', 2, 5, '0650078988', 'coumba@gmail.com'),
       (null, 'BEN', 'Ahmed ', '68 rue glaciale', '92130', 'Issy-les-moulineaux', 'ahmed@ahmed.com', 'ahmed', 4, 3, '0659584988', 'ahmed@gmail.com'),
       (null, 'CHOUAKY', 'Abder ', '12 rue de la belle feuille', '69500', 'Lyon', 'abder@abder.com', 'abder', 3, 1, '0655084988', 'abder@gmail.com')
       (null, 'TCHEN', 'Anne', '28 boulevard victor', '92600', 'Asnieres', 'anne@anne.com', 'anne', 1, 2,'0658284988', 'anne@gmail.com' );




insert into postuler (`IDCandidat`, `IDOffre`)
values (1, 1) ;

        (28, 12),
        (29, 13),
        (30, 14)
        (26, 15);


insert into competence (`IDCompetence`, `libelleCompetence`)
values (null, 'Programmation'),
(null, 'Support informatique'),
(null, 'Gestion de donnees'),
(null, 'Gestion de projet')
(null, 'Administration systeme');


insert into typecompetence (`IDTypeCompetence`, `libelleTypeCompetence`)
values (null, 'Technique'),
(null, 'Fonctionnel'),
(null, 'Technico_fonctonnel'),
(null, 'Suivi KPI')
(null, 'Solution reseaux');



insert into disposer (`IDCandidat`, `IDCompetence`)
values (1, 1) ;

        (13, 7),
        (14, 8),
        (15, 9)
        (11, 10);


insert into requerir (`IDOffre`, `IDCompetence`)
values (1, 1) ;


        (28, 7),
        (29, 8),
        (30, 9)
        (26, 10);

insert into concerner (`IDTypeCompetence`, `IDCompetence`)
values (1, 1);

// ===================================TABLE AVIS======================================


create table avis (
	IDavis int(5) not null auto_increment,
	rate int(5) not null,
   nomUser varchar(50) not null,
   prenomUser varchar(50) not null,
	descAvis varchar (250) not null,
   imageAvis varchar(250),
	primary key(IDAvis)
)engine=innodb;

alter table `avis` add column `updated_at` Datetime;
alter table `avis` add column `created_at` Datetime;




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

// ===================================TABLE CONTACT======================================
create table contact (
	IDContact int(5) not null auto_increment,
   nomContact varchar(50) not null,
   prenomContact varchar(50) not null,
   emailContact varchar(50) not null,
	objetContact varchar (50) not null,
   messageContact varchar(500) not null,
	primary key(IDContact)
)engine=innodb;

alter table `contact` add column `updated_at` Datetime;
alter table `contact` add column `created_at` Datetime;
// ===================================creation table partenaire======================================

create table partenaire (
	SiretPartenaire int(5) not null auto_increment,
   RaisonSocialePartenaire varchar(50) not null,
   siegePartenaire varchar(50) not null,
   cpPartenaire char(5) not null,
   villePartenaire varchar(50) not null,
   contactPartenaire varchar(50) not null unique,
	dateDebutPartenariat varchar (50) not null,
   logoPartenaire varchar(500) not null,
	primary key(SiretPartenaire)
)engine=innodb;


alter table `partenaire` add column `updated_at` Datetime;
alter table `partenaire` add column `created_at` Datetime;


// ===================================TRIGGER saisie date debut de contrat correcte======================================

DELIMITER //
DROP TRIGGER IF EXISTS insertdatedebutcontrat;
CREATE TRIGGER insertdatedebutcontrat
    BEFORE INSERT
    ON offre
    FOR EACH ROW
    IF NEW.dateDebutContrat < now() Then SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'la date saisie incorrecte!';
    End IF //
    DELIMITER ;



DELIMITER //
DROP TRIGGER IF EXISTS updatedatedebutcontrat;
CREATE TRIGGER updatedatedebutcontrat
    BEFORE UPDATE
    ON offre
    FOR EACH ROW
    IF NEW.dateDebutContrat < now() Then SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'la date saisie incorrecte!';
    End IF //
DELIMITER ;


-- auto-generated definition
create table candidat
(
    IDCandidat        int(5) auto_increment
        primary key,
    nomCandidat       varchar(100) not null,
    prenomCandidat    varchar(250) not null,
    adresseCandidat   varchar(120) not null,
    cpCandidat        char(5)      null,
    villeCandidat     varchar(50)  not null,
    loginCandidat     varchar(50)  not null,
    mdpCandidat       varchar(10)  not null,
    codePostalRegion  int(5)       not null,
    IDNiveauEtude     int(5)       not null,
    telephoneCandidat char(10)     null,
    emailCandidat     varchar(50)  null,
    CVCandidat        varchar(250) null,
    updated_at        datetime     null,
    created_at        datetime     null,
    constraint candidat_ibfk_1
        foreign key (codePostalRegion) references region (codePostalRegion)
            on update cascade on delete cascade,
    constraint candidat_ibfk_2
        foreign key (IDNiveauEtude) references niveauetude (IDNiveauEtude)
            on update cascade on delete cascade
);

create index IDNiveauEtude
    on candidat (IDNiveauEtude);

create index codePostalRegion
    on candidat (codePostalRegion);

// ===================================creation de la table des offre traitee======================================

create table offre_traitee (
    idoffretraitee int(5) not null auto_increment,
    titreoffretraitee varchar (100) not null ,
    descoffretraitee varchar (250) not null,
    datepuboffretraitee date not null,
    remunerationtraitee float (10,2),
	datedebutcontrattraitee date not null,
    dureecontrattraitee varchar (20) not null,
    statutoffretraitee varchar (50) not null,
    idtypeoffretraitee int(5),
    numerosirettraitee int(5),
    idniveauetudetraitee int(5),
	primary key(idoffretraitee),
	foreign key(numerosirettraitee) references entreprise(numeroSiret),
	foreign key(idtypeoffretraitee) references typeoffre(IDTypeOffre),
    foreign key(idniveauetudetraitee) references niveauetude(IDNiveauEtude)

)engine=innodb;

// ===================================TRIGGER archivage offre expiree/traitee======================================

drop trigger if exists archive_offre;
delimiter //
create trigger archive_offre
    after update
    on postuler
    for each row
begin
    if old.statutPostuler = 3 or old.statutPostuler = 1
    then
        if DATEDIFF(curdate(), old.updated_at) >= 14
        then
            insert into offre_traitee values ((select * from offre where IDOffre=old.IDOffre));
                end if;
        end if;

    end //
delimiter ;

// ===================================TRIGGER insertion pour hashage de mdp/CANDIDAT======================================

drop trigger if exists hashagedemdpcandidat;
delimiter //
create trigger hashagedemdpcandidat
	before insert on candidat
	for each row
	begin
	set new.mdpCandidat= password(new.mdpCandidat);
	end //
delimiter ;

// ===================================TRIGGER update pour hashage de mdp/CANDIDAT======================================

drop trigger if exists hashagedemdpcandidatup;
delimiter //
create trigger hashagedemdpcandidatup
	before update on candidat
	for each row
	begin
	set new.mdpCandidat= password(new.mdpCandidat);
	end //
	delimiter ;
// ===================================TRIGGER insertion pour hashage de mdp/ENTREPRISE======================================

drop trigger if exists hashagedemdpcandidat;
delimiter //
create trigger hashagedemdpcandidat
	before insert on candidat
	for each row
	begin
	set new.mdpCandidat= password(new.mdpCandidat);
	end //
delimiter ;
// ===================================TRIGGER update pour hashage de mdp/ENTREPRISE======================================

drop trigger if exists hashagedemdpcandidatup;
delimiter //
create trigger hashagedemdpcandidatup
	before update on candidat
	for each row
	begin
	set new.mdpCandidat= password(new.mdpCandidat);
	end //
	delimiter ;


