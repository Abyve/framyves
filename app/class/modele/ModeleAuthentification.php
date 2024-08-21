<?php

class ModeleAuthentification {
    private $email;
    private $pwd;
    
    function __construct($email, $pwd) {
        //echo 'dans le construct du modele authentification <br />';
        $this->email=$email;
        $this->pwd=$pwd;
        //echo 'on sort du construct de modele authentifcation <br />';


    } 
    public function getEmail() {
        return $this->email;
    }
    public function getPwd() {
        return $this->pwd;
    }


    function connectBDD() {
        //echo 'on rentre dans connectBDD </br>';
        include('config.php');
        try {
            $conn = new PDO($dsn, $user, $pwd);
            //echo 'connexion à la bdd réussie  </br>';
            return $conn;
        }
        
        catch (PDOException $e) {
            
            echo 'Connexion échouée : ' . $e->getMessage().'</br>';        
        }
    }
    function chercheEmail() {
        //echo 'dans cherche email modele authentification <br />';
        $conn=$this->connectBDD();
        try{
                $query="SELECT email FROM membres WHERE email=:email";
                //echo $query .'<br />';
                $r=$conn->prepare($query);
                $email=$this->email;
                $r->bindValue(':email',$email);
                $r->execute();
                //$r=$conn->query($query);
                $result=$r->fetch();
                //echo 'vardump $result';
                var_dump($result);
                return $result;
                
            }   
            catch  (PDOException $e) {

                echo 'Selection échouée : ' . $e->getMessage().'</br>';


            }
        }




    
    function cherchePwd() {
        echo 'dans cherche pwd modele authentification <br />';
       $conn=$this->connectBDD();
        try{
                $query="SELECT email, pwd FROM membres WHERE email = :email AND pwd=:pwd";
                echo $query;
                $r=$conn->prepare($query);
                //$r->bindValue(':pwd',$this->pwd,':email',$this->email);
                $r->execute([
                    ':pwd' =>$this->pwd,
                    ':email'=>$this->email
                ]);
                //$r=$conn->query($query);
                $result=$r->fetch();
                echo 'vardump $result';
                //var_dump($result);
                return $result;
                
            }   
            catch  (PDOException $e) {

                echo 'Selection échouée : ' . $e->getMessage().'</br>';


            }



  }


}