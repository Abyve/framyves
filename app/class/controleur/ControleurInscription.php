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
        //$this->error=true;
        
        $this->email=(htmlspecialchars(filter_var($_POST["email"]),FILTER_VALIDATE_EMAIL)); 
        $this->nom=htmlspecialchars($_POST['nom']);
        $this->prenom=htmlspecialchars($_POST['prenom']);
        $this->pwd=htmlspecialchars($_POST['pwd']);
        echo '<br />$this->email = '.$this->email;
        $this->error=false;
        echo '<br />$this->error = '.$this->error;
         echo $this->error;
        if ((!empty($_POST['email']))&& (!empty($_POST['nom'])) &&  (!empty($_POST['prenom']))&& (!empty($_POST['pwd']))) { 
            $this->email=(htmlspecialchars(filter_var($_POST["email"]),FILTER_VALIDATE_EMAIL));
            $this->error=false;
            echo '<br />$this->error = '.$this->error;
        }  
        else
        {
            $this->error=true;
        }
    }
     //getter
     function getEmail() {
        return $this->email;
    }
    function getNom() {
        return $this->nom;
    }
    function getPrenom() {
        return $this->Prenom;
    }
    function getPwd() {
        return $this->pwd;
    }
    function getError() {
        return $this->error;
    }
   
    public function render() {
        
        echo 'dans render de controleur inscription $error ='.$this->error;
        if ($this->error){
            $vue=new VueInscription() ;                       
            $vue->showForm($this->email, $this->nom, $this->prenom, $this->getPwd, $this->error);
        }   
        else {
            $this->insert();
            $vue=new VueInscription() ;                       
            $vue->showSuccess();

        }
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