CREATE DATABASE easy2drive CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE easy2drive;
CREATE TABLE utilisateur (
id INT NOT NULL PRIMARY KEY,
login VARCHAR(50) NOT NULL,
passwordHash VARCHAR(100) NOT NULL,
nom VARCHAR(50) NOT NULL,
prenom VARCHAR(50) NOT NULL,
email VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO utilisateur VALUES(1,'toni','123456','toni','toni','toni@easy2drive.fr');
INSERT INTO utilisateur VALUES(2,'carole','123456','carole','carole','carole@easy2drive.fr');

CREATE TABLE eleve (
idUtilisateur INT REFERENCES utilisateur(id),
dateNaissance DATE NOT NULL,
rue VARCHAR(100) NOT NULL,
codePostal VARCHAR(5) NOT NULL,
ville VARCHAR(100) NOT NULL,
dateInscription DATE NOT NULL,
NEPH VARCHAR(10),
dateETG DATE,
echecETG BOOLEAN,
garantieReussite BOOLEAN,
PRIMARY KEY(idUtilisateur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO eleve VALUES(1,'1990-11-20','69 rue de Turbigo','75003','Paris','2023-02-01','neph1234','2023-03-15',0,1);

CREATE TABLE moderateur (
idUtilisateur INT NOT NULL REFERENCES utilisateur(id),
PRIMARY KEY(idUtilisateur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into moderateur VALUES(2);

CREATE TABLE avis (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
contenu VARCHAR(1000),
dateDepot DATE,
publie BOOLEAN,
modere BOOLEAN,
idEleve INT REFERENCES eleve(idUtilisateur),
idModerateur INT REFERENCES moderateur(idUtilisateur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


