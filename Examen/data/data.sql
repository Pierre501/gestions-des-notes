create database BddModeleNote;
use BddModeleNote;

create table if not exists `etudiant`(
	`ETU` char(10) not null,
	`Nom` varchar(40) not null,
	`Prenom` varchar(40) not null,
	`Date_de_naissance` date not null,
	`Lieu_de_naissance` varchar(30) not null,
	`Inscrit` varchar(30) not null,
	primary key(`ETU`)
)engine = innodb default charset=latin1;

create table if not exists `matiere`(
	`UE` char(10) not null,
	`Intitule` varchar(100) not null,
	`Credit` int not null,
	`Semestre` varchar(20) not null,
	primary key(`UE`)
)engine = innodb default charset=latin1;

create table if not exists `note`(
	`id_note` int not null auto_increment,
	`ETU` char(10) not null,
	`UE` char(10) not null,
	`Valeur` int not null,
	primary key(`id_note`),
	foreign key (`ETU`) references etudiant (`ETU`),
	foreign key (`UE`) references matiere (`UE`)
);

create table if not exists `admin`(
	`Login` varchar(40) not null,
	`Mdp` varchar(100) not null
);
insert into admin values('prof@gmail.com','1234');

insert into etudiant values('1001', 'RAKOTO', 'Julio', '2000-05-11', 'Antananarivo', 'M1 informatique');
insert into etudiant values('1002', 'RASOA', 'Nancy', '2001-11-23', 'Toamasina', 'M1 informatique');


insert into matiere values('INF401', 'Base de données d\'entreprises', 6, 'semestre 1');
insert into matiere values('INF402', 'Structure de données avancées', 3, 'semestre 1');
insert into matiere values('INF403', 'Programmation web avancé', 6, 'semestre 1');
insert into matiere values('INF404', 'Interface graphique client lourd', 3 , 'semestre 1');
insert into matiere values('INF405', 'Design Pattern', 6, 'semestre 1');
insert into matiere values('INF406', 'Programmation distribuée et web services', 3, 'semestre 1');
insert into matiere values('INF407', 'Recherche opérationnelle', 3, 'semestre 1');
insert into matiere values('INF408', 'Programmation par contrainte', 4, 'semestre 2');
insert into matiere values('INF409', 'Codage de l\'information', 3, 'semestre 2');
insert into matiere values('INF410', 'Architecture multi-tiers', 4, 'semestre 2');
insert into matiere values('INF411', 'Programmation mobile', 6, 'semestre 2');
insert into matiere values('INF412', 'Traitement de signal', 4, 'semestre 2');
insert into matiere values('INF413', 'ERP et Systeme d\'information', 3, 'semestre 2');
insert into matiere values('INF414', 'Projet informatique', 6, 'semestre 2');


insert into note values(null, '1001', 'INF401', 12);
insert into note values(null, '1001', 'INF402', 10);
insert into note values(null, '1001', 'INF403', 9);
insert into note values(null, '1001', 'INF404', 17);
insert into note values(null, '1001', 'INF405', 6);
insert into note values(null, '1001', 'INF406', 11);
insert into note values(null, '1001', 'INF407', 14);
insert into note values(null, '1001', 'INF408', 10);
insert into note values(null, '1001', 'INF409', 5);
insert into note values(null, '1001', 'INF410', 11);
insert into note values(null, '1001', 'INF411', 10);
insert into note values(null, '1001', 'INF412', 9);
insert into note values(null, '1001', 'INF413', 13);
insert into note values(null, '1001', 'INF414', 15);
insert into note values(null, '1002', 'INF401', 5);
insert into note values(null, '1002', 'INF402', 11);
insert into note values(null, '1002', 'INF403', 10);
insert into note values(null, '1002', 'INF404', 7);
insert into note values(null, '1002', 'INF405', 13);
insert into note values(null, '1002', 'INF406', 15);
insert into note values(null, '1002', 'INF407', 11);
insert into note values(null, '1002', 'INF408', 8);
insert into note values(null, '1002', 'INF409', 12);
insert into note values(null, '1002', 'INF410', 7);
insert into note values(null, '1002', 'INF411', 10);
insert into note values(null, '1002', 'INF412', 10);
insert into note values(null, '1002', 'INF413', 12);
insert into note values(null, '1002', 'INF414', 9);


create or replace view v_notes as select
	etudiant.ETU,
	etudiant.Nom,
	etudiant.Prenom,
	etudiant.Date_de_naissance,
	etudiant.Lieu_de_naissance,
	matiere.UE,
	matiere.Intitule,
	matiere.Credit,
	matiere.Semestre,
	note.Valeur
from etudiant join note on etudiant.ETU = note.ETU join matiere on note.UE = matiere.UE;

