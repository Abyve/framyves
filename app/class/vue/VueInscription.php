<?php

class VueInscription {

    private $email; 
    private $nom ; 
    private $preonom; 
    private $pwd;

    function __construct($e, $n,$p,$pwd) {
        $this->email=$e;
        $this->nom=$n;
        $this->p=$p;
        $this->pwd=$pwd;

    }

    function retourForm() {

        $retourForm='
                    <div id="conteneur">
                        <form action="index-2-1" method="POST">
                            <div>
                                <label for="email">Email : </label>
                                <input type="text" id="email" name="email" value="" />
                            </div>
                            <div>
                                <label for="nom">Nom : </label>
                                <input type="text" id="nom" name="nom" value="" />
                            </div>
                            <div>
                                <label for="prenom">Prénom : </label>
                                <input type="text" id="prenom" name="prenom" value="" />
                                </div>
                            <div>
                                <label for="pwd_form">Mot de passe </label>
                                <input type="text" id="pwd_form" name="pwd_form" value="" />
                            </div>
                            <div>
                                <label for="submit"></label>
                                <input type="submit" name="submit" value="Envoyer" />
                                </div>
                            </form>
                        </div>';
    }
}