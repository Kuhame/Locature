-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

--
-- Base de données : `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--
DROP TABLE IF EXISTS utilisateur;
CREATE TABLE IF NOT EXISTS utilisateur(
    idUtilisateur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    motDePasse VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    role VARCHAR(30) NOT NULL,
    nomEntreprise VARCHAR(30) NOT NULL,
    UNIQUE(email),
    UNIQUE(nomEntreprise)
);

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO utilisateur(nom, prenom, motDePasse, email, role, nomEntreprise) VALUES
('Antoine', 'Clermont', 'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a', 'antoine.clermont@gmail.com', 'LOUEUR', 'Locature'),
('Jean', 'Reynard', '58cbeb133b400370638b61a08642178ecfddb761', 'j.reynard@gmail.com', 'CLIENT', 'Xiaomi'),
('Bob', 'Lennon', 'f820eb439570879ce3c583d98a85b0ffdf242161', 'bob.lennon@gmail.com', 'CLIENT', 'Huawei'),
('Nirussan', 'Sivanand', 'cd6861bc954d42bc3547d48170924f7b008e56dd', 'nirussan.sivanand@gmail.com', 'CLIENT', 'Acer');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--
DROP TABLE IF EXISTS voiture;
CREATE TABLE IF NOT EXISTS voiture(
    idVoiture INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idLoueur INT NOT NULL,
    modele VARCHAR(30) NOT NULL,
    prixJour DOUBLE NOT NULL,
    nbVoiture INT NOT NULL,
    caracteristique JSON,
    photo VARCHAR(50) NOT NULL,
    etatLocation tinyint(1) NOT NULL, -- 0 pour non disponible, 1 pour disponible --
    FOREIGN KEY (idLoueur) REFERENCES utilisateur(idUtilisateur),
    UNIQUE(modele)
);

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO voiture (idLoueur, modele, prixJour, nbVoiture, caracteristique, photo, etatLocation) VALUES
(1,'Dacia Sandero', 120, 5, '{"moteur": "Thermique", "vitesse": "Automatique", "carburant": "Essence", "nbPortes": 4 }', 'Sandero.jpg', 1),
(1,'Peugeot 208', 200, 10, '{"moteur": "Thermique", "vitesse": "Automatique", "carburant": "Essence", "nbPortes": 4 }', 'Peugeot208.jpg', 1),
(1,'Range Rover Evoque', 150, 12, '{"moteur": "Thermique", "vitesse": "Automatique", "carburant": "Essence", "nbPortes": 4 }', 'RangeRoverEvoque.jpg', 1),
(1,'Mercedes Classe A', 180, 8, '{"moteur": "Thermique", "vitesse": "Automatique", "carburant": "Essence", "nbPortes": 4 }', 'MercedesA.jpg', 1),
(1,'Tesla Model 3', 250, 4, '{"moteur": "Thermique", "vitesse": "Automatique", "carburant": "Essence", "nbPortes": 4 }', 'TeslaM3.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--
DROP TABLE IF EXISTS facture;
CREATE TABLE IF NOT EXISTS facture(
    idFacture INT NOT NULL AUTO_INCREMENT,
    idVoiture INT NOT NULL,
    nbCommande INT NOT NULL,
    idUtilisateur INT NOT NULL,
    dateDebut DATE NOT NULL,
    dateFin DATE NOT NULL,
    prix DOUBLE NOT NULL,
    etatReglement tinyint(1) NOT NULL, -- 0 pour non réglé, 1 pour réglé --
    PRIMARY KEY (idFacture,idVoiture,idUtilisateur,dateDebut),
    FOREIGN KEY (idVoiture) REFERENCES voiture(idVoiture),
    FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(idUtilisateur)
);

--
-- Déchargement des données de la table `facture`
--

INSERT INTO facture (idVoiture, nbCommande, idUtilisateur, dateDebut, dateFin, prix, etatReglement) VALUES
(1, 2, 2, '2021-11-19', '2021-11-20', 120, 1),
(3, 3, 3, '2021-11-21', '2021-11-29', 1200, 0),
(5, 1, 4, '2021-11-12', '2021-11-19', 1750, 1),
(2, 5, 2, '2021-11-18', '2021-11-30', 12000, 0),
(3, 1, 2, '2021-11-24', '2021-11-30', 900, 0),
(1, 6, 1, '2021-11-12', '2021-11-30', 12960, 0),
(4, 5, 1, '2021-11-26', '2021-11-30', 3600, 1);



