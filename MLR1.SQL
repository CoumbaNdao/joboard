/*
 ----------------------------------------------------------------------------
             Génération d'une base de données pour
                        SQL Server 2005
                       (10/2/2022 10:55:36)
 ----------------------------------------------------------------------------
     Nom de la base : joboard
     Projet : winDesign
     Auteur : Mame
     Date de dernière modification : 10/2/2022 9:45:17
 ----------------------------------------------------------------------------
*/

drop database joboard
go

/* -----------------------------------------------------------------------------
      OUVERTURE DE LA BASE joboard
----------------------------------------------------------------------------- */

create database joboard
go

use joboard
go



/* -----------------------------------------------------------------------------
      TABLE : TYPECOMPETENCE
----------------------------------------------------------------------------- */

create table TYPECOMPETENCE
  (
     IDTYPECOMPETENCE DB_TEXT, 5  not null  ,
     LIBELLETYPECOMPETENCE DB_TEXT, 255  not null  
     ,
     constraint PK_TYPECOMPETENCE primary key (IDTYPECOMPETENCE)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : CANDIDAT
----------------------------------------------------------------------------- */

create table CANDIDAT
  (
     IDETUDIANT DB_TEXT, 5  not null  ,
     IDNIVEAUETUDE DB_TEXT, 5  not null  ,
     CODEPOSTAL DB_TEXT, 5  not null  ,
     NOMETUDIANT DB_TEXT, 255  not null  ,
     PRENOMETUDIANT DB_TEXT, 255  not null  ,
     CV DB_TEXT, 255  not null  ,
     LM DB_TEXT, 255  not null  ,
     LOGINETDIANT DB_TEXT, 255  not null  ,
     MDPETUDIANT DB_TEXT, 255  not null  
     ,
     constraint PK_CANDIDAT primary key (IDETUDIANT)
  ) 
go



/*      INDEX DE CANDIDAT      */



/* -----------------------------------------------------------------------------
      TABLE : REGION
----------------------------------------------------------------------------- */

create table REGION
  (
     CODEPOSTAL DB_TEXT, 5  not null  ,
     NOMREGION DB_TEXT, 255  not null  
     ,
     constraint PK_REGION primary key (CODEPOSTAL)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : COMPETENCE
----------------------------------------------------------------------------- */

create table COMPETENCE
  (
     IDCOMPETENCE DB_TEXT, 5  not null  ,
     LIBELLECOMPETENCE DB_TEXT, 255  not null  
     ,
     constraint PK_COMPETENCE primary key (IDCOMPETENCE)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : TYPEOFFRE
----------------------------------------------------------------------------- */

create table TYPEOFFRE
  (
     IDTYPEOFFRE DB_TEXT, 5  not null  ,
     LIBELLETYPEOFFRE DB_TEXT, 255  not null  
     ,
     constraint PK_TYPEOFFRE primary key (IDTYPEOFFRE)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : OFFRE
----------------------------------------------------------------------------- */

create table OFFRE
  (
     IDOFFRE DB_TEXT, 5  not null  ,
     IDTYPEOFFRE DB_TEXT, 5  not null  ,
     SIRET DB_TEXT, 5  not null  ,
     TITREOFFRE DB_TEXT, 255  not null  ,
     DESCOFFRE DB_TEXT, 255  not null  ,
     DATEPUBOFFRE DB_DATE(8)  not null  ,
     REMUNERATION DB_CURRENCY(13,2)  not null  ,
     DATEDEBUTCONTRAT DB_DATE(8)  not null  ,
     DUREECONTRAT DB_TEXT, 255  not null  ,
     STATUTOFFRE DB_TEXT, 255  not null  
     ,
     constraint PK_OFFRE primary key (IDOFFRE)
  ) 
go



/*      INDEX DE OFFRE      */



/* -----------------------------------------------------------------------------
      TABLE : ENTREPRISE
----------------------------------------------------------------------------- */

create table ENTREPRISE
  (
     SIRET DB_TEXT, 5  not null  ,
     CODEPOSTAL DB_TEXT, 5  not null  ,
     RAISONSOCIALE DB_TEXT, 255  not null  ,
     ADRESSEENTREPRISE DB_TEXT, 255  not null  ,
     CPENTREPRISE DB_TEXT, 5  not null  ,
     VILLEENTREPRISE DB_TEXT, 255  not null  ,
     DESCENTREPRISE DB_TEXT, 255  not null  ,
     TELENTREPRISE DB_TEXT, 10  not null  ,
     EMAILENTREPRISE DB_TEXT, 255  not null  ,
     LOGINENTREPRISE DB_TEXT, 255  not null  ,
     MDPENTREPRISE DB_TEXT, 255  not null  ,
     URLENTREPRISE DB_TEXT, 255  not null  
     ,
     constraint PK_ENTREPRISE primary key (SIRET)
  ) 
go



/*      INDEX DE ENTREPRISE      */



/* -----------------------------------------------------------------------------
      TABLE : NIVEAUETUDE
----------------------------------------------------------------------------- */

create table NIVEAUETUDE
  (
     IDNIVEAUETUDE DB_TEXT, 5  not null  ,
     LIBELLENIVEAUETUDE DB_TEXT, 255  not null  
     ,
     constraint PK_NIVEAUETUDE primary key (IDNIVEAUETUDE)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : DISPOSER
----------------------------------------------------------------------------- */

create table DISPOSER
  (
     IDETUDIANT DB_TEXT, 5  not null  ,
     IDCOMPETENCE DB_TEXT, 5  not null  
     ,
     constraint PK_DISPOSER primary key (IDETUDIANT, IDCOMPETENCE)
  ) 
go



/*      INDEX DE DISPOSER      */



/* -----------------------------------------------------------------------------
      TABLE : POSTULER
----------------------------------------------------------------------------- */

create table POSTULER
  (
     IDETUDIANT DB_TEXT, 5  not null  ,
     IDOFFRE DB_TEXT, 5  not null  
     ,
     constraint PK_POSTULER primary key (IDETUDIANT, IDOFFRE)
  ) 
go



/*      INDEX DE POSTULER      */



/* -----------------------------------------------------------------------------
      TABLE : CONCERNER
----------------------------------------------------------------------------- */

create table CONCERNER
  (
     IDTYPECOMPETENCE DB_TEXT, 5  not null  ,
     IDCOMPETENCE DB_TEXT, 5  not null  
     ,
     constraint PK_CONCERNER primary key (IDTYPECOMPETENCE, IDCOMPETENCE)
  ) 
go



/*      INDEX DE CONCERNER      */



/* -----------------------------------------------------------------------------
      TABLE : ACQUERIR
----------------------------------------------------------------------------- */

create table ACQUERIR
  (
     IDCOMPETENCE DB_TEXT, 5  not null  ,
     IDOFFRE DB_TEXT, 5  not null  
     ,
     constraint PK_ACQUERIR primary key (IDCOMPETENCE, IDOFFRE)
  ) 
go



/*      INDEX DE ACQUERIR      */



/* -----------------------------------------------------------------------------
      TABLE : EXIGER
----------------------------------------------------------------------------- */

create table EXIGER
  (
     IDNIVEAUETUDE DB_TEXT, 5  not null  ,
     IDOFFRE DB_TEXT, 5  not null  
     ,
     constraint PK_EXIGER primary key (IDNIVEAUETUDE, IDOFFRE)
  ) 
go



/*      INDEX DE EXIGER      */



/* -----------------------------------------------------------------------------
      REFERENCES SUR LES TABLES
----------------------------------------------------------------------------- */



alter table CANDIDAT 
     add constraint FK_CANDIDAT_NIVEAUETUDE foreign key (IDNIVEAUETUDE) 
               references NIVEAUETUDE (IDNIVEAUETUDE)
go




alter table CANDIDAT 
     add constraint FK_CANDIDAT_REGION foreign key (CODEPOSTAL) 
               references REGION (CODEPOSTAL)
go




alter table OFFRE 
     add constraint FK_OFFRE_TYPEOFFRE foreign key (IDTYPEOFFRE) 
               references TYPEOFFRE (IDTYPEOFFRE)
go




alter table OFFRE 
     add constraint FK_OFFRE_ENTREPRISE foreign key (SIRET) 
               references ENTREPRISE (SIRET)
go




alter table ENTREPRISE 
     add constraint FK_ENTREPRISE_REGION foreign key (CODEPOSTAL) 
               references REGION (CODEPOSTAL)
go




alter table DISPOSER 
     add constraint FK_DISPOSER_CANDIDAT foreign key (IDETUDIANT) 
               references CANDIDAT (IDETUDIANT)
go




alter table DISPOSER 
     add constraint FK_DISPOSER_COMPETENCE foreign key (IDCOMPETENCE) 
               references COMPETENCE (IDCOMPETENCE)
go




alter table POSTULER 
     add constraint FK_POSTULER_CANDIDAT foreign key (IDETUDIANT) 
               references CANDIDAT (IDETUDIANT)
go




alter table POSTULER 
     add constraint FK_POSTULER_OFFRE foreign key (IDOFFRE) 
               references OFFRE (IDOFFRE)
go




alter table CONCERNER 
     add constraint FK_CONCERNER_TYPECOMPETENCE foreign key (IDTYPECOMPETENCE) 
               references TYPECOMPETENCE (IDTYPECOMPETENCE)
go




alter table CONCERNER 
     add constraint FK_CONCERNER_COMPETENCE foreign key (IDCOMPETENCE) 
               references COMPETENCE (IDCOMPETENCE)
go




alter table ACQUERIR 
     add constraint FK_ACQUERIR_COMPETENCE foreign key (IDCOMPETENCE) 
               references COMPETENCE (IDCOMPETENCE)
go




alter table ACQUERIR 
     add constraint FK_ACQUERIR_OFFRE foreign key (IDOFFRE) 
               references OFFRE (IDOFFRE)
go




alter table EXIGER 
     add constraint FK_EXIGER_NIVEAUETUDE foreign key (IDNIVEAUETUDE) 
               references NIVEAUETUDE (IDNIVEAUETUDE)
go




alter table EXIGER 
     add constraint FK_EXIGER_OFFRE foreign key (IDOFFRE) 
               references OFFRE (IDOFFRE)
go




/*
 -----------------------------------------------------------------------------
               FIN DE GENERATION
 -----------------------------------------------------------------------------
*/