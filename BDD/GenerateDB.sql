/* CREATE DATABASE IF NOT EXISTS DBFORUM; */

CREATE TABLE IF NOT EXISTS user (
  idUser     INT(6) AUTO_INCREMENT PRIMARY KEY,
  prenom     VARCHAR(255) NOT NULL,
  nom        VARCHAR(255) NOT NULL,
  pseudo     VARCHAR(255) NOT NULL,
  motdepasse VARCHAR(255) NOT NULL,
  avatar  VARCHAR(255),
  admin TINYINT(1) NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS topic(
  idTopics INT(6) AUTO_INCREMENT PRIMARY KEY,
  label VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS post(
  idPost INT(6) AUTO_INCREMENT PRIMARY KEY,
  datecreation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  titre VARCHAR(255) NOT NULL,
  idTopic INT(6) NOT NULL,
  idUser INT(6) NOT NULL,
  FOREIGN KEY (idTopic) REFERENCES topic(idTopics),
  FOREIGN KEY (idUser) REFERENCES user (idUser)
);

CREATE TABLE IF NOT EXISTS message(
  idMessage INT(6) AUTO_INCREMENT PRIMARY KEY,
  contenu LONGTEXT NOT NULL,
  dateEdit DATE,
  postit TINYINT(1)
);

CREATE TABLE IF NOT EXISTS moderator(
  idTopics INT,
  idUser INT,
  FOREIGN KEY (idTopics) REFERENCES TOPIC(idTopics),
  FOREIGN KEY (idUser) REFERENCES user (idUser),
  CONSTRAINT mod_key PRIMARY KEY (idUser, idTopics)
);

CREATE TABLE IF NOT EXISTS userblocked(
  idTopics INT,
  idUser INT,
  FOREIGN KEY (idTopics) REFERENCES TOPIC(idTopics),
  FOREIGN KEY (idUser) REFERENCES user (idUser),
  CONSTRAINT mod_key PRIMARY KEY (idUser, idTopics)
);

INSERT INTO user (prenom, nom, pseudo, motdepasse, admin)
    VALUES('Remy', 'NIVOIS','Desfit','projetforum',1),('Allan', 'DRELANGUE','Lutti','projetforum',1),('Michel', 'RACAUD','GoT','projetforum',1);

INSERT INTO topic(label)
    VALUES('Topic 1'),('Topic 2');

INSERT INTO post(titre, idTopic, idUser)
    VALUES('Post1',1,1),('post2',1,1),('Post1',2,1),('post2',2,1);

INSERT INTO moderator(idTopics, idUser) VALUES(1,2),(2,2),(1,1),(2,1),(1,3);
