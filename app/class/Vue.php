<?php

class Vue {
    private $membre;
    private $cookie;
    private $fichier;
    private $corps;
    private $footer;
    private $rendu;
    
    function __construct($cook=null,$membre='') {
       // echo 'on rentre dans la fonction construct de vue';
        $this->cookie=$cook;
        $this->membre=$membre;
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
            $this->footer=  '
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

    }
    function index($deconnexion=false,$resultFichier='',$action=1,$images=''){

        
        $resultat='
                            <div class="col-12 col-md-10 bg-light">
                                <div>
                                    <h1>Bienvenue '.$this->cookie.'</h1>'.$this->membre;
                            
        $afficheFichierForm=$this->fichier($resultFichier);
                    
                   
        
            $div='
                                        <p>
                                            <a href="index-5-1"> Deconnexion </a><br /> 
                                            <a href="index-1-2">Afficher toutes vos images</a><br />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>';
                
        
               // echo ' </br> fichier courant'.$_SERVER['PHP_SELF'].'</br>';*/
                //$resultat = 'page retournee </br>' ;
                
                if (!empty($this->cookie)){
                    $this->rendu= $this->corps.$resultat.$afficheFichierForm.$div ;//</div> </div>';
                    
                    //echo '$action dans vue est égale à '.$action.'<br />';
                    if ($action==2) {
                        //var_dump($images);
                        
                        $tableImgDiv='
                        <div class="row">
                            <div class="col-12 bg-light">
                                <div>
                                    <table class="table">';
                       ;
                        $table='';
                        if (!empty($images)){
                            foreach ($images as $key => $value) {
                                //echo 'on rentre le foreach 1 <br />';
                                //foreach($value as $val) {
                                    //echo 'on rentre dans le foreach 2 <br />';
                                    //$i++;
                                    
                                    
                                    $adressImg[]=$value['adressimg'];
                                    //var_dump($adressImg); echo '</br> vardump de $adressImg<br />';
                                    $numImg[] = $value['numimg'];
                                    //var_dump($numImg);
                                    //echo 'var dump de numImmg <br />';
                                }
                                
                            for ($i=0;$i<=count($adressImg)-1;$i++)
                            {   //echo $i.'$i <br />';
                                if($i%2==0){$table=$table.'
                                            <tr>';}
                                        $table=$table.'
                                                <td>    
                                                    <img src="'.$adressImg[$i].'" width=160 height=160.>; 
                                                </td>
                                                <td>
                                                    <a href="index-6-'.$numImg[$i].'"> Supp Image </a>
                                                </td>';
                                if($i%2>0){$table=$table.'
                                            </tr>';}
                                            //var_dump($numImg);
                                            //echo 'var dump de numImmg <br />';
                                    //if ($i>=5) {echo'<br />';$i=0;};
                                    //echo '</td></tr>';
                                    
                        
                            
                                //echo 'adresse image est égale à ';var_dump($adressImage);
                            //echo '<img src="'.$adressImage.'" width=60 height=60.>';
                            }
                        }
                        $finTable='
                                </table>
                            </div>
                        </div>
                    </div>';
                            
                        $this->rendu=$this->rendu.$tableImgDiv.$table.$finTable;

                        //echo 'j affiche les images de la bdd';
                    }
                }
                else {
                    $this->rendu = $this->corps.
                        '<div class="col-12 col-md-10 bg-light">
                        <div>
                            Bienvenue sur mon site projet du cnam de fin d\'études
                         </div>
                    </div>
                </div>';
                }
                //if ($deconnexion){ echo $div;}
                  //echo'</div></div>'.$this->footer;
            

    //echo $this->rendu;
    echo $this->rendu.$this->footer;
    //echo 'apres point d arret';
     //         phpinfo();
    }

    function inscription($err,$email,$nom,$prenom,$pwd_form) {
        //echo 'on rentre dans vue inscription </br>';
        $error=$err;
        echo $this->corps;
        $string ='
                            <div class="col-12 col-md-10 bg-light">';
        echo $string;
             if (isset($_POST['submit']) AND !$error){
                $string='
                                <div>
                                    Toutes les données ont été soumises.
                                </div>
                            </div>
                        </div>';
                echo $string;    
             }
            else {
                $string2='  <div>
                                <form action="index-2-1" method="POST">
                                    <div>
                                        <label for="email">Email : </label>
                                        <input type="text" id="email" name="email" value="'.$email.'"/>
                                    </div>';
                echo $string2 ;
                if ($error AND empty($email)){
                    $string3='
                                    <div class="erreur">Le champ email est obligatoire
                                    </div>';
                    echo $string3 ;
                                }
                $string4='          
                                
                                    <div>
                                        <label for="nom">Nom : </label>
                                        <input type="text" id="nom" name="nom" value="'.$nom.'" />
                                    </div>';
                echo $string4;
                if ($error AND empty($nom)){
                    $string5='               
                                    <div class="erreur">Le champ nom est obligatoire
                                    </div>';
                    echo $string5;
                                }
                $string6='                      
                                    <div>
                                        <label for="prenom">Prénom : </label>
                                        <input type="text" id="prenom" name="prenom" value="'.$prenom.'" />
                                    </div>';
                echo $string6 ;
                if ($error AND empty($prenom)) {
                    $string7='
                                    <div class="erreur">Le champ prénom est obligatoire
                                    </div>
                    ';
                    echo $string7;
                }
                $string8='                       
                                    <div>
                                        <label for="pwd_form">Mot de passe </label>
                                        <input type="text" id="pwd_form" name="pwd_form" value="'.$pwd_form.'" />
                                    </div>';
                echo $string8;
                    if ($error AND empty($pwd_form)){
                    $string9='
                                    <div class="erreur">Le champ Mot de passe est obligatoire
                                    </div>
                    ';
                    echo $string9;
                }
        $string10='                        
                                    <div>
                                        <label for="submit">&nbsp;</label>
                                        <input type="submit" name="submit" value="Envoyer" />
                                    </div>
                                </form>
                            </div>
                        </div> 
                    </div>   ';
        echo $string10;    
                }
        echo $this->footer;
    }

    function connexion($error=false,$email='',$pwd_connexion='') {
        
        
        echo $this->corps;
        //echo'
        $string='
                            <div class="col-12 col-md-10 bg-light">';
        echo $string;
            if (isset($_POST['submit']) AND !$error){
                $string2 ='    
                                <div>'
                                . header('location:index-1-1').'
                                Connexion réussi!! 
                                Lien vers la page d\'accueil
                                <a href="index-1-1">Accueil</a>
                                </div>
                            </div>
                        </div>
                    ';
                echo $string2;    
                }

            else {
                $string3='
                                <div>
                                    <form action="index-3-1" method="POST">
                                        <div>
                                            <label for="email">Email : 
                                            </label>
                                            <input type="text" id="email" name="email" value="'.$email.'" />';
                echo $string3;                
                if ($error AND empty($email)){
                    $string4='
                                            <div class="erreur">Le champ email est obligatoire
                                            </div>';
                    echo $string4;
                }
                $string5='
                                        </div>
                                        <div>
                                            <label for="pwd_connexion">Mot de passe 
                                            </label>
                                            <input type="text" id="pwd_connexion" name="pwd_connexion" value="'.$pwd_connexion.'" />';
                echo $string5  ;              
                if ($error AND empty($pwd_connexion)){
                $string6='
                                        <div class="erreur">Le champ Mot de passe est obligatoire
                                        </div>
                        ';
                echo $string6;
                            }       
                $string7='  
                                        </div>
                                        <div>
                                            <label for="submit">
                                            </label>
                                            <input type="submit" name="submit" value="Envoyer" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        ';
                echo $string7;
    }
            //echo '$_COOKIE est égale à '.$_COOKIE['email'].$this->footer;
            echo $this->footer;
        }

    function fichier($result) {
        //echo $this->corps;
        /*$memory='
        <div class="col-12 col-md-10 bg-light">
        ';*/
        if (isset($result)) {
            return $result;
        }
        else {
            $string ='
                                        <div>
                                            <form method="POST" action="index-4-1" enctype="multipart/form-data" >
                                                <label for="upload_files"> Veuilliez choisir un fichier image a importer</label>
                                                <input type="hidden" name="MAX_VALUE_FILES" value="100000">
                                                <input type="file" name="upload_files" id="upload_files">
                                                <input type="submit" value="Envoyer" name="envoyer">
                                            </form>
                                        </div>';
            return $string;
        }
        //echo $this->footer;
    }





}