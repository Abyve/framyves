<?php

class Vue {
    private $cookie;
    function __construct($cook) {
       // echo 'on rentre dans la fonction construct de vue';
        $this->cookie=$cook;

    }
    function affiche(){

        $resultat='<!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
                <meta charset="UTF-8" />
                <title>Galerie image</title>
                <link rel="stylesheet" type="text/css" href="style.css" />
            </head>
            <body>
                <div class="container">
                    <div class="row">
                        <div class="col col-md-12 " id="banner">				
                           <a href="index.php"> <img class="rounded img-fluid" src="./app/img/banner.png"  alt="Bannière"/></a>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col col-md-2 bg-secondary">
	                        <div class="mx-auto" >
		                    <p class="mx-auto">
			                <a href="inscription.php" >
				            <img class="rounded img-fluid mt-2"  alt="bouton inscription" src="./app/img/button-inscription.png"/>
			                </a>				
			                <a href="connexion.php" >
				            <img class="rounded img-fluid mt-2" alt="bouton connexion"  src="./app/img/button-connexion.png"/>
			                </a>
							</div>
                        </div>
                        <div class="col-12 col-md-10 bg-light">
                        <h1>Bienvenue '.$this->cookie.'</h1>
                        </div>
                    </div>    
                    <div class="row bg-danger">		
	                    <div class="col-8 md-2">			
		                    <p>Réalisé en 2023 par Yves Abiven au sein du CNAM 
		                    </p>				
	                    </div>					
	                    <div class="col-4">					
		                    <p class="md-2">				
		                    <img id="license" alt="license CCBYSA" src="./app/img/CCBYSA.png" />		
		                    </p>		
	                    </div>
                    </div>
                </div>
            </body>
        </html>';
               // echo ' </br> fichier courant'.$_SERVER['PHP_SELF'].'</br>';*/
                //$resultat = 'page retournee </br>' ;
                return $resultat;




    }





}