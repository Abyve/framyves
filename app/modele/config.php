<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
// Nom de l'utilisateur
$user = 'user';
// Mot de passe de l'utilisateur
$pwd = 'password';
// Adresse du serveur
$host = 'localhost';
// Nom de la base
$bdd = 'galerieimg';
// Chaine de connexion
$dsn = 'mysql:dbname=' . $bdd . ';host=' . $host;
