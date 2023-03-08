--Importer cette fichier dans votre outil de database mysql utiliseé .. . 

-- Créer la base de données
CREATE DATABASE fstelection;

-- Utiliser la base de données
USE fstelection;

-- Créer la table Etudiant
CREATE TABLE Etudiant (
    Matricule INT PRIMARY KEY,
    Nom VARCHAR(50),
    Prenom VARCHAR(50),
    Filiere VARCHAR(50),
    Telephone VARCHAR(20),
    Email VARCHAR(50),
    Mot_de_passe VARCHAR(50)
);

-- Créer la table Candidat
CREATE TABLE Candidat (
    ID_Candidat INT PRIMARY KEY,
    Nom VARCHAR(50),
    Prenom VARCHAR(50),
    Photo VARCHAR(50),
    Slogan VARCHAR(50)
);

-- Créer la table Vote
CREATE TABLE Vote (
    ID_Vote INT PRIMARY KEY,
    Matricule INT,
    ID_Candidat INT,
    FOREIGN KEY (Matricule) REFERENCES Etudiant(Matricule),
    FOREIGN KEY (ID_Candidat) REFERENCES Candidat(ID_Candidat)
);

-- Créer la table Election
CREATE TABLE Election (
    ID_Election INT PRIMARY KEY,
    Nom VARCHAR(50),
    Date_Debut DATE,
    Date_Fin DATE
);

-- Créer la table Participation_Election
CREATE TABLE Participation_Election (
    Matricule INT,
    ID_Election INT,
    PRIMARY KEY (Matricule, ID_Election),
    FOREIGN KEY (Matricule) REFERENCES Etudiant(Matricule),
    FOREIGN KEY (ID_Election) REFERENCES Election(ID_Election)
);

-- Créer la table Participation_Candidat
CREATE TABLE Participation_Candidat (
    ID_Candidat INT,
    ID_Election INT,
    PRIMARY KEY (ID_Candidat, ID_Election),
    FOREIGN KEY (ID_Candidat) REFERENCES Candidat(ID_Candidat),
    FOREIGN KEY (ID_Election) REFERENCES Election(ID_Election)
);