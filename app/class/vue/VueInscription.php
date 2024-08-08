<?php

class VueInscription {

    private $email; 
    private $nom ; 
    private $preonom; 
    private $pwd;
    private $error;

    /*function __construct() {
       echo '<br />on rentre dans le constructuer de vueInscription';
        $this->error=$error;
        echo '<br /> $error ='.$e;
        echo '<br />$this->email = '.$this->email;
        $this->nom=$n;
        $this->prenom=$p;
        $this->pwd=$pwd;
        $this->error=$error;
    }
    //getters    
    function getEmail() {
        return $this->email;
    }
    function getNom() {
        return $this->nom;
    }
    function getPrenom() {
        return $this->prenom;
    }
    function getPwd() {
        return $this->pwd;
    }
    function getError() {
        return $this->error;
    }
    //setters
    function setEmail($e) {
        $this->email=$e;
    }
    function setNom($n) {
        $this->nom=$n;
    }
    function setPrenom($p) {
        $this->prenom=$p;
    }
    function setPwd($pwd) {
        $this->pwd=$pwd;
    }    
    */
    function showForm($e,$n,$p,$pwd,$error) {
        echo '<br />on rentre dans showForm de vueInscription';
        echo '<br />$e est égale '.$e;
        
            echo '<br /> Erreur ! Merci de bien remplir tout le formulaire !';
            $retour='
                        <div id="conteneur">
                            <form action="index.php?page=2&action=1" method="POST">
                                <div>
                                    <label for="email">Email : </label>
                                    <input type="text" id="email" name="email" value="'.$e.'" />
                                </div>
                                <div>
                                    <label for="nom">Nom : </label>
                                    <input type="text" id="nom" name="nom" value="'.$n.'" />
                                </div>
                                <div>
                                    <label for="prenom">Prénom : </label>
                                    <input type="text" id="prenom" name="prenom" value="'.$p.'" />
                                </div>
                                <div>
                                    <label for="pwd">Mot de passe </label>
                                    <input type="text" id="pwd" name="pwd" value="'.$pwd.'" />
                                </div>
                                <div>
                                    <label for="submit"></label>
                                    <input type="submit" name="submit" id="submit" value="Envoyer" />
                                </div>
                            </form>
                        </div>';
        
        echo $retour;
        echo $error2;
        
    }
    
}