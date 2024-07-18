<?php
class Controleur {
    //private $page;
   // private $action;

        function __construct($pg,$act)
        { 
            //echo 'on rentre dans le construct de controleur';
            $this->page=$pg;
            $this->action=$act;

        }
        function nettoieDossierImage($images)
        {
            
            $cookie=(isset($_COOKIE['email'])) ? htmlspecialchars(trim($_COOKIE['email'])) : '';
            $path='./upload/'.$cookie;
            $scandir=scandir($path);
            $marqueurBdd=false;
            foreach($scandir as $fichier)
                {   //$parcoursDossier=false;
                        $files='';
                        $marqueur=false;
                        echo '< br /> '.$fichier.' =fichier </br>';
                        foreach ($images as $key => $img) {
                            echo ' avant if $fichier =='.$fichier.'<br />';
                            echo ' avant if $images =='.$images[$key]['nameimg'];
                            if ($fichier===$images[$key]['nameimg'])
                            {
                                echo '$fichier =='.$fichier.'<br />';
                                echo '$images =='.$images[$key]['nameimg'].' <br />';
                                $marqueurBdd=true;
                                $files=$images[$key]['nameimg'];
                            
                                echo '$fichier a conserver '.$images[$key]['nameimg'].'<br />';
                            
                            }
                            elseif ((($key===count($images)-1) AND ($marqueurBdd==false)) AND (is_file($path.'/'.$files)))
                            {
                                echo '<br /> j efface le fichier '.$fichier.'<br />';
                            
                            }

                        }
                        if (is_file($path.'/'.$files) AND (!$marqueurBdd))
                        {
            
                            
                            

                                echo '<br /> j efface le fichier '.$fichier.'<br />';
                            
                        }
                    
                    //$parcoursDossier=true;
                    
                   
                    
                }

        }

        function index($action=1) {
            //echo '</br> on rentre dans la fonction index </br>';

            //include 'function/cookie.php' ;
            
            $cookie=(isset($_COOKIE['email'])) ? htmlspecialchars(trim($_COOKIE['email'])) : '';
            //$cook=$this->connexion();
            //echo '$cookie est égale à : '.$cookie.'</br>';
            //$vue=new Vue($cookie);
            if (!empty($cookie)){
                $m = new Modele('membres');     // on créé un objet membre
                $membre=$m->getMembre($cookie);
                var_dump($membre);
                $m2=new Modele('images',$membre->getNumUser());
                var_dump($m2);echo ' <br /> $m2 dans controleur <br />';
              
                $images=$m2->find();  
                $this->nettoieDossierImage($images);
                var_dump($images); echo '<br /> $images dans controleur <br />';
            
                $resultFichier=$this->fichier();
                $vue= new Vue($cookie,$membre);
                //$fichier=$vue->fichier($result);
                $vue->index($cookie,$resultFichier,$action,$images);
                //ob_end_flush();
            }
            else {

                $vue= new Vue();
                $vue->index();
            }
        }
    
        function galerie() {
            
            $mod=new Modele('images',$cle);
            $imgs=$mod->find();
            include 'vueGalerie.php';



        }
        function connection() {
            
            $cookie=$_COOKIE['email'];
            include 'vueConnexion.php';


        }
        function inscription()
        {
            $error = FALSE;
           
            $nom = (isset($_POST['nom'])) ? htmlspecialchars(trim($_POST['nom'])) : '';
            $prenom = (isset($_POST['prenom'])) ? htmlspecialchars(trim($_POST['prenom'])) : '';
            $email = (isset($_POST['email'])) ? htmlspecialchars(trim($_POST['email'])) : '';
            if (!(filter_var($email,FILTER_VALIDATE_EMAIL))) {$email='';};
            $pwd_form = (isset($_POST['pwd_form'])) ? htmlspecialchars(trim($_POST['pwd_form'])) : '';
            // Test si des valeures ont été soumisent
           // echo ' la ça marche ';
            if (isset($_POST['submit'])) {
            // Validation des données
           
                if ( empty($nom) OR empty($prenom) OR empty($pwd_form) OR empty($email)) {

                $error = TRUE;
                }
                else

                {
                    echo ' la ça marche ';
                    $membre=new Membre($numU,$nom,$prenom,$email,$pwd_form);

                    echo '$membre->name '.$membre->getName().'</br>';
                    echo '$membre->firstName '.$membre->getFirstName().'</br>';
                    echo '$membre->email '.$membre->getEmail().'</br>';
                    echo '$membre->pwd '.$membre->getPwd().'</br>';
                    echo '$error = '.var_dump($error).'</br>';
                $m=new Modele('membres');
                $m->insert($membre);
                }
            }
           
            $vue=new Vue($cook);
            echo $vue->inscription($error,$email,$nom,$prenom,$pwd_form);

        }

