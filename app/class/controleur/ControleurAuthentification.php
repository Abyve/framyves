<?php

class ControleurAuthentification {
    private $email;
    private $pwd;


    public function __construct($email,$pwd) {
        echo 'dans le controleur authentification';
        $this->email=$email;
        $this->pwd=$pwd;

    }
    public function getEmail() {
        return $this->email;
    }
    public function getPwd() {
        return $this->pwd;
    }
    public function setEmail($email) {
        $this->email=$email;
    }
    public function setPwd($pwd) {
        $this->pwd =$pwd;

    }
   
    public function verif() {
        echo 'dans la fonction verif de controleur Authentification';
        //$membre= new Membre('','','','',$this->email,$this->pwd);
        $m=new ModeleAuthentification($this->email,$this->pwd);
       echo '$m apres new objet :'; var_dump($m);;echo '<br />';
        $resultat=$m->chercheEmail();
        echo '<br /> $resultat = <br />';var_dump($resultat);
        if ($resultat[0] == $this->email) {
            $resultatFinal=$m->cherchePwd();
            var_dump($resultatFinal); echo 'var_dump resultat final <br />';
            if (($resultatFinal['email']==$this->email) && ($resultatFinal['pwd']==$this->pwd)) { 
                return true;
            }
            else
            {
                return false;
            }

        }
    }
    

}