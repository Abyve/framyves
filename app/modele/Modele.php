<?php

class Modele {

    private $table;
    private $cle;
//setters
//getters
    

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
                $query="SELECT * FROM $this->table WHERE numuser=$this->cle LIMIT 10";
                echo '$query ='.$query;
                $r=$conn->query($query);
                $result=$r->fetchAll();//(PDO::FETCH_ASSOC);
                var_dump($result); echo '$result dans find image';
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
                $query="DELETE FROM $this->table WHERE numimg = $this->cle";
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

    function pas_de_cookie($error,$email,$pwd_connexion) {

       // include 'config.php';
            
        
    /*
        if ($_POST['submit']) {
            if (empty($email) OR  empty($pwd_connexion)){
                $error=true;
                return $error;
                
                }
            else {
            */
                $conn=$this->connectBDD();
    
                $query=" SELECT email,pwd FROM membres WHERE email='$email';"; 
    
                try {
                
                    $count = $conn->query($query);
                    foreach ($count as $row) {
                        //echo 'email en base de donnée = '.$row['email'].'</br>';
                        //echo 'mot de passe en base de donnée '.$row['pwd'].'</br>';
                        if (($row['pwd']==$pwd_connexion) AND ($row['email']==$email)) {
    
                            echo 'connexion réussi </br>';
                            setcookie('email',$email,time()+3600);
                           // ob_end_flush();
                            echo 'cookie créé = '.$_COOKIE['email'].'</br>';
                            $cookie=$_COOKIE['email'];
                            var_dump($_COOKIE['email']);
                            return true;
            
                        }  
                        
                    
                    }
    
                
                }
                catch (PDOException $e) {
                    echo 'la requete a echoué : ' . $e->getMessage();        
                }
                
            
            //}
            echo 'identifiant et mot de pase incorrectes </br>';
            $error=true;
            return $error;
        }

        function getMembre($email) {
            $conn=$this->connectBDD();
            echo 'on rentre dans getMembre </br>';
            echo '$email est  égale à '.$email.'</br>';
            try{
                echo  'on rentre dans le try de membres </br>';
                $query="SELECT * FROM membres WHERE email='$email'";
                echo '$query est égale à '.$query.'</br>';
                $r=$conn->query($query);
                echo '$r est égale à ';
                var_dump($r);
                //$result=$r->fetch();
                foreach ($r as $row) {
                    echo 'numuser est égale à '.$row['numuser'].'</br>';
                    $membre=new Membre($row['numuser'],$row['name'],$row['firstname'],$row['email'],$row['pwd']);
                    return $membre;
                    
                }
                unset($row);
                //return $result;
    
    
            }
            catch (PDOException $e) {
                
                echo 'Requete échouée : ' . $e->getMessage().'</br>';        
            };
        }
    
        
    }

