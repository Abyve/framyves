<?php

class Vue {
    private $cookie;
    private $corps;
    private $footer;
    function __construct($cook=null) {
       // echo 'on rentre dans la fonction construct de vue';
        $this->cookie=$cook;
        $this->corps='<!DOCTYPE html>
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
                           <a href="index-1-1"> <img class="rounded img-fluid" src="./app/img/banner.png"  alt="Bannière"/></a>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col col-md-2 bg-secondary">
	                        <div class="mx-auto" >
		                    <p class="mx-auto">
			                <a href="index-2-1" >
				            <img class="rounded img-fluid mt-2"  alt="bouton inscription" src="./app/img/button-inscription.png"/>
			                </a>				
			                <a href="index-3-1" >
				            <img class="rounded img-fluid mt-2" alt="bouton connexion"  src="./app/img/button-connexion.png"/>
			                </a>
							</div>
                        </div>';
            $this->footer=  '<div class="row bg-danger">		
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

    }
    function index(){

        $resultat='<div class="col-12 col-md-10 bg-light">
                        <h1>Bienvenue '.$this->cookie.'</h1>
                        </br>
                        </div>
                    </div>    
                   '; 
               // echo ' </br> fichier courant'.$_SERVER['PHP_SELF'].'</br>';*/
                //$resultat = 'page retournee </br>' ;
                return $this->corps.$resultat.$this->footer;




    }

    function inscription($err,$email,$nom,$prenom,$pwd_form) {

        $error=$err;
        echo $this->corps;
        echo'
                        <div class="col-12 col-md-10 bg-light">
            ';
             if (isset($_POST['submit']) AND !$error){
                echo'
                            <div>
                            Toutes les données ont été soumises.
                            </div>
                        </div>
                    </div>';
             }
            else {
        echo'                   <div>
                                    <form action="index-2-1" method="POST">
                                    <div>
                                        <label for="email">Email : </label>
                                        <input type="text" id="email" name="email" value="'.$email.'"/>
                                    </div>';
                        if ($error AND empty($email)){
                echo'
                                    <div class="erreur">Le champ email est obligatoire
                                    </div>';
                        }
        echo'          
                                
                                    <div>
                                        <label for="nom">Nom : </label>
                                        <input type="text" id="nom" name="nom" value="'.$nom.'" />
                                    </div>';
                if ($error AND empty($nom)){
                echo'               
                                    <div class="erreur">Le champ nom est obligatoire
                                    </div>';
                }
        echo '                      <div>
                                        <label for="prenom">Prénom : </label>
                                        <input type="text" id="prenom" name="prenom" value="'.$prenom.'" />
                                    </div>';
                if ($error AND empty($prenom)) {
                echo'
                                    <div class="erreur">Le champ prénom est obligatoire
                                    </div>
                    ';
                }
        echo'                       <div>
                                        <label for="pwd_form">Mot de passe </label>
                                        <input type="text" id="pwd_form" name="pwd_form" value="'.$pwd_form.'" />
                                    </div>';
                    if ($error AND empty($pwd_form)){
                echo'
                                    <div class="erreur">Le champ Mot de passe est obligatoire
                                    </div>
                    ';
        
                }
        echo'                        <div>
                                        <label for="submit">&nbsp;</label>
                                        <input type="submit" name="submit" value="Envoyer" />
                                    </div>
                                    </form>
                                </div>
                            </div> 
                        </div>   ';
            }
        echo $this->footer;
    }

    function connexion($error=false,$email='',$pwd_connexion='') {
        
        
        echo $this->corps;
        echo'
                        <div class="col-12 col-md-10 bg-light">
            ';
            if (isset($_POST['submit']) AND !$error){
            echo '  <div>
                    '. header('location:index-1-1').';
                    Connexion réussi!! 
                    Lien vers la page d\'accueil
                    <a href="index-1-1">Accueil</a>
                    </div>
                </div>
            </div>
                    ';
                }

            else {
                echo'<div>
                        <form action="index-3-1" method="POST">';
                        
                echo'       <div>
                                <label for="email">Email : </label>
                                 <input type="text" id="email" name="email" value="'.$email.'" />';
                                if ($error AND empty($email)){
                                echo'<div class="erreur">Le champ email est obligatoire</div>';
                            }
                             echo'</div>';
                echo'       <div>
                                <label for="pwd_connexion">Mot de passe </label>
                                <input type="text" id="pwd_connexion" name="pwd_connexion" value="'.$pwd_connexion.'" />';
                                if ($error AND empty($pwd_connexion)){
                                echo'<div class="erreur">Le champ Mot de passe est obligatoire</div>
                            ';
                            }       
                echo'        </div>
                            <div>
                                 <label for="submit"></label>
                                <input type="submit" name="submit" value="Envoyer" />
                            </div>
                         </form>
                    </div>
                </div>
            </div>
        ';
            }
            echo '$_COOKIE est égale à '.$_COOKIE['email'].$this->footer;






    }

    function fichier($result) {
        echo $this->corps;
        echo'
        <div class="col-12 col-md-10 bg-light">
        ';
        if (isset($result)) {
            echo $result.'</div>
            </div>';
        }
        else {
            echo'
                <form method="POST" action="index-4-1" enctype="multipart/form-data" >
                <label for="upload_files"> Veuilliez choisir un fichier image a importer</label>
                <input type="hidden" name="MAX_VALUE_FILES" value="100000">
                <input type="file" name="upload_files" id="upload_files">
                <input type="submit" value="Envoyer" name="envoyer">
                </form>
            </div>
            </div>';
        }
        echo $this->footer;
    }





}