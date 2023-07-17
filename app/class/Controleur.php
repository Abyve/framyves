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
            
            
            $cook=$this->connexion();
            echo '$cook est égale à : '.$cook.'</br>';
           /* $vue=new Vue($cook);
            echo $vue->accueil();
            */
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
        if (isset($_POST['submit'])) {
            // Validation des données
                if (empty($pwd_form) OR empty($email)) {

                $error = TRUE;
                }
            }
        
        if (empty($_POST['submit']) AND empty($cookie)) {
            $v=new Vue();
            $v->connexion($error,$email,$pwd_connexion);

        }
        elseif (isset($cookie) AND (empty($_POST['submit']))) {
            //header('Location:index-1-1');
            return $cookie;
            exit;
        }
        else { 
           // echo' cookie n\'est pas présent';
            $v=new Vue();
            $v->connexion($error,$email,$pwd_connexion);
        }
        //$error=pas_de_cookie($error,$email,$pwd_connexion);
        //echo '$error après traitement function pas_de_cookie = '.$error.'</br>';
        //echo 'après traitement $cookie = '.$cookie.'</br>';
        //echo 'après traitement $email = '.$email.'</br>';
        ob_end_flush();
    }



}