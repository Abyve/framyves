<?php

include 'VueBase.php' ;

class VueInscription extends VueBase {

    protected $email; 
    protected $nom ; 
    protected $preonom; 
    protected $pwd;
    protected $error;
    protected $contenu;

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
    function form($e,$n,$p,$pwd,$error):string {
        echo '<br />on rentre dans showForm de vueInscription';
        echo '<br />$e est égale '.$e;
        $msgError='';
        if ($error){
            $msgError='<br /> Merci de bien remplir tout le formulaire !'; 
            }
            $form='
                            <div class="col-12 col-md-10 bg-light">
                                <form action="index-2-1" method="POST">
                                    <div class="form-group" >
                                        <label for="email">Email : </label>
                                        <input type="email" class="form-control" id="email" name="email" value="'.$e.'" />
                                    </div>
                                    <div class="form-group" >
                                        <label for="nom">Nom : </label>
                                        <input type="text" class="form-control" id="nom" name="nom" value="'.$n.'" />
                                    </div>
                                    <div class="form-group" >
                                        <label for="prenom">Prénom : </label>
                                        <input type="text"  class="form-control" id="prenom" name="prenom" value="'.$p.'" />
                                    </div>
                                    <div class="form-group"  >
                                        <label for="pwd">Mot de passe </label>
                                        <input type="password" class="form-control" id="pwd" name="pwd" value="'.$pwd.'" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                <p>'.$msgError.'
                                </p>    
                            </div>';
            $this->contenu=$form;
            return $this->contenu;
        //echo $error2;
        
    }
    
    function formSuccess() {

        $msg='
            <div class="col-12 col-md-10 bg-light">
                Votre formulaire est correcte et il a été traité. Merci!
            </div>';       
        $this->contenu= $msg;
        return $this->contenu;
        


    }

    function show() {

        echo $this->corps.$this->contenu.$this->footer;

    }





}