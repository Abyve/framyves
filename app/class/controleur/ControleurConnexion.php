<?php

class ControleurConnexion {

    private $email;
    private $pwd;
    private $error;


    function __construct() {
        echo 'on rentredans le construct de controleurConnexion <br />';
        var_dump($_POST);
        if ((!empty($_POST['email'])) && (!empty($_POST['pwd']))) {
           $this->email=htmlspecialchars(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
            $this->pwd=htmlspecialchars($_POST['pwd']);
            $this->error=false;
        }
        else
        {

            $this->error=true;
        }
        echo 'on sort du construct de controleur connexion <br />';
    }

    function render() {

        //$v=new VueConnexion;
        echo 'dans render de controleur connexion $error ='.$this->error;
        
            $vue=new VueConnexion() ;                       
            $contenu=$vue->form($this->email, $this->pwd, $this->error);
            $vue->show($contenu);
        /*}   
        else {
           
            $vue=new VueConnexion() ;                       
            $contenu=$vue->formSuccess();
            //$this->insert();
            $vue->show($contenu);
        }
        */
    }



}