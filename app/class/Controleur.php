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
        function index() {
            //echo '</br> on rentre dans la fonction index </br>';

            //include 'function/cookie.php' ;
            
            $cookie=(isset($_COOKIE['email'])) ? htmlspecialchars(trim($_COOKIE['email'])) : '';
            //$cook=$this->connexion();
            echo '$cookie est égale à : '.$cookie.'</br>';
            //$vue=new Vue($cookie);
            $m = new Modele('membres');     // on créé un objet membre
            $membre=$m->getMembre($cookie);echo $membre;
            $vue= new Vue($cookie,$membre);
            $vue->index($cookie,$membre);
            //ob_end_flush();
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
            if (isset($_POST['submit'])) {
            // Validation des données
                if ( empty($nom) OR empty($prenom) OR empty($pwd_form) OR empty($email)) {

                $error = TRUE;
                }
                else
                {
                    $membre=new Membre($email,$nom,$prenom,$pwd_form);

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
        $cookie='test@test';
        echo '$cookie = '.$cookie.'</br>';
        if (!file_exists('upload/')) {

            mkdir('upload');

        }
        if (isset($_FILES['upload_files'])) {
            
            
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
            }
            elseif (move_uploaded_file($_FILES['upload_files']['tmp_name'],$dossier.$fichier))
            {
                $result='Upload réussi';
                #include 'ajout  image en bdd'
            }
            else
            {   
                $result='Echec transfert fichier';   
            }
        }
        
        $v= new Vue($cookie);
        $v->fichier($result);
            
        
        
    }

    function deconnexion() {

        setcookie('email',$email,time()-3600);
        echo 'on rentre dans la fonction deconnexion </br>';
        $v =new Vue();
        header("location:index-1-1");

        


    }
}

