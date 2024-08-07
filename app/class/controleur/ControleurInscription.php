<?php
include(dirname(__DIR__).'/vue/VueInscription.php');

class ControleurInscription {

    private $email ;
    private $nom ;
    private $prenom ;
    private $pwd ;
    private $error ;

    public function __construct() {
        echo 'on est dans le construct de ControleurInscrption';
        $this->error=true ;
        echo $this->error;
        if (isset($_POST['email'])) { 
            $this->email=(filter_var(htmlspecialchars(£_POST["email"]),FILTER_VALIDATE_EMAIL));
            $this->error=false;
        } 
       
        if (isset($_POST['nom'])) { 
            $this->nom=htmlspecialchars($_POST['nom']);
            $this->error=false;
        } 
       
        if (isset($_POST['prenom'])) { 
            $this->prenom=htmlspecialchars($_POST['prenom']);
            $this->error=false;
        } 
        
        if (isset($_POST['pwd'])) { 
            $this->pwd=htmlspecialchars($_POST['pwd']);
            $this->error=false;
        } 
       
        echo $this->error;
    }
    public function getError() {

        return $this->error;

    }
      
    public function render() {
        
        $vue=new VueInscription($this->email, $this->nom, $this->prenom, $this->pwd, $this->error) ;                       
        $vue->showForm();
    }
        
    public function insert() {
        $data=array();
        if ( (!empty($this->email)) && (!empty($this->nom)) && (!empty($this->prenom)) && (!empty($this->pwd)) && (!($this->error))) {
            $data['email'] = $this->email;
            $data['nom'] = $this->nom;
            $data['prenom'] = $this->prenom;
            $data['pwd'] = $this->pwd;
            echo 'insertion en bdd à faire ';
        }
    }
      






     
    
    
    
    
    
    
    
    
    


}