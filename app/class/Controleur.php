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

            include 'function/cookie.php' ;
            
            
            $cook=cookie();
            //echo '$cook est égale à : '.$cook.'</br>';
            $vue=new Vue($cook);
            echo $vue->accueil();

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
            }
            else {

                

                /*$membre=new Membre($email,$nom,$prenom,$pwd_form);

                    echo '$membre->name '.$membre->getName().'</br>';
                    echo '$membre->firstName '.$membre->getFirstName().'</br>';
                    echo '$membre->email '.$membre->getEmail().'</br>';
                    echo '$membre->pwd '.$membre->getPwd().'</br>';
                    echo '$error = '.var_dump($error).'</br>';
                */
                
            }
            $vue=new Vue($cook);
            echo $vue->inscription($error,$email,$nom,$prenom,$pwd_form);

        }



}