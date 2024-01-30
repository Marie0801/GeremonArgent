CREATE TABLE IF NOT EXISTS utilisateur (
    numUtilisateur INT  NOT NULL AUTO_INCREMENT,
    nom VARCHAR (50) NOT NULL,
    prenom VARCHAR (50) NOT NULL,
    numTel INT NOT NULL,
    email VARCHAR (50) NOT NULL,
    motDePasse VARCHAR (50) NOT NULL,
    PRIMARY KEY (numUtilisateur)
    
);

CREATE TABLE IF NOT EXISTS sourceRevenue (
    numSource INT  NOT NULL AUTO_INCREMENT,
    nom VARCHAR (50) NOT NULL,
    descript VARCHAR (100) NOT NULL,
    typeSource VARCHAR (50) NOT NULL,
    PRIMARY KEY (numSource)
    
);

CREATE TABLE IF NOT EXISTS revenu (
    numRevenue INT  NOT NULL AUTO_INCREMENT,
    numSource INT NOT NULL,
    montant INT NOT NULL,
    dateReception DATE NULL,
    PRIMARY KEY (numRevenue),
    FOREIGN KEY (numSource) REFERENCES sourceRevenue (numSource)
    
);

CREATE TABLE IF NOT EXISTS dettes (
    numDette INT  NOT NULL AUTO_INCREMENT,
    montant INT NOT NULL,
    creancier VARCHAR (50) NOT NULL,
    dateDebut DATE NOT NULL,
    dateFin DATE NOT NULL,
    PRIMARY KEY (numDette),

);

CREATE TABLE IF NOT EXISTS repartitition (
    numero INT  NOT NULL AUTO_INCREMENT,
    numRevenue INT NOT NULL,
    dime INT NOT NULL,
    epargne INT NOT NULL,
    donDeCharite INT NULL,
    numDette INT NOT NULL,
    autresDepense INT NOT NULL,
    PRIMARY KEY (numero),
    FOREIGN KEY (numRevenue) REFERENCES revenu (numRevenue),
    FOREIGN KEY (numDette) REFERENCES dettes (numDette)
    
    
);





