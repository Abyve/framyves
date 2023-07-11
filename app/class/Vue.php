<?php

class Vue {
    private $cookie;
    function __construct($cook) {
        echo 'on rentre dans la fonction construct de vue';
        $this->cookie=$cook;

    }
    function affiche(){

        $resultat='<!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
                <link rel="stylesheet" type="text/css" href="style.css" />
                <meta charset="UTF-8" />
                <title>Galerie image</title>
                <link rel="stylesheet" type="text/css" href="style.css" />
            </head>
            <body>
                <div class="container ">
                    <div class="row">
                        <div class="col" id="banner">				
                           <a href="index.php"> <img class="rounded img-fluid" src="./app/img/banner.png"  alt="Bannière"/></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 bg-light">
                        <h1>Bienvenue '.$this->cookie.'</h1>
                    </div>
                </div>';
               // echo ' </br> fichier courant'.$_SERVER['PHP_SELF'].'</br>';*/
                //$resultat = 'page retournee </br>' ;
                return $resultat;




    }





}