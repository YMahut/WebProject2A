/*----------------------------------------------------
/	Script de création de table
/	
/	Youri MAHT ESIGELEC 08/11/2015
/-----------------------------------------------------*/
CREATE TABLE matchTab(
	idMatch INT PRIMARY KEY NOT NULL,
	lieuMatch VARCHAR (255),
	heureMatch VARCHAR (255),
	nomMatch VARCHAR (255),
	dateMatch VARCHAR (255);
)
CREATE TABLE membre(
	idMembre INT PRIMARY KEY NOT NULL,
	genreMembre	char(1),
	prenomMembre varchar(254),	
	nomMembre varchar(254),
	mailMembre varchar(254),	
	mdpMembre varchar(254),
	dateNaissanceMembre	date,	
	telephoneMembre INT(10);
)
CREATE TABLE reservation(
	idReservation INT PRIMARY KEY NOT NULL,
	idTrajet INT(255),
	idMembre INT(255);
)
CREATE TABLE trajet(
		idTrajet	int(255),
	villeDep varchar(255),
	villeArr varchar(255),
	heureDep varchar(5),
	heureArr varchar(5),
	nbPlace	int(2),
	dateDep	date,
	idMatch	int(255),
	idConducteur INT(255);
)