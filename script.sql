CREATE DATABASE voyage;
USE voyage;
CREATE TABLE client(
  id_client  int(11) AUTO_INCREMENT,
  nom varchar(100),
  prenom varchar(100),
  email varchar(150) UNIQUE,
  telephone varchar(15),
  address text,
  date_naissance date,
  PRIMARY KEY (id_client)
);
CREATE TABLE activete(
  id_activite int(11) AUTO_INCREMENT,
  titre varchar(150),
  description text,
  destination varchar(100),
  prix decimal(10,2) NOT NULL,
  date_debut date,
  date_fin date,
  places_disponible int(11),
  PRIMARY KEY (id_activite)
);
CREATE TABLE reservation(
  id_reservation int(11) AUTO_INCREMENT,
  id_client int(11),
  id_activite int(11),
  date_reservation timestamp,
  statut enum('En attenT','Confirmée','Annulée'),
  PRIMARY KEY (id_reservation),
  FOREIGN KEY (id_client) REFERENCES client(id_client),
  PRIMARY KEY (id_activite) REFERENCES activete(id_activite)
)