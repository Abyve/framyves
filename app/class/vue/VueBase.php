<?php
class VueBase {
    
    protected $membre;
    protected $cookie;
    protected $fichier;
    protected $corps;
    protected $footer;
    protected $rendu;
    protected $contenu;
    
    function __construct($c=null,$m='') {
       // echo 'on rentre dans la fonction construct de VueBase';
        $this->cookie=$c;
        $this->membre=$m;
        $this->corps='
        <!DOCTYPE html>
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
                                    </p>
                                </div> 
                            </div>';
            $this->footer='
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
            $this->contenu = '
            <div class="col-12 col-md-10 bg-light">
                <div>
                    <h1> Bienvenue sur ma galerie d\'image </h1>
                </div>
            </div>';
        
    }
    
    protected function show() {


        echo $this->corps.$this->contenu.$this->footer;


    }
}
    
    
    
    
    
    
    
                   
        
           
                                    
                        
                            
            