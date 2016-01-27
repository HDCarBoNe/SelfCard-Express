CREATE TABLE IF NOT EXISTS Eleve (
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE ,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    credit SMALLINT(5), -- Si le regime est externe. Partant du principe que les autres élèves paie un forfait
    classe VARCHAR(5),
    regime VARCHAR(2),
    adresse VARCHAR(35),
    code_postal SMALLINT(5) NOT NULL,
    date_naissance DATE NOT NULL,
    Ville VARCHAR(20) NOT NULL,
    info_supp TEXT(255),
    PRIMARY KEY (id),
    UNIQUE INDEX ind_uni_nom_prenom (nom, prenom) -- index unique  sur le nom et le prenom
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Prof(
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE ,
	nom VARCHAR(20) NOT NULL,
  prenom VARCHAR(20) NOT NULL,
  credit SMALLINT(5),
  classe_tit VARCHAR(5),
	adresse VARCHAR(35),
  date_naissance DATE NOT NULL,
  ville VARCHAR(20) NOT NULL,
  code_postal SMALLINT(5) NOT NULL,
  info_supp TEXT(255),
  PRIMARY KEY (id),
  UNIQUE INDEX ind_uni_nom_prenom (nom, prenom) -- index unique sur le nom et le prenom
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Admin (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nbr_rps_prevu SMALLINT NOT NULL,
  nbr_rps_servi SMALLINT NOT NULL,
	PRIMARY KEY (id)
)ENGINE=INNODB;
