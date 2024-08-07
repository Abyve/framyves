<?php

class VueInscription {

    private $email; 
    private $nom ; 
    private $preonom; 
    private $pwd;
    private $error;

    function __construct($e, $n,$p,$pwd,$error) {
        
        $this->email=$e;
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
    
    function showForm() {
        echo 'on rentre dans showForm de vueInscription';
        if ($this->erreur) {
            $erreur='<br /> Erreur ! Merci de bien remplir tout le formulaire !';
        }
        else {
            $erreur='';

        }
            $retourForm='
                    <div id="conteneur">
                        <form action="index.php?page=2&action=1" method="POST">
                            <div>
                                <label for="email">Email : </label>
                                <input type="text" id="email" name="email" value="'.$this->email.'" />
                            </div>
                            <div>
                                <label for="nom">Nom : </label>
                                <input type="text" id="nom" name="nom" value="'.$this->nom.'" />
                            </div>
                            <div>
                                <label for="prenom">Prénom : </label>
                                <input type="text" id="prenom" name="prenom" value="'.$this->prenom.'" />
                                </div>
                            <div>
                                <label for="pwd">Mot de passe </label>
                                <input type="text" id="pwd" name="pwd" value="'.$this->pwd.'" />
                            </div>
                            <div>
                                <label for="submit"></label>
                                <input type="submit" name="submit" value="Envoyer" />
                                </div>
                            </form>
                        </div>';
        echo $retourForm;
        echo $erreur;
    }
}