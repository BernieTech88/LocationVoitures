CREATE DATABASE IF NOT EXISTS location_voitures CHARACTER SET utf8mb4;
USE location_voitures;

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    telephone VARCHAR(50)
);

CREATE TABLE voitures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(100) NOT NULL,
    modele VARCHAR(100) NOT NULL,
    annee INT NOT NULL,
    immatriculation VARCHAR(50) NOT NULL UNIQUE,
    prix_jour DECIMAL(10,2) NOT NULL
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    voiture_id INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    statut ENUM('en_attente','confirmee','annulee') DEFAULT 'en_attente',
    CONSTRAINT fk_res_client FOREIGN KEY (client_id)
        REFERENCES clients(id),
    CONSTRAINT fk_res_voiture FOREIGN KEY (voiture_id)
        REFERENCES voitures(id)
);

CREATE TABLE options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prix_jour DECIMAL(10,2) NOT NULL
);

CREATE TABLE reservation_option (
    reservation_id INT NOT NULL,
    option_id INT NOT NULL,
    PRIMARY KEY (reservation_id, option_id),
    CONSTRAINT fk_ro_res FOREIGN KEY (reservation_id)
        REFERENCES reservations(id),
    CONSTRAINT fk_ro_opt FOREIGN KEY (option_id)
        REFERENCES options(id)
);