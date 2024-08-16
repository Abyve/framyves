/*
ajout d'une contrainte d'unicite d'email sur la table membres
*/
 ALTER TABLE membres ADD CONSTRAINT unique_email UNIQUE(email);



/* 
***LE 220523 script sql pour galerieimage*** 
*/

CREATE DATABASE galerieimg;

USE galrieimg;

#creer tables


CREATE TABLE membres (
    numuser INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nam VARCHAR(100),
    firstname VARCHAR(100),
    email VARCHAR(255),
    pwd VARCHAR(255));


CREATE TABLE images (
    numimg INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    numuser INT,
    FOREIGN KEY (numuser)  REFERENCES membres(numuser),    
    nameimg VARCHAR(100),
    adressimg VARCHAR(250));



#creer un user avec password et authorisation sur bdd

CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';
GRANT SELECT, INSERT, UPDATE, DELETE ON `galrieimg`.* TO 'user'@'localhost';