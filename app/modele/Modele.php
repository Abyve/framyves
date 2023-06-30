<?php

class Modele {

    private $table;
    private $cle;



    function __construct($tble,$cl)
    {
        echo 'on entre dans le construct de la class Modele';
        $this->table=$tble;
        $this->cle=$cl;
        echo '$this->table = '.$this->table.'</br>';
        echo '$this->cle = '.$this->cle.'</br>';

    }

    function connectBDD() {
        echo 'on rentre dans connectBDD </br>';
        include('config.php');
        try {
            $conn = new PDO($dsn, $user, $pwd);
            echo 'connexion à la bdd réussie  </br>';
            return $conn;
        }
        
        catch (PDOException $e) {
            
            echo 'Connexion échouée : ' . $e->getMessage().'</br>';        
        };
    }


    function insert($objet) {
        $conn=$this->connectBDD();
        if ( $this->table == 'membres' ) {
           try {
                $query='INSERT INTO membres(nam,firstname,email,pwd) VALUES (:nam, :firstname, :email, :pwd)';
                $q= $conn->prepare($query);
                $q->execute($objet->nam,$objet->firstname,$objet->email,$objet->pwd);
                return true;
           }
           catch (PDOException $e) {

            echo 'Insertion échouée : ' . $e->getMessage().'</br>';
            
           }
        
        }
        elseif( $this->table == 'images' ) {
            try{
                $query='INSERT INTO images(nameimg,adressimg) VALUES (:nameimg, :adressimg)';
                $q= $conn->prepare($query);
                $q->execute($objet->nameimg,$objet->adressimg);
                return true;
            }
            catch (PDOException $e) {

                echo 'Insertion échouée : ' . $e->getMessage().'</br>';

                
            }
        }
        else {

            return false;
        }
    
    
    }
    function find() {
        $conn=$this->connectBDD();
        if ($this->table == 'membres'){
            try{
                $query="SELECT * FROM $this->table WHERE numuser='$this->cle'";
                echo $query;

                $r=$conn->query($query);
                $result=$r->fetch();
                echo 'vardump $result';
                var_dump($result);
                return $result;
                
            }   
            catch  (PDOException $e) {

                echo 'Selection échouée : ' . $e->getMessage().'</br>';


            }
        }
        elseif ($this->table == 'images') {
            try{
                $query="SELECT * FROM '$this->table' WHERE numimg='$this->cle'";
                $result=$conn->query($query);
                return $result;
                
            }   
            catch  (PDOException $e) {

                echo 'Selection échouée : ' . $e->getMessage().'</br>';


            }
        }
        else {

            echo 'erreur find </br>';
            return false;
        }
    }
    

    function update($champs,$data) {

        $conn=$this->connectBDD();
        if ($this->table=='membres') {
            try {

                $query="UPDATE '$this->table' SET '$champs=$data' WHERE '$numuser=$this->cle'";
                return true;
            }
            catch (PDOException $e) {

                echo 'Mise à jour échouée : ' . $e->getMessage().'</br>';

            }
        }
        elseif ($this->table=='images') {

            try {

                $query="UPDATE '$this->table' SET '$champs=$data' WHERE '$numimg=$this->cle'";
                return true;
            }
            catch (PDOException $e) {

                echo 'Mise à jour échouée : ' . $e->getMessage().'</br>';

            }
        }
        else {
            echo 'erreur update</br>';
            return false;
        }

    } 
    function delete() {
        $conn=$this->connectBDD();
        if ($this->table=='membres'){
            try{
                $query="DELETE * FROM '$this->table' WHERE '$numuser=$this->cle'";
            }
            catch (PDOException $e) {
                echo 'Supression échouée : ' . $e->getMessage().'</br>';
            }
        }
        elseif ($this->table=='images') {
            try{
                $query="DELETE * FROM '$this->table' WHERE '$numimg=$this->cle'";
            }
            catch (PDOException $e) {
                echo 'Supression échouée : ' . $e->getMessage().'</br>';
            }
        } 
        else {
            echo'echec delete';
            return false;
        }
    }

}