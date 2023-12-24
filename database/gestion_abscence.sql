CREATE TABLE IF NOT EXISTS `direction`
(
    `code_direction` int(11) NOT NULL,
    `direction` varchar(255) DEFAULT NULL,
    `supprime` tinyint(1) DEFAULT NULL,
    `abrev_direction` varchar(50) DEFAULT NULL,
    `organisme` tinyint(1) DEFAULT NULL,
    `entite_drh` tinyint(1) DEFAULT NULL,
    `active` tinyint(1) DEFAULT NULL,
    PRIMARY KEY (`code_direction`)
);

CREATE TABLE IF NOT EXISTS `service`
(
    `code_service` int(11) NOT NULL,
    `code_direction` int(11) NOT NULL,
    `service` varchar(255) NOT NULL,
    `supprime` tinyint(1) DEFAULT NULL,
    `abrev_service` varchar(255) NOT NULL,
    `organisme` tinyint(1) DEFAULT NULL,
    `active` tinyint(1) DEFAULT NULL,
    PRIMARY KEY (`code_service`),
    FOREIGN KEY(`code_direction`) REFERENCES `direction`(`code_direction`)
);



CREATE TABLE IF NOT EXISTS `personnels`
(
    `matricule` VARCHAR(30) UNIQUE NOT NULL,
    `nom` VARCHAR(100) NOT NULL,
    `prenom` VARCHAR(100) NOT NULL,
    `cin` VARCHAR(12) NOT NULL,
    `telephone` VARCHAR(15) NOT NULL,
    `adresse` VARCHAR(100),
    `email` VARCHAR(60) UNIQUE,
    `mot_de_passe` VARCHAR(100) NOT NULL,
    `is_admin` BOOLEAN DEFAULT 0,
    `poste` VARCHAR(50) NOT NULL,
    `direction` int(11) NOT NULL,
    `service` int(11) NOT NULL,
    `etat` ENUM('En congé', 'Actif', 'Non actif', 'Abscent') DEFAULT 'Non actif',
    PRIMARY KEY(`matricule`),
    FOREIGN KEY(`direction`) REFERENCES `direction`(`code_direction`),
    FOREIGN KEY(`service`) REFERENCES `service`(`code_service`)
);

CREATE TABLE IF NOT EXISTS `abscence`
(
    `id_conge` INT(10) AUTO_INCREMENT,
    `matricule` VARCHAR(30) NOT NULL,
    `date_demande` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `debut` DATE NOT NULL,
    `fin` DATE NOT NULL,
    `nb_jours` INT(10) NULL,
    `annee_abs` YEAR NOT NULL,
    `type` ENUM('Persmission', 'Congé annuel', 'Congé de maternité', 'Congé de paternité', 'Autorisation d''abscence') NOT NULL,
    `motif` VARCHAR(100),
    `statut` ENUM('Approuvée', 'Rejetée', 'En attente') DEFAULT 'En attente',
    PRIMARY KEY(`id_conge`),
    FOREIGN KEY(`matricule`) REFERENCES `personnels`(`matricule`)

);

CREATE TABLE IF NOT EXISTS `decompte`
(
    `id_decompte` INT(10) AUTO_INCREMENT,
    `annee` YEAR NOT NULL,
    `matricule` VARCHAR(30) NOT NULL,
    `nb_jours` INT(10) DEFAULT 30,
    PRIMARY KEY(`id_decompte`),
    FOREIGN KEY(`matricule`) REFERENCES `personnels`(`matricule`)
);

