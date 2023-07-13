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
            if (isset($_POST)) {

                $membre=new Membre($_POST['email'],$_POST['nom'],$_POST['prenom'],$_POST['pwd_form']);

                    echo '$membre->name '.$membre->getName().'</br>';
                    echo '$membre->firstName '.$membre->getFirstName().'</br>';
                    echo '$membre->email '.$membre->getEmail().'</br>';
                    echo '$membre->pwd '.$membre->getPwd().'</br>';
                
                
            }
            $vue=new Vue($cook);
            echo $vue->inscription();

        }



}