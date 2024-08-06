<?php
include('../vue/VueInscription.php');

class ControleurInscription {

    private $email ;
    private $nom ;
    private $prenom ;
    private $pwd ;
    private $error ;

    public function __construct() {
        echo 'on rentre dans le constructeur de ControleurInscription';
        $this->error=false ;
        if (isset($_POST['email'])) { 
            $this->email=(filter_var(htmlspecialchars(£_POST["email"]),FILTER_VALIDATE_EMAIL));
        } 
        else {
            $this->error=true;
        }
        if (isset($_POST['nom'])) { 
            $this->nom=htmlspecialchars($_POST['nom']);
        } 
        else {
            $this->error=true;
        }
        if (isset($_POST['prenom'])) { 
            $this->prenom=htmlspecialchars($_POST['prenom']);
        } 
        else {
            $this->prenom='';
        };
        if (isset($_POST['pwd'])) { 
            $this->pwd=htmlspecialchars($_POST['pwd']);
        } 
        else {
            $this->error=true;
        }
    }
    public function getError() {

        return $this->error;

    }
      
    public function render() {

        $vue=new vueInscription($this->email, $this->nom, $this->prenom, $this->pwd, $this->error)                        
        ;
        
    }




     
    
    
    
    
    
    
    
    
    


}