<?php

class Modele {

    private $table;
    private $cle;
//setters
//getters
    function getCle() {

        return $this->cle;
    }


    function __construct($tble,$cl=null)
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


    function insert($object) {
        $conn=$this->connectBDD();
        echo 'on rentre dans insert ';
        if ( $this->table == 'membres' ) {
            echo 'on rentre dans le if membres </br>';
           try {
                echo 'on rentre dans le try requete membre </br>';
                $query='INSERT INTO membres(name, firstname, email, pwd) VALUES (:name, :firstname, :email, :pwd)';
                echo '$query est égale à '.$query.'<br/>';
                $q= $conn->prepare($query);
                $q->execute([
                    'name' => $object->getName(),
                    'firstname' => $object->getFirstName(),
                    'email' => $object->getEmail(),
                    'pwd' => $object->getPwd()
                ]);
                return true;
           }
           catch (PDOException $e) {

            echo 'Insertion échouée : ' . $e->getMessage().'</br>';
            
           }
        
        }
        elseif( $this->table == 'images' ) {
            try{
                echo 'on rentre dans le try de insert image </br>';
                $query='INSERT INTO images(numuser, nameimg, adressimg) VALUES (:numuser, :nameimg, :adressimg)';
                echo '$query est égale à '.$query.'</br>';
                $q= $conn->prepare($query);
                //$q->execute($object->nameImg,$object->adressImg);
                $q->execute([
                    'numuser' => $object->getNumUser(),
                    'nameimg' => $object->getNameImg(),
                    'adressimg' => $object->getAdressImg()
                ]);
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
                //echo $query;

                $r=$conn->query($query);
                $result=$r->fetch();
                //echo 'vardump $result';
                //var_dump($result);
                return $result;
                
            }   
            catch  (PDOException $e) {

                echo 'Selection échouée : ' . $e->getMessage().'</br>';


            }
        }
        elseif ($this->table == 'images') {
            try{
                $query="SELECT * FROM $this->table WHERE numuser='$this->cle'";
                $r=$conn->query($query);
                $result=$r->fetch();
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
    

    function update($champs,$data,$num) {
        echo 'on rentre dans la methode update </br>';
        $conn=$this->connectBDD();
        if ($this->table=='membres') {
            try {
                echo 'on rentre dans le try de la table membres </br>';
                $query="UPDATE $this->table SET $champs = :data WHERE numuser = :numuser";
                echo '$query est égale à '.$query.'</br>';
                echo 'data est égale à '.$data.'</br>';
                echo '$this->cle est égale à '.$this->cle.'</br>';
                $q= $conn->prepare($query);
                echo 'prepare ok </br>';
                $q->execute(array(
                    'data' => $data,
                    'numuser' => $num
                ));
                echo '$q est passé </br>';
                return true;
            }
            catch (PDOException $e) {

                echo 'Mise à jour échouée : ' . $e->getMessage().'</br>';

            }
        }
        elseif ($this->table=='images') {

            try {

                $query="UPDATE $this->table SET $champs=:data WHERE numimg=:numimg";
                $q=$conn->prepare($query);
                $q->execute([
                    'data' => $data,
                    'numimg'=> $num
                ]);
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
                $query="DELETE FROM $this->table WHERE numuser = $this->cle";
                echo ' $query est égale à '.$query.'</br>';
                //$q=$conn->prepare($query);
                $conn->exec($query);
            }
            catch (PDOException $e) {
                echo 'Supression échouée : ' . $e->getMessage().'</br>';
            }
        }
        elseif ($this->table=='images') {
            try{
                $query="DELETE FROM $this->table WHERE numimg= $this->cle";
                $conn->exec($query);
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