        function connexion() {
       
            $cookie= (isset($_COOKIE['email']) ? htmlspecialchars(trim($_COOKIE['email'])) : '');
            //echo '$cookie au debut du script ='.$cookie.'</br>';
            $error=false;
            $email= (isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '');
            if (!(filter_var($email,FILTER_VALIDATE_EMAIL))) {$email='';};
            $pwd_connexion= (isset($_POST['pwd_connexion']) ? htmlspecialchars(trim($_POST['pwd_connexion'])) : '');
            //echo 'email soumis au debut du script ='.$email.'</br>';
            
            if (empty($cookie)) {
                echo ' on rentre dans le if de empty cookie </br>';
                if (isset($_POST['submit'])) {
                // Validation des données
                    if (empty($pwd_connexion) OR empty($email)) {
                        $error = TRUE;
                //$m= new Modele('membres');
                        /*$v= new Vue();
                        $v->connexion($error,$email,$pwd_connexion);
                        */
                    }
                    
                    echo 'on est dans le if de isset $_post sans $ error </br>';
                    $m=new Modele('membres');
                    $m->pas_de_cookie($error,$email,$pwd_connexion);
                    echo '$cookie est égale à '.$cookie.'</br>';
                    /*$vu = new Vue($cookie) ;
                    $vu->connexion();*/ 
                }
            }
            else    {
               
                
                header('location:index-1-1');
                }
            
            
             
            //$v= new Vue($cookie);
            //$v->accueil();
            
            $v= new Vue();
            $v->connexion($error,$email,$pwd_connexion);
                
            //$v=new Vue($cookie);
            //$v->connexion($error,$email,$pwd_connexion);
                
        
        //$error=pas_de_cookie($error,$email,$pwd_connexion);
        //echo '$error après traitement function pas_de_cookie = '.$error.'</br>';
        //echo 'après traitement $cookie = '.$cookie.'</br>';
        //echo 'après traitement $email = '.$email.'</br>';
        ob_end_flush();
    }
    function fichier() {
            $cookie=(isset($_COOKIE['email']) ? htmlspecialchars(trim($_COOKIE['email'])) : '');
            //$cookie='test@test';
            echo '$cookie = '.$cookie.'</br>';
            if (!file_exists('upload/')) {

                mkdir('upload');

            }
            if (isset($_FILES['upload_files'])) {
                $jeton=rand(1,999);
                $finfo=finfo_open(FILEINFO_MIME_TYPE);
                $mimeType=finfo_file($finfo, $_FILES['upload_files']['tmp_name']);
                var_dump($mimeType);
                echo ' $mimeType ';
                $verifMimeType=true;

                if (($mimeType=='image/png') OR ($mimeType=='image/jpeg')){$verifMimeType=true;}
                echo '$verifMimeType ='.$verifMimeType.'<br />';
                $dossier='upload/'.$cookie.'/';
                echo '$dossier = '.$dossier;
                
                if (!file_exists($dossier)) {

                    mkdir($dossier);
        
                }
                $fichier=basename($_FILES['upload_files']['name']);
                $max_file_size=100000;
                if (filesize($_FILES['upload_files']['tmp_name'])>$max_file_size)
                {
                    $result='Fichier trop volumineux';
                
                ;
                }
                elseif (($verifMimeType) AND (move_uploaded_file($_FILES['upload_files']['tmp_name'],$dossier.$jeton.$fichier)))
                {
                    $result='Upload réussi';
                    
                    $mo= new Modele('images');
                    $membre=$mo->getMembre($cookie);
                    $numUser=$membre->getNumUser();
                    $i= new Image($numUser,$fichier,$dossier.$jeton.$fichier);
                    $mo->insert($i);
                    $result='ajout image bdd ok ';
                    #include 'ajout  image en bdd'
                }
                else
                {   
                    $result='Echec transfert fichier';   
                }
            
            return $result;
            //$v= new Vue($cookie);
            //$v->fichier($result);
            }
                
        
        
    }

    function deconnexion() {

        setcookie('email',$email,time()-3600);
        echo 'on rentre dans la fonction deconnexion </br>';
        $v =new Vue();
        header("location:index-1-1");

        


    }

    function suppImage($numImg) {
        echo 'on rentre dans suppImage <br />';
        $m=new Modele('images',$numImg);
        $m->delete();
        header("location:index-1-1");



    }
}

